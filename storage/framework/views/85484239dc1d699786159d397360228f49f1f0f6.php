<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo e(ucwords($e['module'])); ?>

        
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('backend.home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo e(ucwords($e['module'])); ?></li>
        
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
				  	<h3 class="box-title"><?php echo e(ucwords($e['module'])); ?></h3>
				  	
				</div><!-- /.box-header -->
				<!-- form start -->
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<div class="box-body">
						<div class="form-group">
						  <label>Title</label>
						  <input type="text" class="form-control" name="title" placeholder="Nhập title" value="<?php if(isset($data)): ?><?php echo e($data->title); ?><?php endif; ?>">
						</div>

						<div class="form-group">
						  <label>Description</label>
						  <textarea class="form-control" name="description" placeholder="Nhập Description"><?php if(isset($data)): ?><?php echo e($data->description); ?><?php endif; ?></textarea>
						</div>

						<div class="form-group">
						  <label>Keywords</label>
						  <input type="text" class="form-control" name="keywords" placeholder="Nhập Keywords" value="<?php if(isset($data)): ?><?php echo e($data->keywords); ?><?php endif; ?>">
						</div>
						
						
					</div><!-- /.box-body -->

					<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="save" value="Lưu">
						
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>