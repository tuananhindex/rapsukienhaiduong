<link href="{{ asset('assets/frontend/css/style.css') }}" type="text/css" rel="stylesheet" />
    <div id="dnn_RowTwo9" class="ContentPadding">
    <div class="DnnModule DnnModule-MISACMS DnnModule-579">
    <ul class="breadcrumb news-nav">
        <li>
            <a id="dnn_ctr446_ListNewsByCategory_HyperLink1" href="{{ route('home') }}">Trang chủ</a>
        </li>
        <li class="active">
            <span id="dnn_ctr446_ListNewsByCategory_lblCategoryName">{{ ucfirst($index->name) }}</span>
        </li>
    </ul>
    @if(isset($top_posts))
    <a class="expthumb thumb630x330 thumbblock mar_bottom15" href="{{ route('posts',$top_posts->alias) }}" title="{{ $top_posts->name }}">
        <div class="content_shadow">
            <h1 style="display: inherit;" class="f26 fontUTM clwhite mar_bottom10">{{ $top_posts->name }}</h1>
            <div class="time_comment text-left mar_bottom7">
                <span>{{ date('h:i d/m/Y',strtotime($top_posts->create_at)) }}  </span>
            </div>
            <div class="sapo_news" style="text-align: justify;">{!! $top_posts->description !!}</div>
        </div>
        <div class="bg_shadow"></div>
        <img width="100%" src="{{ asset($top_posts->image) }}" data-src="{{ asset($top_posts->image) }}" width="515" height="350" alt="{{ $top_posts->name }}" />
    </a>
    @endif
    <ul class="list_top_news list_news_cate">
    @if(count($posts) > 0)
    @foreach($posts as $val)
        <li>
            <h2><a href="{{ route('posts',$val->alias) }}" class="title_list_top_news" title="{{ $val->name }}">{{ $val->name }}</a></h2>
            <div class="pkg">
                <a href="{{ route('posts',$val->alias) }}" class="thumbblock thumb260x170 fl" title="{{ $val->name }}" ><img class="" src="{{ asset($val->image) }}" width="190" height="120" alt="{{ $val->name }}" /></a>                    
                <div class="info_list_top_news">
                    <div class="time_comment text-left mar_bottom7">
                        <span>{{ date('h:i d/m/Y',strtotime($val->create_at)) }}  </span>
                    </div>
                    <div class="sapo_news" style="text-align: justify;">{!! $val->description !!}</div>
                </div>
            </div>
        </li>
    @endforeach
    @else
    Không có bài viết nào
    @endif    
        
    </ul>
    <section>
        <div class="paging">
            {{ $posts->render() }}
        </div>
    </section>
</div></div>