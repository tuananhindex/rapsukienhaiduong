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
            <form method="post" action="<?php echo route($e['route'].'.list.post') ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="box">
                <?php echo $__env->make('backend.widget.list_box_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="min-height:250px;">
                  <div class="form-inline">
                      <label style="margin:0 5px 0 12px;">Danh Mục</label>
                      <select class="form-control filter_cat">
                        <option value="0">Không</option>
                        <?php echo $MultiLevelSelect; ?>

                      </select>

                      <label style="margin:0 5px 0 12px;">Ngôn Ngữ</label>
                      <select class="form-control filter_language">
                        <?php foreach($languages as $val): ?>
                        <option value="<?php echo e($val->id); ?>"><?php echo e(ucfirst($val->name)); ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>

                  <table class="table table-hover">
                    <tbody>
                    <tr>
                      <th><input type="checkbox" class="check_box_all"></th>
                      <th>Ảnh</th>
                      <th>Tên</th>
                      <th>Ngày tạo</th>
                      <th>Cập nhật gần nhất</th>
                      <th>Trạng thái</th>
                      <th colspan="2">Chức năng</th>
                    </tr>
                    <?php foreach($data as $val): ?>
                    <tr>
                      <td><input type="checkbox" class="check_box" name="id[]" value="<?php echo e($val->id); ?>"></td>
                      <td><?php if(file_exists($val->image)): ?> <img src="<?php echo e(asset($val->image)); ?>" width="100"> <?php endif; ?></td>
                      <td><a href="<?php echo route($e['route'].'.edit.get',$val->id) ?>"><?php echo e(ucfirst($val->name)); ?></a></td>
                      <td><?php echo e(date('h:i d/m/Y',strtotime($val->create_at))); ?></td>
                      <td><?php if(!empty($val->update_at)): ?><?php echo e(date('h:i d/m/Y',strtotime($val->update_at))); ?><?php else: ?> Chưa có cập nhật <?php endif; ?></td>
                      <td>
                        <?php if($val->status == 1): ?>
                            <span class="label label-success">Hiển Thị</span>
                        <?php else: ?>
                            <span class="label label-danger">Không Hiển Thị</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?php echo route($e['route'].'.edit.get',$val->id) ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                      </td>
                      <td>
                        <a href="<?php echo route($e['route'].'.delete',$val->id) ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                 
                </div><!-- /.box-body -->
            </div>
            <div class="pull-right">
                <?php echo $data->render(); ?>

            </div>
            
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
  $('select.filter_cat').change(function(){
      var val = $(this).val();
      if(val == 0){
        location.href = '<?php echo e(route(Route::currentRouteName())); ?>';
      }else{
        location.href = '<?php echo e(route(Route::currentRouteName())); ?>?cat_id='+$(this).val();
      }
      
  });
</script>
<!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>