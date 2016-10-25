<div class="box-header">
  <h3 class="box-title"><?php echo e(ucwords($e['action'])); ?></h3>
  <?php if(Route::current()->getParameter('key')): ?>( Kết quả tìm kiếm với từ khóa <a href="javascript:void(0)"><?php echo e(Route::current()->getParameter('key')); ?></a> ) <?php endif; ?>
  <div class="box-tools">
  
    <div class="input-group pull-right" style="width: 150px;">
      <input type="text" name="search" value="<?php if(Route::current()->getParameter('key')): ?><?php echo e(Route::current()->getParameter('key')); ?><?php endif; ?>" class="form-control input-sm pull-right" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
      </div>
    </div>

    <a style="margin-right:10px" href="<?php echo route($e['route'].'.add.get') ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Thêm Mới</a>

    <button type="submit" name="hide" value="Ẩn" class="btn btn-danger pull-right btn-sm" style="margin-right:10px" >Ẩn</button>

    <button type="submit" name="show" value="Hiện" class="btn btn-success pull-right btn-sm" style="margin-right:10px" >Hiện</button>

  </div>
  
</div>