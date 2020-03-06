<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class MenuItem.
 *
 * @package namespace App\Entities;
 */
class MenuItem extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_id',
'title',
'url',
'target',
'icon_class',
'color',
'parent_id',
'order',
'status',];

}
