<?php if(isset($data) && count($data > 0)): ?>
<section class="row-section top-product_latest " style='  '>
    <div class="container">
        <Script language="javascript">
            <!--
                $(document).ready(function() {
                var owl26938473211476776202 = $('#xxxxxxxxxxxx-26938473211476776202');
                owl26938473211476776202.owlCarousel({
                    items : 4, 
                  itemsDesktop : [1024,3], 
                  itemsDesktopSmall : [960,3],
                  itemsTablet: [640,2],
                  itemsMobile: [480,2],
                });
                $("#next26938473211476776202").click(function(){
                    
                    owl26938473211476776202.trigger('owl.next');
                  })
                  $("#prev26938473211476776202").click(function(){
                    
                    owl26938473211476776202.trigger('owl.prev');
                  })         
                });
                -->
        </script>
        <section id="products-featured" >
            <div class="itemfeatured">
                <h2><span>Dịch Vụ Của Chúng Tôi</span></h2>
                <div class="row">
                    <!-- Navigation -->
                    <div class="featuredNavigation">
                        <a class="prev" title="Prev" id="prev26938473211476776202"><i class="fa fa-arrow-circle-o-left"></i></a>
                        <a class="next" title="Next" id="next26938473211476776202"><i class="fa fa-arrow-circle-o-right"></i></a>
                    </div>
                    <!-- Products -->
                    <div id="xxxxxxxxxxxx-26938473211476776202" class="owl-carousel" >
                        <!-- Products 1-->
                        
                        <?php foreach($data as $val): ?>
                        <div class="col124 item col-lg-12">
                            <div class="product">
                                <div class="image">
                                    <div class="img-overflow">
                                        <a href="<?php echo e(route('posts',$val->alias)); ?>" title="<?php echo e($val->name); ?>">
                                        <img src="<?php echo e(asset($val->image)); ?>" alt="">
                                        </a>
                                        <div class="ImageOverlayBe"></div>
                                        
                                    </div>
                                </div>
                                <div class="des-product">
                                    <a href="<?php echo e(route('posts',$val->alias)); ?>" title="<?php echo e($val->name); ?>">
                                        <h3><?php echo e($val->name); ?></h3>
                                    </a>
                                    <p><?php echo e($val->description); ?>.</p>
                                    <!-- <div class="price">
                                        <span class="price-new">3.990.000đ</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?php endif; ?>