<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    //

    public function staff_show_dashboard() {
        return view('nhanvien.nhanvien_dashboard');
    }
}