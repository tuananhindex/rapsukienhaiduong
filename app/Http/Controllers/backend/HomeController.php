<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;


class HomeController extends Controller
{
	private $e = [
					'view' => 'backend.home',
					'route' => 'backend.home',
					'module' => 'trang chủ'
				];

	public function __construct(){
		View::share('e',$this->e);

		
	}

    public function index(){
    	return view('backend.home');
    }
    

}
