<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Lesson.
 *
 * @package namespace App\Entities;
 */
class Lesson extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','des','url','content','image','author',
        'video','user_id','course_id','order','person','meta_title','meta_des','status'];

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function courses(){
        return $this->belongsTo('App\Entities\Course','course_id','id');
    }
}
