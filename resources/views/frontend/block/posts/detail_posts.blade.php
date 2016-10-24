<link href="{{ asset('assets/frontend/css/style.css') }}" type="text/css" rel="stylesheet" />
<div id="dnn_RowTwo9" class="ContentPadding">
    <div class="DnnModule DnnModule-MISACMS DnnModule-579">
        <ul class="breadcrumb news-nav">
            <li>
                <a id="dnn_ctr579_ctlNewsDetail_HyperLink1" href="{{ route('home') }}">Trang chủ</a>
            </li>
            @if(isset($category))
            <li>
                <a id="dnn_ctr579_ctlNewsDetail_lnkNewsCategory" href="{{ route('posts.category',$category->alias) }}">{{ ucfirst($category->name) }}</a>
            </li>
            @endif
            <li class="active">
                <span id="dnn_ctr579_ctlNewsDetail_Label2">{{ ucfirst($index->name) }}</span>
            </li>
        </ul>
        <h1><a class="time_detail_news" title="{{ $index->name }}">{{ $index->name }}</a></h1>
        <div class="info_detail pkg mar_bottom10 ">
            <div class="author">
                <div class="time_comment">
                    <span>{{ date('h:i d/m/Y',strtotime($index->create_at)) }}</span>
                </div>
            </div>
        </div>
        <!-- <h2 class="sapo_detail fontbold">{!! $index->description !!}</h2> -->
        <article id="content_detail" style="">
            {!! $index->content !!}
        </article>
        
        <div class="mar_bottom20">
            <div class="pkg">
                <h2 class="cat-box-title letsop-title" style="display:block">
                    <a class="letsop-script" href="#tab_news">Bài viết cùng chuyên mục</a> <span></span>
                    <a class="letsop-tab-inactive letsop-script" href="#tab_relation">Bài viết mới nhất</a>
                </h2>
                @if(count($same_posts) != 0)
                <div id="tab_news">
                    <ul class="news_bottom_detail pkg">
                    @foreach($same_posts as $key => $val)
                    @if($key == 4)
                    <div class="clear" style="margin-top:10px"></div>
                    @endif
                        <li>
                            <a href="{{ route('posts',$val->alias) }}" class="thumb140x90 thumbblock mar_bottom10" title="{{ $val->name }}"><img class="" src="{{ asset($val->image) }}" width="163" alt="{{ $val->name }}"></a>                        
                            <h3><a class="f14" href="{{ route('posts',$val->alias) }}">{{ $val->name }} <span class="line_cm">|</span> <span class="icon_video"></span></a></h3>
                        </li>
                    @endforeach    
                    </ul>
                    
                    
                </div>
                @endif
                
                @if(count($latest_posts) != 0)
                <div id="tab_relation" style="display:none;">
                    <ul class="news_bottom_detail pkg">
                    @foreach($latest_posts as $val)
                        <li>
                            <a href="{{ route('posts',$val->alias) }}" class="thumb140x90 thumbblock mar_bottom10" title="{{ $val->name }}"><img class="" src="{{ asset($val->image) }}" width="163"" alt="{{ $val->name }}"></a>                        
                            <h3><a class="f14" href="{{ route('posts',$val->alias) }}">{{ $val->name }} <span class="line_cm">|</span> <span class="icon_video"></span></a></h3>
                        </li>
                    @endforeach    
                    </ul>
                    
                    
                </div>
                @endif
                <script>
                    /*<![CDATA[*/
                        jQuery('a.letsop-script').click(function(){
                            var href=jQuery(this).attr('href');
                            switch(href){
                                case'#tab_news':
                                    jQuery(this).parent().find('a').addClass('letsop-tab-inactive');
                                    jQuery(this).removeClass('letsop-tab-inactive');
                                    jQuery("#tab_relation").stop().hide();
                                    jQuery("#tab_news").stop().fadeIn();
                                    break;
                                case'#tab_relation':
                                    jQuery(this).parent().find('a').addClass('letsop-tab-inactive');
                                    jQuery(this).removeClass('letsop-tab-inactive');
                                    jQuery("#tab_news").stop().hide();
                                    jQuery("#tab_relation").stop().fadeIn();
                                    $('#tab_relation img').relazy();
                                    break;              
                            }
                            return false;
                        })
                        
                        
                    /*]]&gt;*/
                </script> 
            </div>
        </div>
        
    </div>
</div>