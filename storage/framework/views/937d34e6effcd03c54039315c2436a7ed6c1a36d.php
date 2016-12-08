<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo e(ucwords($e['module'])); ?>

        
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('backend.home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo route($e['route'].'.list.get') ?>"><?php echo e(ucwords($e['module'])); ?></a></li>
       	<li class="active"><?php echo e(ucwords($e['action'])); ?></li>
        
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<?php if(Session::has('alert')): ?>
				<?php echo Session::get('alert'); ?>

			<?php endif; ?>
			<div class="box box-primary">
				<div class="box-header with-border">
				  	<h3 class="box-title"><?php echo e(ucwords($e['action'])); ?></h3>
				  	<div class="col-xs-5 pull-right">
				  		<a href="<?php echo route($e['route'].'.add.get') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Thêm Mới</a>
					  	<button type="button" class="btn btn-success pull-right" style="margin-right:5px"  data-toggle="modal" data-target="#form-add-lang"><i class="fa fa-plus"></i> Thêm Ngôn Ngữ</button>
					  	<?php if($index->status == 1): ?>
					  	<a href="<?php echo route($e['frontend_route'],$index->alias) ?>" target="_blank" class="btn btn-warning pull-right" style="margin-right:5px"><i class="fa fa-eye"></i> Xem</a>
					  	<?php endif; ?>

				  	</div>
				  	
				</div><!-- /.box-header -->
				<!-- form start -->
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<div class="box-body">
						<div class="form-group">
						  <label>Tên</label>
						  <input type="text" class="form-control" name="name" placeholder="Nhập tên" value="<?php echo e($index->name); ?>" required="">
						</div>
						<div class="form-group">
						  <label>Đường Dẫn Ảo</label>
						  <input type="text" class="form-control" name="alias" placeholder="Nhập đường dẫn ảo" value="<?php echo e($index->alias); ?>" required="">
						</div>
						<div class="form-group">
						  <label>Ảnh đại diện</label>
						  <input type="file" name="image">
						</div>
						<div class="form-group">
							<img src="<?php echo e(asset($index->image)); ?>" width="200">
						</div>
						<div class="form-group">
						  	<label>Danh Mục</label>
						  	<select class="form-control" name="fk_catid">
								<option value="0">Không</option>
								<?php echo $MultiLevelSelect; ?>

							</select>
						</div>
						
						<div class="form-group">
						  <label>Thứ Tự</label>
						  <input type="number" class="form-control" name="order" value="<?php echo e($index->order); ?>" placeholder="Hiển thị theo thứ tự từ lớn đến bé" >
						</div>
						<div class="form-group">
						  <label>
						  	<input type="checkbox" name="IsCustomer" value="1" <?php if($index->IsCustomer == 1): ?> checked <?php endif; ?>> Hiển thị ở trang chủ
						  </label>
						  
						</div>
						<div class="form-group">
						  <label>Mô tả</label>
						  <textarea class="form-control" name="description" id="description"><?php echo e($index->description); ?></textarea>
						  
						</div>

						<?php if(count($posts) > 0): ?>
						<div class="form-group">
						  	<label>Chèn bài viết vào nội dung</label>
						  	<select class="add_posts form-control">
						  		<?php foreach($posts as $val): ?>
						  			<option value="<?php echo e(route('posts',$val->alias)); ?>hihihihi<?php echo e(ucfirst($val->name)); ?>"><?php echo e(ucfirst($val->name)); ?></option>
						  		<?php endforeach; ?>
							</select>
							<input class="btn btn-primary btn-sm btn-add-link" style="margin: 5px 0" value="Chèn Link">
						<?php endif; ?>  
						</div>
						
						<div class="form-group">
						  <label>Nội dung</label>
						  <textarea class="form-control" name="content"><?php echo e($index->content); ?></textarea>
						  <script type="text/javascript">ckeditor('content')</script>
						</div>
						
						<div class="form-group">
						  <label>Meta Title</label>
						  <input type="text" class="form-control" name="meta_title" value="<?php echo e($index->meta_title); ?>">
						</div>
						<div class="form-group">
						  <label>Meta Description</label>
						  <textarea class="form-control" name="meta_description"><?php echo e($index->meta_description); ?></textarea>
						</div>
						<div class="form-group">
						  <label>Meta Keywords</label>
						  <input type="text" class="form-control" name="meta_keywords" placeholder="eg : abc,xyz,qwe,..." value="<?php echo e($index->meta_keywords); ?>">
						</div>
						<div class="form-group">
							<label>Tags</label>
							<select data-placeholder="Tags" multiple class="form-control chosen-select" tabindex="8" name="tags[]">
								<?php if(isset($tags) && count($tags) > 0): ?>
								<?php
									$tags_arr = explode(',', $index->tags);
								?>
								<?php foreach($tags as $val): ?>
					            <option value="<?php echo e($val->alias); ?>" <?php if(in_array($val->alias,$tags_arr)): ?> selected <?php endif; ?>><?php echo e($val->name); ?></option>
					            <?php endforeach; ?>
					            <?php endif; ?>
		                    </select>
	                    </div>
						<div class="form-group">
							<label>Trạng Thái</label>
							<select class="form-control" name="status">
								<?php if($index->status == 1): ?>
								<option value="1">Hiển Thị</option>
								<option value="0">Không Hiển Thị</option>
								<?php else: ?>
								<option value="0">Không Hiển Thị</option>
								<option value="1">Hiển Thị</option>
								<?php endif; ?>
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
			<input type="hidden" name="table" value="<?php echo e($e['table']); ?>">
			<div class="form-group">
			  <label>Tên</label>
			  <input type="text" class="form-control" name="lang_name" placeholder="Nhập tên"  required="">
			</div>
			<div class="form-group">
			  <label>Ngôn ngữ</label>
			  <select class="form-control" name="language" class="language">
                <?php foreach($languages as $val): ?>
                <option value="<?php echo e($val->id); ?>"><?php echo e(ucfirst($val->name)); ?></option>
                <?php endforeach; ?>
              </select>
			</div>
			<div class="form-group">
			  <label>Mô tả</label>
			  <textarea class="form-control" name="lang_description" id="lang_description"></textarea>
			  
			</div>

			<?php if(count($posts_lang) > 0): ?>
			<div class="form-group">
			  	<label>Chèn bài viết vào nội dung</label>
			  	<select class="add_posts-lang form-control">
			  		<?php foreach($posts_lang as $val): ?>
			  			<option value="<?php echo e(route('posts',$val->alias)); ?>hihihihi<?php echo e(ucfirst($val->name)); ?>"><?php echo e(ucfirst($val->name)); ?></option>
			  		<?php endforeach; ?>
				</select>
				<input class="btn btn-primary btn-sm btn-add-link-lang" style="margin: 5px 0" value="Chèn Link">
			</div>
			<?php endif; ?>  
			
			
			<div class="form-group">
			  <label>Nội dung</label>
			  <textarea class="form-control" name="lang_content"></textarea>
			  <script type="text/javascript">ckeditor('lang_content')</script>
			</div>
		</div>
		<div class="box-footer">
			<button type="button" class="btn btn-success pull-right save-lang">Lưu</button>
			<img width="20" style="margin: 5px 10px 0 0 ; display: none" class="pull-right" src="<?php echo e(asset('assets/admin/img/loading.gif')); ?>" id="loadding">

		</div>
		<!-- /.box-body -->
	</div>

    </div>

  </div>
</div>
<script type="text/javascript">
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

            type: "GET",

            url: "<?php echo e(route('add_lang')); ?>",

            data: { 
            		table : $('input[name="table"]').val(),

                    name : $('input[name="lang_name"]').val(),

                    language : $('select[name="language"]').val() , 

                    description : $('textarea[name="lang_description"]').val() , 

                    content : $('textarea[name="lang_content"]').val() , 

                },

            success:function(x)

            {
            	var obj = JSON.parse(x);
            	if(obj.status == 'success'){
            		alert('Thêm ngôn ngữ thành công');
            		$('#form-add-lang').hide();
            	}else{
            		alert(obj.message);
            	}
                
			},
            error:function()
            {
                alert('Gửi ngôn ngữ không thành công');
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>