<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'total_price',
    ];

    public   function getProduct()
    {
        return    $this->belongsTo(Product::class, 'product_id');
    }
    public   function getPaymentMethodAttribute($value)
    {
        if ($value == 1)
            return  'Direct Bank Transfer';
        elseif ($value == 2)
            # code...
            return  'Cheque Payment';
        elseif ($value == 3)
            # code..
            return  'Paypal System';
        elseif ($value == 4)
            # code...
            return  'Cash On Delivery';
        elseif ($value == 5)
            # code...
            return  'Mobile Cash';

        // return   $value ;
    }
}