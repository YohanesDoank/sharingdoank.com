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
				<p>Silahkan cari tutorial yang anda inginkan :) berdasarkan judul dan kategori :)</p>
			</div>

		   <div class="form-group has-feedback">
              	
		 		<div class="table-responsive">
		 			<table class="table table-hover">
		 				<thead>
		 					<tr>
		 						<th colspan="2">Cari Judul Tutorial - <i><small>opsional</small></i></th>
		 					</tr>
		 				</thead>
		 				<tbody>
		 					<tr>
		 						<td width="95%">

		 							{!! Form::open(array('url' => 'tutorials/search', 'method' => 'get')) !!}
		 							@if (isset($kata))
		 								{!! Form::text('kata_kunci',$kata, ['placeholder' => 'Cari Judul Tutorial :)', 'class' => 'form-control']) !!}	 
		 							@else
		 								{!! Form::text('kata_kunci','', ['placeholder' => 'Cari Judul Tutorial :)', 'class' => 'form-control']) !!}	 
		 							@endif
		 							
		 						</td>
		 						<td rowspan="2">
		 							
		 							<button type="submit" class="btn btn-primary btn-lg text-center">
		 								<span class="glyphicon glyphicon-search" aria-hidden="true" style="; width: 70px; font-size: 3.2em"></span><br>
		 								<i><u>Cari</u></i>
		 							</button>
		 						</td>
		 					</tr>
		 					<tr>
		 						<td>
		 						<label for="title" class="control-label">Kategori Post
				 					@if (Session::has('errors'))
				 						<span class="alert-danger"> -<i> {{ Session::get('errors')}} </i></span>
				 					@endif
		 						</label>
		 						@if(isset($subKateg))
		 								{!! Form::select('select-subKateg', [
		 									'' => '---',
				 							'coding-php' => 'Coding - PHP',
				 							'coding-vb' => 'Coding - VB',
				 							'coding-java-desktop' => 'Coding - Java Desktop',
				 							'coding-java-mobile' => 'Coding - Java Mobile',
				 							'sulap' => 'Sulap',
				 							'game-ps' => 'Game - PS',
				 							'game-pc' => 'Game - PC',
				 							'game-mobile' => 'Game - Mobile',
				 							'game-jadul' => 'Game - Jadul'], 
				 								$subKateg
				 							,
				 							[
				 								'class' => 'form-control',
				 								'id' => 'input'
				 							]
				 						) !!}
		 							@else
			 							{!! Form::select('select-subKateg', [
			 							'' => '---',
			 							'coding-php' => 'Coding - PHP',
			 							'coding-vb' => 'Coding - VB',
			 							'coding-java-desktop' => 'Coding - Java Desktop',
			 							'coding-java-mobile' => 'Coding - Java Mobile',
			 							'sulap' => 'Sulap',
			 							'game-ps' => 'Game - PS',
			 							'game-pc' => 'Game - PC',
			 							'game-mobile' => 'Game - Mobile',
			 							'game-jadul' => 'Game - Jadul'], 
			 								'null'
			 							,
			 							[
			 								'class' => 'form-control',
			 								'id' => 'input'
			 							]
			 						) !!}

		 							@endif
			 						<!-- <select name="select-subKateg" id="input" class="form-control">
			 							<option value="coding-php"> Coding - PHP </option>
			 							<option value="coding-vb"> Coding - VB </option>
			 							<option value="coding-java-desktop"> Coding - Java Desktop </option>
			 							<option value="coding-java-mobile"> Coding - Java Mobile </option>
			 							<option value="sulap"> Sulap </option>
			 							<option value="game-pc"> Game - PS </option>
			 							<option value="game-ps"> Game - PC </option>
			 							<option value="game-mobile"> Game - Mobile </option>
			 							<option value="game-jadul"> Game - Jadul </option>
		 							</select> -->
		 							<!-- &nbsp &nbsp <label><input type="radio" name="etype" value="coding-php"> Coding-PHP </label>
						            &nbsp &nbsp <label><input type="radio" name="etype" value="coding-vb"> Coding-VB </label>
						            &nbsp &nbsp <label><input type="radio" name="etype" value="coding-java-desktop"> Coding-Java Desktop </label>
						            &nbsp &nbsp <label><input type="radio" name="etype" value="coding-java-mobile"> Coding-Java Mobile </label>
						            &nbsp &nbsp <label><input type="radio" name="etype" value="game"> Game </label>
						            &nbsp &nbsp <label><input type="radio" name="etype" value="sulap"> Sulap </label> -->
		 						</td>
		 					</tr>

		 							{!! Form::close() !!}
		 				</tbody>
		 			</table>
		 		</div>
		 	</div>
			<div class="tutorial-grids">

			<?php $count = 0; ?>
			@foreach ($message as $editValue)
		<div class="col-md-4 tutorial-grid">
			<div class="panel panel-info" style="height: 500px;">
				<div class="panel-heading">
					<h3 class="panel-title">
						<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{!! $editValue->slug !!}">{!! $editValue->title !!}</a>
					</h3>
				</div>
				<div class="panel-body">
					<br>
					<?php  
						if ($editValue->path != "") {
					?>
						<div class="tilte-grid2">
							<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{!! $editValue->slug !!}"><img width="330" height="281" src="{!! $editValue->path !!}" alt=" " /></a>
						</div>
					<?php 
						}
						else{
					?>
						<div class="tilte-grid2">
							<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{!! $editValue->slug !!}"><img width="330" height="281" src="no-image" alt=" " /></a>
						</div>
					<?php
						}
					?>
					<!--
					<iframe src="https://player.vimeo.com/video/40672852?color=ffffff&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
					<br>
					<p>{!!str_limit(strip_tags($editValue->content), 200 , " ........................")!!} </p>
					<a class="url-tutorial" href="{!! $editValue->kategori !!}/{!! str_replace('-', '/', $editValue->SubKategori) !!}/{!! $editValue->slug !!}" style="padding-top: 10px;">
					<strong><u><i>Baca Lebih Lanjut....</i></u>
					</strong></a>
				</div>
			</div>
		</div>

				<?php $count += 1; ?>
				@endforeach	
				<div class="clearfix"> </div>
			</div>

				<?php
					if ($count <= 0) {
						 echo '<center><h4><b><i>tutorial tidak ditemukan....</i></b></h4></center>';
					}
					else{
						 echo '<center><h4><b><i>'.$count.' tutorial ditemukan....</i></b></h4></center>';
					}
				 ?>
				<div style="margin-left:40%;">{!! $message->appends(Input::only('kata_kunci', 'select-subKateg'))->links() !!}</div>
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
