<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\doi_tacs;
use App\Entities\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\LogoCreateRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\CategoryRepository;
use App\Validators\PostValidator;
use Illuminate\Support\Facades\Gate;

/**
 * Class PostsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LogosController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;
    protected $category_super;
    protected $tag_super;

    /**
     * @var PostValidator
     */
    protected $validator;

    /**
     * PostsController constructor.
     *
     * @param PostRepository $repository
     * @param PostValidator $validator
     */
    public function __construct(PostRepository $repository,
                                TagRepository $tag_super,
                                CategoryRepository $category_super,
                                PostValidator $validator)
    {
        $this->repository = $repository;
        $this->category_super = $tag_super;
        $this->category_super = $category_super;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    $data['data'] = doi_tacs::orderBy('id','desc')->paginate(6);

        return view('backend.logo.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PostCreateRequest $request)
    {
        if (Gate::denies('slider.create')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $relationship = $request->all();
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $post = $this->repository->create($request->all());
            $post_relationship = $this->repository->find($post->id);
            if (isset($relationship['cate'])){
                foreach ($relationship['cate'] as $key => $value) {
                    $post_relationship->categories()->sync($value);
                    $put = Category::find($value);
                    $put->count = $put->posts->count();
                    $put->save();
//                    $this->category_super->update(['count'=>$this->category_super->find($value)->posts->count()],$value);
                }
            }
            if (isset($relationship['tag'])) {
                foreach ($relationship['tag'] as $key => $value) {
                    $post_relationship->tags()->sync($value);
                    $put = Tag::find($value);
                    $put->count = $put->posts->count();
                    $put->save();
//                    $this->tag_super->update(['count'=>$this->tag_super->find($value)->posts->count()],$value);
                }
            }


            $response = [
                'message' => 'Post created.',
                'data'    => $post->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('posts.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->find($id);
//        if (Gate::denies('post.view')){
//            return redirect()->route('roles.error')->with('message','Permissions denied!');
//        }
//        $post = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        return view('backend.slider.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['post'] = $this->repository->find($id);
        if (Gate::denies('post.update',$data['post'])){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $data['cates'] = $data['post']->categories;
        $data['tags'] = $data['post']->tags;

        return view('backend.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PostUpdateRequest $request, $id)
    {

        $relationship = $request->all();
        try {
            $post_relationship = $this->repository->find($id);
//            dd($post_relationship);
            if (Gate::denies('post.update',$post_relationship)){
                return redirect()->route('roles.error')->with('message','Permissions denied!');
            }
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $post = $this->repository->update($request->all(), $id);

            $post_relationship->categories()->detach();
            $post_relationship->tags()->detach();

            if (isset($relationship['cate'])) {
                foreach ($relationship['cate'] as $key => $value) {
                    $post_relationship->categories()->attach($value);
                    $put = Category::find($value);
                    $put->count = $put->posts->count();
                    $put->save();
//                    $this->category_super->update(['count'=>$this->category_super->find($value)->posts->count()],$value);

                }
            }
            if (isset($relationship['tag'])) {
                foreach ($relationship['tag'] as $key => $value) {
                    $post_relationship->tags()->attach($value);
//                    $this->tag_super->update(['count'=>$this->tag_super->find($value)->posts->count()],$value);
                    $put = Tag::find($value);
                    $put->count = $put->posts->count();
                    $put->save();
                }
            }
            $response = [
                'message' => 'Post updated.',
                'data'    => $post->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('slider.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('doi_tacs')->where('id', $id)->delete();
      

        return redirect()->back()->with('message', 'Post deleted.');
    }

    /**
     * Show template create.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function create(LogoCreateRequest $request)
    {
     $item = new doi_tacs;
     $item->image = $request->image;
     $item->save();
      return redirect()->back()->with('message', 'Post deleted.');
    }
}
