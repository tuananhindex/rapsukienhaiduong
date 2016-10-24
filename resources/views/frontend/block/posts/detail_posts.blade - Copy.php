<div id="dnn_RowTwo9" class="ContentPadding">
    <div class="DnnModule DnnModule-MISACMS DnnModule-579">
        <a name="579"></a>
        <div id="dnn_ctr579_ContentPane">
            <!-- Start_Module_579 -->
            <div id="dnn_ctr579_ModuleContent" class="DNNModuleContent ModMISACMSC">
                <div id="news_detail">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1793221824242644";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <article class="n-details">
                        <ul class="breadcrumb news-nav">
                            <li>
                                <a id="dnn_ctr579_ctlNewsDetail_HyperLink1" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            @if(isset($category))
                            <li>
                                <a id="dnn_ctr579_ctlNewsDetail_lnkNewsCategory" href="{{ route('posts.category',$category->alias) }}">{{ ucfirst($category->name) }}</a>
                            </li>
                            @endif
                            <li class="active">
                                <span id="dnn_ctr579_ctlNewsDetail_Label2">{{ ucfirst($index->name) }}</span>
                            </li>
                        </ul>
                        <h1>
                            {{ $index->name }}
                        </h1>
                        <input type="hidden" name="dnn$ctr579$ctlNewsDetail$hiddenNewsID" id="dnn_ctr579_ctlNewsDetail_hiddenNewsID" value="52833" />
                        <input type="hidden" name="dnn$ctr579$ctlNewsDetail$hdCateName" id="dnn_ctr579_ctlNewsDetail_hdCateName" value="Thuế" />
                        <input type="hidden" name="dnn$ctr579$ctlNewsDetail$hdCateId" id="dnn_ctr579_ctlNewsDetail_hdCateId" value="94" />
                        <input type="hidden" name="dnn$ctr579$ctlNewsDetail$hdCateTabId" id="dnn_ctr579_ctlNewsDetail_hdCateTabId" value="89" />
                        <input type="hidden" name="dnn$ctr579$ctlNewsDetail$hdCateUrl" id="dnn_ctr579_ctlNewsDetail_hdCateUrl" value="Thue" />
                        <input type="hidden" name="dnn$ctr579$ctlNewsDetail$HiddenField1" id="dnn_ctr579_ctlNewsDetail_HiddenField1" />
                        <div class="datetime">
                            <span id="dnn_ctr579_ctlNewsDetail_Label1">Ngày tạo</span>:
                            <span id="dnn_ctr579_ctlNewsDetail_lblPublishedDate" class="date-info">{{ date('h:i d/m/Y',strtotime($index->create_at)) }}</span>
                            -
                            <span id="dnn_ctr579_ctlNewsDetail_lblReadCount">Số lần đọc</span>:
                            <span id="dnn_ctr579_ctlNewsDetail_lblPageView" class="date-info">{{ $index->view }}</span>
                        </div>
                        <div style='border-top: dashed 1px #000000; border-bottom: dashed 1px #000000; padding: 10px 0; margin-bottom: 10px'>
                            <div style="width: 100px; float: left">
                                <div class='fb-like' data-href='http://www.misa.com.vn/tin-tuc/chi-tiet/newsid/52833/Thai-Lan-ap-thue-chong-ban-pha-gia-thep-Viet-Nam-hon-310' data-send='true' data-layout="button_count" data-action="like" data-show-faces="false" data-share="false" style='padding-right: 30px'></div>
                                <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
                            </div>
                            <div style="width: 110px; float: left">
                                <div class="fb-share-button" data-href='http://www.misa.com.vn/tin-tuc/chi-tiet/newsid/52833/Thai-Lan-ap-thue-chong-ban-pha-gia-thep-Viet-Nam-hon-310' data-type=" button_count" style='padding-right: 30px'></div>
                            </div>
                            <div style="width: 100px; float: left">
                                <div class="g-plusone" data-size="medium"></div>
                            </div>
                            <!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
                            <script type="text/javascript">
                                window.___gcfg = {lang: 'vi'};
                                
                                (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                            <div class="clear">
                            </div>
                        </div>
                        <div class="n_content">
                            {!! $index->content !!}
                        </div>
                        <!-- <div class="n-postedname link-title fr">
                            <span id="dnn_ctr579_ctlNewsDetail_lblPostedName">Theo Thời báo kinh tế Sài Gòn online</span>
                        </div> -->
                        <div class="clear">
                        </div>
                        <div style='border-top: dashed 1px #000000; border-bottom: dashed 1px #000000; padding: 10px 0; margin-bottom: 10px'>
                            <div style="width: 100px; float: left">
                                <div class='fb-like' data-href='http://www.misa.com.vn/tin-tuc/chi-tiet/newsid/52833/Thai-Lan-ap-thue-chong-ban-pha-gia-thep-Viet-Nam-hon-310' data-send='true' data-layout=" button_count" data-action="like" data-show-faces="false" data-share="false" style='padding-right: 30px'></div>
                                <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
                            </div>
                            <div style="width: 110px; float: left">
                                <div class="fb-share-button" data-href='http://www.misa.com.vn/tin-tuc/chi-tiet/newsid/52833/Thai-Lan-ap-thue-chong-ban-pha-gia-thep-Viet-Nam-hon-310' data-type=" button_count" style='padding-right: 30px'></div>
                            </div>
                            <div style="width: 100px; float: left">
                                <div class="g-plusone" data-size="medium"></div>
                            </div>
                            <!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
                            <script type="text/javascript">
                                window.___gcfg = {lang: 'vi'};
                                
                                (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                            <div class="clear">
                            </div>
                        </div>
                        <br/><br/><!-- Thẻ: <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=thuế'>thuế</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=chống%20bán%20phá%20giá'> chống bán phá giá</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=thép'> thép</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=thái%20lan'> thái lan</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=việt%20nam'> việt nam</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=Phần%20mềm%20kế%20toán'> Phần mềm kế toán</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=phần%20mềm%20kế%20toán%20doanh%20nghiệp'> phần mềm kế toán doanh nghiệp</a>, <a class='tag-link' href='http://www.misa.com.vn/tin-tuc/tags?tags=phần%20mềm%20kế%20toán%20online'> phần mềm kế toán online</a> -->
                        <div class="clear line">
                        </div>
                        <div class="n-topics">
                            <div>

                                <div class="dnnLabel">    
                                    <label id="dnn_ctr579_ctlNewsDetail_lblRelatedTitle_label">
                                    <span id="dnn_ctr579_ctlNewsDetail_lblRelatedTitle_lblLabel" class="link-title">Tin tức liên quan</span>   
                                    </label>
                                </div>
                                @if(count($same_posts) != 0)
                                <div class="news_related">
                                    @foreach($same_posts as $val)
                                    <div class="bg_related">
                                        <a class="link_related" href="{{ route('posts',$val->alias) }}">
                                        {{ $val->name }}</a><span class="datetime"> ({{ date('h:i d/m/Y',strtotime($index->create_at)) }})</span>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                Không có bài viết nào
                                @endif
                            </div>
                        </div>
                    </article>
                    <script type="text/javascript">
                        function imposeMaxLength(Object, MaxLen) {
                            return (Object.value.length <= MaxLen);
                        }
                        
                        function maxLengthPaste(field, maxChars) {
                            event.returnValue = false;
                            if ((field.value.length + window.clipboardData.getData("Text").length) > maxChars) {
                                return false;
                            }
                            event.returnValue = true;
                        }
                        
                        $(document).ready(function () {
                            var portalID = 0;               
                        
                                var newsID = $("#dnn_ctr579_ctlNewsDetail_hiddenNewsID").val();
                        
                                if (newsID != null) {
                                    var service = '/DesktopModules/MISACMS/Services/MISACMSService.asmx';
                        
                                    Sys.Net.WebServiceProxy.invoke(service
                                        , "UpdateReadCount"
                                        , false
                                        , { iNewsID: newsID,iPortalID :portalID }
                                        );
                                }
                                $("#news_detail img").removeAttr("style");
                                $("#news_detail img").addClass("img-responsive");
                        
                                //var windowSize = window.innerWidth;
                        
                                //if (windowSize < 600){
                                //    $("#news_detail video").width("100%");
                                //    $("#news_detail video").height("100%");
                                //}
                            });
                          
                    </script>
                </div>
            </div>
            <!-- End_Module_579 -->
        </div>
    </div>
</div>