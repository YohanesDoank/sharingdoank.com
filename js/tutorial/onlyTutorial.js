
	var url = window.location.href.slice(window.location.href.indexOf('com/') + 4);
	var x = url.substr(0, 16);
	// 	alert(x);
	if (x == "tutorials/search") {
		var arrayVarImg = [100];
		var counter = 0;
		$('.url-tutorial img').each(function () {
		      var curSrc = $(this).attr('src');
		      if (curSrc != "no-image") {
		      	$(this).attr('src', '../' + curSrc);
		      }
		      else{
		      	$(this).attr('src', '{{ asset("images/no-image.jpg") }}');	
		      }
	    });

	    $('.url-tutorial').each(function () {
		      var curSrc = $(this).attr('href');
		      $(this).attr('href', '../' + curSrc);
	    });
	}
	else{
		$('.url-tutorial img').each(function () {
		      var curSrc = $(this).attr('src');
		      if (curSrc == "no-image") {
		      	$(this).attr('src', '{{ asset("images/no-image.jpg") }}');	
		      }
	    });
	}