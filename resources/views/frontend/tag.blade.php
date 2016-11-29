@extends('frontend.master')
@section('content')
<div class="main-wrap">
    <section class="row_section" style='  margin:20px 0px !important;'>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div>
                        {!! Block::support_online() !!}
                    </div>
                    <div>
                        <!-- Vertical Menu --> 
                        {!! Block::box_category() !!}
                    </div>
                    <div>
                        <!--$css_item,$box_width,$position,$num_item_row,$sidebar -->
                        <!--begin box <=4.5-->
                        {!! Block::box_sidebar($title_posts_sidebar,$posts_sidebar) !!}
                        <!--end box <=4.5-->
                    </div>
                    <div>
                        <script language="javascript">
                            <!--
                                function newsletter_form(id,num)
                                {
                                    
                                    //var frm=document+id;
                                    var frm=document.forms[id];
                                    //alert(frm);
                                    // alert(frm.newsletter_email.value);return false;
                                     if(frm.newsletters_email.value=='')
                                     {
                                         alert('Vui lòng nhập địa chỉ email');
                                         return false;
                                         }
                                         var domain="http://demot402.web4s.vn/?site=newsletters";
                                         $.post(domain, {newsletters_email: frm.newsletters_email.value,action:'request'})
                                        .done(function( data ) {
                                            $("#newsletters_result_"+num).html(data);
                                        });
                                        return false; 
                                    }
                                -->
                        </script>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <section class="clearfix">
                                <section class="breadcrumbs clearfix">
                                    <a href="{{ route('home') }}" title="Trang chủ">Trang chủ</a>
                                    &nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:void(0)">Từ khóa</a>  
                                    &nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:void(0)">{{ $name }}</a>                   
                                </section>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                            
                            <!--grid-->
                            <!--end grid-->
                            <section id="product-listitem">
                                <h1>
                                    <p style="font-size: 15px">Từ khóa : <span style="color: #f00; display: inline-table;text-transform:none">"{{ $name }}"</span></p>
                                </h1>
                                @if(count($posts) > 0)
                                @foreach($posts as $val)
                                <article class="catalist col3">
                                    <div class="row">
                                        <figure class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
                                            <div class="image">
                                                <a href="{{ route('posts',$val->alias) }}" title="">
                                                    <div class="img-overflow">
                                                        <img src="{{ asset($val->image) }}" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        </figure>
                                        <figure class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                            <a href="{{ route('posts',$val->alias) }}" title="">
                                                <h3>{!! $val->name !!}</h3>
                                            </a>
                                            <p>{!! $val->description !!}.</p>
                                            
                                        </figure>
                                    </div>
                                </article>
                                @endforeach
                                @else
                                <p>Không có kết quả nào</p>
                                @endif
                                {!! $posts->render() !!}
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

 




 



 
 
 
 






 





 




 



 
 
 
 






 





 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 




