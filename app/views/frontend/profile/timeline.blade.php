@extends('frontend/layout/layout_profile')
@section('title') {{ $user['fullname'] }} | Timeline @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('assets/css/main-style.css')}}">
	<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('assets/css/jquery.flex-images.css')}}">
@stop
@section('Timeline')
	active
@stop

@section('profile_content')
	<div class="col-md-3 bh_left_info">
		@include('frontend/left-info')
	</div>
	<div class="col-md-9 list-post">
		<div class="row">
			@include('frontend/list-post',array('status'=>$status,'comments' => $comments))
		</div>
	</div>
@stop

@section('addjs')
	<script type="text/javascript" src="{{url('assets/js/jquery.flex-images.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/ajax/ajax-post.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/ajax/ajax-comment.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/ajax/ajax-like.js')}}"></script>
	<script type="text/javascript">
		$('.flex-images').flexImages({rowHeight: 150});
	</script>

@stop