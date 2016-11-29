<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use DB;
use View;
use Cache;

class BlockController extends Controller
{

    public static function header_body(){
        $menus = DB::table('menu')->select('id','name','alias','cursor')->where(['fk_parentid' => 0 , 'status' => 1 , 'menu_header' => 1])->orderBy('order','desc')->get();
        return view('frontend.block.header',compact('menus'));
    }

    public static function footer(){
        // $products = DB::table('product')->where('status',1)->select('id','name','link')->orderBy('order','desc')->orderBy('id','desc')->get();
        $posts_category = DB::table('posts_category')->select('id','name','alias')->where(['fk_parentid' => 0 , 'status' => 1 ,'pos_footer' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        $menus = DB::table('menu')->select('id','name','alias','cursor')->where(['fk_parentid' => 0 , 'status' => 1 , 'menu_footer' => 1])->orderBy('order','desc')->get();
    	return view('frontend.block.footer',compact('posts_category','menus'));
    }

    public static function contact_sidebar(){
    	return view('frontend.block.contact_sidebar');
    }

    public static function customer_reviews(){
        $posts = DB::table('posts')->where(['status' => 1 , 'IsCustomer' => 1 ])->inRandomOrder()->select('name','image','description','content')->first();

    	return view('frontend.block.customer_reviews',compact('posts'));
    }

    public static function customer_reviews_page(){
        $posts = DB::table('posts')->where(['status' => 1 , 'IsCustomer' => 1 ])->orderBy('id','desc')->select('name','image','description','content')->paginate(10);

        return view('frontend.block.customer_reviews_page',compact('posts'));
    }

    public static function customer_support(){
    	return view('frontend.block.customer_support');
    }

    public static function posts_category_list(){
        $posts_category = DB::table('posts_category')->select('id','name','alias')->where(['fk_parentid' => 0 , 'status' => 1 ,'pos_home' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        View::share('posts_category',$posts_category);
        $posts_category_all = DB::table('posts_category')->select('id','name','alias','fk_parentid')->where(['status' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        return view('frontend.block.home.posts_category_list',compact('posts_category','posts_category_all'));
    }

    public static function banner(){
        $data = DB::table('banner')->select('name','image')->where(['status' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        
    	return view('frontend.block.home.banner',compact('data'));
    }

    public static function posts_category_list_2($index){
        $categories = DB::table('posts_category')->where('status',1)->select('id','fk_parentid')->get(); 
        $ids = AdminHelper::child_id($categories,$index->id);
        $ids[] = $index->id;
        $posts = DB::table('posts')->whereIn('fk_catid',$ids)->where('status',1)->select('id','name','alias','image','description','create_at')->orderBy('order','desc')->orderBy('id','desc')->paginate(10);
        $top_posts = DB::table('posts')->whereIn('fk_catid',$ids)->where('status',1)->select('id','name','alias','image','description','create_at')->orderBy('view','desc')->first();

        
        return view('frontend.block.posts_category.list',compact('index','posts','top_posts'));
    }

    public static function detail_posts($index){
        $category = DB::table('posts_category')->where('id',$index->fk_catid)->select('name','alias')->first();
        $same_posts = DB::table('posts')->where(['status' => 1 , 'fk_catid' => $index->fk_catid])->whereNotIn('id',[$index->id])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(8)->get();
        $latest_posts = DB::table('posts')->where('IsCustomer','!=',1)->where('fk_catid','!=',0)->where(['status' => 1])->orderBy('id','desc')->select('name','image','alias','create_at')->limit(8)->get();

        return view('frontend.block.posts.detail_posts',compact('index','category','same_posts','latest_posts'));
    }

    public static function focus_posts(){
        $focus_posts = DB::table('posts')->where('IsCustomer','!=',1)->where('fk_catid','!=',0)->where(['status' => 1])->orderBy('view','desc')->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','create_at')->limit(5)->get();
        return view('frontend.block.posts.focus_posts',compact('focus_posts'));
    }

    public static function search($key){
        View::share('key',$key);
        $posts = DB::table('posts')->where('name','like',"%$key%")->orWhere('description','like',"%$key%")->where('status',1)->orderBy('order','desc')->orderBy('id','desc')->select('id','name','alias','image','description','create_at')->paginate(10);
        return view('frontend.block.search',compact('posts'));
    }

    public static function services(){
        $cat = DB::table('posts_category')->select('id','name','alias')->where(['status' => 1 ,'pos_home' => 1])->orderBy('order','desc')->orderBy('id','desc')->first();
        
        if(isset($cat)){
            $data = DB::table('posts')->where(['status' => 1 , 'fk_catid' => $cat->id])->orderBy('order','desc')->orderBy('id','desc')->select('name','image','alias','description')->limit(10)->get();
        }
        
        return view('frontend.block.home.services',compact('data'));
    }

    public static function box_sidebar($title,$data){
        return view('frontend.block.box_sidebar',compact('title','data'));
    }

    public static function website_intro(){
        $data = DB::table('posts')->where(['status' => 1,'IsCustomer' => 1])->orderBy('order','desc')->orderBy('id','desc')->select('id','name','content')->first();
        
        return view('frontend.block.home.website_intro',compact('data'));
    }

    public static function support_online(){
        if(Cache::has('support_online')) //Kiểm tra xem trong cache có chứa các FAQ không
        {
            $data = Cache::get('support_online'); //Trả về các FAQ nếu có
        }
        else
        {
            $data = DB::table('users')->where(['support_online' => 1 ])->get();//Lấy tất cả các FAQ trong CSDL
            Cache::put('support_online',$data,60); //Cho tất cả các FAQ vào bộ nhớ cache
        }
        
        return view('frontend.block.support_online',compact('data'));
    }

    public static function customer(){
        $data = DB::table('customer')->select('name','image')->where(['status' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        return view('frontend.block.customer',compact('data'));
    }

    public static function box_category(){
        $data = DB::table('posts_category')->where(['status' => 1])->orderBy('order','desc')->orderBy('id','desc')->get();
        return view('frontend.block.box_category',compact('data'));
    }

    

    public static function menu_footer(){
        if(Cache::has('menu_footer')) //Kiểm tra xem trong cache có chứa các FAQ không
        {
            $data = Cache::get('menu_footer'); //Trả về các FAQ nếu có
        }
        else
        {
            $data = DB::table('menu')->select('id','name','alias','cursor')->where(['fk_parentid' => 0 , 'status' => 1 , 'menu_footer' => 1])->orderBy('order','desc')->get();//Lấy tất cả các FAQ trong CSDL
            Cache::put('menu_footer',$data,60); //Cho tất cả các FAQ vào bộ nhớ cache
        }
        
        return view('frontend.block.menu_footer',compact('data'));
    }

    public static function tags($alias){
        if($alias){
            $tagsAlias = explode(',', $alias);
            $tags = DB::table('tag')->whereIn('alias',$tagsAlias)->select('name','alias')->get();
            return view('frontend.block.tags',compact('tags'));
        }
        return;
    }

    public static function static_block($pos){
        $data = DB::table('static_block')->where(['position' => $pos ,'status' => 1])->select('content')->first();
        return $data->content;
    }
}
