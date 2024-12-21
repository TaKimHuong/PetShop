<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'ten_quyen' , 'chi_tiet_ten_quyen' 
    ];
    protected $primaryKey = 'ma_quyen';
    protected $table = 'tbl_phanquyen';
}
