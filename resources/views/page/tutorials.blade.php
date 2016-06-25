@extends('layouts.layout_spesific')

@section('title')
Tutorials Sharing's Doank's 
@endsection

@section('selected-tutorials')
active
@endsection

@section('css-and-js')
<link rel="stylesheet" type="text/css" href="{{ asset('css/tutorial.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/terran3dital/font.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('fonts/belepotan/stylesheet.css') }}">
@section('content')
<div class="content tut">
	<div class="container">
		<div class="content-text facilis">
			<div class="content-info">
				<h1 id="tutorial-name">TUTORIAL</h1>
				<h2 id="welcome">Selamat datang Doank!</h2>
				<p>Ini adalah Kumpulan tutorial...</p>
				<p>Silahkan cari tutorial yang anda inginkan :) berdasarkan judul dan kategori :)</p>
				<?php  if(!empty($subKateg)) { ?>
				<h3><i>Pencarian Tutorial </i><u><?php echo strtoupper('<b>'.$subKateg.'</b>'); ?></u></h3>
				<?php }?>
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
		 							<button id="btnCari" type="submit" class="btn btn-primary btn-lg text-center">
		 								<span id="iconBtnCari" class="glyphicon glyphicon-search" aria-hidden="true" style="">
		 								</span><br>
		 								<i><u id="tulisanCari">Cari</u></i>
		 							</button>
		 						</td>
		 					</tr>
		 					<tr>
		 						<td>
		 						<label for="title" class="control-label">Kategori Post - <i><small>required</small></i>
				 					@if (Session::has('errors'))
				 						<span class="alert-danger"> -<i> {{ Session::get('errors')}} </i></span>
				 					@endif
		 						</label>
		 						@if(isset($subKateg))
		 								{!! Form::select('select-subKateg', [
		 									'' => '---',
		 									'all' => 'All',
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
		 								'all' => 'All',
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
			<?php 
				$ribbonHref = "tutorials/search?kata_kunci=&select-subKateg=".$editValue->SubKategori;
				$ribbonWords = str_replace("-", " ", $editValue->SubKategori);
				$ribbonFinal = ucwords($ribbonWords);
				$kateg = substr($ribbonFinal, 0, 6);
				if ($kateg == "Coding") {
					$ribbonFinal = substr($ribbonFinal, 6, strlen($ribbonFinal));
					if ($ribbonFinal == " Php") {
						$ribbonFinal = strtoupper($ribbonFinal);
					}
				}
				else if(substr($ribbonFinal, 0, 4) == "Game"){
					$kateg = "Game";
					$ribbonFinal = substr($ribbonFinal, 4, strlen($ribbonFinal));
					if ($ribbonFinal != " Jadul")
						$ribbonFinal = "Game".strtoupper($ribbonFinal);
					else
						$ribbonFinal = "Game".ucwords($ribbonFinal);
				}
				else{
					$kateg = "Sulap";
				}
			 ?>
		<div class="col-md-4 tutorial-grid">
			<div class="panel panel-footer" id="card-style">
				<div >
					<table>
						<tr>
							<td class="card-title-left">
							<div style="">
							<?php 
								$toPage = $editValue->kategori."/".str_replace('-', '/', $editValue->SubKategori)."/".$editValue->slug;
							?>
								<h2><a id="card-title" href="{{ asset($toPage) }}">{!! ucfirst($editValue->title) !!}</a></h2>
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								<span><small>{{ ucfirst($editValue->penginput) }}</small></span>
								<div class="clearfix"></div>
								<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
								<span><small>{{ Helper::indonesian_date($editValue->created_at) }}</small></span>
								<div class="clearfix"></div>
								<span class="fa fa-eye" style=""><b> 0 view</b></span>
							</div>
							</td>
							<td class="card-title-right">
							<a href="{{ asset($ribbonHref) }}">
								<div class="ribbon base">
									<?php if ($kateg == "Coding") {
											echo '<center><span class="fa fa-code" style="font-size: 1em; margin-bottom:5px;"></span></center>';
											} 
											else if($kateg == "Game"){
												echo '<center><i class="fa fa-gamepad" style="font-size: 1.6em; margin-top: -5px;margin-bottom:5px;"></i></center>';
											}
											else{
												echo '<center><i class="fa fa-magic" style="font-size: 2em;margin-bottom:5px;"></i></center>';	
											}

									?>
									<span>{{ $ribbonFinal }}</span>
								</div>
								</td>
							</a>
						</tr>
					</table>
				</div>
				<div class="panel-body">
					<br>
					<?php  
						if ($editValue->path != "") {
					?>
					
						<div class="tilte-grid2">
							<a class="url-tutorial" href="{{ $toPage }}"><img width="270" height="221" src="{!! $editValue->path !!}" alt=" " /></a>
						</div>	
					<?php 
						}
						else{
					?>
						<div class="tilte-grid2">
							<a class="url-tutorial" href="{{ $toPage }}"><img width="270" height="221" src="{{ asset('images/no-image.jpg') }}" alt=" " /></a>
						</div>
					<?php
						}
					?>
					<!--
					<iframe src="https://player.vimeo.com/video/40672852?color=ffffff&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->
					<br>
					<p>{!!str_limit(strip_tags($editValue->content), 140 , " ........")!!} 
						<a class="url-tutorial" href="{{ asset($toPage) }}" style="padding-top: 10px;">
						<strong><u><i> Baca Lebih Lanjut....</i></u>
					</strong></a>
					</p>
					
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
						 echo '<center><h4><b><i>'.count($total).' tutorial ditemukan....</i></b></h4></center>';
					}
				 ?>
				<center><div>{!! $message->appends(Input::only('kata_kunci', 'select-subKateg'))->links() !!}</div></center>
				@include('layouts.footer')
		</div>
	</div>
	</div>
	@endsection

@push('scripts')
<script type="text/javascript">
	$('.grow').on('click', function(){
	  $('.pita').css({
	    fontSize: '+=5px'
	  });
	});


	$('.shrink').on('click', function(){
	  $('.pita').css({
	    fontSize: '-=5px'
	  });
	});
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
