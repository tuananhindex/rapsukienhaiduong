<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.home')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.home')); ?>"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a></li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.account')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-user"></i> Quản lý tài khoản <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.account.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.account.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.account.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.account.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.language')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-language"></i> Ngôn Ngữ <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.language.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.language.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.language.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.language.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Module Sản Phẩm</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product.category')) > 0): ?> active <?php endif; ?> treeview">
                <a href="#"><i class="fa fa-tags"></i> Danh Mục <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product.category.add.get')) > 0): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('backend.product.category.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                        
                    </li>
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product.category.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.product.category.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
                </ul>
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product.product')) > 0): ?> active <?php endif; ?> treeview">
                <a href="#"><i class="fa fa-tags"></i> Sản Phẩm <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product.product.add.get')) > 0): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('backend.product.product.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                        
                    </li>
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.product.product.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.product.product.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
                </ul>
            </li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Module Bài Viết</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts.category')) > 0): ?> active <?php endif; ?> treeview">
                <a href="#"><i class="fa fa-tags"></i> Danh Mục <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts.category.add.get')) > 0): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('backend.posts.category.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                        
                    </li>
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts.category.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.posts.category.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
                </ul>
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts.posts')) > 0): ?> active <?php endif; ?> treeview">
                <a href="#"><i class="fa fa-tags"></i> Bài Viết <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts.posts.add.get')) > 0): ?> active <?php endif; ?>">
                        <a href="<?php echo e(route('backend.posts.posts.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                        
                    </li>
                    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.posts.posts.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.posts.posts.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
                </ul>
            </li>
        </ul>
    </li>


    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.menu')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-bars"></i> Module Menu <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.menu.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.menu.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.menu.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.menu.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.banner')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-picture-o"></i> Module Banner <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.banner.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.banner.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.banner.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.banner.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.customer')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-user"></i> Module Khách Hàng <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.customer.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.customer.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.customer.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.customer.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>
    
    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.img_lib')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-picture-o"></i> Thư Viện Ảnh <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.img_lib.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.img_lib.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.img_lib.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.img_lib.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.static_block')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-ban"></i> Block Tĩnh <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.static_block.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.static_block.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.static_block.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.static_block.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.tag')) > 0): ?> active <?php endif; ?> treeview">
        <a href="#"><i class="fa fa-tags"></i> Tags <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.tag.add.get')) > 0): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('backend.tag.add.get')); ?>"><i class="fa fa-plus"></i> Thêm</a>
                
            </li>
            <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.tag.list.get')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.tag.list.get')); ?>"><i class="fa fa-list"></i> Danh Sách</a></li>
        </ul>
    </li>

    <li class="<?php if(strlen(strstr(Route::currentRouteName(), 'backend.meta_default')) > 0): ?> active <?php endif; ?>"><a href="<?php echo e(route('backend.meta_default.get')); ?>"><i class="fa fa-gear"></i> <span>Meta Mặc Định</span></a></li>
</ul>