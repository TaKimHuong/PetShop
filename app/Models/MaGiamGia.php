<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'coupon_name' , 'coupon_code' , 'coupon_time', 'coupon_number', 'coupon_condition'
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'tbl_magiamgia';
}
