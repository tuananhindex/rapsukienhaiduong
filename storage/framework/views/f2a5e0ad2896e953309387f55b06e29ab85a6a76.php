<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Favicon --> 
        <link rel="shortcut icon" href="profiles/demot402web4svn/uploads/logo/1417572140_favicon.htm">
        <!-- this styles only adds some repairs on idevices  -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php if(isset($title)): ?><?php echo e(ucwords($title)); ?><?php endif; ?></title>
        <meta name="description" content="<?php if(isset($description)): ?><?php echo e($description); ?><?php endif; ?>">
        <meta name="keywords" content="<?php if(isset($keywords)): ?><?php echo e($keywords); ?><?php endif; ?>">
        <!--Facebook-->
        <link rel="image_src" href="<?php echo e(asset('/')); ?>" / >
        <meta property="og:title" content=""/>
        <meta property="og:description" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:type" content="site"/>
        <meta property="og:site_name" content=""/>
        <!--end facebook-->
        <!-- Bootstrap -->
        <link href="<?php echo e(asset('assets/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo e(asset('assets/admin/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <!-- Style -->
        <link href="<?php echo e(asset('assets/frontend/css/reset.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/frontend/css/style.css')); ?>" rel="stylesheet">
        <!-- Style Responsive -->
        <link href="<?php echo e(asset('assets/frontend/css/style-responsive.css')); ?>" rel="stylesheet" >
        <!-- owl Slider -->
        <link href="<?php echo e(asset('assets/frontend/css/slider.css')); ?>" rel="stylesheet">
        <!-- SLIDER REVOLUTION Main Slider -->
        <link href="<?php echo e(asset('assets/frontend/css/captions.htm')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/frontend/css/settings.htm')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/frontend/css/magnific-popup.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('assets/frontend/css/custom.css')); ?>" rel="stylesheet">
        <!-- Load jQuery Library -->
        <script src="<?php echo e(asset('assets/frontend/js/jquery-1.11.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/owl.carousel.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/jquery.validate.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/frontend/js/bootstrap.min.js')); ?>"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
        <div id="st-container" class="st-container">
            <div class="st-pusher">
                <nav class="st-menu st-effect-3" id="cssmenu-st">
                    <div class="list-group panel">
                        <a href="<?php echo e(route('home')); ?>" target="_self" class="list-group-item-stmenu">
                        Trang chủ                </a> 
                        <!--nếu có sub-->
                        <?php echo Helper::menu_mobi($menus); ?>

                        <!--end nếu có sub-->
                        <a href="<?php echo e(route('img.lib')); ?>" target="_self" class="list-group-item-stmenu">
                        Thư viện ảnh         </a> 
                        <a href="<?php echo e(route('contact')); ?>" target="_self" class="list-group-item-stmenu">
                        Liên hệ                </a> 
                        <!--nếu có sub-->
                        <!--end nếu có sub-->
                    </div>
                </nav>
                <!-------Menu reponsive--->
                <div class="st-content">
                    <!-- this is the wrapper for the content -->
                    <div class="st-content-inner">
                        <div class="main clearfix">
                            <!--begin top-->
                            <!--icon menu su dụng trong giao diện mobile-->
                            <div id="st-trigger-effects" class="column hidden-lg hidden-md">
                                <button data-effect="st-effect-3">
                                <i class="fa fa-bars fa-lg"></i>
                                </button>
                            </div>
                            <!--icon menu su dụng trong giao diện mobile-->
                            <section id="topheader">
                                <section id="topbar">
                                    <div class="container">
                                        <div class="row">
                                            <!-- start col -->
                                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                                                <div class="currency pull-left">
                                                    <form>
                                                        <div class="btn-group">
                                                            <!-- <span class="btn dropdown-toggle" data-toggle="dropdown"> 
                                                                <a href="demot402_web4s_default_22.html#"> 
                                                                    <span>đ</span> 
                                                                    <span>Tiền tệ</span> 
                                                                    <i class="fa fa-angle-down"></i>
                                                                </a>
                                                                </span> -->
                                                            <!-- Show Dropdown Menu -->
                                                            
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--start popup login modal fade -->
                                            <div class="zoom-anim-dialog mfp-hide" id="login">
                                                <div class="popup-body">
                                                    <h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
                                                    <section class="social-login">
                                                        <p>Đăng nhập qua mạng xã hội</p>
                                                        <div id="fb-login-btn"></div>
                                                        <script>
                                                            $(document).ready(function(){
                                                                var _LinkFB = 'http://demot402.web4s.vn/?site=load_ajax&type=fb_login';
                                                                $.ajax({
                                                                     method: "POST",
                                                                     url: _LinkFB,
                                                                     data: {id: "hello"}
                                                                })
                                                                .done(function( data ) {
                                                                    $("#fb-login-btn").html(data);
                                                                })
                                                            })
                                                        </script>
                                                    </section>
                                                    <form action="demot402_web4s_default_22.html#" method="post">
                                                        <div class="reg_form_desc">
                                                            Đăng nhập qua email                                                
                                                        </div>
                                                        <div class="noti-error login_notify" style="display:none"></div>
                                                        <input type="text" placeholder="Email đăng nhập" class="login" name="user_name" id="login_user_name">
                                                        <input type="password" placeholder="Mật khẩu" class="login" name="user_pass" id="login_user_pass">
                                                        <div class="block">
                                                            <input type="button" class="submit_login" value="Đăng nhập" onClick="customer_login('http://demot402.web4s.vn/?site=login&view=check_login');">
                                                            <section class="regis">
                                                                <a class='regislink' href="quen-mat-khau.html" class="lostpass">Quên mật khẩu ?</a> 
                                                                <a class='regislink' href="dang-ky-thanh-vien.html" class="lostpass">Tạo tài khoản</a>
                                                                <a class="regislink shipping_register"  href="demot402_web4s_default_22.html#news_pop_create_new_customer" id="new_customer_common"  style="display:none" id="shipping_register"></a><!--use for paging shipping method-->
                                                            </section>
                                                            <!--a href="#" class="lostpass">Quên mật khẩu ?</a-->
                                                        </div>
                                                    </form>
                                                    <Script language="javascript">
                                                        function customer_login(url)
                                                        {
                                                            var login_user_name=jQuery('#login_user_name').val();
                                                            var login_user_pass=jQuery('#login_user_pass').val();
                                                            jQuery(".login_notify").show();
                                                            if(login_user_name.length=="" || login_user_pass.length==""){
                                                                    jQuery(".login_notify").html('Tài khoản và mật khẩu không được bỏ trống');
                                                            }else{                                              
                                                                    jQuery(".login_notify").html('Loading..');               
                                                        
                                                                    jQuery.post(url, {user_name:login_user_name, user_pass: login_user_pass}).done(function( data ) {
                                                        
                                                                    if(data==1)
                                                                    {
                                                                    jQuery(".login_notify").html('Không tìm thấy tên đăng nhập trong hệ thống');
                                                                    }
                                                                    else if(data==2)
                                                                    {
                                                                    jQuery(".login_notify").html('Mật khẩu không đúng');             
                                                                    }
                                                                    else if(data==3)
                                                                    {
                                                                    jQuery(".login_notify").html('Tài khoản của bạn đã bị khóa');        
                                                                    }
                                                                    else{
                                                                    //login success
                                                                    jQuery(".login_notify").html('Đăng nhập thành công');
                                                        
                                                                    window.setTimeout('location.reload()', 1000);
                                                                    }
                                                            })
                                                            }
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <script src="assets/frontend/js/jquery.magnific-popup.min.js"></script>
                                            <!--Don't move the js file above-->
                                            <script>
                                                $(document).ready(function() {
                                                    $('.popup-with-zoom-anim').magnificPopup({
                                                        type: 'inline',
                                                
                                                        fixedContentPos: false,
                                                        fixedBgPos: true,
                                                
                                                        overflowY: 'auto',
                                                
                                                        closeBtnInside: true,
                                                        preloader: false,
                                                        
                                                        midClick: true,
                                                        removalDelay: 300,
                                                        mainClass: 'my-mfp-zoom-in'
                                                        ,callbacks: {
                                                            close: function() {
                                                                $('body').css('overflow-y','');
                                                            },
                                                            open: function (){
                                                                $('body').css('overflow-y','scroll');
                                                            }
                                                        }
                                                    });
                                                });
                                            </script>
                                            <!--end popup login-->
                                            <!-- end col -->
                                            <!-- start col -->
                                            <!-- end col -->
                                            <!-- start col -->
                                            <div class="show-mobile hidden-lg hidden-md pull-right">
                                                <!-- start quick-user -->
                                                <!-- end quick-user -->
                                                <!-- start quick-access -->
                                                <div class="quick-access pull-left">
                                                </div>
                                                <!-- end quick-access -->
                                                <!-- start quick-access -->
                                                <div class="quick-access pull-left">
                                                    <div class="quickaccess-toggle"> 
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <!-- end quick-access -->
                                            </div>
                                            <!-- end col -->
                                        </div>
                                    </div>
                                </section>
                            </section>
                            <section class="row-section top-logo top-html " style='  '>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <h1 class="logo">
                                                <a title="" href="<?php echo e(route('home')); ?>">
                                                <?php echo Block::static_block(2); ?>

                                                </a>     
                                            </h1>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <!--module width > 3.5-->
                                            <form action="<?php echo e(route('search.post')); ?>" method="post" class="custom_form ">
                                                <section class="reservation">
                                                    <div class="reservation-inner">
                                                        <div class="row">
                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                            <div class="col-lg-6 col-md-6">
                                                                <label class="label_text label_text_ho">Họ</label>
                                                                <input minlength="3" class="form_1_input_ho" name="key" type="text" placeholder="Bạn muốn tìm gì ?" value="<?php if(isset($key)): ?><?php echo e($key); ?><?php endif; ?>" >
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6">
                                                                <label></label>
                                                                <input type="submit" class="btn fa-input" value="Tìm kiếm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </form>
                                            <!--module width < 3.5-->
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <ul class="hotline-book">
                                                <li>
                                                    <figure class="hotline">
                                                        <i class="fa fa-phone"></i>
                                                        <figcaption class="hotline-inner">
                                                            <?php echo Block::static_block(1); ?>

                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="row-section top-menu " style='  '>
                                <div class="container">
                                    <div class="hidden-sm hidden-xs">
                                        <nav id="nav">
                                            <ul class="nav navbar-nav">
                                                <li><a level='1' href="<?php echo e(route('home')); ?>" target="_self"> Trang chủ</a></li>
                                                <?php echo Helper::menu($menus); ?>

                                                <!-- <li><a level='1' href="demot402_web4s_default_2.html" target="_self"> Giới thiệu</a></li>
                                                <li class="dropdown">
                                                    <a level='1' href="demot402_web4s_default_42.html" target="_self" class="dropdown-toggle" data-toggle="">Tour trong nước                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-submenu">
                                                            <a tabindex="-1" href="demot402_web4s_default_4.html" target="_self"><i class="fa fa-plane"></i> Du lịch miền Nam</a>
                                                            <ul class="dropdown-menu">
                                                                <li><a tabindex="-1" href="demot402_web4s_default_5.html" target="_self"> <i class="fa fa-plane"></i>Du lịch miền Tây</a> </li>
                                                                <li><a tabindex="-1" href="demot402_web4s_default_7.html" target="_self"> <i class="fa fa-plane"></i>Du lich An Giang</a> </li>
                                                                <li><a tabindex="-1" href="demot402_web4s_default_6.html" target="_self"> <i class="fa fa-plane"></i>Du lịch Tiền Giang</a> </li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="demot402_web4s_default_8.html" target="_self"> <i class="fa fa-plane"></i>Du lịch miền Bắc</a></li>
                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a level='1' href="demot402_web4s_default_10.html" target="_self" class="dropdown-toggle" data-toggle="">Tour quốc tế                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="demot402_web4s_default_9.html" target="_self"> <i class="fa fa-plane"></i>Du lịch Hàn Quốc</a></li>
                                                        <li><a href="demot402_web4s_default_11.html" target="_self"> <i class="fa fa-plane"></i>Du lịch Châu Âu</a></li>
                                                        <li><a href="demot402_web4s_default_12.html" target="_self"> <i class="fa fa-plane"></i>Du lịch Trung Đông</a></li>
                                                        <li><a href="demot402_web4s_default_15.html" target="_self"> <i class="fa fa-plane"></i>Du lịch Tây Ban Nha</a></li>
                                                    </ul>
                                                </li>
                                                <li><a level='1' href="demot402_web4s_default_13.html" target="_self"> Easy Tour</a></li>
                                                <li><a level='1' href="demot402_web4s_default_14.html" target="_self"> Khuyến mãi</a></li> -->
                                                <li><a href="<?php echo e(route('img.lib')); ?>" target="_self" >Thư viện ảnh</a></li>
                                                <li><a level='1' href="<?php echo e(route('contact')); ?>" target="_self"> Liên hệ</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                            var url=document.URL;
                                            
                                            $("a[href='"+url+"'][level='"+1+"']").addClass('active');
                                        }); 
                                    </script>
                                </div>
                            </section>
                            
                            <!--end top-->  
                            <?php echo $__env->yieldContent('content'); ?>
                            
                            <footer>
                                <?php if((isset($customer_footer))): ?>
                                    <?php echo $customer_footer; ?>

                                <?php endif; ?>
                                <section class="row-section footer-html footer-html  row_1" style='background:#fafafa !important; padding:15px 0px !important; '>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <?php echo Block::menu_footer(); ?>

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <section class="logo-footer">
                                                    <?php echo Block::static_block(2); ?>

                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="row-section footer-html  row_2" style='background:#282828 !important; padding:5px 0px !important; '>
                                    <?php echo Block::static_block(3); ?>

                                </section>
                            </footer>
                        </div>
                        <!-- /main --> 
                    </div>
                    <!-- /st-content-inner --> 
                </div>
                <!-- /st-content --> 
            </div>
            <!-- /st-pusher --> 
        </div>
        <!-- /st-container -->        
        <!-- Load main.js-->
        <script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>
        <!-- OWL Carousel jquery -->
        <!--end id=page-->
        <script src="<?php echo e(asset('assets/frontend/js/custom.js')); ?>"></script>
        
    </body>
</html>
