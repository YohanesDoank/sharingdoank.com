@extends('layouts.layout')

@section('title')
Sharing's Doank's 
@endsection

@section('css-and-js')

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
				<div class="some-title">
					<h3><a href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}">{!! $editValue->title !!}</a></h3>
				</div>
				<div class="john">
					<p><a href="#">
					<?php 
						if($editValue->penginput != "") {
							echo $editValue->penginput;
						}else{
							echo "Anonimuz";
						}
					?>
					</a><span>{!! $editValue->created_at !!}</span></p>
				</div>
				<div class="clearfix"> </div>
				<div class="tilte-grid">
				<center>
					<?php  
						if ($editValue->path != "") {
					?>
							<a href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}"><img width="100" src="{!! $editValue->path !!}" alt=" " /></a>
					<?php 
						}
						else{
					?>
							<a href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}"><img width="100" src="{!! asset('images/no-image.jpg') !!}" alt=" " /></a>
					<?php
						}
					?>
					</center>
					<p class="vel"><a href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}">
						{!!str_limit(strip_tags($editValue->content), 150 , " ........................")!!}
					</a></p>
					<p class="Sed">
					</p> 
				</div>
				<div class="read">
					<a href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}">Kepoin...</a>
				</div>
				<div class="border">
					<p></p>
				</div>

			@endforeach
			</div>
			<div class="categories">
				<div class="categ">
					<div class="cat">
						<h3>Categories</h3>
						<ul>
							<li><a href="single">Lorem ipsum dolor sit amet</a></li>
							<li><a href="single">Consectetur adipiscing elit</a></li>
							<li><a href="single">Etiam aliquet convallis enim ut</a></li>
							<li><a href="single">Donec at pretium dui</a></li>
							<li><a href="single">Nulla sed massa sagittis venenatis</a></li>
							<li><a href="single">Praesent nec tortor nec massa</a></li>
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
			<div style="margin-left:30%; margin-bottom: 10px;">{!! $message->render() !!}</div>

		</div>

	</div>
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	$('#footer-home').attr('class', 'cap1');
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
