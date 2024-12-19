<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
{
    //
    public function rating(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'product_id' => 'required|exists:tbl_product,product_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        // Lấy customer_id từ Session
        $customerId = Session::get('customer_id');

        if (!$customerId) {
            return redirect('/dang-nhap-thanh-toan')->with('error', 'Bạn cần đăng nhập để đánh giá.');
        }

        // Lưu đánh giá vào cơ sở dữ liệu
        Rating::create([
            'customer_id' => $customerId,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'rating_comment' => $request->comment,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);
     
        return redirect()->back()->with('success', 'Đánh giá của bạn đã được lưu thành công!');

    }
}
 