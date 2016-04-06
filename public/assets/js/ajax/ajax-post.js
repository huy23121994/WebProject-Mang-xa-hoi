
	$('#up-post').on('submit',function(e){
		e.preventDefault();
		if ($(this).find('textarea').val()!='') {
			$('article img[alt="loading"]').show();
			var current_user_ava=$('.up-post .hide .current').text(),
				user_name=$('.up-post .hide .user_name').text(),
				link_proccess_comment=$('.up-post .hide .link_proccess_comment').text();
				link_proccess_like=$('.up-post .hide .link_proccess_like').text();
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){
					
					$('article img[alt="loading"]').hide();

					var newstatus='<article class="col-md-12 item border"><div class="p_post"><img class="ava radius_50 left" src="'+current_user_ava+'" alt="test"><div class="left"><h5>'+user_name+'</h5><p class="light">Vừa xong</p></div></div><div class="bh_text"><p>'+$('.up-post textarea').val()+'</p></div><div class="l-cmt"><div class="like"><a href="'+link_proccess_like+'" id="like"><i class="glyphicon glyphicon-thumbs-up"></i><span>Thích</span><p class="hide">'+data+'</p></a></div><div class="comment"><a href="#"><i class="glyphicon glyphicon-comment"></i> Bình luận</a></div></div><blockquote class="comment"><ul><li><div class="ava"><img src="'+current_user_ava+'" alt=""></div><div class="input"><form action="'+link_proccess_comment+'" id="comment"><textarea data-autoresize name="comment" placeholder="Viết bình luận..."></textarea><p class="hide">'+data+'</p></form></div></li></ul></blockquote></article>';

					$('article.up-post').after(newstatus);
					$('#up-post')[0].reset();
					$('article.up-post').next().hide();
					setTimeout(function(){
							$('article.up-post').next().fadeIn(1000);
					},200)
				}
			)
		};
			
		})