@extends('layouts.layout')

@section('title')
Articles Sharing's Doank's 
@endsection

@section('selected-articles')
active
@endsection

@section('css-and-js')
<link rel="stylesheet" href="{{ asset('css/swipebox.css') }}">
<script src="{{ asset('js/jquery.swipebox.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/articles.js')}}"></script>
@endsection

@section('content')
<div class="content tut">
	<div class="container">
		<div class="content-text facilis">
			<div class="content-info">
				<h2>Selamat datang di Artikel !! :V</h2>
				<p>Ini adalah Kumpulan artikel...</p>
				<p>Silahkan cari artikel yang anda inginkan :) berdasarkan judul dan kategori :)</p>
				<?php  if(!empty($subKateg)) { ?>
				<h3><i>Pencarian Artikel </i><u><?php echo strtoupper('<b>'.$subKateg.'</b>'); ?></u></h3>
				<?php }?>
			</div>
		   <div class="form-group has-feedback">
		 		<div class="table-responsive">
		 			<table class="table table-hover">
		 				<thead>
		 					<tr>
		 						<th colspan="2">Cari Judul Artikel - <i><small>opsional</small></i></th>
		 					</tr>
		 				</thead>
		 				<tbody>
		 					<tr>
		 						<td width="95%">
		 							{!! Form::open(array('url' => 'artikel/search', 'method' => 'get')) !!}
		 							@if (isset($kata))
		 								{!! Form::text('kata_kunci',$kata, ['placeholder' => 'Cari Judul Artikel :)', 'class' => 'form-control']) !!}	 
		 							@else
		 								{!! Form::text('kata_kunci','', ['placeholder' => 'Cari Judul Artikel :)', 'class' => 'form-control']) !!}	 
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
		 						<label for="title" class="control-label">Kategori Post - <i><small>required</small></i>
				 					@if (Session::has('errors'))
				 						<span class="alert-danger"> -<i> {{ Session::get('errors')}} </i></span>
				 					@endif
		 						</label>
		 						@if(isset($subKateg))
		 								{!! Form::select('select-subKateg', [
		 									'' => '---',
		 									'all' => 'All',
				 							'coding' => 'Coding',
				 							'berita-hot' => 'Berita Hot',
				 							'pengetahuan-umum' => 'Pengetahuan Umum'], 
				 								$subKateg,
				 							[
				 								'class' => 'form-control',
				 								'id' => 'input'
				 							]
				 						) !!}
		 							@else
			 							{!! Form::select('select-subKateg', [
		 									'' => '---',
		 									'all' => 'All',
				 							'coding' => 'Coding',
				 							'berita-hot' => 'Berita Hot',
				 							'pengetahuan-umum' => 'Pengetahuan Umum'], 
			 								'null'
			 							,
			 							[
			 								'class' => 'form-control',
			 								'id' => 'input'
			 							]
			 						) !!}
		 							@endif
		 						</td>
		 					</tr>

		 							{!! Form::close() !!}
		 				</tbody>
		 			</table>
		 		</div>
		 	</div>
			<div class="article-left">
				<h3>Artikel Baru ></h3>
				<div class="article-grids">
				<?php $countClearFix2 = 1; ?>
				@foreach($message as $artikel)
				<?php 
					$path = $artikel->kategori .'/'. str_replace('-', '/', $artikel->SubKategori)  .'/'.  $artikel->slug;  
				?>

					<?php 
						if ($countClearFix2 <= 4){ 
					?>
					<div class="article-grid">
						<div class="article-grid-left">
							<a href="{{ asset($path) }}">
								<?php if ($artikel->path != "") { ?>
									<img src="{{ asset($artikel->path) }}" alt=" "  />
								<?php } else { ?>
									<img src="{{ asset('images/no-image.jpg') }}" alt=" " />
								<?php } ?>
							</a>
						</div>
						<div class="article-grid-right">
							<h4><a href="{{ asset($path) }}">{{ $artikel->title }}</a></h4>
							<p>{!! str_limit(strip_tags($artikel->content), 50 , " ........................") !!}
								<span><?php echo date("D, d-M-y", strtotime($artikel->created_at)); ?></span>
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<?php  
							$countClearFix2 += 1; 
						} 
						else{
					?>
					<div class="article-grid" style="margin-top: 10px;">
						<div class="article-grid-left" >
							<a href="{{ asset($path) }}">
								<?php if ($artikel->path != "") { ?>
									<img src="{{ asset($artikel->path) }}" alt=" "  />
								<?php } else { ?>
									<img src="{{ asset('images/no-image.jpg') }}" alt=" " />
								<?php } ?>
							</a>
						</div>
						<div class="article-grid-right">
							<h4><a href="{{ asset($path) }}">{{ $artikel->title }}</a></h4>
							<p>{!! str_limit(strip_tags($artikel->content), 50 , " ........................") !!}
								<span><?php echo date("D, d-M-y", strtotime($artikel->created_at)); ?></span>
							</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<?php } ?>
				@endforeach
				</div>
			</div>
			<div class="article-right">
				<?php  if(!empty($subKateg)) { ?>
				<h3><i>Pencarian Artikel </i><u><?php echo strtoupper($subKateg); ?></u></h3>
				<?php } else {?>
				<h3>Artikel-artikel</h3>
				<?php } ?>
				<div class="article-right-grids">
				<?php $countClearFix = 1; ?>
				@foreach($message2 as $artikel2)
				<?php 
					$path2 = $artikel2->kategori .'/'. str_replace('-', '/', $artikel2->SubKategori)  .'/'.  $artikel2->slug;  
				?>

					<div class="article-right-grid">
						<?php if ($artikel2->path != "") { ?>
							<a href="{!! str_replace('-', '/', $artikel2->SubKategori) !!}/{!! $artikel2->slug !!}" >
								<img src="{{ asset($artikel2->path) }}" alt=" " />
							</a>
						<?php } else { ?>
						<a href="{!! str_replace('-', '/', $artikel2->SubKategori) !!}/{!! $artikel2->slug !!}" >
							<img src="{{ asset('images/no-image.jpg') }}" alt=" " />
						</a>
						<?php } ?>
						<h4><a href="{{ asset($path2)}}">Artikel {{ ucfirst(str_replace("-", " ", $artikel2->SubKategori)) }}</a></h4>
						<p>{{ ucfirst($artikel2->title) }}</p>
					</div>
					<?php 
						if ($countClearFix == 3){ 
					?>
							<div class="clearfix"> </div>
					<?php  
							$countClearFix = 1; 
						} 
						else
							$countClearFix += 1;
					?>
				@endforeach
					<div class="clearfix"> </div>
					<div style="margin-left:40%;">{!! $message2->appends(Input::only('kata_kunci', 'select-subKateg'))->links() !!}</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
@endsection