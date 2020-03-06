<?php

namespace App\Entities;

use App\Image;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 	['title',
								'url',
								'des',
								'content',
								'image',
								'price_pre',
								'price',
								'deal',
								'user_id',
                                'meta_title',
                                'meta_des',
                                'meta_keyword',
								'status','video'
							];
	/**
     * The product that belong to the tag.
     */
	public function tags(){
		return $this->belongsToMany('App\Entities\Tag','product_tags','product_id','tag_id');
	}
	public function categories(){
		return $this->belongsToMany('App\Entities\Category','product_cates','product_id','category_id');
	}
    public function users(){
        return $this->belongsTo('App\User','id','user_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class,'product_id','id');
    }
}
