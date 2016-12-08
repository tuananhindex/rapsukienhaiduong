<?php

namespace App\Http\Controllers\backend\posts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Http\Helpers\AdminHelper;
use DB;
use Validator;
use Session;
use Input;
use Cache;

class PostsController extends Controller
{
    private $e = [
                    'view' => 'backend.posts.posts',
                    'route' => 'backend.posts.posts',
                    'frontend_route' => 'posts',
                    'module' => 'bài viết',
                    'table' => 'posts'
                ];
    private $df_lang;

    public function __construct(){
        View::share('e',$this->e);

        $this->df_lang = DB::table('language')->where('default',1)->first();
        View::share('df_lang',$this->df_lang);
    }

    public function add_get(){
        $this->e['action'] = 'Thêm';
        $cats = DB::table($this->e['table'].'_category')->select('id','name','fk_parentid')->get();
        $MultiLevelSelect = AdminHelper::MultiLevelSelect($cats);
        $posts = DB::table($this->e['table'])->join($this->e['table'].'_common','fk_commonid','=',$this->e['table'].'_common.id')->where(['status' => 1 ,'language' => $this->df_lang->id])->select('name','alias')->get();
        $tags = DB::table('tag')->where('status',1)->select('id','name','alias')->get();

        return view($this->e['view'].'.add',compact('cats','MultiLevelSelect','posts','tags'))->with(['e' => $this->e]);
    }

