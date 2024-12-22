<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rating;
use App\Models\Customer;
use App\Models\Product;

session_start();
class HomeController extends Controller
{
    public function index() {

       
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();

    $all_product = DB::table('tbl_product')
        ->where('product_status', '0')
        ->orderBy('product_id', 'desc')
        ->get();

        foreach ($all_product as $product) {
            $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
        }  
    
   
    $latest_products = DB::table('tbl_product')
    ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
    ->where('tbl_product.category_id', 6) // Lọc sản phẩm có category_id = 6
    ->orderBy('tbl_product.product_id', 'desc') // Sắp xếp giảm dần theo product_id
    ->limit(6) // Giới hạn 6 sản phẩm
    ->get(); // Lấy dữ liệu

    foreach ($latest_products as $product) {
        $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
    }  

    $feature_product = DB::table('tbl_product')
    ->where('product_status', '0') // Điều kiện cho product_status
    ->where('product_feature', 'x') // Điều kiện cho product_feature
    ->orderBy('product_id', 'desc') // Sắp xếp theo product_id giảm dần
    ->get(); // Lấy dữ liệu

    foreach ($feature_product as $product) {
        $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
    } 

    $product_sales = DB::table('tbl_chitietdathang')
    ->join('tbl_product', 'tbl_chitietdathang.product_id', '=', 'tbl_product.product_id')
    ->select('tbl_product.product_name', 'tbl_product.product_id', 'tbl_product.product_image', DB::raw('SUM(tbl_chitietdathang.so_luong_san_pham) as total_sold'))
    ->groupBy('tbl_chitietdathang.product_id', 'tbl_product.product_id', 'tbl_product.product_name', 'tbl_product.product_image')
    ->orderByDesc(DB::raw('SUM(tbl_chitietdathang.so_luong_san_pham)')) // Sắp xếp theo tổng số lượng bán
    ->limit(3) 
    ->get();

    foreach ($product_sales as $product) {
        $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
    }

    $all = Product::where('category_id' , 6)->get();
 
    return view('pages.home')
        ->with('category', $cate_product)
        ->with('all_product', $all_product)
        ->with('latest_products', $latest_products)
        ->with('feature_product', $feature_product)
        ->with('product_sales', $product_sales)
        ->with('all' , $all);
      
    }
    public function CunCon(Request $request) {
        // $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        // $all_brand_product = DB::table('tbl_product')
        // ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderBy('tbl_product.product_id', 'desc')->get();
        // $all_product = DB::table('tbl_product')->where('product_status', '0')->orderBy('product_id', 'desc')->get();
        // return view('pages.CunCon')->with('category', $cate_product)->with('all_product', $all_product);

        // $meta_desc = "Chuyên bán thú cưng và các phụ kiện liên quan";
        // $meta_keywords = "thuc pham chúc nang, thuc pham chuc nang, phu kien thu cung";
        // $meta_title = "phu kien cho nhung chu thu cung dang yeu cua chung ta";
        // $url_canonical = $request->url();

            $cate_product = DB::table('tbl_category_product')
                ->where('category_status', '0')
                ->orderBy('category_id', 'desc')
                ->get();
        
            $all_product = DB::table('tbl_product')
                ->where('product_status', '0')
                ->orderBy('category_id', 'asc')
                ->get();
                $count_product = DB::table('tbl_product')
                ->where('product_status', '0')
                ->orderBy('category_id', 'asc')
                ->count();

             
    // Lặp qua từng sản phẩm và tính điểm đánh giá trung bình
            foreach ($all_product as $product) {
                $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
            }   

            return view('pages.DanhMuc')
                ->with('category', $cate_product)
                ->with('all_product', $all_product)
                ->with('count_product', $count_product);
            //    ->with('meta_desc',$meta_desc )->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        }

        public function CachNuoi() {
            return view('pages.CachNuoi');
        }
        public function DichVu() {
            return view('pages.DichVu');
        }
        public function LienHe() {
            return view('pages.LienHe');
        }
        public function GioiThieu() {
            return view('pages.GioiThieu');
        }

        // public function search(Request $request) {

        //     $tukhoa = $request->tukhoa_tim_kiem;
        //     $cate_product = DB::table('tbl_category_product')
        //     ->where('category_status', '0')
        //     ->orderBy('category_id', 'desc')
        //     ->get();

        //         $search_product = DB::table('tbl_product')->where('product_name', 'like', '%'.$tukhoa.'%')->get();
    
        // return view('pages.sanpham.search')
        //     ->with('category', $cate_product)->with('search_product', $search_product);
        // }

        public function search(Request $request) {
            $tukhoa = $request->tukhoa_tim_kiem;  // Lấy từ khóa tìm kiếm từ form

            $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();
            $search_product = DB::table('tbl_product')
                ->where('product_name', 'like', '%'.$tukhoa.'%') // Truy vấn sản phẩm
                ->get(); // Lấy kết quả
            $count_search_product = DB::table('tbl_product')
            ->where('product_name', 'like', '%'.$tukhoa.'%') // Truy vấn sản phẩm
            ->count(); // Lấy kết quả
                foreach ($search_product as $product) {
                    $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
                }  
            if ($request->ajax()) {
                return view('pages.sanpham.search_by_name', compact('search_product'))->render();
            }
        
            return view('pages.sanpham.search_by_name')->with('category', $cate_product)->with('search_product', $search_product)->with('count_search_product', $count_search_product);
        }

        public function thong_tin_tai_khoan($customer_id) {
            $customer = Customer::where('customer_id', $customer_id)->first();
            $roleId = Customer::where('customer_id', $customer_id)->value('ma_quyen');
            Session::put('ma_quyen', $roleId);
            if ($roleId == 1 && $customer_id != null) {
                Session::put('customer_name', $customer->customer_name);
            } else if ($roleId == 3 && $customer_id != null) {
                Session::put('customer_name', $customer->customer_name);
            }
            $all_order = DB::table('tbl_dathang')
            ->join('tbl_customers', 'tbl_dathang.customer_id', '=', 'tbl_customers.customer_id')
            ->where('tbl_dathang.customer_id', $customer_id)
            ->select('tbl_dathang.*', 'tbl_customers.customer_name')
            ->orderBy('tbl_dathang.dathang_id', 'desc')->get();
            return view('pages.taikhoan.thongtintaikhoan')->with('customer' , $customer)->with('all_order' , $all_order)->with('roleId' , $roleId);
        }

            public function update_account(Request $request, $customer_id)
            {
                // Xác thực dữ liệu
                $data = $request->validate([
                    'customer_name' => 'required|string|max:255',
                    'customer_email' => 'required|email',
                    'customer_phone' => 'required|string|max:15',
                    'customer_name_login' => 'required|string|max:255',
                ]);

                // Tìm và cập nhật dữ liệu
                $customer = Customer::where('customer_id', $customer_id)->first();
                if ($customer) {
                    $customer->update([
                        'customer_name' => $data['customer_name'],
                        'customer_email' => $data['customer_email'],
                        'customer_phone' => $data['customer_phone'],
                        'customer_name_login' => $data['customer_name_login'],
                    ]);
                    return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
                }

                return redirect()->back()->with('error', 'Không tìm thấy khách hàng.');
            }

            public function view_order($dathang_id) {
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
            return view('pages.taikhoan.xemchitietdonhang')->with('order_info', $order_info)->with('order_details', $order_details);
            }


}
