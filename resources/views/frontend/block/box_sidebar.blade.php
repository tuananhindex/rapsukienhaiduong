@if(isset($data) && count($data > 0))
<section class="box-category">
    <div class="heading">
        {{ $title }}             
    </div>
    <div class="main">
        <ul class="list-post-latest list_post">
            
            @foreach($data as $val)
            <li>
                <a href="{{ route('posts',$val->alias) }}" title="{{ $val->name }}">
                    <div class="img-overflow">  
                        <img src="{{ asset($val->image) }}" alt="{{ $val->name }}"/>
                    </div>
                    <p>{{ ucfirst($val->name) }}</p>
                    <span> <i class="fa fa-clock-o"></i> {{ Helper::time_stamp(strtotime($val->create_at)) }}</span>
                </a>
            </li>
            @endforeach
            
        </ul>
    </div>
</section>
@endif