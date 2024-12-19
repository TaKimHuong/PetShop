<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatagoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ThanhToanController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\StaffController;
use Gloudemans\Shoppingcart\Facades\Cart;
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

Route::post('/tim-kiem', [HomeController::class, 'search']);

Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
// Đăng nhập 
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

Route::get('/logout', [AdminController::class, 'logout']);

// catagory product
Route::get('/add-category-product', [CatagoryProduct::class, 'add_category_product']);
Route::get('/all-category-product', [CatagoryProduct::class, 'all_category_product']);
// nhan vao nut xac nhan de them vao co so du lieu
Route::post('/save-category-product', [CatagoryProduct::class, 'save_category_product']);

// nut like 
Route::get('/unactive-category-product/{category_product_id}', [CatagoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CatagoryProduct::class, 'active_category_product']);
// sua va xoa 
Route::get('/edit-category-product/{category_product_id}', [CatagoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CatagoryProduct::class, 'delete_category_product']);
Route::post('/update-category-product/{category_product_id}', [CatagoryProduct::class, 'update_category_product']);


// brand product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);
// nhan vao nut xac nhan de them vao co so du lieu
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);

// nut like 
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);
// sua va xoa 
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);

//  product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
// nhan vao nut xac nhan de them vao co so du lieu
Route::post('/save-product', [ProductController::class, 'save_product']);
// nut like 
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
// sua va xoa 
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

// trang cun con
Route::get('/cun-con', [HomeController::class, 'CunCon']);

// danh muc san pham trang cun con
Route::get('/danh-muc-san-pham/{category_id}', [CatagoryProduct::class, 'show_category_home']);

//chi tiet trong moi san pham
// Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product'])->name('product_details');


// them vao gio hang

Route::post('/save-cart', [CartController::class, 'save_cart']);


// cách nuôi các thú cưng
Route::get('/cach-nuoi', [HomeController::class, 'CachNuoi']);
//trang dich vu cham soc cac thu cung
Route::get('/dich-vu', [HomeController::class, 'DichVu']);
// trang gioi thieu
Route::get('/gioi-thieu', [HomeController::class, 'GioiThieu']);
/// trang lien he
Route::get('/lien-he', [HomeController::class, 'LienHe']);
// hien thi gio hang
Route::get('/Hien-thi-gio-hang', [CartController::class, 'HienThiGioHang']);
// xoa gio hang
Route::get('/xoa-gio-hang/{rowId}', [CartController::class, 'XoaGioHang']);

// tu dong cap nhat gio hang
// Route::post('/cap-nhat-gio-hang', [CartController::class, 'update'])->name('cart.update');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.updateCart');


// thanh toan gio hang

Route::get('/dang-nhap-thanh-toan', [ThanhToanController::class, 'dang_nhap_thanh_toan']);
Route::get('/logout-checkout', [ThanhToanController::class, 'logout_checkout']);

Route::post('/them-khach-hang', [ThanhToanController::class, 'them_khach_hang']);
// thanh toán hóa đơn
Route::get('/checkout', [ThanhToanController::class, 'checkout']);
// lưu thông tin của khách hàng khi thanh toán hóa đơn
Route::post('/save-checkout-customer', [ThanhToanController::class, 'save_checkout_customer']);
// dang nhap bang tai khoan va mat khau cua khach hang
Route::post('/login-customer', [ThanhToanController::class, 'login_customer']);
// payment
Route::get('/payment', [ThanhToanController::class, 'payment']);

//xác nhận đặt hàng
Route::post('/noi-dat-hang', [ThanhToanController::class, 'noi_dat_hang']);


// admin quan ly don hang 

Route::get('/quan-ly-don-hang', [ThanhToanController::class, 'quan_ly_don_hang']);
// xem don hang cua khach han 
Route::get('/edit-order/{dathang_id}', [ThanhToanController::class, 'edit_order']);

// viet ham xoa don hang trong phan quan ly don hang tai admin 
Route::get('/delete-order/{dathang_id}', [ThanhToanController::class, 'deleteOrder']);

// ap dung ma giam gia vao
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/ma-giam-gia', [MaGiamGiaController::class, 'ma_giam_gia']);
Route::post('/insert-ma-giam-gia', [MaGiamGiaController::class, 'insert_ma_giam_gia']);
Route::get('/danh-sach-ma-giam-gia', [MaGiamGiaController::class, 'danh_sach_ma_giam_gia']);
Route::get('/xoa-ma-giam-gia/{coupon_id}', [MaGiamGiaController::class, 'xoa_ma_giam_gia']);
// xét duyệt hóa đơn đặt hàng 
Route::post('/duyet-hoa-don/{dathang_id}', [ThanhToanController::class, 'duyetHoaDon']);
// nút chưa duyệt và nút duyệt đơn hàng
Route::get('/chua-duyet', [ThanhToanController::class, 'chua_duyet']);
Route::get('/da-duyet', [ThanhToanController::class, 'da_duyet']);
// nhân viên
Route::get('/staff-dashboard', [StaffController::class, 'staff_show_dashboard']);

Route::get('/staff-all-category-product', [CatagoryProduct::class, 'staff_all_category_product']);

Route::get('/staff-edit-category-product/{category_product_id}', [CatagoryProduct::class, 'staff_edit_category_product']);


Route::get('/staff-all-product', [ProductController::class, 'staff_all_product']);
Route::get('/staff-edit-product/{product_id}', [ProductController::class, 'staff_edit_product']);

Route::get('/staff-danh-sach-ma-giam-gia', [MaGiamGiaController::class, 'staff_danh_sach_ma_giam_gia']);
Route::get('/staff-quan-ly-don-hang', [ThanhToanController::class, 'staff_quan_ly_don_hang']);

Route::post('/staff-duyet-hoa-don/{dathang_id}', [ThanhToanController::class, 'staff_duyetHoaDon']);
Route::get('/staff-chua-duyet', [ThanhToanController::class, 'staff_chua_duyet']);
Route::get('/staff-da-duyet', [ThanhToanController::class, 'staff_da_duyet']);
Route::get('/staff-edit-order/{dathang_id}', [ThanhToanController::class, 'staff_edit_order']);


// thanh tìm kiếm nâng cao
// routes/web.php

Route::get('/search-by-price', [ProductController::class, 'searchByPrice'])->name('search_by_price');

// đánh giá sách 

Route::post('/ratings', [RatingController::class, 'rating']);

// quản lý tài khoản
Route::get('/quan-ly-tai-khoan', [ProductController::class, 'quan_ly_tai_khoan']);

Route::get('/view-account/{customer_id}', [ProductController::class, 'view_account']);
Route::get('/delete-account/{customer_id}', [ProductController::class, 'delete_account']);

// tìm kiếm sản phẩm 
Route::get('/search', [ProductController::class, 'search'])->name('search');