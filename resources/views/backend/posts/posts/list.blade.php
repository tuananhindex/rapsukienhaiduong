@extends('backend.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ ucwords($e['module']) }}
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('backend.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo route($e['route'].'.list.get') ?>">{{ ucwords($e['module']) }}</a></li>
        <li class="active">{{ ucwords($e['action']) }}</li>
        
    </ol>

</section>
<!-- Main content -->
<section class="content">
    
    <div class="row">
        <div class="col-xs-12">
            @if(Session::has('alert'))
                {!! Session::get('alert') !!}
            @endif
            <form method="post" action="<?php echo route($e['route'].'.list.post') ?>">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box">
                @include('backend.widget.list_box_header')


                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="min-height:250px;">
                  <div class="form-inline">
                      <label style="margin:0 5px 0 12px;">Danh Mục</label>
                      <select class="form-control filter_cat">
                        <option value="0">Không</option>
                        {!! $MultiLevelSelect !!}
                      </select>

                      <label style="margin:0 5px 0 12px;">Ngôn Ngữ</label>
                      <select class="form-control filter_language">
                        @foreach($languages as $val)
                        <option value="{{ $val->id }}" @if((isset($_GET['lang_id']) && $_GET['lang_id'] == $val->id) || $val->id == $df_lang->id ) selected @endif>{{ ucfirst($val->name) }} @if($val->id == $df_lang->id) - Default @endif</option>
                        @endforeach
                      </select>
                  </div>

                  <table class="table table-hover">
                    <tbody>
                    <tr>
                      <th><input type="checkbox" class="check_box_all"></th>
                      <th>Ảnh</th>
                      <th>Tên</th>
                      <th>Ngày tạo</th>
                      <th>Cập nhật gần nhất</th>
                      <th>Trạng thái</th>
                      <th colspan="2">Chức năng</th>
                    </tr>
                    @foreach($data as $val)
                    <tr>
                      <td><input type="checkbox" class="check_box" name="id[]" value="{{ $val->id }}"></td>
                      <td>@if(file_exists($val->image)) <img src="{{ asset($val->image) }}" width="100"> @endif</td>
                      <td><a href="<?php echo route($e['route'].'.edit.get',[$val->id,$val->language]) ?>">{{ ucfirst($val->name) }}</a></td>
                      <td>{{ date('h:i d/m/Y',strtotime($val->create_at)) }}</td>
                      <td>@if(!empty($val->update_at)){{ date('h:i d/m/Y',strtotime($val->update_at)) }}@else Chưa có cập nhật @endif</td>
                      <td>
                        @if($val->status == 1)
                            <span class="label label-success">Hiển Thị</span>
                        @else
                            <span class="label label-danger">Không Hiển Thị</span>
                        @endif
                      </td>
                      <td>
                        <a href="<?php echo route($e['route'].'.edit.get',[$val->id,$val->language]) ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                      </td>
                      <td>
                        <a href="<?php echo route($e['route'].'.delete',$val->id) ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                 
                </div><!-- /.box-body -->
            </div>
            <div class="pull-right">
                {!! $data->render() !!}
            </div>
            
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
  $('select.filter_cat').change(function(){
      var val = $(this).val();
      var lang = getUrlParameter('lang_id');
      if(lang){
        if(val == 0){
          location.href = '{{ route(Route::currentRouteName()) }}?lang_id='+lang;
        }else{
          location.href = '{{ route(Route::currentRouteName()) }}?lang_id='+lang+'&cat_id='+val;
        }
      }else{
        if(val == 0){
          location.href = '{{ route(Route::currentRouteName()) }}';
        }else{
          location.href = '{{ route(Route::currentRouteName()) }}?cat_id='+val;
        }
      }
      
      
  });

  $('select.filter_language').change(function(){
      var val = $(this).val();
      var cat = getUrlParameter('cat_id');
      if(cat){
        if(val == 0){
          location.href = '{{ route(Route::currentRouteName()) }}?cat_id='+cat;
        }else{
          location.href = '{{ route(Route::currentRouteName()) }}?cat_id='+cat+'&lang_id='+val;
        }
      }else{
        if(val == 0){
          location.href = '{{ route(Route::currentRouteName()) }}';
        }else{
          location.href = '{{ route(Route::currentRouteName()) }}?lang_id='+val;
        }
      }
  });
  
</script>
<!-- /.content -->
@endsection