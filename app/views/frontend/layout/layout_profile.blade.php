@extends('frontend/layout/layout_master')
@section('addcontent')
	@include('frontend/header')

	{{--------------------- Banner -------------------------}}
	<section class="bh_banner container-fluid" style="">
		<div class="row">
			<div class="bh_bgr text-center">
			<section class="cd-intro">
				<div class="wrapper cd-intro-content bouncy">
					<div class="img cd-btn">
						<img src="{{url($user['avatar'])}}" alt="avatar">
					</div>
					<h1>{{ $user['fullname']}}</h1>
					<p>I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.</p>
				</div>
			</section>
				<ul class="bh_link-list">
					<li class="@yield('Photos')">
						<a href="{{url('/'.$user['account'].'/photo')}}">Photos</a>
					</li>
					<li class="@yield('Timeline')">
						<a href="{{url('/'.$user['account'])}}">Timeline</a>
					</li>
					<li class="@yield('Blog')">
						<a href="{{url('/'.$user['account'].'/blog')}}">Blog</a>
					</li>
					<li class="@yield('MyInfo')">
						<a href="{{url('/'.$user['account'].'/info')}}">Info</a>
					</li>
					<li class="@yield('Friend')"><a href="{{url('/'.$user['account'].'/friend')}}">Friends</a></li>
				</ul>
			</div>
		</div>
	</section>
	{{--------------------- End Banner ---------------------}}


	{{--------------------- Main Content ---------------------}}
	<section class="container-fluid bh_main_content" style="margin-top:0">
		<div class="container">
			<div class="row">
				
				@yield('profile_content')

			</div>
		</div>
	</section>
@stop