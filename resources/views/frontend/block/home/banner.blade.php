 @if(count($data) > 0)

 <section class="row-section top-slideshow " style='  '><!-----Slider------>
        
     
        <div id="myCarousel_2246831477164088" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          
          <div class="carousel-inner">
          
          @foreach($data as $key => $val)
                                                        <div class="item @if($key == 0) active @endif">
                    <a href="javascript:void(0)"> 
                      <img src="{{ asset($val->image) }}" alt="">
                    </a>
                    </div>
          
          @endforeach
         
          </div>                                                                
          <a class="left carousel-control" href="#myCarousel_2246831477164088" role="button" data-slide="prev"><img src="assets/frontend/img/left.png" alt=""></a>
          <a class="right carousel-control" href="#myCarousel_2246831477164088" role="button" data-slide="next"><img src="assets/frontend/img/right.png" alt=""></i></a>
        </div><!-- /.carousel -->
        <script>
          //script de chạy slide
          $(document).ready(function() {
            var owl = $("#slide_2246831477164088");
            owl.owlCarousel({
              items : 6,//man hinh rong
              itemsDesktop : [1000,4],//desktop
              itemsDesktopSmall : [900,3],//table ngang
              itemsTablet: [600,2],//
              itemsMobile : false
          });
          // Custom Navigation Events
          $(".next_2246831477164088").click(function(){
            owl.trigger('owl.next');
            })
            $(".prev_2246831477164088").click(function(){
            owl.trigger('owl.prev');
            })     
          });
        </script>
                
  
</section> 
 @endif