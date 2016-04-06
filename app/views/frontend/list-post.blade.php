@if(isset($user))
	@if(Session::get('user')['account']==$user['account'])
		<article class="col-md-12 item border up-post">
			<div class="top">
				<p class="bold"><i class="glyphicon glyphicon-pencil"></i>Status</p>
				<p class="bold"><i class="glyphicon glyphicon-camera"></i>Add Photo</p>
			</div>
			<form action="{{url('status/create')}}" id="up-post">
				<div class="content">
					<textarea placeholder="Bạn đang nghĩ gì?" name="content" data-autoresize spellcheck="false"></textarea>
					
				</div>
				<div class="up-button">
					<div class="right bold">
						<select name="public">
							<option value="public">Công khai</option>
							<option value="friend">Bạn bè</option>
							<option value="private">Chỉ mình tôi</option>
						</select>
						<input type="submit" value="Đăng">
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
			<img src="{{url('assets/images/loading.gif')}}" alt="loading">
			<div class="hide">
				<p class="current">{{Session::get('user')['avatar']}}</p>
				<p class="user_name">{{Session::get('user')['fullname']}}</p>
				<p class="link_proccess_comment">{{url('comment/create')}}</p>
				<p class="link_proccess_like">{{url('like/create')}}</p>
			</div>
		</article>
	@endif
@endif
	@foreach($status as $post)
		<article class="col-md-12 item border">
			<div class="p_post">
				<img class="ava radius_50 left" src="{{ url($post->user()->first()['avatar']) }}" alt="test">
				<div class="left">
					<h5>{{ $post->user()->first()['fullname'] }}</h5>
					<p class="light">{{$post['updated_at']}}</p>
				</div>
			</div>
			<div class="bh_text light">
				<p>{{ $post['content'] }}</p>
			</div>
			<div class="l-cmt">
				<div class="like">
				@if(Session::has('user'))
					<a href="{{url('like/create')}}" id="like">
						<em>{{ $post->like()->groupBy('status_id')->count() }} </em>
						<i class="glyphicon glyphicon-thumbs-up"></i>
						<span>
						@if($post->like()->first()['status_id']==$post['id'])
							@if( $post->like()->where('user_like',Session::get('user')['id'])->first() )
							Đã thích
							@endif
						@else
							Thích
						@endif
						</span>
						<p class="hide">{{ $post['id'] }}</p>
					</a>
				@else
					<a href="javascript:void(0)">
						<em>{{ $post->like()->groupBy('status_id')->count() }} </em>
						<i class="glyphicon glyphicon-thumbs-up"></i>
					</a>
				@endif
				</div>
				<div class="comment">
					<a href="javascript:void(0)">
						<em>{{ $post->comment()->groupBy('status_id')->count() }} </em>
						<i class="glyphicon glyphicon-comment"></i> Bình luận
					</a>
				</div>
			</div>
			<blockquote class="comment">
				<ul>
				@foreach($comments as $comment)
					@if($comment['status_id']==$post['id'])
					<li>
						<div class="ava">
							<img src="{{url('assets/images/ava_default.jpg')}}" alt="">
						</div>
						<div class="content">
							<a href=""><h5>{{$comment->user['fullname']}}</h5></a>
							<span class="light">{{$comment['content']}}</span>
							<p class="light">{{$comment['created_at']}}</p>
						</div>
					</li>
					@endif
				@endforeach
					<li>
						<div class="ava">
							<img src="{{url('assets/images/ava_default.jpg')}}" alt="">
						</div>
						<div class="input">
						<form action="{{url('comment/create')}}" id="comment">
							<textarea name="comment" data-autoresize placeholder="Viết bình luận..."></textarea>
							<p class="hide">{{ $post['id'] }}</p>
						</form>
						</div>
					</li>
				</ul>
			</blockquote>
		</article>
	@endforeach

