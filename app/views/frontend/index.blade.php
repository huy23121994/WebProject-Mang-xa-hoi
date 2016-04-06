@extends('frontend/layout/layout_master')
@section('title')
	Hedspi Library
@stop
@section('addcss')
	<link rel="stylesheet" href="{{url('assets/css/main-style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('assets/css/jquery.flex-images.css')}}">
	    <link rel="stylesheet" href="{{url('assets/css/right-content.css')}}">

@stop
@section('addcontent')
	@include('frontend/header')
	<section class="container-fluid bh_main_content">
		<div class="container">
			<div class="row">
				<div class="col-md-3 bh_left_info">
					@include('frontend/child-info',array('current_status' => $current_status))
					@include('frontend/left-info',array('user' => Session::get('user')))
				</div>
				<div class="col-md-6 list-post">
					<div class="row">
						@include('frontend/list-post',array('status' => $status,'comments' => $comments,'like' => $like))
					</div>
				</div>
				@include('frontend/right-content')
			</div>
		</div>
	</section>
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