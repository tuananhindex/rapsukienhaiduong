<?php

namespace App\Http\Controllers\backend\product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Http\Helpers\AdminHelper;
use DB;
use Validator;
use Session;
use Cache;

class CategoryController extends Controller
{
	private $e = [
					'view' => 'backend.product.category',
					'route' => 'backend.product.category',
					'module' => 'danh mục sản phẩm',
					'table' => 'product_category'
				];
	public function __construct(){
		View::share('e',$this->e);
	}

    public function add_get(){
    	$this->e['action'] = 'Thêm';
    	$cats = DB::table($this->e['table'])->select('id','name','fk_parentid')->get();
    	$MultiLevelSelect = AdminHelper::MultiLevelSelect($cats);

    	return view($this->e['view'].'.add',compact('cats','MultiLevelSelect'))->with(['e' => $this->e]);
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
        

    	$data['name'] = $req->name;
    	$data['alias'] = AdminHelper::check_alias($this->e['table'],$req->alias);

    	if($req->file('image')){
    		$image = $req->file('image');
	    	$image_name = time().'.'.$image->getClientOriginalExtension();
	    	$image->move('upload',$image_name);
	    	$data['image'] = 'upload/'.$image_name;
    	}
    	

    	$data['fk_parentid'] = $req->fk_parentid;
    	$data['order'] = $req->order;
    	$data['description'] = $req->description;
    	$data['meta_title'] = $req->meta_title;
    	$data['meta_description'] = $req->meta_description;
    	$data['meta_keywords'] = $req->meta_keywords;
    	$data['status'] = $req->status;
    	$data['create_at'] = date('Y-m-d H:i:s');
    	

    	$id = DB::table($this->e['table'])->insertGetId($data);
    	if($req->save){
    		return redirect(route($this->e['route'].'.edit.get',$id))->with('alert',AdminHelper::alert_admin('success','fa-check','thêm thành công'));
    	}else{
    		return redirect(route($this->e['route'].'.add.get'))->with('alert',AdminHelper::alert_admin('success','fa-check','thêm thành công'));
    	}
    }

    public function edit_get($id){
    	
    	$cats = DB::table($this->e['table'])->select('id','name','fk_parentid')->whereNotIn('id',[$id])->get();
    	$index = DB::table($this->e['table'])->where('id',$id)->first();
    	$this->e['action'] = ucfirst($index->name);
    	$MultiLevelSelect = AdminHelper::MultiLevelSelect($cats,0,'',$index->fk_parentid);

    	return view($this->e['view'].'.edit',compact('index','cats','MultiLevelSelect'))->with(['e' => $this->e]);
    }

    public function edit_post(Request $req,$id){
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

        $index = DB::table($this->e['table'])->where('id',$id);
        

    	$data['name'] = $req->name;
    	$data['alias'] = AdminHelper::check_alias($this->e['table'],$req->alias,$index->first()->id);

    	
    	if($req->file('image')){
    		if(file_exists($index->first()->image)){
	    		unlink($index->first()->image);
	    	}
    		$image = $req->file('image');
	    	$image_name = time().'.'.$image->getClientOriginalExtension();
	    	$image->move('upload',$image_name);
	    	$data['image'] = 'upload/'.$image_name;
    	}

    	$data['fk_parentid'] = $req->fk_parentid;
    	$data['order'] = $req->order;
    	$data['description'] = $req->description;
    	$data['meta_title'] = $req->meta_title;
    	$data['meta_description'] = $req->meta_description;
    	$data['meta_keywords'] = $req->meta_keywords;
    	$data['status'] = $req->status;
    	$data['update_at'] = date('Y-m-d H:i:s');
    	

    	$index->update($data);
    	if($req->save){
    		return redirect(route($this->e['route'].'.edit.get',$id))->with('alert',AdminHelper::alert_admin('success','fa-check','cập nhật thành công'));
    	}else{
    		return redirect(route($this->e['route'].'.list.get'))->with('alert',AdminHelper::alert_admin('success','fa-check','cập nhật thành công'));
    	}
    }

    public function list_get($key = ''){
    	$this->e['action'] = 'Danh Sách';
    	$data = DB::table($this->e['table'])->orderBy('order','desc')->orderBy('id','desc');
        if(!empty($key)){
            $data = $data->where('name','like','%'.$key.'%');
        }
        $data = $data->paginate(10);
    	return view($this->e['view'].'.list',compact('data'))->with(['e' => $this->e]);
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
    	// DB::table($this->e['table'])->where('id',$id)->delete();
     //    return redirect()->back()->with(['alert' => AdminHelper::alert_admin('success','fa-check','Xóa thành công')]);
        return redirect()->back();
    }
}
