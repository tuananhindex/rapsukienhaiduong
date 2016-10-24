@extends('backend.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ ucwords($e['module']) }}
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('backend.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo route($e['route'].'.list.get') ?>">{{ ucwords($e['module']) }}</a></li>
       	<li class="active">{{ ucwords($e['action']) }}</li>
        
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			@if(Session::has('alert'))
				{!! Session::get('alert') !!}
			@endif
			<div class="box box-primary">
				<div class="box-header with-border">
				  	<h3 class="box-title">{{ ucwords($e['action']) }}</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="box-body">
						<div class="form-group">
						  <label>Tên</label>
						  <input type="text" class="form-control" name="name" placeholder="Nhập tên" required="">
						</div>
						<div class="form-group">
						  <label>Đường Dẫn Ảo</label>
						  <input type="text" class="form-control" name="alias" placeholder="Nhập đường dẫn ảo" required="">
						</div>
						<div class="form-group">
						  <label>Ảnh đại diện</label>
						  <input type="file" name="image">
						</div>
						<div class="form-group">
						  	<label>Thành Phần Cha</label>
						  	<select class="form-control" name="fk_parentid">
								<option value="0">Không</option>
								{!! $MultiLevelSelect !!}
							</select>
						</div>
						<div class="form-group">
						  	<label>Trỏ đến</label>
						  	<select class="form-control cursor" name="cursor">
						  		<option value="">Không</option>
						  		<option value="posts">Bài viết</option>
						  		<option value="posts_category">Danh mục bài viết</option>
						  		<option value="product">Sản phẩm</option>
						  		<option value="product_category">Danh mục sản phẩm</option>
						  	</select>
						</div>
						<div class="data-cursor">
							
						</div>
						<div class="form-group">
						  <label>Thứ Tự</label>
						  <input type="number" class="form-control" name="order" placeholder="Hiển thị theo thứ tự từ lớn đến bé" >
						</div>
						<div class="form-group">
							<label>Hiển thị ở menu header</label>
							<select class="form-control" name="menu_header">
								<option value="0">Không</option>
								<option value="1">Có</option>
								
							</select>
						</div>
						<div class="form-group">
							<label>Hiển thị ở menu footer</label>
							<select class="form-control" name="menu_footer">
								<option value="0">Không</option>
								<option value="1">Có</option>
								
							</select>
						</div>
						<div class="form-group">
						  <label>Mô tả</label>
						  <textarea class="form-control" name="description" id="description"></textarea>
						</div>
						
						
						<div class="form-group">
						  <label>Meta Title</label>
						  <input type="text" class="form-control" name="meta_title">
						</div>
						<div class="form-group">
						  <label>Meta Description</label>
						  <textarea class="form-control" name="meta_description"></textarea>
						</div>
						<div class="form-group">
						  <label>Meta Keywords</label>
						  <input type="text" class="form-control" name="meta_keywords" placeholder="eg : abc,xyz,qwe,...">
						</div>
						<div class="form-group">
							<label>Trạng Thái</label>
							<select class="form-control" name="status">
								<option value="1">Hiển Thị</option>
								<option value="0">Không Hiển Thị</option>
							</select>
						</div>
						
					</div><!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="save" value="Lưu">
						<input type="submit" class="btn btn-success" name="save&add" value="Lưu & Thêm Mới">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
@endsection