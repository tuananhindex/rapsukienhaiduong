<?php

/**
* 
*/


namespace App\Http\Helpers;

use DB;

class AdminHelper{

	public static function _substr($str, $length, $minword = 3)
	{
		$sub = '';
		$len = 0;
		foreach (explode(' ', $str) as $word)
		{
		    $part = (($sub != '') ? ' ' : '') . $word;
		    $sub .= $part;
		    $len += strlen($part);
		    if (strlen($word) > $minword && strlen($sub) >= $length)
		    {
		      break;
		    }
		}
		return $sub . (($len < strlen($str)) ? '...' : '');
	}

	public static function check_alias($table,$alias,$id = 0){

	    if($id == 0){

	        $check = DB::table($table)->where('alias','like','%'.$alias.'%')->select('alias')->get();

	    }else{

	        $check = DB::table($table)->where('alias','like','%'.$alias.'%')->whereNotIn('id',[$id])->select('alias')->get();

	    }



	    if(count($check) == 0){

	        return $alias;

	    }else{

	        $num = count($check) + 1;

	        return $alias.'-'.$num;

	    }

	}



	public static function alert_admin($class,$class_i,$alert){

	    $return = ' <div class="alert alert-'.$class.' alert-custom alert-dismissible">

	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

	                    <h4><i class="icon fa '.$class_i.'"></i> Thông Báo !</h4>

	                    '.ucfirst($alert).'.

	                </div>';

	    return $return;

	}



	



	public static function MultiLevelSelect($arr,$parent = 0,$char='',$select = 0){

		$result = '';

		foreach ($arr as $value) {

			if($value->fk_parentid == $parent){

				if($select != 0 && $value->id == $select){

					$result .= '<option value="'.$value->id.'" selected="selected" >'.$char.ucfirst($value->name).'</option>';

				}else{

					$result .= '<option value="'.$value->id.'">'.$char.ucfirst($value->name).'</option>';

				}

				$result .= self::MultiLevelSelect($arr,$value->id,$char.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$select);

			}

		}

		return $result;

	}

	







	public static function category_root($arr,$parent){

		$result = '';

		foreach ($arr as $value) {

			if($parent == $value->id){

				if($value->fk_parentid != 0){

					$result = category_root($arr,$value->fk_parentid);

				}else{

					$result = $value->id;

					break;

				}

				

				

			}



		}

		return $result;

	}



	



	public static function menu($arr,$parent = 0,$select = 0){
		$rs = '';
        if($parent != 0){
            $rs .= '<ul class="dropdown-menu">';
        }
        
        foreach ($arr as $key => $val) {
            if($val->fk_parentid == $parent){
                if(empty($val->cursor)){
                    $href = 'javascript:void(0)';
                }else{
                    $href = route('menu',$val->alias);
                }
                if(!empty(self::child_id($arr,$val->id))){

                	if($parent != 0){
			            $rs .= '<li class="dropdown-submenu">';
			            $rs .= '<a tabindex="-1" href="'.$href.'" target="_self"> '. $val->name;
			        }else{
			        	$rs .= '<li class="dropdown">';
			        	$rs .= '<a level="1" href="'.$href.'" target="_self" class="dropdown-toggle" data-toggle=""> '. $val->name;
			        }
	                
		            $rs .= ' <i class="fa fa-caret-down"></i>';
                }else{
                	$rs .= '<li>';
	                $rs .= '<a tabindex="-1" href="'.$href.'" target="_self"> '. $val->name;
		        }
                
                $rs .= '</a>';
                $rs .= self::menu($arr,$val->id,$select);
                $rs .= '</li>';
            }
            
        }
        

        if($parent != 0){
            $rs .= '</ul>';
        }
        return $rs;
	}

	public static function menu_mobi($arr,$parent = 0,$select = 0){
		$rs = '';
        if($parent != 0){
            $rs .= '<div class="collapse" id="menu_'.$parent.'">';
        }
        
        foreach ($arr as $key => $val) {
            if($val->fk_parentid == $parent){
                if(empty($val->cursor)){
                    $href = 'javascript:void(0)';
                }else{
                    $href = route('menu',$val->alias);
                }
                if($parent != 0){
		            $rs .= '<i class="fa fa-angle-right"></i>';
		        }
                if(!empty(self::child_id($arr,$val->id))){
                	if($parent != 0){
			            $rs .= '<a href="'.$href.'" target="_self" class="list-group-item-stmenu sub">
                            <i class="fa fa-angle-right"></i>'
                        . $val->name.'                           </a>';
			        }else{
			        	$rs .= '<a href="'.$href.'" target="_self" class="list-group-item-stmenu">'
                        . $val->name.'                           </a>';
			        }
	                
	                $rs .= '<a href="#menu_'.$val->id.'" data-toggle="collapse" class="arrow-sub">';
		            $rs .= '<i class="fa fa-angle-down"></i>';
                }else{
                	if($parent != 0){
                		$rs .= '<a href="'.$href.'" target="_self" class="list-group-item-stmenu sub">
            				<i class="fa fa-angle-right"></i>'
                        . $val->name.'                </a> ';
                	}else{
                		$rs .= '<a href="'.$href.'" target="_self" class="list-group-item-stmenu">'
                        . $val->name.'                </a> ';
                	}
                	
	                
		        }
                
                $rs .= self::menu_mobi($arr,$val->id,$select);
                
            }
            
        }
        

        if($parent != 0){
            $rs .= '</div>';
        }
        return $rs;
	}

