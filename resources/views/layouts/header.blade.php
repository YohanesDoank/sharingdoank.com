<div class="header nav-down" id="header">
	<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="{{ asset('/') }}" class="navbar-brand" id="brand"><strong>S</strong>haring<strong>D</strong>oank</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li class="@yield('selected-index')">
          <a href="{{ asset('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"> <strong>Home</strong></span></a>
        </li>
			<li id="art" class="dropdown @yield('selected-articles')">
		        <a href="{{ url('artikel') }}" class="dropdown-toggle">
		        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"> <strong>Artikel</strong></span>
		        <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="{{ asset('artikel/search?kata_kunci=&select-subKateg=coding') }}">Coding</a></li>
		          <li><a href="{{ asset('artikel/search?kata_kunci=&select-subKateg=berita-hot') }}">Berita Hot</a></li>
		          <li><a href="{{ asset('artikel/search?kata_kunci=&select-subKateg=pengetahuan-umum') }}">Pengetahuan Umum</a></li>
		        </ul>
	      	</li>
        <li>
        </li>
        <li id="tut" class="dropdown @yield('selected-tutorials')">
		  <a href="{{ url('tutorial') }}" class="dropdown-toggle">
		        <span class="glyphicon glyphicon-pencil" aria-hidden="true"> <strong>Tutorial</strong></span>
		        <b class="caret"></b></a>
		  <ul class="dropdown-menu" id="menu1">
		    <li>
		        <a href="#">Coding<i class="icon-arrow-right"></i></a>
		        <ul class="dropdown-menu sub-menu">
		            <li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-php') }}">PHP</a></li>
		            <li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-vb') }}">VB</a></li>
		            <li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-java-desktop') }}">Java Desktop</a></li>
		            <li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-java-mobile') }}">Java Mobile</a></li>
		            <!-- <li class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		            <li><a href="#">One more separated link</a></li> -->
		        </ul>
		    </li>
		    <li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=sulap') }}">Sulap</a></li>
		    <li>
		    	<a href="#">Game
		        <ul class="dropdown-menu sub-menu">
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-mobile') }}">Game Mobile</a></li>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-pc') }}">Game PC</a></li>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-ps') }}">Game PLayStation</a></li>
					<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-jadul') }}">Game Jaman Dulu</a></li>
		        </ul>
		    	</a>
		    </li>
		    <li class="divider"></li>
		    <li><a href="#">Tutorial n</a></li>
		  </ul>
		</li>
		<li>
		</li>
			<li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> <strong>Refreshing</strong></span>
		        <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Trik</a></li>
		          <li><a href="#">Cerita Pendek</a></li>
		          <li><a href="#">Cerita Humor</a></li>
		        </ul>
	      </li>
        <li class="@yield('selected-contact')">
          <a href="{{ url('contact') }}"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"> <strong>Contact</strong></span></a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
              <li class="@yield('selected-create')" >
                  <a href="{{ url('/createPost') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"><strong> Create-Post</strong></span></a>
              </li>
              <li class="@yield('selected-show')">
                  <a href="{{ url('/showPost') }}"><span class="glyphicon glyphicon-th-list" aria-hidden="true"><strong> List-Post</strong></span></a>
              </li>
              <li class="@yield('selected-logout')">
                 <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"><strong> Logout</strong></span></a>
              </li>
		@else
					<!--<li class="@yield('selected-login')">
                        <a href="{{ url('/login') }}">Login</a>
                    </li>-->
		@endif
		</ul>
    </nav>
  </div>
  
</header>
</div>
</style>