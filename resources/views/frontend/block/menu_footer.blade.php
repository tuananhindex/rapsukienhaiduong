<section class="footer-link">
    <ul>
    	<li><a href="{{ route('home') }}"> Trang chủ</a></li>
        @if(count($data) > 0)
        @foreach($data as $val)
        <li><a href="{{ asset('menu',$val->alias) }}" title="">{{ $val->name }}</a></li>
        @endforeach
        @endif
        <li><a href="{{ route('img.lib') }}"  >Thư viện ảnh</a></li>
        <li><a href="{{ route('contact') }}"> Liên hệ</a></li>
    </ul>
    
</section>