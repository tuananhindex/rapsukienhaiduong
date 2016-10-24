<div class="FooterContent">
    <div class="container">
        <div class="row">
            <div class="col-md-24">
                <div id="dnn_FooterTopPane" class="FooterPadding">
                    <div class="DnnModule DnnModule-DNN_HTML DnnModule-477">
                        <a name="477"></a>
                        <div id="dnn_ctr477_ContentPane">
                            <!-- Start_Module_477 -->
                            <div id="dnn_ctr477_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                <div id="dnn_ctr477_HtmlModule_lblContent" class="Normal">
                                    <div class="row footer-area">
                                        <div class="col-md-10">
                                            
                                            <img src="{{ asset('assets/frontend/img/map.png') }}" width="100%">
                                        </div>
                                        <div class="col-md-10">
                                            
                                        </div>
                                        
                                        <div class="col-md-4">
                                            @if(count($posts_category) != 0)
                                            <div class="title">TIN TỨC</div>
                                            <ul>
                                                
                                                @foreach($posts_category as $val)
                                                <li><a href="{{ route('posts.category',$val->alias) }}">{{ ucfirst($val->name) }}</a></li>
                                                @endforeach
                                                
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End_Module_477 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="dnn_FooterLeftOuter" class="FooterPadding DNNEmptyPane"></div>
            </div>
            <div class="col-md-6">
                <div id="dnn_FooterLeftInner" class="FooterPadding DNNEmptyPane"></div>
            </div>
            <div class="col-md-6">
                <div id="dnn_FooterRightInner" class="FooterPadding DNNEmptyPane"></div>
            </div>
            <div class="col-md-6">
                <div id="dnn_FooterRightOuter" class="FooterPadding DNNEmptyPane"></div>
            </div>
        </div>
    </div>
</div>
<div class="FooterMenu">
    <div class="container">
        <div class="row">
            <div class="col-md-24">
                <div id="dnn_FooterBottomPane" class="FooterPadding">
                    <div class="DnnModule DnnModule-DNN_HTML DnnModule-478">
                        <a name="478"></a>
                        <div id="dnn_ctr478_ContentPane">
                            <!-- Start_Module_478 -->
                            <div id="dnn_ctr478_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
                                <div id="dnn_ctr478_HtmlModule_lblContent" class="Normal">
                                    <div class="row">
                                        <div class="col-md-18">
                                            <div class="footer-link-menu">
                                                <ul>
                                                    @if(count($menus) != 0)
                                                    @foreach($menus as $val)
                                                    <li><a href="{{ route('menu',$val->alias) }}">{{ ucfirst($val->name) }}</a></li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <a href="javascript:void(0)" target="_blank"><img src="{{ asset('assets/frontend/img/facebook-32.png') }}" alt="Facebook" style="width: 32px; height: 32px;"></a>
                                            <a href="javascript:void(0)" target="_blank"><img src="{{ asset('assets/frontend/img/linkedin-32.png') }}" alt="LinkedIn" style="width: 32px; height: 32px;"></a>
                                            <a href="javascript:void(0)" target="_blank"><img src="{{ asset('assets/frontend/img/youtube-32.png') }}" alt="Youtube" style="width: 32px; height: 32px;"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End_Module_478 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
