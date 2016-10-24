@extends('frontend.master')
@section('content')
{!! Block::banner() !!}
                            
{!! Block::services() !!}

<div class="main-wrap">
    <section class="row_section" style='  '>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div>
                        <!--$css_item,$box_width,$position,$num_item_row -->
                    @if(isset($posts_sidebar) && count($posts_sidebar > 0))
                    {!! Block::box_sidebar($title_posts_sidebar,$posts_sidebar) !!}    
                    @endif
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Block::website_intro() !!} 
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div>
                        {!! Block::support_online() !!} 
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
            </div>
        </div>
    </section>
</div>
@endsection

 




 



 
 
 
 






 





 




 



 
 
 
 






 





 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 




