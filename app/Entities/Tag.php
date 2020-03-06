<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Tag.
 *
 * @package namespace App\Entities;
 */
class Tag extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','title','url','user_id','des','status','type','count'];
    /**
     * The tag that belong to the post.
     */
    public function posts(){
		return $this->belongsToMany('App\Entities\Post','post_tags','tag_id','post_id');
	}
	/**
     * The tag that belong to the product.
     */
	public function products(){
		return $this->belongsToMany('App\Entities\Product','product_tags','tag_id','product_id');
	}
    public function users(){
        return $this->belongsTo('App\User','id','user_id');
    }

}
