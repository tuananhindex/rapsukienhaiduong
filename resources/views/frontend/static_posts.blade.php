@extends('frontend.master')
@section('content')
<div class="main-wrap">
    <section class="row_section" style='  margin:20px 0px !important;'>
        <div class="container">
            <div class="row">
                
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <section class="clearfix">
                                <section class="breadcrumbs clearfix">
                                    <a href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
                                    &nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:void(0)">{{ ucfirst($index->name) }}</a>                
                                </section>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!--==================================================================chi tiêt prolduct====================================================-->
                            <section class="detail">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h1>
                                            <span>{{ $index->name }}  </span>
                                        </h1>
                                    </div>
                                    
                                </div>
                                <!-- =================== SLIDER =================== -->   
                                
                                <!--===================END SLIDER=====================-->    
                                
                                <section id="product-tab">
                                    
                                    <ul id="tb_1" class="tab">
                                        <p>
                                            {!! $index->content !!}                       
                                        </p>
                                        
                                    </ul>
                                    
                                       
                                        <!--================================================end form ======================================================-->
                                    </ul>
                                    <ul id="tb_3" class="tab">
                                        <div class="fb-comments" data-width="100%" data-href="http://demot402.web4s.vn/?module=31" data-numposts="5" data-colorscheme="light"></div>
                                    </ul>
                                </section>
                                <!--end product-tab-->
                            </section>
                            <!--================================================================end chi tiết product===================================================-->
                            <!--===========================================================danh sách sản phẩm liên quan================================================-->
                            <!-- LIST ITEM-->   
                            
                            <!--========================================================end danh sách sản phẩm liên quan===============================================-->
                            <script>
                                $(document).ready(function(){
                                    var link = window.location.href;
                                    if(link.split('#')[1]){
                                        $(".item_tabs[tab_id=2]").trigger("click");
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
