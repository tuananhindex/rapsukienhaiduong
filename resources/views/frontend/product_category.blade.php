@extends('frontend.master')
@section('content')
<style type="text/css">
	ul.list-category-child li{
		display: inline;
		margin-right: 10px;
	}

</style>


<section id="page-title">
	<div class="container clearfix">
		
		<ol class="breadcrumb col-md-6 col-sm-6">
			<li><a href="{{ route('home') }}">Trang chủ</a></li>
			
			
			<li class="active"><a href="{{ route('product_category',$index->alias) }}">{{ ucfirst($index->name) }}</a></li>
			
			
		</ol>
	</div>
</section>
<input type="hidden" id="collection_id" value="0">
<section id="content" style="margin-bottom: 0px;">

	<div class="content-wrap">

		<div class="container clearfix">
			
			
			
			<div class="row collection_wrapper">
				<!-- Sidebar
============================================= -->
				
				<!-- .sidebar end -->

				<!-- Post Content
============================================= -->
				<div class="post_content pull-left nobottommargin norightpadding col-xs-12">

					<!-- Shop
============================================= -->
					<div id="shop" class="product-3 clearfix">
						  
						<!-- collection header -->
						<div class="widget-heading ">
							<h2 class="widget-title" style="padding:5px 0">{{ ucfirst($index->name) }}</h2>							
						</div>
						@if($categories_parent)
						<div class="cat-sl-slider">
							<ul class="list-category-child">
								<li>Danh mục cha : </li>
								@if($categories_parent)
								@foreach($categories_parent as $val)
								<li><a href="{{ route('product_category',$val->alias) }}">{{ ucfirst($val->name) }}</a></li>
								@endforeach

								@endif
							</ul>
						</div>
						<hr>
						@endif	
						@if($categories_child)
						<div class="cat-sl-slider">
							<ul class="list-category-child">
								<li>Danh mục con : </li>
								@if($categories_child)
								@foreach($categories_child as $val)
								<li><a href="{{ route('product_category',$val->alias) }}">{{ ucfirst($val->name) }}</a></li>
								@endforeach

								@endif
							</ul>
						</div>
						<hr>
						@endif	
						
						<!-- end collection header -->
						
						
						<div class="sort-wrapper">
							<div class="browse-tags row" style="margin-bottom:20px;line-height: 30px; overflow:hidden;">
	<div class="col-sm-6 col-md-8">
		<p class="subtext nomargin">
			
			Có <span class="require_symbol pagination-info">{{ $count_product }}</span> sản phẩm.
			
		</p>
	</div>

	<div class="col-sm-6 col-md-4 noleftpadding text-right">
		<span class="col-sm-5 col-xs-4 nopadding text-left">Sắp xếp theo:</span>
		<span class="select-control-wrapper order-filter__select pull-right col-sm-7 col-xs-8 norightpadding">
			<select class="form-control " class="category_filter" onchange="category_filter(this)">
				<?php
					$current_route = Route::current();
				?>
				<option @if($current_route->getParameter('filter') == '') selected @endif value="">Mặc định</option>
				<option @if($current_route->getParameter('filter') == 'price-asc') selected @endif value="price-asc">Giá tăng dần</option>
				<option @if($current_route->getParameter('filter') == 'price-desc') selected @endif value="price-desc">Giá giảm dần</option>
				<option @if($current_route->getParameter('filter') == 'newest') selected @endif value="newest">Sản phẩm mới</option>
				
			</select>
		</span>
	</div>
	<script type="text/javascript">
		function category_filter(e){
			//var val = e.val();
			//console.log(e.value);
			var rs = 'danh-muc-san-pham/';
			if(e.value == ''){
				rs += '{{ $current_route->getParameter("alias") }}';
			}else{
				rs += '{{ $current_route->getParameter("alias") }}/' + e.value;
			}
			location.href = '{{ asset("/") }}' + rs;
		}
		
	</script>
</div>

						</div>
						<div id="grid_pagination">
							
<div class="grid">
<div class="product_wrapper">
	@foreach($products as $val)
	<div class="col-md-2 col-sm-4 col-xs-6 product_single">
<div class="product style_1 clearfix">
	<div class="product-image">
		<a href="{{ route('product',$val->alias) }}"><img alt="MultiPro 32X 200 viên" src="{{ asset($val->image) }}" style="background: none;"></a>
		<!-- <div class="sale-flash">- 6%</div> -->
		<!-- product overlay -->
		<!-- <div product_url="/multipro-32x-200-vien-vitamin-khoang-chat-cho-nam-gioi" class="product_overlay style_1 hidden-sm hidden-xs">
		<ul class="unstyled">
			<li><strong>Xuất xứ: </strong><span>Hoa Kỳ</span></li>
			<li><strong>Nhà cung cấp: </strong><span>AST</span></li>
		</ul>
		<a href="../multipro-32x-200-vien-vitamin-khoang-chat-cho-nam-gioi.htm" class="product_quick_add button">Thêm vào giỏ</a>
		<a href="all.htm#product-pop-up" class="button item-quick-view fancybox-fast-view hidden-sm hidden-xs" product_url="/multipro-32x-200-vien-vitamin-khoang-chat-cho-nam-gioi">Xem nhanh</a>
	</div> -->
		<!-- end product overlay -->
</div>
	<div class="product-desc">
		<div class="product-title">
			<span><a href="{{ route('product',$val->alias) }}" title="AST Sports">{{ ucfirst($val->name) }}</a></span>
		</div>
		<div class="product-price">
			<ins> {{ number_format($val->price) }}₫ </ins>
			<!-- <del>850.000₫</del> -->
		</div>
	</div>
	<!-- <div class="addtocart_sm hidden-lg hidden-md">
		<a href="../multipro-32x-200-vien-vitamin-khoang-chat-cho-nam-gioi.htm" class="product_quick_add col-sm-6 col-sm-push-3 col-xs-12 button noleftmargin norightmargin nopadding">Thêm vào giỏ</a>
	</div> -->
</div>
	</div>
	@endforeach


</div>



</div>
<div class="pagination_wrapper">
	
<div class="page_navi">
	<ul class="pagination ajax-pagination "> 
		{!! $products->render() !!}
	</ul>
</div>

</div>

						</div>
					</div><!-- #shop end -->

				</div><!-- .postcontent end -->
				
			</div>
		</div>

	</div>
</section>

@endsection