@if(isset($posts))
<div class="DnnModule DnnModule-MISATestimonial DnnModule-502"><a name="502"></a>
<div class="DNNContainer Container4">
    <h4><span id="dnn_ctr502_dnnTITLE_titleLabel" class="ContainerTitle Title4">Ý kiến khách hàng đối tác</span>


</h4>
    <div class="ContainerPane ContainerSpace">
    	<div id="dnn_ctr502_ContentPane"><!-- Start_Module_502 --><div id="dnn_ctr502_ModuleContent" class="DNNModuleContent ModMISATestimonialC">
	

<!-- @if(file_exists($posts->image))
<div class="center">
    <img id="dnn_ctr502_ctlTestimonialSideBar_imgAvatar" class="avatar" src="{{ asset($posts->image) }}" alt="{{ $posts->name }}" />
</div>
@endif -->
<div class="padtop10">
    <div class="bold">
        <span id="dnn_ctr502_ctlTestimonialSideBar_lblAuthor">{{ $posts->name }}</span>
    </div>
    <div>
        <span id="dnn_ctr502_ctlTestimonialSideBar_lblJobTitle"></span>
        <span id="dnn_ctr502_ctlTestimonialSideBar_lblCompany">{{ $posts->description }}</span>
    </div>
</div>
<div class="padtop10">
    <div>
        <img src='{{ asset("assets/frontend/img/quote_open.png") }}' />
    </div>
    <div class="italic testimonial-content">
        <span id="dnn_ctr502_ctlTestimonialSideBar_lblBody">{!! $posts->content !!}</span>
    </div>
    <div>
        <img src='{{ asset("assets/frontend/img/quote_close.png") }}' class="quote_close" />
    </div>
    <div style="clear:both"></div>
</div>
<div class="padtop10 ">
    <div class="padtop10">
        <a class="link-cls right" href='{{ route("customer_reviews") }}'>
            Xem thêm
        </a>
        
    </div>
</div>


</div><!-- End_Module_502 --></div>
	</div>
	<div class="clear"></div>
</div>
<div class="ContainerSpace2"></div>
</div>
@endif