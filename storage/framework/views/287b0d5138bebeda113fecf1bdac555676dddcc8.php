<?php if(isset($data) && count($data > 0)): ?>
<section class="box-category">
    <div class="heading">
        <?php echo e($title); ?>             
    </div>
    <div class="main">
        <ul class="list-post-latest list_post">
            
            <?php foreach($data as $val): ?>
            <li>
                <a href="<?php echo e(route('posts',$val->alias)); ?>" title="<?php echo e($val->name); ?>">
                    <div class="img-overflow">  
                        <img src="<?php echo e(asset($val->image)); ?>" alt="<?php echo e($val->name); ?>"/>
                    </div>
                    <p><?php echo e(ucfirst($val->name)); ?></p>
                    <span> <i class="fa fa-clock-o"></i> <?php echo e(Helper::time_stamp(strtotime($val->create_at))); ?></span>
                </a>
            </li>
            <?php endforeach; ?>
            
        </ul>
    </div>
</section>
<?php endif; ?>