<?php

namespace App;

use App\Entities\Category;
use App\Entities\Course;
use App\Entities\Lesson;
use App\Entities\Page;
use App\Entities\Post;
use App\Entities\Product;
use App\Entities\Tag;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function categories()
    {
        return $this->hasMany(Category::class,'user_id','id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }
    public function pages()
    {
        return $this->hasMany(Page::class,'user_id','id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'user_id','id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class,'user_id','id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class,'user_id','id');
    }
    public function Tags()
    {
        return $this->hasMany(Tag::class,'user_id','id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users','user_id','role_id');
    }
    /**
     * Checks if User has access to $permissions.
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if the user belongs to role.
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
