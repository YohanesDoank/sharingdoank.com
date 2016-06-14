@extends('layouts.layout')

@section('title')
Articles Sharing's Doank's 
@endsection

@section('css-and-js')

<script src="js/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href='css/font_OpenSans.css' rel='stylesheet' type='text/css'>
<link href='css/font_Lato.css' rel='stylesheet' type='text/css'>
<link href='css/font_PlayFair.css' rel='stylesheet' type='text/css'>
<link href='css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<!-- start-smoth-scrolling -->
<style type="text/css">
    .bootbox-body{
        font-weight: 800;
    }
</style>
@endsection


@section('header')
<div class="header">
	<div class="container">
		<div class="header-info">
			<div class="logo">
				<a href=""><img src="images/logo.png" alt=" " /></a>
			</div>
			<div class="logo-right">
				<span class="menu"><img src="images/menu.png" alt=" "/></span>
				<ul class="nav1">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="articles">Articles</a></li>
					<li><a href="tutorials">Tutorials</a></li>
					<li><a href="contact">Contact</a></li>
					@if (Auth::check())
                    <li class="@yield('selected-create')">
                        <a href="{{ url('/createPost') }}">Create Post</a>
                    </li>
                    <li class="active">
                        <a href="{{ url('/showPost') }}">Kelola Post</a>
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
@endsection

@section('content')
<div class="articles">
	<div class="container">
		<div class="article">
		<div class="alerts"></div>
		<div class="alerts2"></div>
		   <div class="form-group has-feedback">
              	<h5><b>Search Your Post : </b></h5>
		 		<input type="text" class="form-control" name="search" id="cari" placeholder="Cari Judul...">
		 	</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<col width="10%"></col>
					<col width="60%"></col>
					<col width="20%"></col>
					<col width="10%"></col>
					<thead>
						<tr>
							<th>No.</th>
							<th>Title</th>
							<th>Created at</th>
							<th colspan="2"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div><center><strong><p id="jumlahPost"></p></strong></center></div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush