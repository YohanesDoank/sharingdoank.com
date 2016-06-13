<div class="header">
	<div class="container">
		<div class="header-info">
			<div class="logo">
				<a href=""><img src="{{ asset('images/logo.png') }}" alt=" " /></a>
			</div>
			<div class="logo-right">
				<span class="menu"><img src="{{ asset('images/menu.png') }}" alt=" "/></span>
				<ul class="nav1">
					<li class="@yield('selected-index')"><a href="{{ url('/') }}">Home</a></li>
					<li id="art" class="@yield('selected-articles')"><a href="{{ url('articles') }}">Articles</a></li>
					<li id="tut" class="@yield('selected-tutorials')"><a href="{{ url('tutorials') }}">Tutorials</a></li>
					<li class="@yield('selected-contact')"><a href="{{ url('contact') }}">Contact</a></li>
					
					@if (Auth::check())
                    <li class="@yield('selected-create')">
                        <a href="{{ url('/createPost') }}">Create Post</a>
                    </li>
                    <li class="@yield('selected-show')">
                        <a href="{{ url('/showPost') }}">List Post</a>
                    </li>
					<li class="@yield('selected-logout')">
                        <a href="{{ url('/logout') }}">Logout</a>
                    </li>
					@else
					<!--<li class="@yield('selected-login')">
                        <a href="{{ url('/login') }}">Login</a>
                    </li>-->
					@endif
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>