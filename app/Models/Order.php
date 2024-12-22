<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'customer_id' , 'hoadon_id' , 'payment_id' , 'tong_tien', 'dathang_status' , 'ngay_dat' ,'ngay_duyet' ,'ma_quyen'
    ];
    protected $primaryKey = 'dathang_id';
    protected $table = 'tbl_dathang';
}
