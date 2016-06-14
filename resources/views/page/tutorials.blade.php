	@extends('layouts.layout')

@section('title')
Tutorials Sharing's Doank's 
@endsection

@section('selected-tutorials')
active
@endsection

@section('content')
<div class="content tut">
	<div class="container">
		<div class="content-text facilis">
			<div class="content-info">
				<h2>Tutorials</h2>
				<p>Ini adalah Kumpulan tutorial...</p>
			</div>

		   <div class="form-group has-feedback">
              	
		 		<div class="table-responsive">
		 			<table class="table table-hover">
		 				<thead>
		 					<tr>
		 						<th colspan="2">Cari Tutorial</th>
		 					</tr>
		 				</thead>
		 				<tbody>
		 					<tr>
		 						<td width="95%">
		 							{!! Form::open(array('url' => 'tutorials/search', 'method' => 'get')) !!}
		 							{!! Form::text('kata_kunci','', ['placeholder' => 'Cari Judul Tutorial :)', 'class' => 'form-control']) !!}	 							
		 						</td>
		 						<td>
		 							{!! Form::submit('Cari!', ['class' => 'btn btn-primary']) !!}
		 						</td>
		 							{!! Form::close() !!}
		 					</tr>
		 				</tbody>
		 			</table>
		 		</div>
		 	</div>
			<div class="tutorial-grids">
			@foreach ($message as $editValue)

		<div class="col-md-4 tutorial-grid">
			<div class="panel panel-info" style="height: 500px;">
				<div class="panel-heading">
					<h3 class="panel-title">
						<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}">{!! $editValue->title !!}</a>
					</h3>
				</div>
				<div class="panel-body">
					<br>
					<?php  
						if ($editValue->path != "") {
					?>
						<div class="tilte-grid2">
							<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}"><img width="330" height="281" src="{!! $editValue->path !!}" alt=" " /></a>
						</div>
					<?php 
						}
						else{
					?>
						<div class="tilte-grid2">
							<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}"><img width="330" height="281" src="no-image" alt=" " /></a>
						</div>
					<?php
						}
					?>
					<!--
					<iframe src="https://player.vimeo.com/video/40672852?color=ffffff&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
					<br>
					<p>{!!str_limit(strip_tags($editValue->content), 200 , " ........................")!!} </p>
					<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! $editValue->slug !!}" style="padding-top: 10px;">
					<strong><u><i>Baca Lebih Lanjut....</i></u>
					</strong></a>
				</div>
			</div>
		</div>
				@endforeach	
				<div class="clearfix"> </div>
			</div>
				<div style="margin-left:40%;">{!! $message->appends(Input::only('kata_kunci'))->links() !!}</div>
		</div>
	</div>
	</div>
	@endsection

@push('scripts')
<script type="text/javascript">
	var url = window.location.href.slice(window.location.href.indexOf('com/') + 4);
	var x = url.substr(0, 16);
	// 	alert(x);
	if (x == "tutorials/search") {
		var arrayVarImg = [100];
		var counter = 0;
		$('.url-tutorial img').each(function () {
		      var curSrc = $(this).attr('src');
		      if (curSrc != "no-image") {
		      	$(this).attr('src', '../' + curSrc);
		      }
		      else{
		      	$(this).attr('src', '{{ asset("images/no-image.jpg") }}');	
		      }
	    });

	    $('.url-tutorial').each(function () {
		      var curSrc = $(this).attr('href');
		      $(this).attr('href', '../' + curSrc);
	    });
	}
	else{
		$('.url-tutorial img').each(function () {
		      var curSrc = $(this).attr('src');
		      if (curSrc == "no-image") {
		      	$(this).attr('src', '{{ asset("images/no-image.jpg") }}');	
		      }
	    });
	}
</script>
@endpush
