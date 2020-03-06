<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'product_id', 'contact_id', 'quantity', 'name', 'price'
    ];
}
