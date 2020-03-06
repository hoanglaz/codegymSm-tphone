<?php

namespace App\Http\Controllers;

use App\Entities\Category;
use App\Entities\Product;
use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */
    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('product.view')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $products = $this->repository->orderBy('id','desc')->paginate($limit = 10, $columns = ['*']);
        $categories = Category::where('type','product')->get()->all();
        if (isset($request->selectaction)){
            if ($request->selectaction == 0){

            }else{
            $category = Category::find($request->selectaction);
            $products = $category->products()->paginate(10);
            }
        }
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $products,
            ]);
        }

        return view('backend.products.index', compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductCreateRequest $request)
    {
        $relationship = $request->all();
        try {
            if (Gate::denies('product.create')){
                return redirect()->route('roles.error')->with('message','Permissions denied!');
            }
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $relationship['user_id'] = Auth::user()->id;
            $product = $this->repository->create($relationship);

            $product_relationship = $this->repository->find($product->id);


                $product_relationship->categories()->attach($relationship['cate']);

            $response = [
                'message' => 'Product created.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('products.show',$product->id)->with('message', $response['message']);
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
        $product = $this->repository->find($id);
        $images = $product->images;
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view('backend.products.show', compact('product','images'));
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
        $product = $this->repository->find($id);

        if (Gate::denies('product.update',$product)){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $cates = Category::where('type','product')->get()->all();

        return view('backend.products.edit', compact('product','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $relationship = $request->all();

        try {
            $product_relationship = $this->repository->find($id);
            if (Gate::denies('product.update',$product_relationship)){
                return redirect()->route('roles.error')->with('message','Permissions denied!');
            }
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);
            // add datat manytomany product - cate and tag

            $product_relationship->categories()->detach();
            //$product_relationship->tags()->detach();


            //foreach ($relationship['cate'] as $key => $value) {
                $product_relationship->categories()->attach($relationship['cate']);
           //}
           /* foreach ($relationship['tag'] as $key => $value) {
                $product_relationship->tags()->attach($value);
            }*/
            $response = [
                'message' => 'Product updated.',
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('products.index')->with('message', $response['message']);
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
        $product_relationship = $this->repository->find($id);
        if (Gate::denies('product.delete',$product_relationship)){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $product_relationship->categories()->detach();
        $product_relationship->tags()->detach();
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Product deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Product deleted.');
    }
    /**
     * Show template create.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if (Gate::denies('product.create')){
            return redirect()->route('roles.error')->with('message','Permissions denied!');
        }
        $data['categories'] = Category::where('type','product')->get()->all();
        return view('backend.products.create',$data);
    }
    public function images(Request $request){
        if (is_null($request->name) || is_null($request->image) || is_null($request->alt) || is_null($request->info)) {
            return redirect()->back()->with('message','Input required');
        }
       //$data = $request->all();
       $img = new Image();
        $img->name = $request->input('name');
        $img->image = $request->input('image');
        $img->alt = $request->input('alt');
        $img->product_id = $request->input('product_id');
        $img->info =$request->input('info');

        $img->save();
    return redirect()->back()->with('message','Images of product has created successfully!');
    }
    public function deleteImages($id)
    {
        Image::find($id)->delete();
        return redirect()->back()->with('message','Image deleted!');
    }
    public function updateImages(Request $request, $id)
    {
        $img = Image::find($id);
        $img->name = $request->input('name');
        $img->alt = $request->input('alt');
        $img->info = $request->input('info');
        $img->image = $request->input('image');
        $img->save();

        return redirect()->back()->with('message','Image updated!');
    }
    public function editDeal($id)
    {
        $pro = Product::find($id);
        if ($pro->deal == 'on'){
            $pro->deal = 0;
        }else{
            $pro->deal = 'on';
        }
        $pro->save();
        return redirect()->back()->with('message','Image deleted!');
    }

}
