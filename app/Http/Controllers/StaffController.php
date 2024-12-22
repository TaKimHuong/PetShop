<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class StaffController extends Controller
{
    //
    public function AuthLogin() {
       
        $admin_id = Session::get('customer_id');
        $role = Session::get('ma_quyen');
        if($admin_id && $role == 3) {
            return Redirect::to('staff-dashboard');
        } else {
            return Redirect::to('dang-nhap-thanh-toan')->send();
        }
    }
    public function staff_show_dashboard() {
        $this->AuthLogin();
        $total = DB::table('tbl_dathang')->sum('tong_tien');
        $customerCount = DB::table('tbl_dathang')->distinct('customer_id')->count('customer_id');
        $totalEmployees = DB::table('tbl_customers')->where('ma_quyen', 2)->count();
        $donhangCD = DB::table('tbl_dathang')->where('dathang_status', 'Đang chờ xử lý')->count();

        $product_sales = DB::table('tbl_chitietdathang')
        ->join('tbl_product', 'tbl_chitietdathang.product_id', '=', 'tbl_product.product_id')
        ->select('tbl_product.product_name', 'tbl_product.product_id', 'tbl_product.product_image', DB::raw('SUM(tbl_chitietdathang.so_luong_san_pham) as total_sold'))
        ->groupBy('tbl_chitietdathang.product_id', 'tbl_product.product_id', 'tbl_product.product_name', 'tbl_product.product_image')
        ->orderByDesc(DB::raw('SUM(tbl_chitietdathang.so_luong_san_pham)')) // Sắp xếp theo tổng số lượng bán
        ->limit(5) 
        ->get();

        // lấy 3 đơn hàng đã duyệt gần đây nhất
        $recent_orders = DB::table('tbl_dathang')
        ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
        ->select('tbl_dathang.*', 'tbl_customers.customer_name')
        ->where('dathang_status', 'Đã duyệt đơn hàng')
        ->orderBy('tbl_dathang.ngay_duyet', 'desc') // Sắp xếp theo ngày duyệt giảm dần
        ->limit(3)
        ->get();
       
        return view('nhanvien.nhanvien_dashboard')->with('tongtien' , $total)->with('customerCount' , $customerCount)->with('totalEmployees', $totalEmployees)
        ->with('donhangCD' , $donhangCD)->with('product_sales' , $product_sales)->with('recent_orders' , $recent_orders);
       
    }
}
