@extends('frontend/layout/layout_profile')
@section('title') {{ $user['fullname'] }} | Photo @stop
@section('addcss')
	<link rel="stylesheet" href="{{url('assets/css/main-style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('assets/css/jquery.flex-images.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/fileinput.css')}}" media="all" />
	<link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
@stop
@section('Photos')
	active
@stop

@section('profile_content')
	<div class="col-md-12" id="photo-upload">
			<!-- Large modal -->
		@if(Session::get('user')['account']==$user['account'])
			<div class="link-photo">
				<a href="{{url(Session::get('user')['account'].'/photo')}}">Ảnh của bạn</a>
				<a href="{{url(Session::get('user')['account'].'/photo/album')}}" class="active">Album của bạn</a>

				<button type="button" class="btn right" data-toggle="modal" data-target=".bs-example-modal-lg">Tạo Album mới</button>
			</div>
		@else
			<div class="link-photo">
				<a href="{{url($user['account'].'/photo')}}">Ảnh của {{$user['fullname']}}</a>
				<a href="{{url($user['account'].'/photo/album')}}" class="active">Album của {{$user['fullname']}}</a>
			</div>
		@endif
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg">
			    <div class="modal-content">
			    	<div class="modal-header">
				        <h4 class="modal-title">Tên Album</h4>
				        <input id="title" type="text" name="title" placeholder="Nhập tên album ...">
				        <select name="public" id="public">
				        	<option value="public">Public</option>
				        	<option value="friend">Friend</option>
				        	<option value="private">Private</option>
				        </select>
			      	</div>
			      	<div class="modal-body">
				        <div class="form-group">
							<input id="file" name="img[]" type="file" multiple class="file-loading" />
						</div>
					</div>
					<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
			    </div>
			</div>
		</div>
		<div class="text-center album_title">
			<i class="glyphicon glyphicon-ok"></i>
			<img src="{{url('assets/images/loading.gif')}}" alt="loading">
			<h4>{{$album['title']}}</h4>
		</div>
		
		<ul class="wrapper flex-images">
			@foreach($images as $image)
				<li class="item" data-w="{{$image['width']}}" data-h="{{$image['height']}}">
				    <img src="{{url('upload/'.$user['account'].'/'.$image['path'])}}" alt="test">
				</li>
			@endforeach
			<li class="item hide"></li>
		</ul>
	</div>
@stop
@section('addjs')
	<script src="{{url('assets/js/fileinput.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{url('assets/js/jquery.flex-images.min.js')}}"></script>
	<script type="text/javascript">
		$('.flex-images').flexImages({rowHeight: 250});
		$("#file").fileinput({
		    uploadUrl: "{{url('album/do-upload')}}", // server upload action
		    uploadAsync: false,
		    uploadExtraData: function(){
		    	return {
		    		'title':$('#title').val(),
		    		'public':$('#public').val()
		    	}
		    }
		    // maxFileCount: 5
		});
	@if(Session::get('user')['account']==$user['account'])
		$(document).ready(function(){
			var title = $('.album_title h4'),
				id = '{{$album['id']}}',
				url_action = "{{url('album/do-update')}}";
			title.hide();
			if (title.html()=='') {
				title.after('<form action="'+url_action+'"><input type="text" name="title" placeholder="Hãy thêm tên cho album của bạn"><input type="hidden" name="id" value="'+id+'"><button>Cập nhật</button></form>');
			}else{
				title.after('<form action="'+url_action+'"><input type="text" name="title" value="'+title.html()+'"><input type="hidden" name="id" value="'+id+'"><button>Cập nhật</button></form>');
			}
		})
	@endif
		$(document).on('submit','.album_title form',function(e){
			$('.album_title').find('img').show();
			e.preventDefault();
			var formdata=new FormData($(this)[0]);
			$.ajax({
				url: $(this).attr('action'),
				data: formdata,
				type: 'POST',
				cache: false,
				processData : false,
                contentType : false
			}).done(function(data){
				if (data=='success'){
					$('.album_title').find('img').hide();
					$('.album_title').find('i').show();
					setTimeout(function(){
						$('.album_title').find('i').fadeOut(1000);
					},500);
				};
			})
		})
	</script>
@stop