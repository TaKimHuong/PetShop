<?php

namespace App\Http\Controllers;
use App\Models\MaGiamGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class MaGiamGiaController extends Controller

{
    //

    public function ma_giam_gia() {
        return view('admin.magiamgia.ma_giam_gia');
    }

    public function insert_ma_giam_gia(Request $request) {
        $data = $request->all();
        $magiamgia = new MaGiamGia();
        $magiamgia->coupon_name = $data['coupon_name'];
        $magiamgia->coupon_time = $data['coupon_time'];
        $magiamgia->coupon_condition = $data['coupon_condition'];
        $magiamgia->coupon_number = $data['coupon_number'];
        $magiamgia->coupon_code = $data['coupon_code'];
        $magiamgia->save();
        Session::put('message','Thêm mã giảm giá thành công');
            return Redirect::to('ma-giam-gia');
     
    }

    public function danh_sach_ma_giam_gia() {
        $danhsach = MaGiamGia::orderBy('coupon_id','DESC')->paginate(5); ;
        return view('admin.magiamgia.danh_sach_ma_giam_gia')->with(compact('danhsach'));
    }

    public function xoa_ma_giam_gia($coupon_id) {
        $xoa_ma_giam_gia = MaGiamGia::find($coupon_id);
        $xoa_ma_giam_gia->delete();
        Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('danh-sach-ma-giam-gia');
    }
}
