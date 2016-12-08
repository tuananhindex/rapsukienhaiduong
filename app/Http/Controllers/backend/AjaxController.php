<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Validator;


class AjaxController extends Controller
{
   
    public function get_data_cursor()
    {
        if(Request::ajax()) {
            $data = DB::table($_GET['cursor'])->select('alias','name')->get();
            $html = '';
            $html .= '<div class="form-group">';
            $html .= '<label>Đối tượng trỏ đến</label>';
            $html .= '<select class="form-control" name="cursor_id">';
            foreach ($data as $key => $value) {
                $html .= '<option value="'.$value->alias.'">'.ucfirst($value->name).'</option>';
            }
            $html .= '</select>';
            $html .= '</div>';
            $html .= "<script type='text/javascript'>
                        var config = {
                          '.chosen-select'           : {},
                          '.chosen-select-deselect'  : {allow_single_deselect:true},
                          '.chosen-select-no-single' : {disable_search_threshold:10},
                          '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                          '.chosen-select-width'     : {width:'95%'}
                        }



                        $('select').chosen(config);

                        </script>";
            echo $html;
        }
        //return 123;
    }

    public function add_lang(){
        if(Request::ajax()) {
            $table = $_POST['table'];
            unset($_POST['table']);
            unset($_POST['_token']);
            $validator = Validator::make($_POST, [
                'name' => 'required'
            ],[
                'name.required' => 'Bạn chưa nhập tên'
            ]);
            $error = $validator->errors()->first();
            if($error){
                $rs['status'] = 'error';
                $rs['message'] = $error;
                echo json_encode($rs);
                die();
            }

            DB::table($table)->insert($_POST);
            $rs['status'] = 'success';
            $rs['message'] = 'Thêm ngôn ngữ thành công';
            echo json_encode($rs);
        }
    }
}
