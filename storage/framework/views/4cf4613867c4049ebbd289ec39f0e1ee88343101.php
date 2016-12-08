<?php if(isset($data) && count($data) > 0): ?>
<section class="row-section footer-slideshow  row_0" style='  '>
    <div class="container">
        <!-----Slider------>
        <!--CUSTOMER--> 
        <section id="customer" class="clearfix">
            <div class="itemcus">
                <h2><span>Đối tác kinh doanh</span></h2>
                <!-- Navigation -->             
                <div class="customNavigation">
                    <a class="prev prev_125201476776202" title=""><i class="fa fa-arrow-circle-o-left"></i></a>
                    <a class="next next_125201476776202" title=""><i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
                <div id="slide_125201476776202" class="owl-carousel cus">
                    <!-- Customer 1 -->
                    
                    <?php foreach($data as $val): ?>
                    <div class="item">
                        <a href="javascript:void(0)">
                        <img style="height:60px" src="<?php echo e(asset($val->image)); ?>" alt="<?php echo e($val->name); ?>">
                        </a>
                    </div>
                    <?php endforeach; ?>
                    
                    <!-- Customer 1 -->
                    
                </div>
            </div>
        </section>
        <script>
            //script de chạy slide
            $(document).ready(function() {
              var owl = $("#slide_125201476776202");
              owl.owlCarousel({
                  items : 6,//man hinh rong
                  itemsDesktop : [1000,4],//desktop
                  itemsDesktopSmall : [900,3],//table ngang
                  itemsTablet: [600,2],//
                  itemsMobile : false
            });
            // Custom Navigation Events
            $(".next_125201476776202").click(function(){
                owl.trigger('owl.next');
              })
              $(".prev_125201476776202").click(function(){
                owl.trigger('owl.prev');
              })         
            });
        </script>
    </div>
</section
<?php endif; ?>