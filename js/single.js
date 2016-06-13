jQuery(document).ready(function($) {
	
		var typePost = window.location.href.slice(window.location.href.indexOf('com/') + 4);
		var cut = typePost.substr(0, 3);
		if (cut == "art"){
			$('#art').attr('class', 'cap');
		}
		else{
			$('#tut').attr('class', 'cap');
		}
		var arrayVarImg = [100];

		$('.gambarUtama').each(function(){
			var current = $(this).attr('src');
			current = "../" + current;
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