    public function add_post(Request $req){
        Cache::flush();
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'alias' => 'required',
            'image' => 'image|max:1000'
        ],[
            'name.required' => 'Bạn chưa nhập tên',
            'alias.required' => 'Bạn chưa nhập đường dẫn ảo',
            'image.image' => 'File tải lên phải là ảnh',
            'image.max' => 'Ảnh tải lên vượt quá dung lượng cho phép'
        ]);
        $error = $validator->errors()->first();
        if($error){
            return redirect()->back()->with('alert',AdminHelper::alert_admin('danger','fa-ban',$error));
        }
        
        // Những phần riêng
        $data_private['name'] = $req->name;
        $data_private['description'] = $req->description;
        $data_private['content'] = $req->content;
        $data_private['language'] = $this->df_lang->id;
        // end

        $data['alias'] = AdminHelper::check_alias($this->e['table'].'_common',$req->alias);

        if($req->file('image')){
            $image = $req->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('upload',$image_name);
            $data['image'] = 'upload/'.$image_name;
        }
        
        
        if($req->tags){
            $data['tags'] = implode(',',$req->tags);
        }
        
        $data['fk_catid'] = $req->fk_catid;
        $data['order'] = $req->order;
        $data['IsCustomer'] = 0;
        if(isset($req->IsCustomer)){
            $data['IsCustomer'] = $req->IsCustomer;
        }
        
        
        $data['meta_title'] = $req->meta_title;
        $data['meta_description'] = $req->meta_description;
        $data['meta_keywords'] = $req->meta_keywords;
        $data['status'] = $req->status;
        $data['create_at'] = date('Y-m-d H:i:s');
        
        $data_private['fk_commonid'] = DB::table($this->e['table'].'_common')->insertGetId($data);
        $id = DB::table($this->e['table'])->insertGetId($data_private);

        if($req->save){
            return redirect(route($this->e['route'].'.edit.get',$id))->with('alert',AdminHelper::alert_admin('success','fa-check','thêm thành công'));
        }else{
            return redirect(route($this->e['route'].'.add.get'))->with('alert',AdminHelper::alert_admin('success','fa-check','thêm thành công'));
        }
    }

    public function edit_get($id,$lang = ''){
        if(empty($lang)){
            $lang = $this->df_lang->id;
        }
        $cats = DB::table($this->e['table'].'_category')->select('id','name','fk_parentid')->get();
        $index = DB::table($this->e['table'])->join($this->e['table'].'_common','fk_commonid','=',$this->e['table'].'_common.id')->where([$this->e['table'].'.id' => $id ,'language' => $lang])->select('*',$this->e['table'].'.id as id')->first();
        $this->e['action'] = ucfirst($index->name);
        $MultiLevelSelect = AdminHelper::MultiLevelSelect($cats,0,'',$index->fk_catid);
        $posts = DB::table($this->e['table'])->join($this->e['table'].'_common','fk_commonid','=',$this->e['table'].'_common.id')->where(['status' => 1 ,'language' => $index->language])->select('name','alias')->get();

        
        $tags = DB::table('tag')->where('status',1)->select('id','name','alias')->get();
        // Lấy ra các ngôn ngữ đã có
        $has_languages = DB::table($this->e['table'])->where($this->e['table'].'.id' , $id )->select('language')->get();
        
        foreach ($has_languages as $key => $value) {
            $common_id[] = $value->language;
        }
        $languages = DB::table('language')->whereNotIn('id',$common_id)->where('status',1)->get();
        $languages2 = DB::table('language')->whereIn('id',$common_id)->where('status',1)->get();

        $posts_lang = '';
        if($languages){
            $posts_lang = DB::table($this->e['table'])->join($this->e['table'].'_common','fk_commonid','=',$this->e['table'].'_common.id')->where(['status' => 1 ,'language' => $languages[0]->id])->select('name','alias')->get();
        }
        

        return view($this->e['view'].'.edit',compact('index','posts_lang','cats','MultiLevelSelect','posts','tags','languages','languages2'))->with(['e' => $this->e]);
    }

    public function edit_post(Request $req,$id,$lang = ''){
        Cache::flush();
        if(empty($lang)){
            $lang = $this->df_lang->id;
        }

        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'alias' => 'required',
            'image' => 'image|max:1000'
        ],[
            'name.required' => 'Bạn chưa nhập tên',
            'alias.required' => 'Bạn chưa nhập đường dẫn ảo',
            'image.image' => 'File tải lên phải là ảnh',
            'image.max' => 'Ảnh tải lên vượt quá dung lượng cho phép'
        ]);
        $error = $validator->errors()->first();
        if($error){
            return redirect()->back()->with('alert',AdminHelper::alert_admin('danger','fa-ban',$error));
        }

        $index = DB::table($this->e['table'])->where(['id' => $id,'language' => $lang]);
        $common = DB::table($this->e['table'].'_common')->where('id',$lang)->first();

        $data_private['name'] = $req->name;
        $data_private['description'] = $req->description;
        $data_private['content'] = $req->content;

        $data['alias'] = AdminHelper::check_alias($this->e['table'].'_common',$req->alias,$index->first()->fk_commonid);

        
        if($req->file('image')){
            if(file_exists($common->image)){
                unlink($common->image);
            }
            $image = $req->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('upload',$image_name);
            $data['image'] = 'upload/'.$image_name;
        }

        if($req->tags){
            $data['tags'] = implode(',',$req->tags);
        }
        $data['fk_catid'] = $req->fk_catid;
        $data['order'] = $req->order;
        $data['IsCustomer'] = 0;
        if(isset($req->IsCustomer)){
            $data['IsCustomer'] = $req->IsCustomer;
        }
        
        $data['meta_title'] = $req->meta_title;
        $data['meta_description'] = $req->meta_description;
        $data['meta_keywords'] = $req->meta_keywords;
        $data['status'] = $req->status;
        $data['update_at'] = date('Y-m-d H:i:s');
        

        DB::table($this->e['table'].'_common')->where('id',$index->first()->fk_commonid)->update($data);

        $index->update($data_private);
        if($req->save){
            return redirect(route($this->e['route'].'.edit.get',[$id,$index->first()->language]))->with('alert',AdminHelper::alert_admin('success','fa-check','cập nhật thành công'));
        }else{
            return redirect(route($this->e['route'].'.list.get'))->with('alert',AdminHelper::alert_admin('success','fa-check','cập nhật thành công'));
        }
    }
    public function list_get($key = ''){
        $this->e['action'] = 'Danh Sách';
        $cats = DB::table('posts_category')->where('status',1)->get();
        if(Input::has('cat_id')){
            $MultiLevelSelect = AdminHelper::MultiLevelSelect($cats,0,'',Input::get('cat_id'));
        }else{
            $MultiLevelSelect = AdminHelper::MultiLevelSelect($cats);
        }

        $languages = DB::table('language')->where('status',1)->get();
        
        
        $data = DB::table($this->e['table'])->join($this->e['table'].'_common','fk_commonid','=',$this->e['table'].'_common.id')->orderBy('order','desc')->orderBy($this->e['table'].'.id','desc');
        if(!empty($key)){
            $data = $data->where('name','like','%'.$key.'%');
        }
        if(Input::has('cat_id')){
            $data = $data->where('fk_catid',Input::get('cat_id'));
        }
        if(Input::has('lang_id')){
            $data = $data->where('language',Input::get('lang_id'));
        }else{
            $data = $data->where('language',$this->df_lang->id);
        }
        $data = $data->select('image','name','create_at','update_at','status','language',$this->e['table'].'.id as id')->paginate(10);
        return view($this->e['view'].'.list',compact('data','MultiLevelSelect','languages'), [
            'data' => $data->appends(Input::except('page'))
        ])->with(['e' => $this->e]);
    }

    public function list_post(Request $request){
        //return dd($request->all());
        if($request->show || $request->hide){
            $ids = $request->id;
            if(count($ids) == 0){
                return redirect()->back()->with(['alert' => AdminHelper::alert_admin('danger','fa-ban','Bạn chưa chọn bản ghi nào')]);
            }
            if(count($ids) == 0){
                return redirect()->back()->with(['alert' => AdminHelper::alert_admin('danger','fa-ban','Bạn chưa chọn bản ghi nào')]);
            }
            if(count($ids) == 0){
                return redirect()->back()->with(['alert' => AdminHelper::alert_admin('danger','fa-ban','Bạn chưa chọn bản ghi nào')]);
            }
            if(count($ids) == 0){
                return redirect()->back()->with(['alert' => AdminHelper::alert_admin('danger','fa-ban','Bạn chưa chọn bản ghi nào')]);
            }
            if($request->show){
                $status = 1;
            }else{
                $status = 0;
            }
            DB::table($this->e['table'])->whereIn('id',$ids)->update(['status' => $status]);
            return redirect()->back()->with(['alert' => AdminHelper::alert_admin('success','fa-check','Cập nhật trạng thái thành công')]);
        }else{
            return redirect(route($this->e['route'].'.list.get',$request->search));
        }
        
    }

    public function delete($id){
        DB::table($this->e['table'])->where('id',$id)->delete();
        return redirect()->back()->with(['alert' => AdminHelper::alert_admin('success','fa-check','Xóa thành công')]);
        //return redirect()->back();
    }
}
