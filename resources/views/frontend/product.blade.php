@extends('frontend.master')
@section('content')
<style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
    .draggable{
    	overflow: hidden;
    }
  </style>
<section id="page-title">
	<div class="container clearfix">
		
		<ol class="breadcrumb col-md-6 col-sm-6">
			<li><a href="{{ route('home') }}">Trang chủ</a></li>
			
			<!-- Find a couple item in breadcum -->


							
<!-- FindParent for curParent -->



<!-- FindChild for curChild -->



<!-- Get FullBreadcum -->





 
	
	<li><a href="{{ route('product_category',$category->alias) }}">{{ ucfirst($category->name) }}</a></li>
 

<!-- End Get FullBreadcum --> 
			<li class="active"><a href="{{ route('product',$index->alias) }}">{{ ucfirst($index->name) }}</a></li>
			
		</ol>
	</div>
</section>
<section id="content" style="margin-bottom: 0px;">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="product-page">
				<div class="single-product">
					<form method="post" enctype="multipart/form-data" id="ProductDetailsForm">
						<div class="product">
							<div style="margin-bottom: 25px;">
								<div class="col-md-6 noleftpadding">
									<!-- Product Single - Gallery
============================================= -->
									<div class="product-image product-main-image">
										<img src="{{ asset($index->image) }}">

										
										
										
										
										
										<!-- <div class="sale-flash">- 8%</div> -->
										

									</div><!-- Product Single - Gallery End -->
									

									
									<!-- Product Single - Meta
============================================= -->
									<div class="product-meta">
	<div class="">

		<span class="tagged_as"> 
</span>
	</div>
</div>
									
								</div>
								<div class="col-md-6 norightpadding pd_desc_wrapper">
									<div class="product-desc fix-view" style="">
										<div class="page_title">
											<h1>
												{{ ucfirst($index->name) }}
											</h1>
										</div>
										<div class="pd_sale_wrapper">
											<!-- Product Single - Price
============================================= -->
											<div class="product-price col-sm-12 col-md-6 noleftpadding">
												<ins>  55.000₫</ins>
												
												<!-- <del>60.000₫</del> -->
												 
											</div><!-- Product Single - Price End -->
											
											<!-- <div class="col-sm-12 col-md-6 product_info norightpadding">
	
	<span><strong>Thương hiệu </strong><a href="vendors_3.htm" title="Laneige">Laneige</a></span><br>
	
	
	  
	<span><strong>Mã SP </strong>ID6</span>
	
	
</div> -->
											
											<!-- Product Single - Rating
============================================= -->

											<div class="clear"></div>
											<div class="line"></div>

											<!-- Product Single - Quantity & Cart Button
============================================= -->

											
											<div class="hidden" style="">  
												<select id="product-select" name="variantId"> 
													
													<option value="4397298" class="">Default Title - 55.000₫</option>   
													

												</select>
											</div>

											<!-- variants -->
											<div class="product-page-options  hidden ">
																					
												
												<div class="sizePicker" id="option-0">
													<label class="control-label options-title">Title:</label>
													<div class="options-selection">
	<select class="input-sm">
		
		
		     
		     
		
		
		  
		  

		
		<option data_size_code="defaulttitle" data_color_code="defaulttitle" class="" value="Default Title">
			Default Title
		</option> 
		

		   


	</select>
</div>
												</div>
												

											</div>

											<!-- end variant -->
											<!--div class="quantity product-quantity clearfix col-md-6 col-xs-12 noleftpadding">
												<input type="button" value="-" class="minus">
												<input type="text" id='product_quantity' min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
												<input type="button" value="+" class="plus">
											</div-->
											
											<!--div class="quantity product-quantity clearfix col-md-6 col-xs-12 noleftpadding">
												<button type="button" value="-" class="minus"><i class="fa fa-minus"></i></button>
												<input type="text" id="product_quantity" min="1" name="quantity" value="1" title="Qty" class="qty" size="4">
												<button type="button" value="+" class="plus"><i class="fa fa-plus"></i></button>
											</div-->
											
											
											<!-- <div class="quantity product-quantity clearfix col-md-6 col-xs-12 noleftpadding">
												<div class="nums-choose-box">
													<span class="fleft">Chọn số lượng</span>
													<div class="nums-choose fleft">
														<button type="button" class="desc-btn fleft minus">-</button>
														<input type="text" id="product_quantity" min="1" name="quantity" value="1" title="Qty" class="nums-show qty fleft" size="4">
														<button type="button" class="asc-btn fleft plus">+</button>
													</div>
												</div>
											</div>
											
											
											<script>
												var quantity = parseInt($('#ProductDetailsForm .product-quantity input.qty').val());

												$('#ProductDetailsForm .minus').click(function() {
													if (quantity > 0) {
														if (quantity == 1) {
															$('#addtocart').attr('disabled','disabled');
														}
														quantity -= 1;
													}
													else {
														quantity = 0;
													}
													$('#ProductDetailsForm .product-quantity input.qty').val(quantity);
												});
												$('#ProductDetailsForm  .plus').click(function() {
													$('.add-to-cart').removeAttr('disabled');
													if (quantity < 100) {
														quantity += 1;
													}
													else {
														quantity = 100;
													}
													$('#ProductDetailsForm .product-quantity input.qty').val(quantity)
												});

											</script>

											
											<button type="submit" id="" class="add-to-cart button nomargin col-xs-12 col-md-6 nopadding"><i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ</button>
											
											<button type="submit" id="" class="button col-xs-12 nopadding buynow"><i class="fa fa-credit-card"></i> MUA NGAY</button>
											 -->
											
										</div>
										<div class="pd_policies_wrapper">
											
											<div class="clear hidden-sm"></div>
											<!-- <div class="line hidden-sm"></div> -->
