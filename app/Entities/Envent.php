<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Envent.
 *
 * @package namespace App\Entities;
 */
class Envent extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','des','url','content','image','author',
        'company', 'phone','email','website','map','start','end',
        'user_id','published','person','meta_title','meta_des','status'];
    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
