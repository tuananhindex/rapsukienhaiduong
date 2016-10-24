@extends('backend.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ ucwords($e['module']) }}
        
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('backend.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo route($e['route']) ?>">{{ ucwords($e['module']) }}</a></li>
    </ol>

</section>
<section class="content">
	@if(Session::has('alert'))
		{!! Session::get('alert') !!}
	@endif
</section>
@endsection
