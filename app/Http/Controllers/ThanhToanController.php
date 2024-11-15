<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class ThanhToanController extends Controller
{
    //

    public function dang_nhap_thanh_toan() {
       
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();
        return view('pages.thanhtoan.dangnhapthanhtoan')->with('category', $cate_product);
    }

    public function them_khach_hang(Request $request) {
        $data  = array();
     
        $data['customer_name'] = $request->customer_name;
        $data['customer_name_login'] = $request->customer_name_login;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name' , $request->customer_name);

        return Redirect::to('/checkout');
 
    }

    public function checkout() {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();
        return view('pages.thanhtoan.hienthithanhtoan')->with('category', $cate_product);
      
    }

    public function save_checkout_customer(Request $request) {
        $data  = array();
     
        $data['hoadon_name'] = $request->hoadon_name;
        $data['hoadon_phone'] = $request->hoadon_phone;
        $data['hoadon_address'] = $request->hoadon_address;
        $data['hoadon_email'] = $request->hoadon_email;
        $data['hoadon_note'] = $request->hoadon_note;

        $hoadon_id = DB::table('tbl_hoandon')->insertGetId($data);
        Session::put('hoadon_id', $hoadon_id);
    

        return Redirect('/payment');
    }

    public function payment() {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();

        $hoadon_id = Session::get('hoadon_id');
        if ($hoadon_id) {
            $hoadon = DB::table('tbl_hoandon')->where('hoadon_id', $hoadon_id)->first();
            return view('pages.thanhtoan.payment')->with('hoadon', $hoadon)->with('category', $cate_product);
        } else {
            return Redirect('/checkout'); // Nếu không có hoadon_id, quay lại trang thanh toán
        }
       
    }

    public function noi_dat_hang(Request $request) {

        // lay hinh thuc thanh toan don hang
        $data  = array();
     
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
      
        $payment_id = DB::table('tbl_tratien')->insertGetId($data);
        
    // chèn vào dathang

    $data_order  = array();
    $data_order['customer_id'] = Session::get('customer_id');
    $data_order['hoadon_id'] = Session::get('hoadon_id');
    $data_order['payment_id'] =  $payment_id;
    $data_order['tong_tien'] =  Cart::total(0,',','.');
    $data_order['dathang_status'] = 'Đang chờ xử lý';
    $data_order['ngay_dat'] = Carbon::now();
    $dathang_id = DB::table('tbl_dathang')->insertGetId($data_order);

    // chèn vào chi tiết đặt hàng
        $sanpham = Cart::content();
     foreach($sanpham as $v_sanpham) {
        $data_order_detail['dathang_id'] = $dathang_id;
        $data_order_detail['product_id'] = $v_sanpham->id;
        $data_order_detail['product_name'] =  $v_sanpham->name;
        $data_order_detail['product_price'] =  $v_sanpham->price;
        $data_order_detail['so_luong_san_pham'] = $v_sanpham->qty;
       DB::table('tbl_chitietdathang')->insert($data_order_detail);
     }

        // Xóa sản phẩm khỏi giỏ hàng sau khi thanh toán thành công
    $customer_id = Session::get('customer_id');
    DB::table('tbl_cart_temp')->where('customer_id', $customer_id)->delete();

     if($data['payment_method']==1) {
        echo 'Thanh toan bang the ';
     } elseif($data['payment_method']==2) {

        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();
        // echo 'Tien mat';
        Cart::destroy();
        return view('pages.thanhtoan.tienmat')->with('category', $cate_product);
     }
   


        // return Redirect('/payment');

        
    }
    public function logout_checkout() {
        Session::flush();
        return Redirect::to('/dang-nhap-thanh-toan');
    }


    // ham dang nhap 
    // public function login_customer(Request $request) {
    //     $username_login = $request->username_account;
    //     $password = md5($request->password_account);
    //     $result = DB::table('tbl_customers')->where('customer_name_login', $username_login)->where('customer_password', $password)->first();
    //     if($result) {
    //         Session::put('customer_id', $result->customer_id);
    //         return Redirect::to('/checkout');

    //     } else {
    //         return Redirect::to('/dang-nhap-thanh-toan');
            
    //     }
     
    
    // }
    public function login_customer(Request $request) {
        $username_login = $request->username_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_name_login', $username_login)->where('customer_password', $password)->first();
        
        if ($result) {
            Session::put('customer_id', $result->customer_id);
    
            // Tải lại giỏ hàng từ `tbl_cart_temp`
            $cartItems = DB::table('tbl_cart_temp')->where('customer_id', $result->customer_id)->get();
            foreach ($cartItems as $item) {
                Cart::add([
                    'id' => $item->product_id,
                    'name' => $item->product_name,
                    'qty' => $item->quantity,
                    'price' => $item->product_price,
                    'weight' =>$item->product_price,
                    'options' => [
                        'image' => $item->product_image, // Thêm ảnh sản phẩm vào options
                    ]
                ]);
            }
    
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/dang-nhap-thanh-toan');
        }
    }

    public function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function quan_ly_don_hang() {

        $this->AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name')
        ->orderBy('tbl_dathang.dathang_id', 'desc')->get();
       $manager_order = view('admin.quanlydonhang')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.quanlydonhang', $manager_order);
      
    }

 
    public function edit_order($dathang_id) {
    $this->AuthLogin();

    // Truy vấn để lấy thông tin khách hàng và đơn hàng
    $order_info = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->join('tbl_hoandon', 'tbl_dathang.hoadon_id', '=', 'tbl_hoandon.hoadon_id')
        ->select('tbl_dathang.*', 'tbl_customers.*', 'tbl_hoandon.*')
        ->where('tbl_dathang.dathang_id', $dathang_id)
        ->first(); // Chỉ lấy một bản ghi duy nhất cho khách hàng và đơn hàng

    // Truy vấn để lấy danh sách sản phẩm trong chi tiết đơn hàng
    $order_details = DB::table('tbl_chitietdathang')
        ->join('tbl_product', 'tbl_chitietdathang.product_id', '=', 'tbl_product.product_id')
        ->select('tbl_chitietdathang.*', 'tbl_product.product_name', 'tbl_product.product_price')
        ->where('tbl_chitietdathang.dathang_id', $dathang_id)
        ->get(); // Lấy nhiều bản ghi cho các sản phẩm

    // Truyền dữ liệu sang view
    return view('admin.xemdonhang')->with('order_info', $order_info)->with('order_details', $order_details);
}


// viet ham xoa dom hang trong phan admin 

    public function deleteOrder($dathang_id)
    {
        // Kiểm tra xem đơn hàng có tồn tại không
        $order = DB::table('tbl_dathang')->where('dathang_id', $dathang_id)->first();

        if ($order) {
            // Xóa thông tin chi tiết đặt hàng
            DB::table('tbl_chitietdathang')->where('dathang_id', $dathang_id)->delete();

            // Xóa thông tin thanh toán nếu cần
            if (!empty($order->payment_id)) {
                DB::table('tbl_tratien')->where('payment_id', $order->payment_id)->delete();
            }

            // Xóa thông tin đặt hàng
            DB::table('tbl_dathang')->where('dathang_id', $dathang_id)->delete();

            // Hiển thị thông báo thành công
            return redirect()->back()->with('message', 'Xóa đơn hàng thành công.');
        } else {
            // Hiển thị thông báo lỗi nếu đơn hàng không tồn tại
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }
    }
    
}
