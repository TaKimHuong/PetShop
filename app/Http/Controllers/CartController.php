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
        $couponCode = $request->input('coupon'); // Lấy mã giảm giá từ request
    
        if ($couponCode) {
            $coupon = MaGiamGia::where('coupon_code', $couponCode)->first(); // Kiểm tra mã giảm giá trong cơ sở dữ liệu
    
            if ($coupon) {
                // Xóa mã giảm giá cũ (nếu có)
                Session::forget('coupon');
    
                // Lưu mã giảm giá mới vào session
                $couponData = [
                    'coupon_condition' => $coupon->coupon_condition, // Loại mã giảm giá (1: %, 0: số tiền cố định)
                    'coupon_number' => $coupon->coupon_number,      // Giá trị giảm
                    'coupon_code' => $coupon->coupon_code           // Mã giảm giá
                ];
    
                Session::put('coupon', [$couponData]); // Lưu mã giảm giá mới vào session
    
                return redirect()->back()->with('success', 'Áp dụng mã giảm giá thành công!');
            } else {
                // Nếu mã giảm giá không hợp lệ
                return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ!');
            }
        } else {
            // Nếu không chọn mã giảm giá, xóa mã giảm giá trong session và quay về mặc định
            Session::forget('coupon');
    
            return redirect()->back()->with('info', 'Không có mã giảm giá nào được áp dụng.');
        }
    }
    
    

    public function getCurrentUrl(Request $request)
{
    // Lấy URL cơ bản
    $url = url()->current();
    
    // Lấy URL đầy đủ (bao gồm query string nếu có)
    // $fullUrl = url()->full();

    return response()->json([
        'url' => $url
        // 'full_url' => $fullUrl
    ]);
}
    
    
    
}
