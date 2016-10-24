<div class="head_news"><a href="#" onclick="return false">Tiêu điểm</a></div>
<ul class="list_news_160 list_trend">
    @if(count($focus_posts) != 0)
    @foreach($focus_posts as $val)
    <li>
        <a href="{{ route("posts",$val->alias) }}" style="width:100% !important ; height:150px !important" class="thumbblock thumb160x100 mar-1 mar_bottom10" title="{{ $val->name }}"><img width="100%" class="" src="{{ asset($val->image) }}"  height="100%" alt="{{ $val->name }}"></a>        
        <h2><a href="{{ route("posts",$val->alias) }}" class="f14" title="{{ $val->name }}">{{ $val->name }}</a></h2>
    </li>
    
    @endforeach
    @else
    <li>Không có tin nào</li>
    @endif
</ul>