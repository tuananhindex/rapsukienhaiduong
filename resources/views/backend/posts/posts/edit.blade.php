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
				  	<div class="col-xs-5 pull-right">
				  		<a href="<?php echo route($e['route'].'.add.get') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Thêm Mới</a>
					  	<button type="button" class="btn btn-success pull-right btn-add-lang" style="margin-right:5px"  data-toggle="modal" data-target="#form-add-lang"><i class="fa fa-plus"></i> Thêm Ngôn Ngữ</button>
					  	@if($index->status == 1)
					  	<a href="<?php echo route($e['frontend_route'],$index->alias) ?>" target="_blank" class="btn btn-warning pull-right" style="margin-right:5px"><i class="fa fa-eye"></i> Xem</a>
					  	@endif
					  	
				  	</div>
				  	
				</div><!-- /.box-header -->
				<!-- form start -->
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="box-body">
						<div class="form-group">
							<label>Ngôn ngữ</label>
							<?php 

						  		$lang = !empty(Route::current()->getParameter('lang')) ? Route::current()->getParameter('lang') : $df_lang->id ;
						  		
						  	?>
						  	<select class="form-control filter_language">
		                        @foreach($languages2 as $val)
		                        <option value="{{ $val->id }}" @if($val->id == $lang) selected @endif>{{ ucfirst($val->name) }} @if($val->id == $df_lang->id) - Default @endif</option>
		                        @endforeach
		                     </select>
						</div>
						<div class="form-group">
						  <label>Tên</label>
						  <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="{{ $index->name }}" required="">
						</div>
						<div class="form-group">
						  <label>Đường Dẫn Ảo</label>
						  <input type="text" class="form-control" name="alias" placeholder="Nhập đường dẫn ảo" value="{{ $index->alias }}" required="">
						</div>
						<div class="form-group">
						  <label>Ảnh đại diện</label>
						  <input type="file" name="image">
						</div>
						<div class="form-group">
							<img src="{{ asset($index->image) }}" width="200">
						</div>
						<div class="form-group">
						  	<label>Danh Mục</label>
						  	<select class="form-control" name="fk_catid">
								<option value="0">Không</option>
								{!! $MultiLevelSelect !!}
							</select>
						</div>
						
						<div class="form-group">
						  <label>Thứ Tự</label>
						  <input type="number" class="form-control" name="order" value="{{ $index->order }}" placeholder="Hiển thị theo thứ tự từ lớn đến bé" >
						</div>
						<div class="form-group">
						  <label>
						  	<input type="checkbox" name="IsCustomer" value="1" @if($index->IsCustomer == 1) checked @endif> Hiển thị ở trang chủ
						  </label>
						  
						</div>
						<div class="form-group">
						  <label>Mô tả</label>
						  <textarea class="form-control" name="description" id="description">{{ $index->description }}</textarea>
						  
						</div>

						@if(count($posts) > 0)
						<div class="form-group">
						  	<label>Chèn bài viết vào nội dung</label>
						  	<select class="add_posts form-control">
						  		@foreach($posts as $val)
						  			<option value="{{ route('posts',$val->alias) }}hihihihi{{ ucfirst($val->name) }}">{{ ucfirst($val->name) }}</option>
						  		@endforeach
							</select>
							<input class="btn btn-primary btn-sm btn-add-link" style="margin: 5px 0" value="Chèn Link">
						@endif  
						</div>
						
						<div class="form-group">
						  <label>Nội dung</label>
						  <textarea class="form-control" name="content">{{ $index->content }}</textarea>
						  <script type="text/javascript">ckeditor('content')</script>
						</div>
						
						<div class="form-group">
						  <label>Meta Title</label>
						  <input type="text" class="form-control" name="meta_title" value="{{ $index->meta_title }}">
						</div>
						<div class="form-group">
						  <label>Meta Description</label>
						  <textarea class="form-control" name="meta_description">{{ $index->meta_description }}</textarea>
						</div>
						<div class="form-group">
						  <label>Meta Keywords</label>
						  <input type="text" class="form-control" name="meta_keywords" placeholder="eg : abc,xyz,qwe,..." value="{{ $index->meta_keywords }}">
						</div>
						<div class="form-group">
							<label>Tags</label>
							<select data-placeholder="Tags" multiple class="form-control chosen-select" tabindex="8" name="tags[]">
								@if(isset($tags) && count($tags) > 0)
								<?php
									$tags_arr = explode(',', $index->tags);
								?>
								@foreach($tags as $val)
					            <option value="{{ $val->alias }}" @if(in_array($val->alias,$tags_arr)) selected @endif>{{ $val->name }}</option>
					            @endforeach
					            @endif
		                    </select>
	                    </div>
						<div class="form-group">
							<label>Trạng Thái</label>
							<select class="form-control" name="status">
								@if($index->status == 1)
								<option value="1">Hiển Thị</option>
								<option value="0">Không Hiển Thị</option>
								@else
								<option value="0">Không Hiển Thị</option>
								<option value="1">Hiển Thị</option>
								@endif
							</select>
						</div>
						
					</div><!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="save" value="Lưu">
						<input type="submit" class="btn btn-success" name="save&add" value="Lưu & Trở về trang danh sách">

					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- popup -->
