jQuery(document).ready(function($) {
		var arrayVarImg = [100];
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});

		$( "span.menu" ).click(function() {
			$( "ul.nav1" ).slideToggle( 300, function() {
			// Animation complete.
			});
		});
		
		$().UItoTop({ easingType: 'easeOutQuart' });

});
