jQuery(document).ready(function($) {
		
		$('#footer-single').attr('class', 'cap1');
		if ($('#ada').html() != null) {
			$('#related').html('Related Posts');
		}
		else{
			$('#related').html('Related Posts Not Found');
		}
	
		var typePost = window.location.pathname;

		var cut = typePost.substr(18, 3);
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
			else if(count == 5) {
				current = "../../../../" + current;
			}
			$(this).attr('src', current);
			// $(this).attr('href', );
		});
		var counter = 0;
		$('.img-responsive').each(function () {
	      var curSrc = $(this).attr('src');
	      // alert(curSrc.length);
	      if (count == 4) {
	      	$(this).attr('src', "../" + curSrc);
	      	$(this).attr('href', "../" + curSrc);
	      }
	      else if (count == 5) {
	      	$(this).attr('src', "../../" + curSrc);
	      	$(this).attr('href', "../../" + curSrc);
	      }
	      else{
	      	$(this).attr('href', curSrc);
	      }

	      // arrayVarImg[counter] = curSrc.substr(3, curSrc.length - 3);
	      // counter += 1;
    	});


});
