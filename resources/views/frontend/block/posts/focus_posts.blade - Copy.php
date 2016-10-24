<div class="DnnModule DnnModule-MISACMS DnnModule-445">
    <a name="445"></a>
    <div class="DNNContainer Container4">
        <h4><span id="dnn_ctr445_dnnTITLE_titleLabel" class="ContainerTitle Title4">Tin tiêu điểm</span>
        </h4>
        <div class="ContainerPane ContainerSpace">
            <div id="dnn_ctr445_ContentPane">
                <!-- Start_Module_445 -->
                <div id="dnn_ctr445_ModuleContent" class="DNNModuleContent ModMISACMSC">
                    <div id="pin_news">
                        <ul>
                            @if(count($focus_posts) != 0)
                            @foreach($focus_posts as $val)
                            <li>
                                <div class="img-news">
                                    <a href='{{ route("posts",$val->alias) }}'>
                                    <img alt="" class="img-pad img-responsive" src="{{ asset($val->image) }}" />
                                    </a>
                                </div>
                                <h2 class="pin-news-title"> <a class="link" title='{{ $val->name }}' href='{{ route("posts",$val->alias) }}'>{{ $val->name }}</a></h2>
                                <div class="clear"></div>
                            </li>
                            @endforeach
                            @else
                            <li>Không có tin nào</li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
                <!-- End_Module_445 -->
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="ContainerSpace2"></div>
</div>