<div class="sidebar nobottommargin col_last clearfix hidden-xs col-md-3 col-sm-12">
	<div class="sidebar-widgets-wrap">

		<!-- categories -->
		<?php
			$posts_category_max = DB::table('posts_category')->where(['status' => 1 , 'fk_parentid' => 0])->select('name','alias')->get();
		?>
		@if($posts_category_max)
		<div class="widget widget_links clearfix">
			<h4>Danh mục</h4>
			<ul class="sidebar_menu">
				
				@foreach($posts_category_max as $val)
				<li><a href="{{ route('posts.category',$val->alias) }}">{{ ucfirst($val->name) }}</a></li>
				@endforeach
			</ul>
		</div>
		@endif
		
		<!-- end categories -->

		<!-- recent article -->
		<?php
			$newest = DB::table('posts')->where('status',1)->orderBy('id','desc')->get();
		?>
		@if($newest)
		<div class="widget clearfix">
			<h4 style=""><a href="nhung-thuc-pham-vang-danh-cho-nguoi-choi-the-thao.htm">Bài viết mới nhất</a></h4>

			<div class="tab-container sidebar_menu">

				<!--<div class="tab-content clearfix" id="tabs-1">-->
				
				@foreach($newest as $val)
				<div class="spost clearfix">
					<div class="entry-image">
						
						
						
						
						

						
						
						

							<a href="{{ route('posts',$val->alias) }}" class="nobg a-circle"><img class="img-circle-custom" src="@if($val->image){{ asset($val->image) }}@else{{ asset('assets/frontend/img/No_image_available.svg') }}@endif" alt="{{ ucfirst($val->name) }}"></a>
							</div>
							<div class="entry-c">
							<div class="entry-title">
							<h4><a href="{{ route('posts',$val->alias) }}">{{ ucfirst($val->name) }}</a></h4>
							</div>
							<!-- <ul class="entry-meta">
							<li><a href="nhung-thuc-pham-vang-danh-cho-nguoi-choi-the-thao.htm#comments"><i class="fa fa-comments"></i> 0 bình luận</a></li>
							</ul> -->
							</div>
							</div>
				@endforeach			
				
							


							
							<!-- <div class="widget clearfix" style="overflow:hidden;">
							

 
<div style="width: 100%;">
	Page plugin's width will be 180px
	<div class="fb-page" data-href="https://www.facebook.com/bizwebvietnam" data-width="320"></div>
</div>


							</div> -->
							

							
							<!-- <div class="widget clearfix">

							<h4>Tags</h4>
							<div class="tagcloud sidebar_menu" style="border: none; padding: 10px 0;">
							 
							<a href="../../tin-tuc/thuc-pham.htm">thực phẩm</a>
							 
							<a href="../../tin-tuc/the-thao.htm">thể thao</a>
							 
							<a href="../../tin-tuc/blogs-thuc-pham-the-thao.htm">blogs_Thực phẩm thể thao</a>
							 
							<a href="../../tin-tuc/trang-diem.htm">trang điểm</a>
							 
							<a href="../../tin-tuc/mat.htm">mắt</a>
							 
							<a href="../../tin-tuc/blogs-trang-diem.htm">blogs_Trang điểm</a>
							 
							<a href="../../tin-tuc/bi-quyet.htm">bí quyết</a>
							 
							<a href="../../tin-tuc/da-mat.htm">da mặt</a>
							 
							<a href="../../tin-tuc/blogs-cham-soc-da.htm">blogs_Chăm sóc da</a>
							
							</div>
							</div> -->
							

							</div>

							</div>
							@endif