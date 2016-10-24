@if(isset($posts_category))
<link href="{{ asset('assets/frontend/css/style.css') }}" type="text/css" rel="stylesheet" />
@foreach($posts_category as $val)
<?php
	$ids = App\Http\Helpers\AdminHelper::child_id($posts_category_all,$val->id);
	$ids[] = $val->id;
	$posts = DB::table('posts')->whereIn('fk_catid',$ids)->select('id','name','alias','image','description','create_at')->orderBy('order','desc')->orderBy('id','desc');
	$posts_top = $posts->first();
	$posts = $posts->skip(1)->take(4)->get();
	?>
@if(isset($posts_top))
<div class="col830 fl">
	<section class="box_left_home">
		<div class="head_news">
			<a href="{{ route('posts.category',$val->alias) }}">{{ ucwords($val->name) }}</a>
			<?php
				$posts_category_lv2 = DB::table('posts_category')->select('id','name','alias')->where(['fk_parentid' => $val->id , 'status' => 1])->orderBy('order','desc')->get();
			?>
			<ul style="display:inline">
				<ul>
                    @foreach($posts_category_lv2 as $val2)
                    <li><a href='{{ route("posts.category",$val2->alias) }}'>{{ ucfirst($val2->name) }}</a></li>
                    @endforeach
                </ul>
			</ul>
		</div>
		<div class="pkg">
			<div class="col48per fl">
				<a href="{{ route('posts',$posts_top->alias) }}" ><img class="" src="{{ asset($posts_top->image) }}" width="343" height="220" alt="{{ $posts_top->name }}" /></a>        
				<h2><a href="{{ route('posts',$posts_top->alias) }}" class="fontOPB f22" title="Phân biệt giới tính, đồng đội Rosicky bị đẩy xuống tập cùng đội nữ">{{ $posts_top->name }}</a></h2>
				<div class="time_comment mar_top7 mar_bottom7">
					<span>{{ App\Http\Helpers\AdminHelper::time_stamp(strtotime($posts_top->create_at)) }}  </span>
				</div>
				<div class="sapo_news"> {!! App\Http\Helpers\AdminHelper::_substr($posts_top->description,400) !!} </div>
				
			</div>
			<div class="col48per fr">
				
				@if($posts)
				<ul class="list_news_show_home">
					@foreach($posts as $val3)
					<li class="first pkg">
						<a href="{{ route('posts.category',$val3->alias) }}" class="thumbblock thumb140x90 fl" title="{{ ucfirst($val3->name) }}" ><img class="" src="{{ asset($val3->image) }}" width="140" height="90" alt="{{ ucfirst($val3->name) }}" /></a>                
						<h2><a href="{{ route('posts',$val3->alias) }}" class="f18" title="{{ ucfirst($val3->name) }}">{{ ucfirst($val3->name) }}</a></h2>
						<div class="time_comment mar_top7 mar_bottom7">
							<span>{{ App\Http\Helpers\AdminHelper::time_stamp(strtotime($posts_top->create_at)) }}  </span>
						</div>
					</li>
					@endforeach         
				</ul>
				@endif
			</div>
		</div>
	</section>
</div>
@endif
@endforeach
@endif