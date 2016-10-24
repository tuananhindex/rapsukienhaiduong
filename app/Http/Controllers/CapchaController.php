<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Mail;

class CapchaController extends Controller
{
    public function getBuild()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        $captcha = $builder->inline();
        Session::put('captchaPhrase', $builder->getPhrase());
        echo $captcha;
    }

    public function danhgia(){
    	//return Session::get('captchaPhrase');
    	$message = [
            "Bạn phải nhập thông tin Người gửi","Bạn phải nhập email", "Bạn phải nhập số điện thoại", "Bạn phải nhập thông tin Nội dung bình luận",
            "Bạn phải nhập thông tin Mã an toàn!", "Mã an toàn không hợp lệ!",
            "Cám ơn quý khách hàng đã gửi bình luận, đánh giá của mình về sản phẩm của chúng tôi !",
            "Email không đúng định dạng"
        ];
        if(!$_GET['hoten']){
        	return $message[0];
        }elseif(!$_GET['email']){
        	return $message[1];
        }elseif(!$_GET['phone']){
        	return $message[2];
        }elseif(!$_GET['noidung']){
        	return $message[3];
        }elseif(!$_GET['xacnhan']){
        	return $message[4];
        }

        $email = $_GET['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  return $message[7];
		}

    	// $builder = new CaptchaBuilder;
     //    $builder->setPhrase(Session::get('captchaPhrase'));
     //    if(!$builder->testPhrase($_GET['xacnhan'])) {
     //        return $message[5];
     //    }
        
        //Gửi email
        $data = array('hoten'=>$_GET['hoten'],'phone'=>$_GET['phone'],'noidung'=>$_GET['noidung'],'email'=>$_GET['email']);
        Mail::send('frontend.mail', $data, function($res)
        {
        	$res->from($_GET['email']);
            $res->to('anhtuananh2008@gmail.com')->subject('Phản hồi');
        });
        return $message[6].'-success';

    }
}
