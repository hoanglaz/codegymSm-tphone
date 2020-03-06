<?php

namespace App\Http\Controllers\Theme;

use App\Entities\Category;
use App\Entities\Comment;
use App\Entities\Contact;
use App\Entities\Course;
use App\Entities\Envent;
use App\Entities\Home;
use App\Entities\Member;
use App\Entities\Post;
use App\Entities\Gmail;
use App\Entities\Product;
use App\Order;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Image;
class RovaController extends Controller
{
    public function __construct(PostRepository $postDetail,
                                ProductRepository $productDetail,
                                TagRepository $tagDetail,
                                CategoryRepository $categoryDetail
    )
    {
        $this->postDetail = $postDetail;
        $this->productDetail = $productDetail;
        $this->categoryDetail = $categoryDetail;
        $this->tagDetail = $tagDetail;

    }
    public function index(Request $request){
        if($request->mail){
            $db = new Gmail;
            $db->name = $request->mail;
            $db->save();
           }
        if ($request->go=="search"){
           
            $key = $request->all()['key'];
            $data['products'] = Product::where('title','like','%'.$key.'%')->orderBy('id','desc')->get();
            $data['categories'] = Category::where('type','product')->get();
            $data['tim_kiem'] = $key;
            return view('search',$data);
            dd($request->all()['key']);
        }
    $data['categori']=Category::where('type','product')->get();
    $data['show']=Category::where('type','product')->get();
    $data['tinnoi'] = Post::orderBy('id',"desc")->limit(6)->get();
    $data['new_product'] = Product::orderBy('id',"desc")->limit(4)->get();
        return view('welcome',$data);
    }

    public function contact(){
        return view('lien_he');
    }

    public function chi_tiet($id){
    $data['san_pham'] = Product::limit(4)->get();
    $a=Product::where('id',$id)->get();
    $data['data']=$a[0];
    $data['image'] = Image::where('product_id',$id)->get();

        return view('chi_tiet_sp',$data);
    }
    public function san_pham($id){

      $data['categori']=Category::where('type','product')->get();
      $data['product']=Product::orderBy('id','desc')->leftJoin('product_cates', 'product_cates.product_id', '=', 'products.id')->where('product_cates.category_id',$id)->where('deal','on')->paginate(8);
      $data['categoris']=Category::where('id',$id)->get();
      $data['san_pham'] = Product::limit(5)->get();
        return view('san_pham',$data);
    }
    public function cart(Request $request){
        if (!isset($request->id)){
            $data['cart'] = new Product();
            return view('cart',$data);
        }else{


            $product = Product::find($request->id);

            if(is_null($product)) {

                return view('cart');

            }

            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if(is_null($cart)) {

                $cart = [
                    $request->id => [
                        "name" => $product->title,
                        "quantity" => 1,
                        "price" => $product->price_pre,
                        "photo" => $product->image,
                        "price_pre" => $product->price
                    ]
                ];

                session()->put('cart', $cart);

                return view('cart');
            }

            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$request->id])) {

                $cart[$request->id]['quantity']++;
                $cart[$request->id] =
                    [
                        "name" => $product->title,
                        "quantity" => $cart[$request->id]['quantity'],
                        "price" => $product->price_pre,
                        "photo" => $product->image,
                        "price_pre" => $product->price
                    ];

                session()->put('cart', $cart);

                //return redirect()->back()->with('success', 'Product added to cart successfully!');
                return view('cart');

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$request->id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->price_pre,
                "photo" => $product->image,
                "price_pre" => $product->price
            ];

            session()->put('cart', $cart);


            return view('cart');
        }
    }
    public function payment(){

        return view('themes.rova.thanh_toan');
    }
    public function post($id){
       $data['post']=Post::orderBy('id','desc')->leftJoin('post_cates', 'post_cates.post_id', '=', 'posts.id')->where('post_cates.category_id',$id)->paginate(8);
       $data['tinnoi'] = Post::orderBy('id',"desc")->limit(6)->get();
       // dd($data['post']);
        return view('tin_tuc',$data);
    }
    public function Show_post($id){
        $data['post'] = Post::orderBy('id','desc')->limit(8)->get();
       $a=Post::where('id',$id)->get();
       $data['data']=$a[0];
        return view('chi_tiet_tin',$data);
    }
    public function products(){
        $data['products'] = Product::where('status',2)->paginate(12);
        return view('themes.rova.products',$data);
    }
    public function product($url){
        $data['product'] = Product::where('url',$url)->first();
        $data['categories'] = Category::where('type','product')->get()->all();
        $data['relate'] = Product::orderBy('id','desc')->Where('url','<>',$url)->take(6)->get();
        $data['comments'] = Comment::where('type_object','product')->where('id_object',$data['product']['id'])->where('status',1)->orderBy('id','desc')->get()->all();
//        dd($data['comments']);


        if (is_null($data['product'])){
            return view('themes.rova.404');
        }
        $data['images'] = $data['product']->images()->get()->all();
        return view('themes.rova.product',$data);
    }
    public function service($url){
        return view('themes.rova.service');
    }
    public function services(){
        return view('themes.rova.services');
    }
    public function tags($url){
        $data['tag'] = $this->tagDetail->findWhere(['url'=>$url,'type'=>'post'])->first();
        $data['posts'] = $data['tag']->posts()->orderBy('id','desc')->paginate(6);

        return view('themes.rova.blog',$data);
    }
    public function categories($url){
        $data['category'] = $this->categoryDetail->findWhere(['url'=>$url,'type'=>'post'])->first();
        $data['posts'] =  $data['category']->posts()->orderBy('id','desc')->paginate(6);
        return view('themes.rova.blog', $data);
    }
    public function productCate($url){
        $data['category'] = $this->categoryDetail->findWhere(['url'=>$url,'type'=>'product'])->first();
        $data['products'] =  $data['category']->products()->orderBy('id','desc')->paginate(6);
        return view('themes.rova.products', $data);
    }
    public function member(){
        return view('themes.rova.member');
    }
    public function agents(){
        $data['members'] = Member::orderBy('id','desc')->paginate(16);
        return view('themes.rova.agents', $data);
    }
    public function agent($url){
        return view('themes.rova.agent');
    }
    public function error(){
        return view('themes.rova.404');
    }
    public function aboutUs($id){
        $a =Post::orderBy('id','desc')->leftJoin('post_cates', 'post_cates.post_id', '=', 'posts.id')->where('post_cates.category_id',$id)->limit(1)->get();
        $data['data'] = $a[0];
        $data['category'] = Category::find($id);
        return view('gioi_thieu',$data);
    }
    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function contactPost(Request $request)
    {
        $con = new Contact();
        $con->name = $request->name;
        $con->phone = $request->phone;
        $con->email = $request->email;
        $con->address = $request->address;
        $con->note = $request->note;
        $con->save();
        $carts = session()->get('cart');
//        lưu đơn hàng
        foreach ($carts as $key => $val)
        {
            $don = new Order();
            $don->contact_id = $con->id;
            $don->product_id = $key;
            $don->name = $val['name'];
            $don->quantity = $val['quantity'];
            $don->price = $val['price'];

            $don->save();
        }
        session()->flush();
        return redirect()->back();
    }
    public function removeCart(Request $request)
    {
        $cart = session()->get('cart');

        if(isset($request->id)) {

            unset($cart[$request->id]);

            session()->put('cart', $cart);
        }

        session()->flash('success', 'Product removed successfully');
        return redirect()->route('web.cart');
    }

}
