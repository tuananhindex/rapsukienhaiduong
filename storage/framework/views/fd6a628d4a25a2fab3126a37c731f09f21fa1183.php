<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo e(ucwords($e['module'])); ?>

        
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('backend.home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo route($e['route']) ?>"><?php echo e(ucwords($e['module'])); ?></a></li>
    </ol>

</section>
<section class="content">
	<?php if(Session::has('alert')): ?>
		<?php echo Session::get('alert'); ?>

	<?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>