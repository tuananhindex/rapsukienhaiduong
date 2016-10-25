<section class="footer-link">
    <ul>
    	<li><a href="<?php echo e(route('home')); ?>"> Trang chủ</a></li>
        <?php if(count($data) > 0): ?>
        <?php foreach($data as $val): ?>
        <li><a href="<?php echo e(asset('menu',$val->alias)); ?>" title=""><?php echo e($val->name); ?></a></li>
        <?php endforeach; ?>
        <?php endif; ?>
        <li><a href="<?php echo e(route('img.lib')); ?>"  >Thư viện ảnh</a></li>
        <li><a href="<?php echo e(route('contact')); ?>"> Liên hệ</a></li>
    </ul>
    
</section>