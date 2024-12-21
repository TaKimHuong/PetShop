<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Customer;
use App\Models\PhanQuyen;
session_start();
class ProductController extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('customer_id');
        $role = Session::get('ma_quyen');
        if($admin_id && $role == 1) {
            return Redirect::to('dashboard');
        } elseif($admin_id && $role == 2) {
            return Redirect::to('staff-dashboard');
        } else {
            return Redirect::to('dang-nhap-thanh-toan')->send();
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
    
        // $details_product = DB::table('tbl_product')
        //     ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
        //     ->where('tbl_product.product_id', $product_id)
        //     ->get();

                $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->leftJoin('tbl_chitietdathang', 'tbl_chitietdathang.product_id', '=', 'tbl_product.product_id') // Sử dụng leftJoin để đảm bảo sản phẩm không có đơn hàng vẫn hiển thị
            ->select(
                'tbl_product.product_name',
                'tbl_product.product_id',
                'tbl_product.product_image',
                'tbl_product.product_price',
                'tbl_product.product_desc',
                'tbl_product.product_content',
                'tbl_category_product.category_name',
                'tbl_category_product.category_id',
                DB::raw('COALESCE(SUM(tbl_chitietdathang.so_luong_san_pham), 0) as total_sold') // Sử dụng COALESCE
            )
            ->where('tbl_product.product_id', $product_id)
            ->groupBy(
                'tbl_chitietdathang.product_id',
                'tbl_product.product_id',
                'tbl_product.product_name',
                'tbl_product.product_image',
                'tbl_product.product_price',
                'tbl_product.product_desc',
                'tbl_product.product_content',
                'tbl_category_product.category_name',
                'tbl_category_product.category_id'
            )
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

           

            $averageRating = Rating::where('product_id', $product_id)->avg('rating');
            $totalReviews = Rating::where('product_id', $product_id)->count();
            $formattedRating = number_format($averageRating, 1); // Định dạng 1 chữ số thập phân
               // Kiểm tra nếu không có đánh giá
        $formattedRating = $totalReviews > 0 ? number_format($averageRating, 1) : 'Chưa có đánh giá';
        // $comments = Rating::where('product_id', $product_id)->get(['rating_comment', 'customer_id', 'created_at']);
        $comments = Rating::where('product_id', $product_id)
    ->join('tbl_customers', 'tbl_rating.customer_id', '=', 'tbl_customers.customer_id')  // Thực hiện join với bảng customers
    ->get(['rating_comment', 'tbl_customers.customer_name', 'tbl_rating.created_at','tbl_rating.rating']);  // Lấy tên người dùng và các thông tin khác
    
        return view('pages.sanpham.show_detail')
            ->with('category', $cate_product)
            ->with('product_details', $details_product)
            ->with('relate', $related_product)
            ->with('averageRating', $averageRating)
            ->with('totalReviews', $totalReviews)
            ->with('formattedRating', $formattedRating)
            ->with('comments', $comments)
            
       
            ;

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

    public function quan_ly_tai_khoan() {
        $all_account = DB::table('tbl_customers')
            ->join('tbl_phanquyen', 'tbl_phanquyen.ma_quyen', '=', 'tbl_customers.ma_quyen')
            ->select('tbl_customers.*', 'tbl_phanquyen.*') // Lấy tất cả các cột từ cả hai bảng
            ->orderBy('tbl_customers.customer_id', 'desc')
            ->paginate(5); // Phân trang, mỗi trang có 5 dòng
        
        $manager_product = view('admin.all_account')->with('all_account', $all_account);
        return view('admin_layout')->with('admin.all_account', $manager_product);
    }

    public function view_account($customer_id) {
        $view_account = DB::table('tbl_customers')
        ->join('tbl_phanquyen', 'tbl_phanquyen.ma_quyen', '=', 'tbl_customers.ma_quyen')
        ->where('customer_id', $customer_id)->first();
        return view('admin.view_account', compact('view_account'));
    }

    public function delete_account($customer_id) {
        $all_account = DB::table('tbl_customers')
        ->join('tbl_phanquyen', 'tbl_phanquyen.ma_quyen', '=', 'tbl_customers.ma_quyen')
        ->where('customer_id', $customer_id)->first();

        if (!$all_account) {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại.');
        }
    
        // Kiểm tra nếu tài khoản có ma_quyen = 1
        if ($all_account->ma_quyen == 1) {
            Session::put('message', 'Không thể xóa tài khoản quản trị viên.');
            return redirect()->back()->with('error', 'Không thể xóa tài khoản quản trị viên.');
           
        }
        DB::table('tbl_customers')->where('customer_id', $customer_id)->delete();
        Session::put('message', 'Xóa tài khoản thành công!');

        return redirect()->back()->with('success', 'Xóa tài khoản thành công!');
    }

    // tìm kiếm sản phẩm dựa trên giá tiền
    public function search(Request $request)
{
    // Lấy giá trị min_price và max_price từ query string
    $minPrice = $request->input('min_price', 0); // Mặc định là 1 triệu
    $maxPrice = $request->input('max_price', 10000000); // Mặc định là 10 triệu
    $count_products = 0;

    $category = DB::table('tbl_category_product')
    ->where('category_status', '0')
    ->orderBy('category_id', 'desc')
    ->get();

    if ($minPrice == 0 && $maxPrice == 10000000) {
        $products = Product::all(); // Lấy toàn bộ sản phẩm
        $count_products = Product::count();
        foreach ($products as $product) {
            $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
        } 
    } else{
        // Lọc sản phẩm trong khoảng giá
        $products = Product::whereBetween('product_price', [$minPrice, $maxPrice])->get();
        $count_products = Product::whereBetween('product_price', [$minPrice, $maxPrice])->count();
        foreach ($products as $product) {
            $product->average_rating = Rating::where('product_id', $product->product_id)->avg('rating');
        }  
    }

    // Trả về view với danh sách sản phẩm
    return view('pages.sanpham.search', compact('products', 'minPrice', 'maxPrice' ,'category','count_products'));
}


        // hàm chỉnh sửa thông tin tài khoản 
        public function edit_account($customer_id) {
            $customer = Customer::find($customer_id);
           $phan_quyen = PhanQuyen::all();
            return view('admin.edit_account')->with('customer' , $customer)->with('phan_quyen' , $phan_quyen);
        }
        public function update_taikhoan(Request $request, $customer_id) {
            // Validate dữ liệu
            $request->validate([
                'customer_quyen' => 'required|integer|min:1',
            ]);
        
            // Tìm và cập nhật bằng Eloquent
            $customer = Customer::find($customer_id);
        
            if ($customer) {
                $customer->ma_quyen = $request->customer_quyen;
                $customer->save();
        
                Session::put('message', 'Cập nhật tài khoản thành công');
            } else {
                Session::put('message', 'Không tìm thấy tài khoản');
            }
        
            return Redirect::to('quan-ly-tai-khoan');
            
        }
 
}



