
	var arrayVarImg = [100];
		var counter = 0;
		$('.img-responsive').each(function () {
	      var curSrc = $(this).attr('src');
	      // alert(curSrc.length);
	      arrayVarImg[counter] = curSrc.substr(6, curSrc.length - 5);
	      $(this).attr('src', arrayVarImg[counter]);
	      counter += 1;
    	});