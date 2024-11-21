<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //

    public $timestamps = false;
    protected $fillable = [

        'customer_id' , 'product_id' , 'rating', 'rating_comment'
    ];
    protected $primaryKey = 'rating_id';
    protected $table = 'tbl_rating';
}
