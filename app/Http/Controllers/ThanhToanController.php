<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
class ThanhToanController extends Controller
{
    //
    public function AuthLogin() {
        $admin_id = Session::get('customer_id');
        $role = Session::get('ma_quyen');
        if($admin_id && $role == 1) {
            return Redirect::to('dashboard');
        }  else {
            return Redirect::to('dang-nhap-thanh-toan')->send();
        }
    }

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
        $data['ma_quyen'] = '2';

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name' , $request->customer_name);

        return Redirect::to('/dang-nhap-thanh-toan');
 
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



        // vd 
        $total = str_replace(',', '', Cart::subtotal()); // Lấy tổng tiền giỏ hàng
        $total_coupon = 0; // Khởi tạo tổng giảm giá
    
        // Kiểm tra nếu có mã giảm giá
        if (Session::get('coupon')) {
            foreach (Session::get('coupon') as $cou) {
                if ($cou['coupon_condition'] == 1) { // Nếu giảm theo phần trăm
                    $total_coupon = ($total * $cou['coupon_number']) / 100;
                } else { // Giảm theo số tiền cố định
                    $total_coupon = $cou['coupon_number'];
                }
            }
        }
    
        // Tính toán tổng thanh toán sau giảm giá
        $total_after_discount = $total - $total_coupon;

