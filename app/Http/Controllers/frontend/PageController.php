<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use Input;
use DB;
use View;
use Route;
use Block;

class PageController extends Controller
{
    public $title = 'Rạp Sự Kiện Hải Dương';
    public $description = '';
    public $keywords = '';
    public $product_category_all = '';

    public function __construct(){
        $menus = DB::table('menu')->select('id','name','alias','cursor','fk_parentid')->where(['status' => 1 , 'menu_header' => 1])->orderBy('order','desc')->get();
        View::share('menus',$menus);
    }

    
    public function home(){
        $title = $this->title;
        $description = $this->description;
        $keywords = $this->keywords;
        $customer_footer = Block::customer();
        $cat_sidebar = DB::table('posts_category')->select('id','name','alias')->where(['status' => 1 ,'pos_footer' => 1])->orderBy('order','desc')->orderBy('id','desc')->first();
        if(isset($cat_sidebar)){
            $title_posts_sidebar = $cat_sidebar->name;
            $posts_sidebar = DB::table('posts')->where(['status' => 1 , 'fk_catid' => $cat_sidebar->id])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(5)->get();
        }
        
        
        return view('frontend.home',compact('title_posts_sidebar','posts_sidebar','customer_footer','title','description','keywords','product_category'));
    }

    public function product_category($alias,$filter = ''){
        $index = DB::table('product_category')->where('id',$alias)->orWhere('alias',$alias)->first();
        $categories = $this->product_category_all;
        $ids = AdminHelper::child_id($categories,$index->id);
        $categories_child = DB::table('product_category')->whereIn('id',$ids)->select('id','name','alias','image')->orderBy('order','desc')->orderBy('id','desc')->get();
        $parent_ids = AdminHelper::parent_id($categories,$index->fk_parentid);
        $categories_parent = DB::table('product_category')->whereIn('id',$parent_ids)->select('id','name','alias','image')->orderBy('order','desc')->orderBy('id','desc')->get();
        $ids[] = $index->id;
        $products = DB::table('product')->whereIn('fk_catid',$ids)->where('status',1);
        // Loc.
        if($filter == 'price-asc'){
            $products = $products->orderBy('price','asc')->orderBy('order','desc')->orderBy('id','desc')->paginate(12);
        }elseif($filter == 'price-desc'){
            $products = $products->orderBy('price','desc')->orderBy('order','desc')->orderBy('id','desc')->paginate(12);
        }elseif($filter == 'newest'){
            $products = $products->orderBy('id','desc')->paginate(12);
        }else{
            $products = $products->orderBy('order','desc')->orderBy('id','desc')->paginate(12);
        }
        $count_product = DB::table('product')->whereIn('fk_catid',$ids)->where('status',1)->orderBy('order','desc')->orderBy('id','desc')->count();
        
        $title = empty($index->meta_title) ? $index->name : $index->meta_title;
        $description = empty($index->meta_description) ? $index->name : $index->meta_description;
        $keywords = empty($index->meta_keywords) ? $index->name : $index->meta_keywords;
        return view('frontend.product_category',compact('index','categories_child','categories_parent','categories','products','count_product','title','description','keywords'));
    }

    public static function product($alias){
        $index = DB::table('product')->where('id',$alias)->orWhere('alias',$alias)->first();
        $category = DB::table('product_category')->where('id',$index->fk_catid)->select('name','alias')->first();
        $product_same = DB::table('product')->where(['status' => 1 , 'fk_catid' => $index->fk_catid])->whereNotIn('id',[$index->id])->orderBy('order','desc')->orderBy('id','desc')->select('name','price','image','alias')->limit(10)->get();
        $product_other = DB::table('product')->where(['status' => 1])->orderBy('order','desc')->orderBy('id','RAND()')->select('name','price','image','alias')->limit(10)->get();
        $title = empty($index->meta_title) ? $index->name : $index->meta_title;
        $description = empty($index->meta_description) ? $index->name : $index->meta_description;
        $keywords = empty($index->meta_keywords) ? $index->name : $index->meta_keywords;
        return view('frontend.product',compact('product_other','product_same','category','index','title','description','keywords'));
    }

