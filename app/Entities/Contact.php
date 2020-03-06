<?php

namespace App\Entities;

use App\Order;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contact.
 *
 * @package namespace App\Entities;
 */
class Contact extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name',
'email',
'phone',
'address',
'department',
'note',
'image',
'birthday',
'status',];
    public function orders()
    {
        return $this->hasMany(Order::class,'contact_id','id');
    }

}
