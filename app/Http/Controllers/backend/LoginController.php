<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class LoginController extends Controller
{
    

    public function getLogin(){
    	return view('backend.login.login');
    }

    public function postLogin(Request $request){
    	$user = DB::table('users')->first();
    	if(empty($user)){
    		DB::table('users')->insert(['name' => 'Administrator','username' => 'admin','password' => bcrypt('Tuananh93')]);
	    	
	    }
        $remember = 0;
        if($request->remember){
            $remember = 3600000; //40 ngay`
        }
	    if (Auth::attempt(['username' => $request->username, 'password' => $request->password ,'status' => 1],$remember)) {
            // Authentication passed...
            $acc = DB::table('users')->where('id',Auth::user()->id)->update(['active' => 1]);
            return redirect()->route('backend.home');
        }else{
        	return redirect()->back();
        }
    }

    public function logout(){
        $acc = DB::table('users')->where('id',Auth::user()->id)->update(['active' => 0]);
    	Auth::logout();
        return redirect(route('backend.home'));
    }
}
