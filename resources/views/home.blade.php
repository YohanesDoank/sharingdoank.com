@extends('layouts.layout_spesific')

@section('title')
Sharing's Doank's 
@endsection

@section('css-and-js')

<link href="{{ asset('css/corner-ribbon.css') }}" rel='stylesheet' type='text/css'>
<style type="text/css">
a:hover {
}

</style>
@endsection

@section('selected-index')
active
@endsection

@section('footer-home')
cap1
@endsection

@section('content')
<div class="content tut">
	<div class="container">
		<div class="content-text facilis">	
			<div class="title">
			@foreach ($message as $editValue)
			<?php

				if($editValue->kategori == "tutorial")
				 	$warnaRibbon = "blue";
				else
					$warnaRibbon = "red"
			?>
			<div id="pembungkus-index" class="wrapper">
				<div class="some-title">
				  <div class="ribbon-wrapper-blue">
				    <div class="ribbon-{{$warnaRibbon}}">{{ucfirst($editValue->kategori)}}</div>
					<?php if (Helper::checkNewPost($editValue->created_at) != "") echo "<img src=".asset('images/new.gif')." id='new'>" ; ?>
				  </div>
					<h3><a href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{!! $editValue->slug !!}">{!! ucfirst($editValue->title) !!}</a></h3>
				</div>
				<div class="john">
					<p>
						<span class="glyphicon glyphicon-user" style="float: right; color: black;">
							<a href="#" >
							<?php 
								if($editValue->penginput != "") {
									echo ucfirst($editValue->penginput);

								}else{
									echo "Anonimuz";
								}
							?>
							</a>
						</span>
						<div class="clearfix"></div>
						<span class="glyphicon glyphicon-calendar" style="font-size: 1em;margin-top: 0.5em;">
							<?php echo " "; ?>{!! Helper::indonesian_date($editValue->created_at) !!}
						</span>
					</p>
				</div>
				<div class="clearfix"> </div>
				<div class="tilte-grid">
				<center>
					<?php  
						if ($editValue->path != "") {
					?>
							<a href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{{ $editValue->slug }}"><img width="100" src="{!! $editValue->path !!}" alt=" " /></a>
					<?php 
						}
						else{
					?>
							<a href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{{ $editValue->slug }}"><img width="100" src="{!! asset('images/no-image.jpg') !!}" alt=" " /></a>
					<?php
						}
					?>
					</center>
					<p class="vel"><a href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{{ $editValue->slug }}">
						{!! ucfirst(str_limit(strip_tags($editValue->content), 300 , " ........................")) !!}
					</a></p>
					<p class="Sed">
					</p> 
				</div>
				<div class="clearfix"></div>
				<div class="read">
					<a href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{!! $editValue->slug !!}">Read More</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- <center><div class="border"><p></p></div></center> -->
			@endforeach
			</div>
			<div class="categories">
				<div class="categ">
					<div class="cat">
						<h3>Jenis Artikel</h3>
						<ul>
							<li><a href="artikel/search?kata_kunci=&select-subKateg=coding">Macam-macam bacaan Ngoding</a></li>
							<li><a href="artikel/search?kata_kunci=&select-subKateg=berita-hot">Berita Hot terkini</a></li>
							<li><a href="artikel/search?kata_kunci=&select-subKateg=pengetahuan-umum">Pengetahuan umum yang unik</a></li> 
					</div>
					<div class="cat">
						<h3>Jenis Tutorial</h3>
						<ul>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=game-mobile">Game Mobile</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=game-pc">Game PC</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=game-ps">Game PLayStation</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=game-jadul">Game Jaman Dulu</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=sulap">Sulap</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=coding-php">Ngoding PHP</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=coding-java-desktop">Ngoding Java dengan Netbeans</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=coding-java-mobile">Ngoding Android dengan Java</a></li>
							<li><a href="tutorials/search?kata_kunci=&select-subKateg=coding-vb">Ngoding VB</a></li>
						</ul>
					</div>
					<div class="recent-com">
						<h3>Recent Comments</h3>
						<ul>
							<li><a href="single">Donec consequat</a> suscipit leo at accumsan. In hac habitasse platea dictumst.</li>
							<li><a href="single">Aliquam erat ipsum,</a> consequat id venenatis suscipit, venenatis sed leo.
								Ut nec lacus in sem eleifend semper id ac dolor.</li>
							<li><a href="single">Etiam aliquet convallis enim ut 
									<span>Donec at pretium dui</span></a></li>
							<li><a href="single">Nulla sed massa sagittis</a> venenatis Praesent nec tortor nec massa </li>
							<li><a href="single">Donec faucibus mollis dolor
								<span>in ullamcorper.</span></a></li>
						</ul>
					</div>
					<div class="view">
						<a href="single">View More</a>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
			<div id="index-pagination">{!! $message->render() !!}</div>
			@include('layouts.footer')
		</div>
	</div>
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	// $('#footer-home').attr('class', 'cap1');
	var arrayVarImg = [100];
		var counter = 0;
		$('.img-responsive').each(function () {
	      var curSrc = $(this).attr('src');
	      // alert(curSrc.length);
	      arrayVarImg[counter] = curSrc.substr(6, curSrc.length - 5);
	      $(this).attr('src', arrayVarImg[counter]);
	      counter += 1;
    	});
</script>
@endpush
