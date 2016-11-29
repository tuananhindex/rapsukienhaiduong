<p>Từ khóa : 
@foreach($tags as $key => $val)
<a href="{{ route('tag',$val->alias) }}" style="color:#00a885">{{ $val->name }} @if($key != count($tags) - 1),@endif </a>
@endforeach
</p>