	public static function menu_sidebar($arr,$parent = 0,$select = 0){
		$rs = '';
        if($parent != 0){
            $rs .= '<div  class="collapse" id="path_8_6937">';
        }
        
        foreach ($arr as $key => $val) {
            if($val->fk_parentid == $parent){
                if(empty($val->cursor)){
                    $href = 'javascript:void(0)';
                }else{
                    $href = route('menu',$val->alias);
                }
                if($parent != 0){
		            $rs .= '<i class="fa fa-angle-right"></i>';
		        }
                if(!empty(self::child_id($arr,$val->id))){
                	
	                $rs .= '<a href="'.$href.'" target="_self"  class="list-group-item-vmenu">
                            <i class="fa fa-angle-right"></i>'
                        . $val->name.'                           </a>';
	                $rs .= '<a href="'.$href.'" data-toggle="collapse" data-parent="#MainMenu" class="arrow-sub-vmenu">';
		            $rs .= '<i class="fa fa-angle-down"></i>';
                }else{
                	$rs .= '<a href="'.$href.'" target="_self" class="list-group-item-vmenu"'
                        . $val->name.'                </a> ';
	                
		        }
                
                $rs .= self::menu_sidebar($arr,$val->id,$select);
                
            }
            
        }
        

        if($parent != 0){
            $rs .= '</ul>';
        }
        return $rs;
	}



	public static function child_id_str($data,$id){

		$result = '';

		foreach ($data as $value) {

			if($value->fk_parentid == $id){

				$result .= $value->id.',';

				$result .= self::child_id_str($data,$value->id);

			}

			

		}

		return $result;

	}

	public static function child_id($data,$id){

		$str = self::child_id_str($data,$id);

		$arr = explode(',', $str);



		array_pop($arr);

		//$arr[] = $id;

		$arr = array_unique($arr);

		

		return $arr;

	}

	public static function parent_id_str($data,$id){

		$result = '';

		foreach ($data as $value) {

			if($value->id == $id){

				$result .= $value->id.',';

				$result .= self::parent_id_str($data,$value->fk_parentid);

			}

			

		}

		return $result;

	}

	public static function parent_id($data,$id){

		$str = self::parent_id_str($data,$id);

		$arr = explode(',', $str);



		array_pop($arr);

		//$arr[] = $id;

		$arr = array_unique($arr);

		

		return $arr;

	}

	public static function time_stamp($time_ago)
 
	{
	 
		$cur_time=time();
		 
		$time_elapsed = $cur_time - $time_ago;
		 
		$seconds = $time_elapsed ;
		 
		$minutes = round($time_elapsed / 60 );
		 
		$hours = round($time_elapsed / 3600);
		 
		$days = round($time_elapsed / 86400 );
		 
		$weeks = round($time_elapsed / 604800);
		 
		$months = round($time_elapsed / 2600640 );
		 
		$years = round($time_elapsed / 31207680 );
		 
		// Seconds
		 
		if($seconds <= 60)
		 
		{
		 
		echo " Cách đây $seconds giây ";
		 
		}
		 
		//Minutes
		 
		else if($minutes <=60)
		 
		{
		 
		if($minutes==1)
		 
		{
		 
		echo " Cách đây 1 phút ";
		 
		}
		 
		else
		 
		{
		 
		echo " Cách đây $minutes phút";
		 
		}
		 
		}
		 
		//Hours
		 
		else if($hours <=24)
		 
		{
		 
		if($hours==1)
		 
		{
		 
		echo "Cách đây 1 tiếng ";
		 
		}
		 
		else
		 
		{
		 
		echo " Cách đây  $hours tiếng ";
		 
		}
		 
		}
		 
		//Days
		 
		else if($days <= 7)
		 
		{
		 
		if($days==1)
		 
		{
		 
		echo " Ngày hôm qua ";
		 
		}
		 
		else
		 
		{
		 
		echo " Cách đây  $days ngày ";
		 
		}
		 
		}
		 
		//Weeks
		 
		else if($weeks <= 4.3)
		 
		{
		 
		if($weeks==1)
		 
		{
		 
		echo " Cách đây 1 tuần ";
		 
		}
		 
		else
		 
		{
		 
		echo " Cách đây  $weeks tuần";
		 
		}
		 
		}
		 
		//Months
		 
		else if($months <=12)
		 
		{
		 
		if($months==1)
		 
		{
		 
		echo " Cách đây 1 tháng ";
		 
		}
		 
		else
		 
		{
		 
		echo " Cách đây $months tháng";
		 
		}
		 
		}
		 
		//Years
		 
		else
		 
		{
		 
		if($years==1)
		 
		{
		 
		echo " Cách đây 1 năm ";
		 
		}
		 
		else
		 
		{
		 
		echo date('d/m/Y',$time_ago);
		 
		}
		 
		}
		 
		}
	 


		
		
	}

	

	



?>