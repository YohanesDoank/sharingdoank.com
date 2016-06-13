<div class="footer">
	<div class="container">
		<div class="footer-grids">
			<div class="footer-grid">
				<h3>About Us</h3>
				<p>Nullam ac urna velit. Pellentesque in arcu tortor. 
				Pellentesque nec est et elit varius pulvinar eget vitae sapien. 
				Aenean vehicula accumsan gravida. Cum sociis natoque penatibus
				et magnis dis parturient montes, nascetur ridiculus mus. Phasellus 
				et lectus in urna consequat consectetur ut eget risus. Nunc augue diam, 
				mattis eu tristique luctus, aliquam vitae massa. Praesent lacinia nisi 
				sit amet risus cursus porta.</p>
			</div>
			<div class="footer-grid">
				<h3>Site Page</h3>
				<ul>
					<li id="footer-home" class="@yield('footer-home')"><a href="{{ url('/') }}">Home</a></li>
					<li class="@yield('footer-about')"><a href="{{ url('about')}}">About Us</a></li>
					<li id="footer-single" class="@yield('footer-gallery')"><a href="{{ url('articles')}}">Gallery</a></li>
					<li class="@yield('footer-contacts')"><a href="{{ url('contact')}}">Contact</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Praesent pharetra</h3>
				<ul>
					<li><a href="single">Vestibulum iaculis scelerisque</a></li>
					<li><a href="single">Cras aliquam erat</a></li>
					<li><a href="single">Morbi imperdiet ipsum</a></li>
					<li><a href="single">Donec faucibus mollis</a></li>
					<li><a href="single">Praesent lacinia nisi</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<div class="footer-bottom">
	<div class="container">
		<p>Template by<a href="http://w3layouts.com/"> w3layouts</a></p>
	</div>
	</div>
