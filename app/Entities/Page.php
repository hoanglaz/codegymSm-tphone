<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Page.
 *
 * @package namespace App\Entities;
 */
class Page extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title',
        'des',
        'url',
        'content',
        'image',
        'type',
        'config',
        'user_id',
        'meta_title',
        'meta_des',
        'meta_keyword',
        'status'];
    public function users(){
        return $this->belongsTo('App\User','id','user_id');
    }
}
