<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'customer_name' , 'customer_email' , 'customer_name_login' , 'customer_phone' , 'customer_password' ,'ma_quyen'
    ];
    protected $primaryKey = 'customer_id';
    protected $table = 'tbl_customers';
}
