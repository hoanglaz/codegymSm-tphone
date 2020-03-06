<?php

namespace App\Http\Controllers;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repository;

    public function __construct(CategoryRepository $repository,PostRepository $post)
    {
        $this->repository = $repository;
        $this->post = $post;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // $categories = $this->repository->all();
        // $posts = $this->post->all();
        // echo $categories;
        // echo $posts; die;
        return view('backend.dashboard');
    }
}
