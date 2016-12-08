<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Http\Helpers\AdminHelper;
use DB;
use Validator;
use Session;

class AccountController extends Controller
{
	private $e = [
					'view' => 'backend.account',
					'route' => 'backend.account',
					'module' => 'Tài Khoản',
					'table' => 'users'
				];
	public function __construct(){
		View::share('e',$this->e);
	}

    public function add_get(){
    	$this->e['action'] = 'Thêm';
    	
    	return view($this->e['view'].'.add')->with(['e' => $this->e]);
    }

    public function add_post(Request $req){
    	$validator = Validator::make($req->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'image' => 'image|max:1000'
        ],[
        	'name.required' => 'Bạn chưa nhập tên',
        	'username.required' => 'Bạn chưa nhập tên tài khoản',
        	'username.unique' => 'Tên tài khoản đã tồn tại',
        	'password.required' => 'Bạn chưa nhập mật khẩu',
        	'password.confirmed' => 'Xác nhận mật khẩu không chính xác',
        	'image.image' => 'File tải lên phải là ảnh',
        	'image.max' => 'Ảnh tải lên vượt quá dung lượng cho phép'
        ]);
        $error = $validator->errors()->first();
        if($error){
        	return redirect()->back()->with('alert',AdminHelper::alert_admin('danger','fa-ban',$error));
        }
        

    	$data['name'] = $req->name;
    	$data['username'] = $req->username;
		$data['password'] = bcrypt($req->password);
    	$data['role'] = $req->role;
        $data['support_online'] = $req->support_online;
        $data['phone'] = $req->phone;
    	$data['status'] = $req->status;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	if($req->file('image')){
    		$image = $req->file('image');
	    	$image_name = time().'.'.$image->getClientOriginalExtension();
	    	$image->move('upload',$image_name);
	    	$data['image'] = 'upload/'.$image_name;
    	}
    	

    	$id = DB::table($this->e['table'])->insertGetId($data);
    	if($req->save){
    		return redirect(route($this->e['route'].'.edit.get',$id))->with('alert',AdminHelper::alert_admin('success','fa-check','thêm thành công'));
    	}else{
    		return redirect(route($this->e['route'].'.add.get'))->with('alert',AdminHelper::alert_admin('success','fa-check','thêm thành công'));
    	}
    }

    public function edit_get($id){
    	
    	$index = DB::table($this->e['table'])->where('id',$id)->first();
    	$this->e['action'] = ucfirst($index->name);
    	
    	return view($this->e['view'].'.edit',compact('index'))->with(['e' => $this->e]);
    }

    public function edit_post(Request $req,$id){
    	$validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'image|max:1000'
        ],[
        	'name.required' => 'Bạn chưa nhập tên',
        	'image.image' => 'File tải lên phải là ảnh',
        	'image.max' => 'Ảnh tải lên vượt quá dung lượng cho phép'
        ]);
        $error = $validator->errors()->first();
        if($error){
        	return redirect()->back()->with('alert',AdminHelper::alert_admin('danger','fa-ban',$error));
        }

        $index = DB::table($this->e['table'])->where('id',$id);
        

    	
    	
    	if($req->file('image')){
    		if(file_exists($index->first()->image)){
	    		unlink($index->first()->image);
	    	}
    		$image = $req->file('image');
	    	$image_name = time().'.'.$image->getClientOriginalExtension();
	    	$image->move('upload',$image_name);
	    	$data['image'] = 'upload/'.$image_name;
    	}

    	$data['name'] = $req->name;
    	$data['role'] = $req->role;
        $data['support_online'] = $req->support_online;
        $data['phone'] = $req->phone;
    	$data['status'] = $req->status;
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	

    	$index->update($data);
    	if($req->save){
    		return redirect(route($this->e['route'].'.edit.get',$id))->with('alert',AdminHelper::alert_admin('success','fa-check','cập nhật thành công'));
    	}else{
    		return redirect(route($this->e['route'].'.list.get'))->with('alert',AdminHelper::alert_admin('success','fa-check','cập nhật thành công'));
    	}
    }

    public function list_get($key = ''){
    	$this->e['action'] = 'Danh Sách';
    	$data = DB::table($this->e['table'])->orderBy('id','desc');
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
