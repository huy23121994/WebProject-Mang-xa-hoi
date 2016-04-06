$(document).on('click','#like',function(e){
	e.preventDefault();
	var this_post=$(this),
		like=this_post.find('em').text();
	$.post(
		this_post.attr('href'),
		{'id':this_post.find('p.hide').text()},
		function(data){
			if (data=='like') {
				this_post.find('span').html('').html('Đã thích');
				this_post.find('em').html('').html(++like);
			}else{
				this_post.find('span').html('').html('Thích');
				this_post.find('em').html('').html(--like);
			}
		}
	)
})