<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [

        'product_name' , 'product_desc' , 'product_content' , 'product_image', 'product_feature' , 'product_status' ,'category_id'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
