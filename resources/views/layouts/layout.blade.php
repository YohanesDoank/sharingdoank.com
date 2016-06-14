<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>
	@yield('title')
</title>
<!-- for-mobile-apps -->
<meta name="csrf_token" content="{{ csrf_token() }}"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Floral Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />


<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/font_OpenSans.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('css/font_Lato.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('css/font_PlayFair.css') }}" rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ asset('js/jquery-2.2.0.js') }}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/toggleMobileMenu.js') }}"></script>
<!-- start-smoth-scrolling -->
<style type="text/css">
.navbar-inverse { background-color: #613E23}
.navbar-inverse .navbar-nav>.active>a:hover,.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus { background-color: #C98F1A}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.open>a,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus { background-color: #BA8B3A}
.dropdown-menu { background-color: #AB7A32}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-color: #1F1B07}
.navbar-inverse { background-image: none; }
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-image: none; }
.navbar-inverse { border-color: #8C5D26}
.navbar-inverse .navbar-brand { color: #DEC800}
.navbar-inverse .navbar-brand:hover { color: #F2F2F2}
.navbar-inverse .navbar-nav>li>a { color: #FFFFFF}
.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus { color: #FFFFFF}
.dropdown-menu>li>a { color: #FFFFFF}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { color: #E6E7FF}
.navbar-inverse .navbar-nav>.dropdown>a .caret { border-top-color: #F0FAFF}
.navbar-inverse .navbar-nav>.dropdown>a:hover .caret { border-top-color: #FFFFFF}
.navbar-inverse .navbar-nav>.dropdown>a .caret { border-bottom-color: #F0FAFF}
.navbar-inverse .navbar-nav>.dropdown>a:hover .caret { border-bottom-color: #FFFFFF}
.sidebar-nav {
    padding: 9px 0;
}

.dropdown-menu .sub-menu {
    left: 100%;
    position: absolute;
    top: 0;
    visibility: hidden;
    margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
    visibility: visible;
}

.dropdown:hover .dropdown-menu {
    display: block;
}

.nav-tabs .dropdown-menu, .nav-pills .dropdown-menu, .navbar .dropdown-menu {
    margin-top: 0;
}

.navbar .sub-menu:before {
    border-bottom: 7px solid transparent;
    border-left: none;
    border-right: 7px solid rgba(0, 0, 0, 0.2);
    border-top: 7px solid transparent;
    left: -7px;
    top: 10px;
}
.navbar .sub-menu:after {
    border-top: 6px solid transparent;
    border-left: none;
    border-right: 6px solid #fff;
    border-bottom: 6px solid transparent;
    left: 10px;
    top: 11px;
    left: -6px;
}
.navbar .nav.pull-right {
     float: right;
    margin-right: 98px; /*set margin this way in your custom styesheet*/
  }

</style>
@yield('css-and-js')

</head>
	
<body>
<!-- header -->
@include('layouts.header')
<!-- header -->

<!-- content -->
@yield('content')
<!-- //content -->

<!-- footer -->
@stack('scripts')
@include('layouts.footer')	
<!-- //footer -->


    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>