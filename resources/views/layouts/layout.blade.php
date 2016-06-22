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
<link href="{{ asset('css/layout.css') }}" rel='stylesheet' type='text/css'>
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