    public function posts_category($alias,$view = 'list'){
        $index = DB::table('posts_category')->where('id',$alias)->orWhere('alias',$alias)->first();
        $posts = DB::table('posts')->where(['status' => 1 , 'fk_catid' => $index->id])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','description','create_at')->paginate(10);
        $posts_sidebar = DB::table('posts')->where(['status' => 1 ])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(5)->get();
        $title_posts_sidebar = 'Tin mới nhất';
        $title = empty($index->meta_title) ? $index->name : $index->meta_title;
        $description = empty($index->meta_description) ? $index->name : $index->meta_description;
        $keywords = empty($index->meta_keywords) ? $index->name : $index->meta_keywords;
        return view('frontend.posts_category',compact('view','index','title_posts_sidebar','posts','posts_sidebar','title','description','keywords'));
    }

    public function posts($alias){
        $index = DB::table('posts')->where('id',$alias)->orWhere('alias',$alias);
        $index->update(['view' => $index->first()->view + 1]);
        $index = $index->first();
        $same_posts = DB::table('posts')->where(['status' => 1 , 'fk_catid' => $index->fk_catid])->whereNotIn('id',[$index->id])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(5)->get();
        $title_posts_sidebar = 'Cùng chủ đề';
        $title = empty($index->meta_title) ? $index->name : $index->meta_title;
        $image = $index->image;
        $description = empty($index->meta_description) ? $index->name : $index->meta_description;
        $keywords = empty($index->meta_keywords) ? $index->name : $index->meta_keywords;
        if($index->fk_catid == 0){
            return view('frontend.static_posts',compact('index','title','description','keywords','image'));
        }
        return view('frontend.posts',compact('same_posts','title_posts_sidebar','index','title','description','keywords'));
        //return view('frontend.posts');
    }

    public function customer_reviews(){
        $title = $this->title;
        $description = $this->description;
        $keywords = $this->keywords;
        return view('frontend.customer_reviews',compact('title','description','keywords'));
    }

    public function search_get($key){
       
        $title = $this->title;
        $title_posts_sidebar = 'Tin mới nhất';
        $posts_sidebar = DB::table('posts')->where(['status' => 1 ])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(5)->get();
        $posts = DB::table('posts')->where('name','like',"%$key%")->orWhere('description','like',"%$key%")->where('status',1)->orderBy('order','desc')->orderBy('id','desc')->select('id','name','alias','image','description','create_at')->paginate(10);
        return view('frontend.search',compact('key','title','title_posts_sidebar','posts_sidebar','posts'));
    }

    public function search_post(Request $request){
        if(empty($request->key)){
            return redirect(route('home'));
        }
        return redirect(route('search.get',$request->key));
    }

    public function contact(){
        $title = $this->title;
        $description = $this->description;
        $keywords = $this->keywords;
        $title_posts_sidebar = 'Tin mới nhất';
        $posts_latest = DB::table('posts')->where(['status' => 1 ])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(5)->get();
        return view('frontend.contact',compact('title','title_posts_sidebar','description','keywords','posts_latest'));
    }

    public function menu($alias){
        $index = DB::table('menu')->where('alias',$alias)->first();
        switch ($index->cursor) {
            case 'posts':
                $route = 'posts';
                break;
            case 'posts_category':
                $route = 'posts.category';
                break;
            case 'product':
                $route = 'product';
                break;
            case 'product_category':
                $route = 'product.category';
                break;
            
            default:
                $route = 'posts';
                break;
        }
        return redirect()->route($route,$index->cursor_id);
        
    }

    public function img_lib(){
        $files = DB::table('img_lib')->select('name','image')->where(['status' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        return view('frontend.img_lib',compact('files'));
    }

}
