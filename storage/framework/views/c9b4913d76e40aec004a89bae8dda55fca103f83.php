<?php if(isset($data) && count($data > 0)): ?>
<section class="box-category">
    <div class="heading"><span>Hỗ trợ trực tuyến</span></div>
    <div class="support-html">
        <ul>
            <?php foreach($data as $val): ?>
            <li>
                <p><?php echo e($val->name); ?> - <span><?php echo e($val->phone); ?></span> </p>
                <?php if($val->active == 1): ?>
                <img alt="" src="<?php echo e(asset('assets/frontend/img/skype.png')); ?>" style="width: 99px; height: 17px;" />
                <?php else: ?>
                <p style="color:#f00">Offline</p>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>