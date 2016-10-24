<div id="dnn_RowTwo9" class="ContentPadding">
    <div class="DnnModule DnnModule-MISACMS DnnModule-446">
        <a name="446"></a>
        <div id="dnn_ctr446_ContentPane">
            <!-- Start_Module_446 -->
            <div id="dnn_ctr446_ModuleContent" class="DNNModuleContent ModMISACMSC">
                <ul class="breadcrumb news-nav">
                    <li>
                        <a id="dnn_ctr446_ListNewsByCategory_HyperLink1" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="active">
                        <span id="dnn_ctr446_ListNewsByCategory_lblCategoryName">{{ ucfirst($index->name) }}</span>
                    </li>
                </ul>
                <div class="head-seperator">
                    <h1 class="news-category-title">
                        <span id="dnn_ctr446_ListNewsByCategory_lblTitle">{{ ucfirst($index->name) }}</span>
                    </h1>
                </div>
                <div class="padtop10"></div>
                <div id="news_category">
                    @if(isset($posts))
                    @foreach($posts as $val)
                    <div class="row">
                        <div class="newsbycategory">
                            <div class="col-md-9">
                                <a href="{{ route('posts',$val->alias) }}">
                                <img src="{{ asset($val->image) }}" id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_ctrl0_Img1" class="img-subject img-responsive" alt="{{ ucfirst($val->name) }}" />
                                </a>
                            </div>
                            <div class="col-md-15">
                                <h2 class="nbc_title">
                                    <a class="link" href="{{ route('posts',$val->alias) }}">
                                    {{ $val->name }}</a>
                                </h2>
                                <div class="nbc_summary">
                                    {!! $val->description !!}
                                </div>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-24">
                            <div class="separate"></div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    Không có bài viết nào
                    @endif
                    
                    <div class="pull-right">
                        {{ $posts->render() }}
                    </div>
                    
                    <!-- <div class="RadDataPager RadDataPager_Metro" id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager">
                        <div class="rdpWrap">
                            <input type="submit" name="dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl00$FirstButton" value=" " onclick="return false;" id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager_ctl00_FirstButton" class="rdpPageFirst" /><input type="submit" name="dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl00$PrevButton" value=" " onclick="return false;" id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager_ctl00_PrevButton" class="rdpPagePrev" />
                        </div>
                        <div class="rdpWrap rdpNumPart">
                            <a onclick="return false;" class="rdpCurrentPage" href="javascript:__doPostBack(&#39;dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl01$ctl00&#39;,&#39;&#39;)"><span>1</span></a><a href="javascript:__doPostBack(&#39;dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl01$ctl01&#39;,&#39;&#39;)"><span>2</span></a><a href="javascript:__doPostBack(&#39;dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl01$ctl02&#39;,&#39;&#39;)"><span>3</span></a><a href="javascript:__doPostBack(&#39;dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl01$ctl03&#39;,&#39;&#39;)"><span>4</span></a><a href="javascript:__doPostBack(&#39;dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl01$ctl04&#39;,&#39;&#39;)"><span>5</span></a><a href="javascript:__doPostBack(&#39;dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl01$ctl05&#39;,&#39;&#39;)"><span>...</span></a>
                        </div>
                        <div class="rdpWrap">
                            <input type="submit" name="dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl02$NextButton" value=" " id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager_ctl02_NextButton" class="rdpPageNext" /><input type="submit" name="dnn$ctr446$ListNewsByCategory$radListNewsByCategory$radBottomDataPager$ctl02$LastButton" value=" " id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager_ctl02_LastButton" class="rdpPageLast" />
                        </div>
                        <input id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager_ClientState" name="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_radBottomDataPager_ClientState" type="hidden" />
                    </div> -->
                    <input id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_ClientState" name="dnn_ctr446_ListNewsByCategory_radListNewsByCategory_ClientState" type="hidden" /><span id="dnn_ctr446_ListNewsByCategory_radListNewsByCategory" style="display:none;"></span>
                </div>
            </div>
            <!-- End_Module_446 -->
        </div>
    </div>
</div>