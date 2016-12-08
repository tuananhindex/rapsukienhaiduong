<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo e(ucwords($e['module'])); ?>

        
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('backend.home')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:void(0)"><?php echo e(ucwords($e['module'])); ?></a></li>
    </ol>
</section>
<!-- Main content -->

<section class="content">
  <div class="row">
  	<div class="col-md-12">
  	<?php if(Session::has('alert')): ?>
		<?php echo Session::get('alert'); ?>

	<?php endif; ?>
	</div>
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="<?php echo e(asset($acc->image)); ?>" alt="User profile picture">
          <h3 class="profile-username text-center"><?php echo e($acc->name); ?></h3>
          
          <!-- <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Followers</b> <a class="pull-right">1,322</a>
            </li>
            <li class="list-group-item">
              <b>Following</b> <a class="pull-right">543</a>
            </li>
            <li class="list-group-item">
              <b>Friends</b> <a class="pull-right">13,287</a>
            </li>
          </ul> -->

          
          <form method="post" id="form-change-img" action="<?php echo e(route('backend.profile.change_img')); ?>" enctype="multipart/form-data">
          	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
          	<input type="hidden" name="id" value="<?php echo e($acc->id); ?>" >
          	<input type="file" name="image" class="input-change-image" style="display:none">
          	<button href="javascript:void(0)" class="btn btn-primary btn-block btn-change-image"><b>Đổi Ảnh Đại Diện</b></button>
          </form>
          <script type="text/javascript">
          	$('.btn-change-image').click(function(e){
          		e.preventDefault();
          		$('.input-change-image').click();
          		$('.input-change-image').change(function(){
          			$('#form-change-img').submit();
          		});

          	});
          </script>

        </div><!-- /.box-body -->
      </div><!-- /.box -->

      
    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
        	<li class="active"><a href="#settings" data-toggle="tab">Thông tin tài khoản</a></li>
          	<li><a href="#activity" data-toggle="tab">Đổi mật khẩu</a></li>
          
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="activity">
          	<form class="form-horizontal" method="post" action="<?php echo e(route('backend.profile.change_pw')); ?>">
          	  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type="hidden" name="id" value="<?php echo e($acc->id); ?>" >
              <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">Mật khẩu hiện tại</label>
                <div class="col-sm-9">
                  <input type="password" name="password_old" class="form-control" id="inputName" placeholder="Mật khẩu hiện tại">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">Mật khẩu mới</label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" id="inputName" placeholder="Mật khẩu mới">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">Xác nhận</label>
                <div class="col-sm-9">
                  <input type="password" name="password_confirmation" class="form-control" id="inputName" placeholder="Xác nhận">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </div>
            </form>
          </div><!-- /.tab-pane -->
          
          <div class="active tab-pane" id="settings">
            <form class="form-horizontal" method="post" action="<?php echo e(route('backend.profile.edit')); ?>">
              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <input type="hidden" name="id" value="<?php echo e($acc->id); ?>" >
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Tên tài khoản</label>
                <div class="col-sm-10">
                  <input type="text" name="username" disabled="" value="<?php echo e($acc->username); ?>" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>	
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Tên</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="<?php echo e($acc->name); ?>" class="form-control" id="inputName" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" value="<?php echo e($acc->email); ?>" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Số điện thoại</label>
                <div class="col-sm-10">
                  <input type="text" name="phone" value="<?php echo e($acc->phone); ?>" class="form-control" id="inputName" placeholder="Số điện thoại">
                </div>
              </div>
              <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Giới thiệu bản thân</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="description" id="inputExperience" placeholder="Giới thiệu bản thân"><?php echo e($acc->description); ?></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
              </div>
            </form>
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section>
        
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>