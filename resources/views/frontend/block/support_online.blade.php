@if(isset($data) && count($data > 0))
<section class="box-category">
    <div class="heading"><span>Hỗ trợ trực tuyến</span></div>
    <div class="support-html">
        <ul>
            @foreach($data as $val)
            <li>
                <p>{{ $val->name }} - <span>{{ $val->phone }}</span> </p>
                @if($val->active == 1)
                <img alt="" src="{{ asset('assets/frontend/img/skype.png') }}" style="width: 99px; height: 17px;" />
                @else
                <p style="color:#f00">Offline</p>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endif