<!-- Modal -->
@if(isset($languages) && count($languages) > 0)
<div id="form-add-lang" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <style type="text/css">
  	.chosen-container{
  		width: 100% !important;
  	}
  </style>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="box box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Thêm ngôn ngữ</h3>
		</div>
		<div class="box-body">
			<input type="hidden" name="table" value="{{ $e['table'] }}">
			<input type="hidden" name="id" value="{{ $index->id }}">
			<input type="hidden" name="fk_commonid" value="{{ $index->fk_commonid }}">
			<div class="form-group">
			  <label>Tên</label>
			  <input type="text" class="form-control" name="lang_name" placeholder="Nhập tên"  required="">
			</div>

			<div class="form-group">
			  <label>Ngôn ngữ</label>
			  <select class="form-control" name="language" class="language">
                @foreach($languages as $val)
                <option value="{{ $val->id }}">{{ ucfirst($val->name) }}</option>
                @endforeach
              </select>
			</div>
			<div class="form-group">
			  <label>Mô tả</label>
			  <textarea class="form-control" name="lang_description" id="lang_description"></textarea>
			  
			</div>

			@if(isset($posts_lang) && count($posts_lang) > 0)
			@if(count($posts_lang) > 0)
			<div class="form-group">
			  	<label>Chèn bài viết vào nội dung</label>
			  	<select class="add_posts-lang form-control">
			  		@foreach($posts_lang as $val)
			  			<option value="{{ route('posts',$val->alias) }}hihihihi{{ ucfirst($val->name) }}">{{ ucfirst($val->name) }}</option>
			  		@endforeach
				</select>
				<input class="btn btn-primary btn-sm btn-add-link-lang" style="margin: 5px 0" value="Chèn Link">
			</div>
			@endif  
			@endif
			
			
			<div class="form-group">
			  <label>Nội dung</label>
			  <textarea class="form-control" name="lang_content" id="lang_content"></textarea>
			  <script type="text/javascript">ckeditor('lang_content')</script>
			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-success pull-right save-lang">Lưu</button>
			<img width="20" style="margin: 5px 10px 0 0 ; display: none" class="pull-right" src="{{ asset('assets/admin/img/loading.gif') }}" id="loadding">

		</div>
		<!-- /.box-body -->
	</div>

    </div>

  </div>
</div>
@else
<script type="text/javascript">
	$('.btn-add-lang').click(function(){
		alert('Bạn đã thêm đầy đủ các ngôn ngữ');
	});
</script>
@endif
<script type="text/javascript">
	$('select.filter_language').change(function(){
	      var val = $(this).val();
	      location.href = '{{ route(Route::currentRouteName(),'') }}/'+'{{ $index->id }}/'+val;
  	});

	$('.btn-add-link-lang').click(function(){
	    var value = $('select.add_posts-lang').val();
	    var res = value.split("hihihihi");
	    var arr = res[0].split('/');
	    var href = '/'+arr[3]+'/'+arr[4];
	    CKEDITOR.instances.lang_content.insertHtml('<a href=\x22' + href + '\x22>'+ res[1] +'</a>');

	});
	
	var ajax_sendding = false;

    $(".save-lang").click(function(e){
        if (ajax_sendding == true){

            return false;

        }
		ajax_sendding = true;

        // Bật span loaddding lên

        $('#loadding').show();

        $.ajax({

            type: "POST",

            url: "{{ route('add_lang') }}",

            data: { 
            		_token : $('input[name="_token"]').val(),

            		table : $('input[name="table"]').val(),

            		id : $('input[name="id"]').val(),

            		fk_commonid : $('input[name="fk_commonid"]').val(),

                    name : $('input[name="lang_name"]').val(),

                    language : $('select[name="language"]').val() , 

                    description : $('textarea[name="lang_description"]').val() , 

                    content : CKEDITOR.instances.lang_content.getData()

                },

            success:function(x)

            {
            	var obj = JSON.parse(x);
            	if(obj.status == 'success'){
            		alert(obj.message);
            		$('#form-add-lang').modal('hide');
            		location.reload(); 
            	}else{
            		alert(obj.message);
            	}
                
			},
            error:function()
            {
                alert('Thêm ngôn ngữ không thành công');
            }

        }).always(function(){

            ajax_sendding = false;

            $('#loadding').hide();

        });

    });

</script>
<!-- popup end -->
</section>


<!-- /.content -->
@endsection