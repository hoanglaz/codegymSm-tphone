<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\PostRepository::class, \App\Repositories\PostRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PageRepository::class, \App\Repositories\PageRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostCateRepository::class, \App\Repositories\PostCateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostTagRepository::class, \App\Repositories\PostTagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductCateRepository::class, \App\Repositories\ProductCateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductTagRepository::class, \App\Repositories\ProductTagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagRepository::class, \App\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MenuItemRepository::class, \App\Repositories\MenuItemRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MenuRepository::class, \App\Repositories\MenuRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HomeRepository::class, \App\Repositories\HomeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CommentRepository::class, \App\Repositories\CommentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConfigRepository::class, \App\Repositories\ConfigRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactRepository::class, \App\Repositories\ContactRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SeoRepository::class, \App\Repositories\SeoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HomesRepository::class, \App\Repositories\HomesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostsRepository::class, \App\Repositories\PostsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PostsRepository::class, \App\Repositories\PostsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HomeRepository::class, \App\Repositories\HomeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StudentRepository::class, \App\Repositories\StudentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TeacherRepository::class, \App\Repositories\TeacherRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MemberRepository::class, \App\Repositories\MemberRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CourseRepository::class, \App\Repositories\CourseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EnventRepository::class, \App\Repositories\EnventRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LessonRepository::class, \App\Repositories\LessonRepositoryEloquent::class);
        //:end-bindings:
    }
}
