<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [	'title', 'user_id', 'published',
							'des',
							'url',
							'content',
							'image',
							'author',
							'status_seo',
                            'meta_title',
                            'meta_des',
                            'meta_keyword',
							'status'];
	public function tags(){
		return $this->belongsToMany('App\Entities\Tag','post_tags','post_id','tag_id');
	}
	public function categories(){
		return $this->belongsToMany('App\Entities\Category','post_cates','post_id','category_id');
	}
	public function listCategory(){
		return Category::all();
	}
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('published', false);
    }
}
