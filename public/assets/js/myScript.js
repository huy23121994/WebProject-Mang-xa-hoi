$(document).ready(function(){

	// Textarea autoresize
	$.each($('textarea[data-autoresize]'), function() {
	    var offset = this.offsetHeight - this.clientHeight;
	 
	    var resizeTextarea = function(el) {
	        $(el).css('height', 'auto').css('height', el.scrollHeight + offset);
	    };
	    $(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
	});

	// Windows pushState

	$(function(){
		var $main = $('#photo-upload');

		$(document).on('click', '.link-photo a', function() {
			var href = $(this).attr("href"),
				init = function() {
		        	$('.flex-images').flexImages({rowHeight: 250});
		    	};
			
			history.pushState({}, '', href);
			$main.load(href + " #photo-upload>*",init);
			return false;
		});

		$(document).on('click', '#photo-upload .item a', function() {
			var href = $(this).attr("href"),
				init = function() {
		        	$('.flex-images').flexImages({rowHeight: 250});
		    	};
			
			history.pushState({}, '', href);
			$main.load(href + " #photo-upload>*",init);
			return false;
		});
	})
})