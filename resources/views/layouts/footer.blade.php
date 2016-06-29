<div class="footer">
	<div class="container">
		<div class="footer-grids">
			<div class="footer-grid">
				<h3>About si Doank</h3>
				<p>
					Seorang "<i>Noob</i>-gramer" yang kebetulan juga permula, berkeinginan untuk merancang suatu Website yang berhubungan dengan sharing tentang artikel dan tutorial yang sudah ada, belum ada atau repost dengan sumber-sumber yang terpercaya. Website noob ini dirancang dengan framework Laravel v5.2 .
				</p>
			</div>
			<div class="footer-grid">
				<h3>Site Page</h3>
				<ul>
					<li id="footer-home" class="@yield('footer-home')"><a href="{{ url('/') }}">Home</a></li>
					<li class="@yield('footer-about')"><a href="{{ url('about')}}">About si Doank</a></li>
					<li id="footer-single" class="@yield('footer-gallery')"><a href="{{ url('articles')}}">Gallery</a></li>
					<li class="@yield('footer-contacts')"><a href="{{ url('contact')}}">Contact</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Pencarian Terfavorit</h3>
				<ul>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-php') }}">Ngoding PHP</a></li>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-vb') }}">Ngoding VB</a></li>
					<li><a href="{{ asset('artikel/search?kata_kunci=&select-subKateg=coding')}}">Bacaan Ngoding</a></li>
					<li><a href="{{ asset('artikel/search?kata_kunci=&select-subKateg=berita-hot') }}">Berita terkini</a></li>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-pc') }}">Game PC</a></li>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-ps') }}">Game PLayStation</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<div class="footer-bottom">
	<div class="container">
		<p>Developed By <a href="{{ url('about')}}">Si Doank</a><br>Template by <a href="http://w3layouts.com/"> w3layouts</a></p>
	</div>
	</div>