<header>
	<div class="LogoRow">
		<div class="container">
			<div class="Logo">
				<a id="dnn_dnnLogo_hypLogo" title="Công ty cổ phần MISA" href="{{ route('home') }}"><img id="dnn_dnnLogo_imgLogo" src="{{ asset('assets/frontend/img/logo.png') }}" alt="Công ty cổ phần MISA" /></a>
			</div>
			<a class="ToggleNav" href="javascript:void(0)"><i class="fa fa-list"></i></a>
			<div class="MobileNav">
				<div id="dnn_CallCenterContentMobile">
					<div class="DnnModule DnnModule-DNN_HTML DnnModule-641">
						<a name="641"></a>
						<div id="dnn_ctr641_ContentPane">
							<!-- Start_Module_641 -->
							<div id="dnn_ctr641_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
								<div id="dnn_ctr641_HtmlModule_lblContent" class="Normal">
									<div style="padding: 15px 0px; margin-top: 10px;">Tổng đ&agrave;i tư vấn hỗ trợ kh&aacute;ch h&agrave;ng: <strong style="font-size: 16px; color: red;">1900 636 083</strong></div>
								</div>
							</div>
							<!-- End_Module_641 -->
						</div>
					</div>
				</div>
				<div class="SearchBoxGoogleMobile">
					<div id="dnn_searchBoxControlMobile" class="DNNEmptyPane"></div>
				</div>
				<!--SEO NOINDEX-->
				<div id="dnnMobileMenu">
					<ul class="mobileTopLevel">
						@if(isset($menus))
						@foreach($menus as $val)
					
						<li class="itemMobile haschildMobile">
							<a href="@if(empty($val->cursor)) javascript:void(0) @else{{ route('menu',$val->alias) }}@endif"><span>{{ ucfirst($val->name) }}</span></a>
							<div class="mobileSubLevel">
							<?php
								$menu_lv2 = DB::table('menu')->select('name','alias','cursor')->where(['fk_parentid' => $val->id , 'status' => 1])->orderBy('order','desc')->get();
							?>
								@if(isset($menu_lv2))
								@foreach($menu_lv2 as $val2)
								<ul>
									<li class="itemMobile">
										<a href="@if(empty($val->cursor)) javascript:void(0) @else{{ route('menu',$val2->alias) }}@endif"><span>{{ ucfirst($val2->name) }}</span></a>
									</li>
								</ul>
								@endforeach
								@endif
							</div>
						</li>
						@endforeach
						@endif
						
						
						<li class="itemMobile lastMobile">
							<a href="{{ route('contact') }}"><span>Li&#234;n hệ</span></a>
						</li>
					</ul>
				</div>
				<!--END SEO-->
			</div>
			<nav class="Nav">
				<h3 style="float: left; margin: 26px 63px;color: #009DCC;font-size:26px !important">CÔNG TY GIẢI PHÁP CÔNG NGHỆ NIDI</h3>
				<div id="dnn_CallCenterContent">
					<div class="DnnModule DnnModule-DNN_HTML DnnModule-640">
						<a name="640"></a>
						<div id="dnn_ctr640_ContentPane">
							<!-- Start_Module_640 -->
							<div id="dnn_ctr640_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
								<div id="dnn_ctr640_HtmlModule_lblContent" class="Normal">
									<span style="position: absolute; right: 0px; top: 10px;">Tổng đ&agrave;i tư vấn hỗ trợ kh&aacute;ch h&agrave;ng: <strong style="font-size: 16px; color: red;">1900 636 083</strong></span>
								</div>
							</div>
							<!-- End_Module_640 -->
						</div>
					</div>
				</div>
				<form method="post" action="{{ route('search.post') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="SearchBoxGoogle">
					<div id="dnn_searchBoxControl">
						<div class="DnnModule DnnModule-MISAGoogleSearch DnnModule-653">
							<a name="653"></a>
							<div id="dnn_ctr653_ContentPane">
								<!-- Start_Module_653 -->
								<div id="dnn_ctr653_ModuleContent" class="DNNModuleContent ModMISAGoogleSearchC">
									<div class="RadAjaxPanel" id="dnn_ctr653_ViewMISA.GoolgeSearch_dnn_ctr653_ViewMISA.GoolgeSearch_ctl00Panel">
										<div id="dnn_ctr653_ViewMISA.GoolgeSearch_ctl00">
											<!-- 2013.2.717.40 -->
											<span id="dnn_dnnSearch_ClassicSearch">
											<span class="searchInputContainer" data-moreresults="See More Results" data-noresult="No Results Found">
											<span id="dnn_ctr653_ViewMISA.GoolgeSearch_txtSearch_wrapper" class="riSingle RadInput RadInput_Default" style="width:260px;"><input minlength="4" id="dnn_ctr653_ViewMISA.GoolgeSearch_txtSearch" name="key" size="20" maxlength="255" class="riTextBox riEmpty NormalTextBox" value="@if(isset($key)){{ $key }}@endif" type="text" /><input id="dnn_ctr653_ViewMISA.GoolgeSearch_txtSearch_ClientState" name="dnn_ctr653_ViewMISA.GoolgeSearch_txtSearch_ClientState" type="hidden" /></span>
											</span>
											<button type="submit" id="dnn_ctr653_ViewMISA.GoolgeSearch_lnkSearch" class="SkinObject search-button" href="javascript:__doPostBack(&#39;dnn$ctr653$ViewMISA.GoolgeSearch$lnkSearch&#39;,&#39;&#39;)">Tìm kiếm</button>
											</span>
											
										</div>
									</div>
								</div>
								<!-- End_Module_653 -->
							</div>
						</div>
					</div>
				</div>
				</form>
				<!--SEO NOINDEX-->
				<div id="dnnMenu">

					<ul class="topLevel">

						@if(isset($menus))
						@foreach($menus as $val)
					
						<li class="item haschild">
							<a href="@if(empty($val->cursor)) javascript:void(0) @else{{ route('menu',$val->alias) }}@endif"><span>{{ ucfirst($val->name) }}</span></a>
							<div class="subLevel">
							<?php
								$menu_lv2 = DB::table('menu')->select('name','alias','cursor')->where(['fk_parentid' => $val->id , 'status' => 1])->orderBy('order','desc')->get();
							?>
								@if(isset($menu_lv2))
								@foreach($menu_lv2 as $val2)
								<ul>
									<li class="item">
										<a href="@if(empty($val->cursor)) javascript:void(0) @else{{ route('menu',$val2->alias) }}@endif"><span>{{ ucfirst($val2->name) }}</span></a>
									</li>
								</ul>
								@endforeach
								@endif
							</div>
						</li>
						@endforeach
						@endif
						<li class="item last">
							<a href="{{ route('contact') }}"><span>Li&#234;n hệ</span></a>
						</li>
					</ul>
				</div>
				<!--END SEO-->
			</nav>
		</div>
	</div>
</header>