        if ($total_after_discount >0) {
            $data  = array();
     
            $data['payment_method'] = $request->payment_option;
            $data['payment_status'] = 'Đang chờ xử lý';
          
            $payment_id = DB::table('tbl_tratien')->insertGetId($data);
            
        // chèn vào dathang
    
        $data_order  = array();
        $data_order['customer_id'] = Session::get('customer_id');
        $data_order['hoadon_id'] = Session::get('hoadon_id');
        $data_order['payment_id'] =  $payment_id;
        // $data_order['tong_tien'] =  Cart::total(0,',','.');
        $data_order['tong_tien'] =  $total_after_discount;
        
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
         $customer_id = Session::get('customer_id');


         Session::put('dathang_id', $dathang_id);
     
     
         //vd
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
     
                 $mail = new PHPMailer(true);
         
                 try {
                     // Cấu hình máy chủ email (SMTP)
                     $mail->isSMTP();
                     $mail->Host = 'smtp.gmail.com';  // SMTP server của Gmail
                     $mail->SMTPAuth = true;
                     $mail->Username = 'nguoiyeutung2707@gmail.com'; // Địa chỉ email của bạn
                     $mail->Password = 'qwir jsej htge ubkv'; // Mật khẩu của email
                     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                     $mail->Port = 587;
             
                     // Người gửi và người nhận
                     $mail->setFrom('nguoiyeutung2707@gmail.com', 'PETSHOP');
                     $mail->addAddress($order_info->hoadon_email, $order_info->hoadon_name); // Email người nhận
             
                     // Nội dung email
                     $mail->isHTML(true); // Đặt định dạng HTML cho email
                     $mail->Subject = 'PETSHOP!';
             
                     // Tạo nội dung email
                     $email_content = "<h1>Thông tin Đơn hàng</h1>";
                     $email_content .= "<p><strong>Họ tên:</strong> {$order_info->hoadon_name}</p>";
                     $email_content .= "<p><strong>Địa chỉ:</strong> {$order_info->hoadon_address}</p>";
                     $email_content .= "<p><strong>Số điện thoại:</strong> {$order_info->hoadon_phone}</p>";
                     $email_content .= "<h3>Danh sách Sản phẩm:</h3><ul>";
                     
                     // Hiển thị chi tiết các sản phẩm
                     foreach ($order_details as $product) {
                         $email_content .= "<li>{$product->product_name} - {$product->so_luong_san_pham} x {$product->product_price} VND</li>";
                     }
                     
                     $email_content .= "</ul>";
                     $email_content .= "<p><strong>Tổng tiền:</strong> " . number_format($order_info->tong_tien, 0, ',', '.') . " VND</p>";
     
                     $email_content .= "<p><strong>Ngày đặt:</strong> {$order_info->ngay_dat}</p>";
                     $email_content .= "<p><strong>Tình trạng đơn hàng:</strong> {$order_info->dathang_status}</p>";
     
                     $mail->Body = $email_content;
             
                     // Gửi email
                     $mail->send();
                     // echo 'Email đã được gửi thành công';
                 } catch (Exception $e) {
                     echo "Có lỗi xảy ra khi gửi email: {$mail->ErrorInfo}";
                 }
     
             
         // vd 
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
             return view('pages.thanhtoan.tienmat')->with('category', $cate_product)
             ->with('order_info', $order_info)
             ->with('order_details', $order_details);
             
          }
        
      
     
        } else{
            return Redirect('/Hien-thi-gio-hang');
        }
        // vd
        // lay hinh thuc thanh toan don hang
       

        // Xóa sản phẩm khỏi giỏ hàng sau khi thanh toán thành công
  
        // return Redirect('/payment');

        
    }
    public function logout_checkout() {
        Session::flush();
        return Redirect::to('/dang-nhap-thanh-toan');
    }


    // public function login_customer(Request $request) {
    //     $username_login = $request->username_account;
    //     $password = md5($request->password_account);
    
    //     // Tìm kiếm người dùng theo thông tin đăng nhập
    //     $result = DB::table('tbl_customers')
    //         ->where('customer_name_login', $username_login)
    //         ->where('customer_password', $password)
    //         ->first();
    
    //     if ($result) {
    //         // Kiểm tra quyền
            
    //             // Khách hàng: tiếp tục với quy trình như cũ
    //             Session::put('customer_id', $result->customer_id);
    
    //             // Tải lại giỏ hàng từ `tbl_cart_temp`
    //             $cartItems = DB::table('tbl_cart_temp')->where('customer_id', $result->customer_id)->get();
    //             foreach ($cartItems as $item) {
    //                 Cart::add([
    //                     'id' => $item->product_id,
    //                     'name' => $item->product_name,
    //                     'qty' => $item->quantity,
    //                     'price' => $item->product_price,
    //                     'weight' => $item->product_price,
    //                     'options' => [
    //                         'image' => $item->product_image, // Thêm ảnh sản phẩm vào options
    //                     ]
    //                 ]);
    //             }
    
    //             return Redirect::to('/checkout');
            
    //     } else {
    //         // Đăng nhập thất bại
    //         return Redirect::to('/dang-nhap-thanh-toan')->with('error', 'Sai tài khoản hoặc mật khẩu!');
    //     }
    // }
    
    public function login_customer(Request $request) {
        $username_login = $request->username_account;
        $password = md5($request->password_account);
    
        // Tìm kiếm người dùng theo thông tin đăng nhập
        $result = DB::table('tbl_customers')
            ->where('customer_name_login', $username_login)
            ->where('customer_password', $password)
            ->first();
        if ($result) {
            // Kiểm tra quyền
                Session::put('customer_id', $result->customer_id); // Lưu thông tin admin nếu cần
                Session::put('customer_name' , $result->customer_name);
                Session::put('ma_quyen' , $result->ma_quyen);
            if ($result->ma_quyen == 1) {
                // Admin: chuyển hướng đến trang dashboard
             //   Session::put('customer_id', $result->customer_id); // Lưu thông tin admin nếu cần
             //   Session::put('customer_name' , $result->customer_name);
          //      Session::put('ma_quyen' , $result->ma_quyen);
                return Redirect::to('/dashboard');
            } elseif ($result->ma_quyen == 2) {
                // Khách hàng: tiếp tục với quy trình như cũ
             //   Session::put('customer_id', $result->customer_id);
             //   Session::put('customer_name' , $result->customer_name);
            //    Session::put('ma_quyen' , $result->ma_quyen);
                // Tải lại giỏ hàng từ `tbl_cart_temp`
                $cartItems = DB::table('tbl_cart_temp')->where('customer_id', $result->customer_id)->get();
                foreach ($cartItems as $item) {
                    Cart::add([
                        'id' => $item->product_id,
                        'name' => $item->product_name,
                        'qty' => $item->quantity,
                        'price' => $item->product_price,
                        'weight' => $item->product_price,
                        'options' => [
                            'image' => $item->product_image, // Thêm ảnh sản phẩm vào options
                        ]
                    ]);
                }
    
                return Redirect::to('/trang-chu');
            } elseif($result->ma_quyen == 3) {
                // Session::put('customer_id', $result->customer_id);
                // Session::put('customer_name' , $result->customer_name);
                // Session::put('ma_quyen' , $result->ma_quyen);
                return Redirect::to('/staff-dashboard');
            } else {
                // Trường hợp khác nếu cần xử lý
                return Redirect::to('/dang-nhap-thanh-toan')->with('error', 'Quyền không hợp lệ!');
            }
        } else {
            // Đăng nhập thất bại
            return Redirect::to('/dang-nhap-thanh-toan')->with('error', 'Sai tài khoản hoặc mật khẩu!');
        }
    }


    public function quan_ly_don_hang() {

        $this->AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
         ->leftJoin('tbl_phanquyen', 'tbl_dathang.ma_quyen', '=', 'tbl_phanquyen.ma_quyen')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name' ,'tbl_phanquyen.chi_tiet_ten_quyen')
        ->orderBy('tbl_dathang.dathang_id', 'desc')
        ->paginate(10);
        // ->get();
        
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


    // duyệt hóa đơn đặt hang 

    public function duyetHoaDon($dathang_id) {
        $this->AuthLogin();
        DB::table('tbl_dathang')
        ->where('dathang_id', $dathang_id)
        ->update(['dathang_status' => 'Đã duyệt đơn hàng', 'ngay_duyet' => now()]);
        $maQuyen = Session::get('ma_quyen');

        $duyet = DB::table('tbl_dathang')
        ->where('dathang_id', $dathang_id)
        ->update([
            'ma_quyen' => $maQuyen // Gán giá trị mã quyền lấy từ Session
               // Gán thời gian hiện tại
        ]);
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
        $mail = new PHPMailer(true);
    
            try {
                // Cấu hình máy chủ email (SMTP)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // SMTP server của Gmail
                $mail->SMTPAuth = true;
                $mail->Username = 'nguoiyeutung2707@gmail.com'; // Địa chỉ email của bạn
                $mail->Password = 'qwir jsej htge ubkv'; // Mật khẩu của email
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
        
                // Người gửi và người nhận
                $mail->setFrom('nguoiyeutung2707@gmail.com', 'PETSHOP');
                $mail->addAddress($order_info->hoadon_email, $order_info->hoadon_name); // Email người nhận
        
                // Nội dung email
                $mail->isHTML(true); // Đặt định dạng HTML cho email
                $mail->Subject = 'PETSHOP!';
        
                // Tạo nội dung email
                $email_content = "<h1>Thông tin Đơn hàng</h1>";
                $email_content .= "<p><strong>Họ tên:</strong> {$order_info->hoadon_name}</p>";
                $email_content .= "<p><strong>Địa chỉ:</strong> {$order_info->hoadon_address}</p>";
                $email_content .= "<p><strong>Số điện thoại:</strong> {$order_info->hoadon_phone}</p>";
                $email_content .= "<h3>Danh sách Sản phẩm:</h3><ul>";
                
                // Hiển thị chi tiết các sản phẩm
                foreach ($order_details as $product) {
                    $email_content .= "<li>{$product->product_name} - {$product->so_luong_san_pham} x {$product->product_price} VND</li>";
                }
                
                $email_content .= "</ul>";
                $email_content .= "<p><strong>Tổng tiền:</strong> " . number_format($order_info->tong_tien, 0, ',', '.') . " VND</p>";
                $email_content .= "<p><strong>Ngày đặt:</strong> {$order_info->ngay_dat}</p>";
                $email_content .= "<p><strong>Ngày duyệt:</strong> {$order_info->ngay_duyet}</p>";
                $email_content .= "<p><strong>Tình trạng đơn hàng:</strong> {$order_info->dathang_status}</p>";

                $mail->Body = $email_content;
        
                // Gửi email
                $mail->send();
                // echo 'Email đã được gửi thành công';
            } catch (Exception $e) {
                echo "Có lỗi xảy ra khi gửi email: {$mail->ErrorInfo}";
            }
    return redirect()->back()->with('success', 'Đã duyệt hóa đơn thành công!');
    }
    

    public function chua_duyet() {
        $this->AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->leftJoin('tbl_phanquyen', 'tbl_dathang.ma_quyen', '=', 'tbl_phanquyen.ma_quyen')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name' ,'tbl_phanquyen.chi_tiet_ten_quyen')
        ->where('dathang_status', 'Đang chờ xử lý')
        ->orderBy('tbl_dathang.dathang_id', 'desc')
        ->paginate(10);
       
        // $all_order = DB::table('tbl_dathang')
        //             ->where('dathang_status', 'Đang chờ xử lý')
        //             ->orderBy('ngay_dat', 'desc')
        //             ->get();
        return view('admin.quanlydonhang', compact('all_order'))->with('title', 'Đơn hàng chưa duyệt');
    }
    
    // Lọc đơn hàng đã duyệt
    public function da_duyet() {
        $this->AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->leftJoin('tbl_phanquyen', 'tbl_dathang.ma_quyen', '=', 'tbl_phanquyen.ma_quyen')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name' ,'tbl_phanquyen.chi_tiet_ten_quyen')
        ->where('dathang_status', 'Đã duyệt đơn hàng')
        ->orderBy('tbl_dathang.dathang_id', 'desc')->paginate(10);
        // $all_order = DB::table('tbl_dathang')
        //             ->where('dathang_status', 'Đã duyệt đơn hàng')
        //             ->orderBy('ngay_dat', 'desc')
        //             ->get();
        
        return view('admin.quanlydonhang', compact('all_order'))->with('title', 'Đơn hàng đã duyệt');
    }



    //NHÂN VIÊN
    public function Staff_AuthLogin() {
        $admin_id = Session::get('customer_id');
        $role = Session::get('ma_quyen');
        if($admin_id && $role == 3) {
            return Redirect::to('staff-dashboard');
        }  else {
            return Redirect::to('dang-nhap-thanh-toan')->send();
        }
    }
    public function staff_quan_ly_don_hang() {

       $this->Staff_AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->leftJoin('tbl_phanquyen', 'tbl_dathang.ma_quyen', '=', 'tbl_phanquyen.ma_quyen')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name' ,'tbl_phanquyen.chi_tiet_ten_quyen')
        ->orderBy('tbl_dathang.dathang_id', 'desc')->paginate(10);
       $manager_order = view('nhanvien.staff_quanlydonhang')->with('all_order', $all_order);
        return view('nhanvien_layout')->with('nhanvien.staff_quanlydonhang', $manager_order);
      
    }
    public function staff_duyetHoaDon($dathang_id) {
        $this->Staff_AuthLogin();
        DB::table('tbl_dathang')
        ->where('dathang_id', $dathang_id)
        ->update(['dathang_status' => 'Đã duyệt đơn hàng', 'ngay_duyet' => now()]);
        $maQuyen = Session::get('ma_quyen');

        $duyet = DB::table('tbl_dathang')
        ->where('dathang_id', $dathang_id)
        ->update([
            'ma_quyen' => $maQuyen // Gán giá trị mã quyền lấy từ Session
               // Gán thời gian hiện tại
        ]);
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
        $mail = new PHPMailer(true);
    
            try {
                // Cấu hình máy chủ email (SMTP)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // SMTP server của Gmail
                $mail->SMTPAuth = true;
                $mail->Username = 'nguoiyeutung2707@gmail.com'; // Địa chỉ email của bạn
                $mail->Password = 'qwir jsej htge ubkv'; // Mật khẩu của email
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
        
                // Người gửi và người nhận
                $mail->setFrom('nguoiyeutung2707@gmail.com', 'PETSHOP');
                $mail->addAddress($order_info->hoadon_email, $order_info->hoadon_name); // Email người nhận
        
                // Nội dung email
                $mail->isHTML(true); // Đặt định dạng HTML cho email
                $mail->Subject = 'PETSHOP!';
        
                // Tạo nội dung email
                $email_content = "<h1>Thông tin Đơn hàng</h1>";
                $email_content .= "<p><strong>Họ tên:</strong> {$order_info->hoadon_name}</p>";
                $email_content .= "<p><strong>Địa chỉ:</strong> {$order_info->hoadon_address}</p>";
                $email_content .= "<p><strong>Số điện thoại:</strong> {$order_info->hoadon_phone}</p>";
                $email_content .= "<h3>Danh sách Sản phẩm:</h3><ul>";
                
                // Hiển thị chi tiết các sản phẩm
                foreach ($order_details as $product) {
                    $email_content .= "<li>{$product->product_name} - {$product->so_luong_san_pham} x {$product->product_price} VND</li>";
                }
                
                $email_content .= "</ul>";
                $email_content .= "<p><strong>Tổng tiền:</strong> " . number_format($order_info->tong_tien, 0, ',', '.') . " VND</p>";
                $email_content .= "<p><strong>Ngày đặt:</strong> {$order_info->ngay_dat}</p>";
                $email_content .= "<p><strong>Ngày duyệt:</strong> {$order_info->ngay_duyet}</p>";
                $email_content .= "<p><strong>Tình trạng đơn hàng:</strong> {$order_info->dathang_status}</p>";

                $mail->Body = $email_content;
        
                // Gửi email
                $mail->send();
                // echo 'Email đã được gửi thành công';
            } catch (Exception $e) {
                echo "Có lỗi xảy ra khi gửi email: {$mail->ErrorInfo}";
            }
    return redirect()->back()->with('success', 'Đã duyệt hóa đơn thành công!');
    }
    public function staff_chua_duyet() {
        $this->Staff_AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->leftJoin('tbl_phanquyen', 'tbl_dathang.ma_quyen', '=', 'tbl_phanquyen.ma_quyen')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name' ,'tbl_phanquyen.chi_tiet_ten_quyen')
        ->where('dathang_status', 'Đang chờ xử lý')
        ->orderBy('tbl_dathang.dathang_id', 'desc')->paginate(10);
        // $all_order = DB::table('tbl_dathang')
        //             ->where('dathang_status', 'Đang chờ xử lý')
        //             ->orderBy('ngay_dat', 'desc')
        //             ->get();
        return view('nhanvien.staff_quanlydonhang', compact('all_order'))->with('title', 'Đơn hàng chưa duyệt');
    }
    
    // Lọc đơn hàng đã duyệt
    public function staff_da_duyet() {
        $this->Staff_AuthLogin();
        $all_order = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->leftJoin('tbl_phanquyen', 'tbl_dathang.ma_quyen', '=', 'tbl_phanquyen.ma_quyen')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name' ,'tbl_phanquyen.chi_tiet_ten_quyen')
        ->where('dathang_status', 'Đã duyệt đơn hàng')
        ->orderBy('tbl_dathang.dathang_id', 'desc')->paginate(10);
        // $all_order = DB::table('tbl_dathang')
        //             ->where('dathang_status', 'Đã duyệt đơn hàng')
        //             ->orderBy('ngay_dat', 'desc')
        //             ->get();
        return view('nhanvien.staff_quanlydonhang', compact('all_order'))->with('title', 'Đơn hàng đã duyệt');
    }
    public function staff_edit_order($dathang_id) {
     //   $this->AuthLogin();
    
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
        return view('nhanvien.staff_xemdonhang')->with('order_info', $order_info)->with('order_details', $order_details);
    }
}
