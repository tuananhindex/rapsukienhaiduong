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
				  	<a href="<?php echo route($e['route'].'.add.get') ?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Thêm Mới</a>
				  	<button type="button" class="btn btn-success pull-right btn-add-lang" style="margin-right:5px"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Thêm Đặc Tính</button>
				</div><!-- /.box-header -->
				<!-- form start -->
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<div class="box-body">
						<div class="form-group">
							<label>Hàng Tồn</label><br>
							<label class="radio-inline"><input type="radio" name="isRest" value="1" <?php if($index->isRest == 1): ?> checked <?php endif; ?>>Có</label>
							<label class="radio-inline"><input type="radio" name="isRest" value="0" <?php if($index->isRest == 0): ?> checked <?php endif; ?>>Không</label>
						</div>
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
						  <input type="file" name="image[]" multiple="">
						</div>
						
						<?php if(isset($images) && count($images) > 0): ?>
						<div class="row">
							<?php foreach($images as $val): ?>
							<div class="col-xs-6 col-sm-4 col-sm-3 col-lg-2" style="display: block;">
								<input <?php if($val->isMain == 1): ?> checked <?php endif; ?> type="radio" name="pk_img" value="<?php echo e($val->id); ?>">
								<a href="<?php echo e(route('backend.product.product.delete_img',$val->id)); ?>" class="delete_img"><img style="margin-right: 10px" src="<?php echo e(asset($val->image)); ?>" width="100%"></a>

							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
						<div class="form-group">
						  	<label>Danh Mục</label>
						  	<select class="form-control" name="fk_catid">
								<option value="0">Không</option>
								<?php echo $MultiLevelSelect; ?>

							</select>
						</div>
						<div class="form-group">
						  <label>Giá</label>
						  <input type="number" class="form-control" name="price" value="<?php echo e($index->price); ?>" placeholder="Nhập giá tiền">
						</div>
						<div class="form-group">
						  <label>Khuyến mãi (%)</label>
						  <input type="number" class="form-control" name="promotion" value="<?php echo e($index->promotion); ?>" placeholder="Nhập khuyến mãi">
						</div>
						<div class="form-group">
						  <label>Thứ Tự</label>
						  <input type="number" class="form-control" name="order" value="<?php echo e($index->order); ?>" placeholder="Hiển thị theo thứ tự từ lớn đến bé" >
						</div>
						<div class="form-group">
						  <label>Mô tả</label>
						  <textarea class="form-control" name="description" id="description"><?php echo e($index->description); ?></textarea>
						  
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
	<form id="myModal" class="modal fade" role="dialog">
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
				<h3 class="box-title">Thêm đặc tính</h3>
			</div>
			<div class="box-body">
				<input type="hidden" name="fk_productid" value="<?php echo e($index->id); ?>">
				<div class="form-group">
				  <label>Màu</label>
				  <select name="fk_colorid">
				  	<option value="0">Chọn màu</option>
				  	<?php foreach($colors as $val): ?>
				  	<option value="<?php echo e($val->id); ?>"><?php echo e(ucfirst($val->name)); ?></option>
				  	<?php endforeach; ?>
				  </select>
				</div>
				<img src="" id="rs_img" width="100">
				<input type="file" accept="image/*" name="attr_image">
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success pull-right save-attr">Lưu</button>
				<img width="20" style="margin: 5px 10px 0 0 ; display: none" class="pull-right" src="<?php echo e(asset('assets/admin/img/loading.gif')); ?>" id="loading">

			</div>
			<!-- /.box-body -->
		</div>

	    </div>

	  </div>
	</form>
</section>
<script type="text/javascript">
	$('a.delete_img').click(function(){
		if(!window.confirm('Thao tác này không thể khôi phục . Bạn có thực sự muốn xóa ?')){ 
	        return false;
	    }
	});
	
	$('input[name="pk_img"]').click(function(){
		var val = $(this).val();
		window.location.href = '<?php echo e(route("backend.product.product.pk_img",'')); ?>/'+val;
	});
	
	$("form#myModal").on('submit',(function(e) {
		e.preventDefault();
		$('#loading').show();
		$.ajax({
			url: "<?php echo e(route('add_attr_product')); ?>", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData($(this)), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			success: function(data)   // A function to be called if request succeeds
			{
				$('#loading').hide();
				alert(data);
			},
			error: function()
			{
				alert('ajax ko thành công');
			}
		}).always(function(){

            $('#loading').hide();

        });
	}));
</script>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>