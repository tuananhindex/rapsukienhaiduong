@extends('frontend.master')
@section('content')
<link href="{{ asset('assets/frontend/css/Testimonial.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('assets/frontend/css/Telerik.Web.UI.WebResource.axd.css') }}" type="text/css" rel="stylesheet" />
<section class="Content">
    
    <div class="FullWidthBgOne">
        <div class="container">
            <div class="row">
                <div class="col-md-24">
                    <div id="dnn_FullWidthBgOne" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="TopContent">
        <div class="container">
            <div class="row">
                <div class="col-md-24">
                    <div id="dnn_RowOne12" class="ContentPadding DNNEmptyPane"></div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-18 border-column">
                	{!! App\Http\Controllers\frontend\BlockController::customer_reviews_page() !!}

                </div>
                <div class="col-md-6">
                    <div id="dnn_RowTwo3" class="ContentPadding">
                    	{!! App\Http\Controllers\frontend\BlockController::customer_support() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-16">
                    <div id="dnn_RowThree8" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-8">
                    <div id="dnn_RowThree4" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-14">
                    <div id="dnn_RowFour7" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-10">
                    <div id="dnn_RowFour5" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="dnn_RowFiveLeft6" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-12">
                    <div id="dnn_RowFiveRight6" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="dnn_RowSixLeft4" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-8">
                    <div id="dnn_RowSixMiddle4" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-8">
                    <div id="dnn_RowSixRight4" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="dnn_RowSevenLeftOuter3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-6">
                    <div id="dnn_RowSevenLeftInner3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-6">
                    <div id="dnn_RowSevenRightInner3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-6">
                    <div id="dnn_RowSevenRightOuter3" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-24">
                    <div id="dnn_ContentPane" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="FullWidthBgTwo">
        <div id="dnn_FullWidthBgTwo" class="ContentPadding DNNEmptyPane"></div>
    </div>
    <div class="BottomContent">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="dnn_RowEightLeftOuter3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-6">
                    <div id="dnn_RowEightLeftInner3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-6">
                    <div id="dnn_RowEightRightInner3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-6">
                    <div id="dnn_RowEightRightOuter3" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="dnn_RowNineLeft4" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-8">
                    <div id="dnn_RowNineMiddle4" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-8">
                    <div id="dnn_RowNineRight4" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="dnn_RowTenLeft6" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-12">
                    <div id="dnn_RowTenRight6" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div id="dnn_RowEleven5" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-14">
                    <div id="dnn_RowEleven7" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="dnn_RowTwelve4" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-16">
                    <div id="dnn_RowTwelve8" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div id="dnn_RowThirteen3" class="ContentPadding DNNEmptyPane"></div>
                </div>
                <div class="col-md-18">
                    <div id="dnn_RowThirteen9" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-24">
                    <div id="dnn_RowFourteen12" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="FullWidthBgThree">
        <div class="container">
            <div class="row">
                <div class="col-md-24">
                    <div id="dnn_FullWidthBgThree" class="ContentPadding DNNEmptyPane"></div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

 




 



 
 
 
 






 





 




 



 
 
 
 






 





 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 







 




 



 
 
 
 




