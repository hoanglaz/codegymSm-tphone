<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Course.
 *
 * @package namespace App\Entities;
 */
class Course extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','des','url','content','image','author',
        'time','review','published','user_id',
        'person','meta_title','meta_des','status'];


    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class,'course_id','id');
    }
}
