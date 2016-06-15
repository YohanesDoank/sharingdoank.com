jQuery(document).ready(function($) {
	
		var typePost = window.location.href.slice(window.location.href.indexOf('com/') + 4);
		var cut = typePost.substr(0, 3);
		if (cut == "art"){
			$('#art').attr('class', 'active');
		}
		else{
			$('#tut').attr('class', 'active');
		}
		var arrayVarImg = [100];

		//untuk mendapatkan host protocol
		// var base_urlxx = window.location.protocol + "//" + window.location.host + "/";
		// alert(base_urlxx);
		// alert(window.location.pathname);
		var currentUrl = window.location.pathname;
		var sub_currentUrl = currentUrl.substr(1, currentUrl.length);

		// alert(sub_currentUrl);
		var count = (sub_currentUrl.split("/")).length-1;
		// alert(count);
		$('.gambarUtama').each(function(){
			var current = $(this).attr('src');
			if (count == 3) {
				current = "../../" + current;	
			}
			else if(count == 4) {
				current = "../../../" + current;
			}
			$(this).attr('src', current);
		});
		var counter = 0;
		$('.img-responsive').each(function () {
	      var curSrc = $(this).attr('src');
	      // alert(curSrc.length);
	      arrayVarImg[counter] = curSrc.substr(3, curSrc.length - 3);
	      $(this).attr('src', arrayVarImg[counter]);
	      counter += 1;
    	});

});
