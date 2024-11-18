<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function add_product() {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
     
        return view('admin.add_product')->with('cate_product', $cate_product);
    }
    // public function all_product() {
    //     $this->AuthLogin();
    //     $all_product = DB::table('tbl_product')
    //     ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
      
    //     ->orderBy('tbl_product.product_id', 'desc')->get();
    //    $manager_product = view('admin.all_product')->with('all_product', $all_product);
    //     return view('admin_layout')->with('admin.all_product', $manager_product);
    // }
    public function all_product() {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->paginate(5); // Phân trang, mỗi trang có 10 sản phẩm
        
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        // $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image) {
            // $get_name_image = $get_image->getClientOriginalName();
            // $name_image = current(explode('.', $get_name_image));
            // $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // $get_image->move('public/upload/product', $new_image);
            // $data['product_image'] = $new_image;
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME); // Lấy tên file mà không có phần mở rộng
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
    
            // Lưu trữ ảnh trong thư mục `public/upload/product` hoặc thay bằng `Storage::disk('public')->putFileAs(...)` 
            $get_image->move(public_path('upload/product'), $new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
        
    }
    public function unactive_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
       Session::put('message', 'Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Kích hoạt sản phẩm thành công');
         return Redirect::to('all-product');
    }
    public function edit_product($product_id) {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
        $edit_product= DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        // ->with('brand_product', $brand_product);
         return view('admin_layout')->with('admin.edit_product', $manager_product);

    }
    public function update_product(Request $request, $product_id) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        // $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image) {
            // $get_name_image = $get_image->getClientOriginalName();
            // $name_image = current(explode('.', $get_name_image));
            // $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            // $get_image->move('public/upload/product', $new_image);
            // $data['product_image'] = $new_image;
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME); // Lấy tên file mà không có phần mở rộng
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
    
            // Lưu trữ ảnh trong thư mục `public/upload/product` hoặc thay bằng `Storage::disk('public')->putFileAs(...)` 
            $get_image->move(public_path('upload/product'), $new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('add-product');
        }
       
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        // DB::table('tbl')->where('brand_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-product');

    }

    public function delete_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-product');

    }

    // ket thuc trang Admin

    public function details_product($product_id) {
        $cate_product = DB::table('tbl_category_product')
            ->where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();
    
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_product.product_id', $product_id)
            ->get();
    
        $category_id = null; // Đặt giá trị mặc định để tránh lỗi nếu $details_product rỗng
        foreach($details_product as $key => $value) {
            $category_id = $value->category_id;
        }
            //         $details_product = DB::table('tbl_product')
            //     ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            //     ->leftJoin('tbl_chitietdathang', 'tbl_chitietdathang.product_id', '=', 'tbl_product.product_id')
            //     ->select(
            //         'tbl_product.product_name',
            //         'tbl_product.product_price',
            //         'tbl_product.product_image',
            //         'tbl_product.product_content',
            //         'tbl_product.product_desc',
            //         'tbl_category_product.category_name',
            //         'tbl_category_product.category_id',  // Lấy category_id
            //         DB::raw('SUM(tbl_chitietdathang.so_luong_san_pham) as total_sold')  // Tổng số lượng sản phẩm bán được
            //     )
            //     ->where('tbl_product.product_id', $product_id)  // Lọc theo product_id
            //     ->groupBy(
            //         'tbl_product.product_name', 
            //         'tbl_product.product_price', 
            //         'tbl_product.product_image', 
            //         'tbl_product.product_content',
            //         'tbl_product.product_desc',
            //         'tbl_category_product.category_name', 
            //         'tbl_category_product.category_id'  // Nhóm theo các trường đã chọn
            //     )
            //     ->first();  // Dùng first() vì bạn chỉ lấy một sản phẩm duy nhất

            // // Kiểm tra nếu $details_product không phải là null trước khi truy cập
            // if ($details_product) {
            //     $category_name = $details_product->category_name;  // Lấy tên danh mục
            //     $category_id = $details_product->category_id;  // Lấy category_id
            //     $total_sold = $details_product->total_sold;  // Tổng số lượng bán được
            // } else {
            //     // Nếu không có sản phẩm, gán giá trị mặc định
            //     $category_id = null;
            //     $total_sold = 0;
            // }

    
        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->where('tbl_category_product.category_id', $category_id)
            ->where('tbl_product.product_id', '!=', $product_id) // Lọc sản phẩm liên quan, trừ chính sản phẩm hiện tại
            ->get();
    
        return view('pages.sanpham.show_detail')
            ->with('category', $cate_product)
            ->with('product_details', $details_product)
            ->with('relate', $related_product);
    }

    //NHÂN VIÊN
    public function staff_all_product() {
       // $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->orderBy('tbl_product.product_id', 'desc')
            ->paginate(5); // Phân trang, mỗi trang có 10 sản phẩm
        
        $manager_product = view('nhanvien.staff_all_product')->with('all_product', $all_product);
        return view('nhanvien_layout')->with('nhanvien.staff_all_product', $manager_product);
    }
    public function staff_edit_product($product_id) {
      //  $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
        $edit_product= DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('nhanvien.staff_edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        // ->with('brand_product', $brand_product);
         return view('nhanvien_layout')->with('nhanvien.staff_edit_product', $manager_product);

    }    
}
