
                    <div id="dnn_RowTwo9" class="ContentPadding"><div class="DnnModule DnnModule-DNN_HTML DnnModule-650"><a name="650"></a><div id="dnn_ctr650_ContentPane"><!-- Start_Module_650 --><div id="dnn_ctr650_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
    <div id="dnn_ctr650_HtmlModule_lblContent" class="Normal">
    <h1 style="color: #0085ad; font-size: 28px;">Ý kiến khách hàng - đối tác</h1>
</div>

</div><!-- End_Module_650 --></div>
</div><div class="DnnModule DnnModule-MISATestimonial DnnModule-468"><a name="468"></a><div id="dnn_ctr468_ContentPane"><!-- Start_Module_468 --><div id="dnn_ctr468_ModuleContent" class="DNNModuleContent ModMISATestimonialC">
        @if(count($posts) != 0)
        @foreach($posts as $val)
        <div class="row misa-testimonial-list">
            <div class="col-md-4">
                <img alt="{{ $val->name }}" src="{{ asset($val->image) }}" class="img-subject img-circle img-responsive">
            </div>
            <div class="col-md-20">
                <div class="content">
                    {!! $val->content !!}
                    
                </div>
                    <div class="author">
                        {{ $val->name }}
                    </div>
                    <div class="jobtitle">
                        {{ $val->description }}
                    </div>

            </div>

        </div>
        @endforeach
        @else
        Không có bài viết nào
        @endif
    
        
        <div class="pull-right">
            {{ $posts->render() }}
        </div>
        <!-- <div class="pager">
            <div class="RadDataPager RadDataPager_Metro" id="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial">
        <div class="rdpWrap">
            <input type="submit" name="dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl00$FirstButton" value=" " onclick="return false;" id="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial_ctl00_FirstButton" class="rdpPageFirst"><input type="submit" name="dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl00$PrevButton" value=" " onclick="return false;" id="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial_ctl00_PrevButton" class="rdpPagePrev">
        </div><div class="rdpWrap rdpNumPart">
            <a onclick="return false;" class="rdpCurrentPage" href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl00','')"><span>1</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl01','')"><span>2</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl02','')"><span>3</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl03','')"><span>4</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl04','')"><span>5</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl05','')"><span>6</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl06','')"><span>7</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl07','')"><span>8</span></a><a href="javascript:__doPostBack('dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl01$ctl08','')"><span>9</span></a>
        </div><div class="rdpWrap">
            <input type="submit" name="dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl02$NextButton" value=" " id="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial_ctl02_NextButton" class="rdpPageNext"><input type="submit" name="dnn$ctr468$TestimonialList$lvTestimonial$rdpTestimonial$ctl02$LastButton" value=" " id="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial_ctl02_LastButton" class="rdpPageLast">
        </div><input id="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial_ClientState" name="dnn_ctr468_TestimonialList_lvTestimonial_rdpTestimonial_ClientState" type="hidden" autocomplete="off">
    </div>
        </div> -->
    <input id="dnn_ctr468_TestimonialList_lvTestimonial_ClientState" name="dnn_ctr468_TestimonialList_lvTestimonial_ClientState" type="hidden" autocomplete="off"><span id="dnn_ctr468_TestimonialList_lvTestimonial" style="display:none;"></span>

</div><!-- End_Module_468 --></div>
</div></div>
          