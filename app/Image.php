<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'image', 'alt', 'product_id', 'info', 'info1', 'info2'
    ];
    public function product(){
        return $this->belongsTo('App\Entities\Product','id','product_id');
    }
}
