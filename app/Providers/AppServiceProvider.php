<?php

namespace App\Providers;

use App\Entities\Category;
use App\Entities\Config;
use App\Entities\Home;
use App\Entities\Menu;
use App\Entities\MenuItem;
use App\Entities\Post;
use App\Entities\Tag;
use Illuminate\Support\ServiceProvider;
// use App\Emtities\Post;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     * 
     */
 
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.admin.mainMenu',function ($view){
            $url = url()->current();
            $view->with(compact('url'));
        });

        view()->composer('backend.roles.role',function ($view){
            $roles= [
                'user' => [
                    'view' => 'user.view',
                    'create' => 'user.create',
                    'update' => 'user.update',
                    'delete' => 'user.delete',
                ],
                'post' => [
                    'view' => 'post.view',
                    'create' => 'post.create',
                    'update' => 'post.update',
                    'delete' => 'post.delete',
                ],
                'page' => [
                    'view' => 'page.view',
                    'create' => 'page.create',
                    'update' => 'page.update',
                    'delete' => 'page.delete',
                ],
                'product' => [
                    'view' => 'product.view',
                    'create' => 'product.create',
                    'update' => 'product.update',
                    'delete' => 'product.delete',
                ],
                'project' => [
                    'view' => 'project.view',
                    'create' => 'project.create',
                    'update' => 'project.update',
                    'delete' => 'project.delete',
                ],
                'role' => [
                    'view' => 'role.view',
                    'create' => 'role.create',
                    'update' => 'role.update',
                    'delete' => 'role.delete',
                ],

            ];
            $view->with(compact('roles'));
        });

//        fontend global
        view()->composer('*',function($view){

            $pa = Config::all();
            foreach ($pa as $k => $val){
                $parador[$val->key] = $val;
            }

            // $view->with(compact('parador'));
        });
        view()->composer('themes.rova.layouts.footer',function($view){
            $prelate = Post::orderBy('id','desc')->where('status',2)->take(3)->get();
            $view->with(compact('prelate'));
        });
        view()->composer('themes.rova.layouts.menu',function($view){
            $logo = Home::where('name','logo')->get()->first();
            $menu = Menu::where('data','main')->first();
            if (!is_null($menu)){
                $menus = MenuItem::where("menu_id",$menu->id)->get()->all();
            }
            if (is_null($menu)) $menu = ['title'=>'data','target'=>'data','url'=>'#!','parent_id'=>0];
            $view->with(compact('logo','menus'));
        });
        view()->composer('themes.rova.layouts.design',function($view){
            $favicon = Home::where('name','favicon')->get()->first();
            $view->with(compact('favicon'));
        });
    }
}
