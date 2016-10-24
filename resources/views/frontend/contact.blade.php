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
                        {!! Block::box_sidebar($title_posts_sidebar,$posts_latest) !!}
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
                                    &nbsp;&nbsp;/&nbsp;&nbsp;<a href="javascript:void(0)">Liên hệ</a>                    
                                </section>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d26081603.294420466!2d-95.677068!3d37.06250000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1416959676687" style="border:0" width="100%" height="300" frameborder="0"></iframe></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <script>
                                <!--
                                    $().ready(function() {
                                        $("#contact_form").validate({
                                            rules: {
                                                name:{
                                                    required: true,             
                                                },
                                            
                                                email: {
                                                    required: true,                 
                                                },
                                                phone: {
                                                    required: true,
                                                    
                                                },
                                                address: {
                                                    required: true,                 
                                                },
                                                title: {
                                                    required: true,                 
                                                },                  
                                                content: {
                                                    required: true,                 
                                                },  
                                            },
                                            messages: {             
                                                name: "Bạn chưa nhập tên",
                                                email: "Bạn phải nhập thông tin email",
                                                phone: "Bạn phải nhập số điện thoại",   
                                                address: "Vui lòng nhập địa chỉ của bạn",               
                                                title: "Phần tiêu đề không được bỏ trống",
                                                content: "Phần nội dung không được bỏ trống",   
                                            }
                                        });
                                        
                                    });
                                    -->
                            </script>
                            <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <section id="contact">
                                        <div class="itemcontact">
                                            
                                                <article class="contact-form">
                                                    <h2><span>Liên hệ</span></h2>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-xs-12"></div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <input class="input-contact NormalTextBox" placeholder="Họ tên" name="name" id="name" type="text">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <input class="input-contact NormalTextBox" placeholder="Điện thoại" name="phone" id="phone" type="text">
                                                        </div>
                                                        
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <input class="input-contact NormalTextBox" placeholder="Email" name="email" id="email" type="text">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <input class="input-contact NormalTextBox" placeholder="Tiêu đề" name="title" id="title" type="text">
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <textarea class="textarea" placeholder="Nội dung" name="content" class="NormalTextBox" id="noidung"></textarea>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <input class="input-contact NormalTextBox" placeholder="Nhập mã xác nhận" name="xacnhan" id="xacnhan" type="text">
                                                        </div>
                                                        <img id="capcha" alt=""  style="height:50px;width:180px;">
                                                        <img id="resetCapcha" src="{{ asset('assets/frontend/img/RefreshBlue.png') }}">
                                                        <input class="submit" name="sendmail" value="Gửi đi" type="submit">
                                                        <img width="100" src="{{ asset('assets/frontend/img/loading.gif') }}" id="loadding" style="display:none">
                                                    </div>
                                                </article>
                                            
                                        </div>
                                    </section>
                                    <!--End listitem-->
                                </div>
                                <!--End row--> 
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>

    
        change_captcha();



        $("#resetCapcha").click(function(){

            change_captcha();

        });



        function change_captcha(){

            $.ajax({

                type: "GET",

                url: "{{ route('capcha') }}",

                success:function(captcha)

                {

                    //console();

                    

                    $("#capcha").attr("src",captcha);

                }

            });

        }



        var ajax_sendding = false;

        $("input[name='sendmail']").click(function(e){
            //alert(123);

            // kiểm tra trạng thái có đang gửi ajax không

            // Nếu đang gửi thì dừng

            if (ajax_sendding == true){

                return false;

            }

             

            // Ngược lại thì bắt đầu gửi ajax

            // Nhưng trước hết gán biến ajax_sendding = true để khi người dùng click tiếp 

            // se không có tác dụng

            ajax_sendding = true;

            // Bật span loaddding lên

            $('#loadding').show();

            $.ajax({

                type: "GET",

                url: "{{ route('danhgia') }}",

                data: { 

                        _token : $('input[name="_token"]').val(),

                        phone : $('input[name="phone"]').val() , 

                        title : $('input[name="title"]').val() , 

                        noidung : $('textarea[name="noidung"]').val() , 

                        hoten : $('input[name="hoten"]').val() , 

                        email : $('input[name="email"]').val() , 

                        xacnhan : $('input[name="xacnhan"]').val()

                    },

                success:function(x)

                {

                    // alert('ok');

                    var arr = x.split('-');

                    if(arr[1] == 'success'){

                        $('.NormalTextBox').val('');

                    }



                    

                    change_captcha();

                    alert(arr[0]);



                    

                },
                error:function()
                {
                    alert('Gửi mail không thành công');
                }

            }).always(function(){

                ajax_sendding = false;

                $('#loadding').hide();

            });

        });

    

</script>
@endsection
