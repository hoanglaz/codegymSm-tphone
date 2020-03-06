<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
		'title',
		'url',
		'des',
		'user_id',
        'type',
		'status','count'];
	public function posts(){
		return $this->belongsToMany('App\Entities\Post','post_cates','category_id','post_id');
	}
	public function products(){
		return $this->belongsToMany('App\Entities\Product','product_cates','category_id','product_id');
	}
    public function users(){
        return $this->belongsTo('App\User','id','user_id');
    }

}
