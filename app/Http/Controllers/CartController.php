<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\MaGiamGia;

session_start();
class CartController extends Controller
{
    //
    public function save_cart(Request $request) {
        $productId = $request->productid_hidden;
        $so_luong = $request->qty;
        $thong_tin_sp = DB::table('tbl_product')->where('product_id', $productId)->first();
        
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();
        // echo '<pre>';
        // print_r($data);
        // echo '<pre>';

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
       

        $data['id'] = $thong_tin_sp->product_id;
        $data['qty'] = $so_luong;
        $data['name'] = $thong_tin_sp->product_name;
        $data['price'] = $thong_tin_sp->product_price;
        $data['weight'] = $thong_tin_sp->product_price;
        $data['options']['image'] = $thong_tin_sp->product_image;
        Cart::add($data);
        Cart::setGlobalTax(10);
        // Cart::destroy();


           // Lưu vào bảng `tbl_cart_temp`
    DB::table('tbl_cart_temp')->updateOrInsert(
        [
            'customer_id' => Session::get('customer_id'),
            'product_id' => $thong_tin_sp->product_id,
        ],
        [
            'product_name' => $thong_tin_sp->product_name,
            'product_price' => $thong_tin_sp->product_price,
            'quantity' => $so_luong,
            'product_image' => $thong_tin_sp->product_image,
        ]
    );
        return Redirect::to('/Hien-thi-gio-hang');

    }
 
    public function HienThiGioHang() {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();
        $sanpham = Cart::content(); // Lấy tất cả các sản phẩm trong giỏ hàng
    
       
        return view('pages.cart.show_cart', compact('cate_product', 'sanpham'))->with('category', $cate_product);
    }

    // public function XoaGioHang($rowId) {
    //     Cart::update($rowId,0);
    //     return Redirect::to('/Hien-thi-gio-hang');

    // }
// xóa đơn hàng khi nhấn nút X để mà xóa
    public function XoaGioHang($rowId) {
        // Lấy product_id từ sản phẩm trong giỏ hàng bằng rowId
        $product = Cart::get($rowId);
        $product_id = $product->id;
        $customer_id = Session::get('customer_id');
    
        // Cập nhật giỏ hàng của session
        Cart::update($rowId, 0);
    
        // Xóa sản phẩm khỏi bảng tbl_cart_temp dựa trên customer_id và product_id
        DB::table('tbl_cart_temp')
            ->where('customer_id', $customer_id)
            ->where('product_id', $product_id)
            ->delete();
    
        return Redirect::to('/Hien-thi-gio-hang');
    }
    

    // tu dong cap nhat gio hang 
    public function updateCart(Request $request)
    {
        // Lấy rowId và quantity từ yêu cầu AJAX
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');
    
        // Cập nhật số lượng của sản phẩm trong giỏ hàng
        Cart::update($rowId, $quantity);
    
        // Lấy thông tin giỏ hàng mới nhất sau khi cập nhật
        $item = Cart::get($rowId);
        $totalPrice = number_format($item->price * $item->qty) . ' đ';
    
        // Lấy tổng thuế, subtotal và tổng giỏ hàng
        $cartSubtotal = Cart::subtotal(0, ',', '.') . ' đ';  // Tổng tiền trước thuế
        $cartTax = Cart::tax(0, ',', '.') . ' đ';  // Tiền thuế
        $cartTotal = Cart::total(0, ',', '.') . ' đ';  // Tổng tiền sau thuế
    
        // Trả về JSON chứa thông tin mới
        return response()->json([
            'total_price' => $totalPrice,  // Giá sản phẩm sau khi cập nhật
            'cart_total' => $cartTotal,    // Tổng tiền giỏ hàng
            'cart_subtotal' => $cartSubtotal,  // Tổng tiền trước thuế
            'cart_tax' => $cartTax,        // Tiền thuế
        ]);
    }


    // ham ap dung ma giam gia vao 
    // public function check_coupon(Request $request) {
    //     $data = $request->all();
    //     // print_r($data);
    //     $coupon = MaGiamGia::where('coupon_code', $data['coupon'])->first();
    //     if ($coupon) {
    //         $count_coupon = $coupon->count();
    //         if ($count_coupon >0) {
    //             $coupon_session = Session::get('coupon');
    //             if ($coupon_session ==true ) {
    //                 $it_available = 0;
    //                 if ($it_available == 0) {
    //                     $cou[] = array(
    //                         'coupon_code' =>$coupon->coupon_code,
    //                         'coupon_condition' =>$coupon->coupon_condition,
    //                         'coupon_number' =>$coupon->coupon_number,

    //                     );

    //                     Session::get('coupon', $cou);
    //                 }
    //                 Session::save();
    //                 return redirect()->back()->with('message', "Thêm mã giảm giá thành công");
    //             }
                
    //         } else {
    //             return redirect()->back()->with('error', "Thêm mã giảm giá không thành công"); 
    //         }
    //     }

    // }

    public function check_coupon(Request $request) {
        $data = $request->all();
    
        // Tìm mã giảm giá trong cơ sở dữ liệu
        $coupon = MaGiamGia::where('coupon_code', $data['coupon'])->first();
    
        if ($coupon) {
            // Lấy danh sách mã giảm giá hiện tại từ session
            $coupon_session = Session::get('coupon', []);
    
            // Kiểm tra xem mã giảm giá đã tồn tại trong session chưa
            $it_available = false;
            foreach ($coupon_session as $session_coupon) {
                if ($session_coupon['coupon_code'] === $coupon->coupon_code) {
                    $it_available = true;
                    break;
                }
            }
    
            // Nếu mã giảm giá chưa tồn tại, thêm vào session
            if (!$it_available) {
                $coupon_session[] = [
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_condition' => $coupon->coupon_condition,
                    'coupon_number' => $coupon->coupon_number,
                ];
    
                Session::put('coupon', $coupon_session);
            }
    
            return redirect()->back()->with('message', "Thêm mã giảm giá thành công");
           
        } else {
            // Mã giảm giá không tồn tại
          
            return redirect()->back()->with('error', "Mã giảm giá không tồn tại hoặc không hợp lệ");
        }
    }
    
    
}
