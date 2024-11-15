<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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

    return view('pages.home')
        ->with('category', $cate_product)
        ->with('all_product', $all_product);
      
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
                ->orderBy('product_id', 'desc')
                ->get();
        
            return view('pages.DanhMuc')
                ->with('category', $cate_product)
                ->with('all_product', $all_product);
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
        
            if ($request->ajax()) {
                return view('pages.sanpham.search', compact('search_product'))->render();
            }
        
            return view('pages.sanpham.search')->with('category', $cate_product)->with('search_product', $search_product);
        }
}
