<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rating;
session_start();
class CatagoryProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('customer_id');
        $role = Session::get('ma_quyen');
        if($admin_id && $role == 1) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('dang-nhap-thanh-toan')->send();
        }
    }
    public function add_category_product() {
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product() {
        $this->AuthLogin();
    //    $all_category_product= DB::table('tbl_category_product')->get();
    // static trong mô hình hướng đối tượng ::
        // $all_category_product = Category::all();
        // $all_category_product = Category::orderBy('category_id','DESC')
        // ->get();
        $all_category_product = Category::orderBy('category_id', 'DESC')->paginate(5);

       $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }
    public function save_category_product(Request $request) {
        $this->AuthLogin();
        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_product_name'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
        $category->save();
        // $data = array();
        // $data['category_name'] = $request->category_product_name;
        // $data['category_desc'] = $request->category_product_desc;
        // $data['category_status'] = $request->category_product_status;
        // DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
        
    }
    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
       Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
         return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id) {
        $this->AuthLogin();
    
        // Lấy bản ghi duy nhất từ bảng `tbl_category_product`
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->first();
        // Hoặc nếu bạn dùng Eloquent, bạn có thể thay thế với:
        // $edit_category_product = Category::where('category_id', $category_product_id)->first();
    
        // Kiểm tra nếu không có bản ghi
        if (!$edit_category_product) {
            return redirect()->back()->with('error', 'Danh mục không tồn tại.');
        }
    
        // Truyền dữ liệu vào view
        return view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
    }
    
    public function update_category_product(Request $request, $category_product_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }

    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        DB::table('tbl_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }
    // ket thuc function Admin Pages

    // ham hien thi cac san pham khi chung ta nhan vao nut danh muc
    public function show_category_home($category_id) {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '0')
        ->orderBy('category_id', 'desc')
        ->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id', $category_id)->get();
        $count_category_by_id = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id', $category_id)->count();
        foreach ($category_by_id as $product) {
            $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
        }  



        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();
        return view('pages.category.show_category_home')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('category_name', $category_name)
        ->with('count_category_by_id' , $count_category_by_id);
    }



    // NHÂN VIÊN QUẢN LÝ

    public function Staff_AuthLogin() {
        $admin_id = Session::get('customer_id');
        $role = Session::get('ma_quyen');
        if($admin_id && $role == 3) {
            return Redirect::to('staff-dashboard');
        } else {
            return Redirect::to('dang-nhap-thanh-toan')->send();
        }
    }

    public function staff_all_category_product() {
        $this->Staff_AuthLogin();
    //    $all_category_product= DB::table('tbl_category_product')->get();
    // static trong mô hình hướng đối tượng ::
        // $all_category_product = Category::all();
        // $all_category_product = Category::orderBy('category_id','DESC')
        // ->get();
        $all_category_product = Category::orderBy('category_id', 'DESC')->paginate(5);

       $manager_category_product = view('nhanvien.staff_all_category_product')->with('all_category_product', $all_category_product);
        return view('nhanvien_layout')->with('nhanvien.staff_all_category_product', $manager_category_product);
    }

    public function staff_edit_category_product($category_product_id) {
        $this->Staff_AuthLogin();
    
        // Lấy bản ghi duy nhất từ bảng `tbl_category_product`
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->first();
        // Hoặc nếu bạn dùng Eloquent, bạn có thể thay thế với:
        // $edit_category_product = Category::where('category_id', $category_product_id)->first();
    
        // Kiểm tra nếu không có bản ghi
        if (!$edit_category_product) {
            return redirect()->back()->with('error', 'Danh mục không tồn tại.');
        }
    
        // Truyền dữ liệu vào view
        return view('nhanvien.staff_edit_category_product')->with('edit_category_product', $edit_category_product);
    }


}
