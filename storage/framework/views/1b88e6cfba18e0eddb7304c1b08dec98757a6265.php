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
						  	<label>Thành Phần Cha</label>
						  	<select class="form-control" name="fk_parentid">
								<option value="0">Không</option>
								<?php echo $MultiLevelSelect; ?>

							</select>
						</div>
						<div class="form-group">
						  	<label>Trỏ đến</label>
						  	<select class="form-control cursor" name="cursor">
						  		<option value="">Không</option>
						  		<option value="posts" <?php if($index->cursor == 'posts'): ?> selected <?php endif; ?>>Bài viết</option>
						  		<option value="posts_category" <?php if($index->cursor == 'posts_category'): ?> selected <?php endif; ?>>Danh mục bài viết</option>
						  		<option value="product" <?php if($index->cursor == 'product'): ?> selected <?php endif; ?>>Sản phẩm</option>
						  		<option value="product_category" <?php if($index->cursor == 'product_category'): ?> selected <?php endif; ?>>Danh mục sản phẩm</option>
						  	</select>
						</div>
						<div class="data-cursor">
							<?php if($data_cursor): ?>
							<div class="form-group">
							  	<label>Đối tượng trỏ đến</label>
							  	<select class="form-control" name="cursor_id">
							  		<?php foreach($data_cursor as $val): ?>
							  			<option value="<?php echo e($val->alias); ?>" <?php if($index->cursor_id == $val->alias): ?> selected <?php endif; ?>><?php echo e(ucfirst($val->name)); ?></option>
							  		<?php endforeach; ?>
							  	</select>
							</div>
							<?php endif; ?>
						</div>
						<div class="form-group">
						  <label>Thứ Tự</label>
						  <input type="number" class="form-control" name="order" placeholder="Hiển thị theo thứ tự từ lớn đến bé" value="<?php echo e($index->order); ?>" >
						</div>
						<div class="form-group">
							<label>Hiển thị ở menu header</label>
							<select class="form-control" name="menu_header">
								<?php if($index->menu_header == 1): ?>
								<option value="1">Có</option>
								<option value="0">Không</option>
								<?php else: ?>
								<option value="0">Không</option>
								<option value="1">Có</option>
								<?php endif; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Hiển thị ở menu footer</label>
							<select class="form-control" name="menu_footer">
								<?php if($index->menu_footer == 1): ?>
								<option value="1">Có</option>
								<option value="0">Không</option>
								<?php else: ?>
								<option value="0">Không</option>
								<option value="1">Có</option>
								<?php endif; ?>
							</select>
						</div>
						
						<div class="form-group">
						  <label>Mô tả</label>
						  <textarea class="form-control" name="description" id="description"><?php echo $index->description; ?></textarea>
						  
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
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>