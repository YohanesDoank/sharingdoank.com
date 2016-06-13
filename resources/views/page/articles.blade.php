@extends('layouts.layout')

@section('title')
Articles Sharing's Doank's 
@endsection

@section('selected-articles')
cap
@endsection

@section('content')
<div class="articles">
	<div class="container">
		<div class="article">
			<div class="article-left">
				<h3>Articles Of Note.ALL ARTICLES ></h3>
				<div class="article-grids">
					<div class="article-grid">
						<div class="article-grid-left">
							<a href="single.html"><img src="images/5.jpg" alt=" "  /></a>
						</div>
						<div class="article-grid-right">
							<h4><a href="single.html">Lorem ipsum dolor sit</a></h4>
							<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.
								Sed tristique finibus leo, et id.<span>March 28.</span></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="article-grid">
						<div class="article-grid-left">
							<a href="single.html"><img src="images/7.jpg" alt=" "  /></a>
						</div>
						<div class="article-grid-right">
							<h4><a href="single.html">Lorem ipsum dolor sit</a></h4>
							<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.
								Sed tristique finibus leo, et id.<span>March 28.</span></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="article-grid">
						<div class="article-grid-left">
							<a href="single.html"><img src="images/6.jpg" alt=" "  /></a>
						</div>
						<div class="article-grid-right">
							<h4><a href="single.html">Lorem ipsum dolor sit</a></h4>
							<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.
								Sed tristique finibus leo, et id.<span>March 28.</span></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="article-grid">
						<div class="article-grid-left">
							<a href="single.html"><img src="images/8.jpg" alt=" "  /></a>
						</div>
						<div class="article-grid-right">
							<h4><a href="single.html">Lorem ipsum dolor sit</a></h4>
							<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.
								Sed tristique finibus leo, et id.<span>March 28.</span></p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="article-right">
				<h3>Featured Publications</h3>
				<div class="article-right-grids">
					<div class="article-right-grid">
						<a href="images/9-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/9.jpg" alt=" " />
						</a>
						<h4><a href="single.html">News Articles</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="article-right-grid">
						<a href="images/16-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/16.jpg" alt=" " />
						</a>
						<h4><a href="single.html">Business Weak</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="article-right-grid">
						<a href="images/15-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/15.jpg" alt=" " />
						</a>
						<h4><a href="single.html">Stewart Living</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="clearfix"> </div>
					<div class="article-right-grid">
						<a href="images/12-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/12.jpg" alt=" " />
						</a>
						<h4><a href="single.html">iPhone Life</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="article-right-grid">
						<a href="images/14-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/14.jpg" alt=" " />
						</a>
						<h4><a href="single.html">Books Articles</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="article-right-grid">
						<a href="images/11-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/11.jpg" alt=" " />
						</a>
						<h4><a href="single.html">Coins Weekly</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="clearfix"> </div>
					<div class="article-right-grid">
						<a href="images/9-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/9.jpg" alt=" " />
						</a>
						<h4><a href="single.html">News Articles</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="article-right-grid">
						<a href="images/16-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/16.jpg" alt=" " />
						</a>
						<h4><a href="single.html">Business Weak</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="article-right-grid">
						<a href="images/15-.jpg" class="b-link-stripe b-animate-go   swipebox"  title="">
							<img src="images/15.jpg" alt=" " />
						</a>
						<h4><a href="single.html">Stewart Living</a></h4>
						<p>Pellentesque venenatis lorem vitae nisl scelerisque dignissim.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			<link rel="stylesheet" href="css/swipebox.css">
				<script src="js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
				<!-- Portfolio Ends Here -->
				<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
					<script type="text/javascript">
					$(function () {
						var filterList = {
							init: function () {
								// MixItUp plugin
							// http://mixitup.io
							$('#portfoliolist').mixitup({
								targetSelector: '.portfolio',
								filterSelector: '.filter',
								effects: ['fade'],
								easing: 'snap',
								// call the hover effect
								onMixEnd: filterList.hoverEffect()
							});	
						},
						hoverEffect: function () {
							// Simple parallax effect
							$('#portfoliolist .portfolio').hover(
								function () {
									$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
									$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
								},
								function () {
									$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
									$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
								}		
							);				
						}
					};
					// Run the show!
						filterList.init();
					});	
					</script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
@endsection