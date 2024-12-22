<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'payment_status' , 'payment_method' 
    ];
    protected $primaryKey = 'payment_id';
    protected $table = 'tbl_tratien';
}
