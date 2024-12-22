<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'dathang_id' , 'product_id' , 'product_name' , 'product_price', 'so_luong_san_pham'
    ];
    protected $primaryKey = 'chitietdathang_id';
    protected $table = 'tbl_chitietdathang';
}
