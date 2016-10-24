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
						  <label>Tên tài khoản</label>
						  <input type="text" class="form-control" name="username" placeholder="Nhập tên tài khoản" required="">
						</div>
						<div class="form-group">
						  <label>Mật khẩu</label>
						  <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required="">
						</div>
						<div class="form-group">
						  <label>Xác nhận mật khẩu</label>
						  <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu" required="">
						</div>
						<div class="form-group">
						  <label>Quyền</label>
						  <select class="form-control" name="role">
						  	<option value="manager">Quản lý nội dung</option>
						  	<option value="admin">Admin</option>
						  	
						  </select>
						</div>
						<div class="form-group">
						  <label>
						  	<input type="checkbox" name="support_online" value="1"> Hỗ trợ trực tuyến
						  </label>
						  
						</div>
						<div class="form-group">
						  <label>Số điện thoại</label>
						  <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" required="">
						</div>
						<div class="form-group">
						  <label>Ảnh đại diện</label>
						  <input type="file" name="image">
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