<div class="pd_policies style_2">
	{!! $index->content !!}
</div>
<script>
$(document).ready(function() {
	ega.tooltip();
})
</script>
											
										</div>

										<!-- Product Single - Meta End -->
										<!-- Product Single - Share
============================================= -->
										 
										<div class="si-share noborder clearfix">
	<div class="socical-wrapper">
		<ul class="social-icons">
			<div class="fb-send" data-href="
																			
																			/tam-trang-manh-pure-snow-white-id6-snow-white-id6
																			
																			"></div>
			<div class="item"> 
				<div class="fb-like fix_top" data-href="/tam-trang-manh-pure-snow-white-id6-snow-white-id6" data-layout="button" data-action="like" data-show-faces="true" data-share="true" style="margin-right: 5px;"></div>
			</div>
			<script>
			(function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = '//apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
			</script>
		</ul>
	</div>
</div>
<!-- Product Single - Share End -->
										
										<!-- Product Single - Share End -->
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="col-md-12 nopadding" style="margin-top: 30px;">
							
							

<div class="panel-group hidden-lg hidden-sm hidden-xs hidden-md pd_description" id="accordion">
	<div class="panel panel-default ">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="tam-trang-manh-pure-snow-white-id6-snow-white-id6.htm#collapseOne" style="width: 100%; display: block;">
					<i class="fa fa-align-justify"></i><span class=""> Mô tả</span>
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				<p><strong>Xuất xứ :</strong> Thái lan&nbsp;</p>

<p><strong>Đặc điểm:</strong>&nbsp;Với thành phần chống nắng và dưỡng da tuyệt đối an toàn cho da,&nbsp;thích hợp với những bạn da đen</p>

<p><strong>Hướng dẫn sử dụng:</strong></p>

<p>Pha gói số 1 và 2 để khoảng 30s rồi pha tiếp gói số 3 vô thoa lên body khoảng từ 10p đến 15p tắm sạch</p>
			</div>
		</div>
	</div>
	<div class="panel panel-default ">
		<div class="panel-heading" id="headingTwo">
			<h4 class="panel-title">
				<a style="width: 100%; display:block;" class="collapsed" data-toggle="collapse" href="tam-trang-manh-pure-snow-white-id6-snow-white-id6.htm#collapseTwo">
					<i class="icon-info-sign"></i><span class=""> Bình luận</span>
				</a>
			</h4>
		</div>

		<!-- <div id="collapseTwo" class="panel-collapse collapse in " role="tabpanel">
			<div class="panel-body">
				<div id="fb-root"></div>					
				<div class="fb-comments" data-href="http://healthy-food-1.bizwebvietnam.net/tam-trang-manh-pure-snow-white-id6-snow-white-id6" data-numposts="5" width="100%" data-colorscheme="light"></div>
			</div>
		</div> -->
	</div>
</div>



							
							  
							<div id="pd_promotion">
	<div id="" class="pd_promotion_product">
		 
		 
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>

	
</div> 
							
							
							  
								<!-- recent view -->
<div class="clear"></div>
<div id="pd_recentview" class="widget clearfix">
	<h4 style="margin: 20px 0; font-weight: 300;">SẢN PHẨM CÙNG LOẠI </h4>	
	<!--div class="pd_recentview_product">
	<div class="slick-slide"-->
		<div class="widget-last-view sl-slider col-xs-12" >
			@if($product_same)
			@foreach($product_same as $val)
			<div class="product_viewed col-xs-6 col-sm-4 col-md-3">
				<div class="product style_1 clearfix">
					<div class="product-image ">
						<a href="{{ route('product',$val->alias) }}"><img src="{{ asset($val->image) }}" alt="#"></a>
						<!-- <div class="sale-flash"></div> -->
					</div>
					<div class="product-desc">
						<div class="product-title">
							<a href="{{ route('product',$val->alias) }}">{{ ucfirst($val->name) }}</a>
						</div>
						<div class="product-price">
							<ins> {{ number_format($val->price) }}đ </ins>
							<del></del>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<h4>Không có sản phẩm nào</h4>
			@endif
		</div>
	<!--/div>
	</div-->
	
	
</div>

<div class="clear"></div>
<div id="pd_recentview" class="widget clearfix">
	<h4 style="margin: 20px 0; font-weight: 300;">SẢN PHẨM KHÁC </h4>	
	<!--div class="pd_recentview_product">
	<div class="slick-slide"-->
		<div class="widget-last-view col-xs-12 sl-slider">
			@if($product_same)
			@foreach($product_other as $val)
			<div class="product_viewed col-xs-6 col-sm-4 col-md-3">
				<div class="product style_1 clearfix">
					<div class="product-image ">
						<a href="{{ route('product',$val->alias) }}"><img src="{{ asset($val->image) }}" alt="#"></a>
						<!-- <div class="sale-flash"></div> -->
					</div>
					<div class="product-desc">
						<div class="product-title">
							<a href="{{ route('product',$val->alias) }}">{{ ucfirst($val->name) }}</a>
						</div>
						<div class="product-price">
							<ins> {{ number_format($val->price) }}đ </ins>
							<del></del>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<h4>Không có sản phẩm nào</h4>
			@endif
		</div>
	<!--/div>
	</div-->
	
	
</div>

<!-- end recent view -->

<script>
	$(document).ready(function() {
		var $strHTML = get_viewed_items_html('');    
		$('.widget .widget-last-view').html($strHTML);  
	})
</script> 
							
							
						</div>
						
						<div class="col-md-4 norightpadding" style="margin-top: 30px;">
							




<script>
	
</script>
						</div>
						

						

					</form>
				</div>
			</div>
		</div>
	</div>
	
	 
</section>
@endsection