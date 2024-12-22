<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vanchuyen extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'hoadon_name' , 'hoadon_address' , 'hoadon_phone' , 'hoadon_email', 'hoadon_note'
    ];
    protected $primaryKey = 'hoadon_id';
    protected $table = 'tbl_hoandon';
}
