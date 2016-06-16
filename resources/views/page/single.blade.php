@extends('layouts.layout')

@section('title')
Single Sharing's Doank's 
@endsection

@section('css-and-js')
<script type="text/javascript" src="{{ asset('js/single.js') }}"></script>
@endsection

@section('content')
<div class="content sing">
	<div class="container">
		<div class="content-text cnt-txt">	
			<div class="title">
			@foreach ($artikel as $message)
				<div class="some-title">
					<h3>{!! $message->title !!}</h3>
				</div>
				<div class="john">
					<p><a href="#">{!! $message->penginput !!}</a><span>{!! $message->created_at !!}</span></p>
				</div>
				<div class="clearfix"> </div>
				<div class="tilte-grid">
					<?php 
						if($message->path != ""){
							echo '<img class="gambarUtama" src="'.$message->path.'" alt=" " />';
						}
						else{ 
					?>
						<img src="{{ asset('images/no-image.jpg') }}" alt=" " />
					<?php
						}
					?>
				</div>
					<p class="vel"><a href="{!! $message->slug !!}">Phasellus vel arcu vitae neque sagittis aliquet ac at purus.
					Vestibulum varius eros in dui sagittis non ultrices orci hendrerit.
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></p>
					<p class="Sed">
						{!! $message->content !!}
					</p> 
				@endforeach
				<div class="related-posts">
					<h3>Related Posts</h3>
					<?php $count = 1; $nextCount = 0; $arrayP;?>
					
					<div class="related-posts-grids">
						@foreach ($artikelRelated as $relatedPost)
							<?php 
								$path = $relatedPost->kategori .'/'. str_replace('-', '/', $relatedPost->SubKategori)  .'/'.  $relatedPost->slug;  
							?>
							@if($count != 5)
							<div class="related-posts-grid">
								<a href="{{ asset($path) }}"><img src="{{ asset($relatedPost->path) }}" alt=" " /></a>
								<h4><a href="{{ asset($path) }}">{!! str_limit(strip_tags($relatedPost->title), 40 , " ........................") !!}</a></h4>
								<p>{!! str_limit(strip_tags($relatedPost->content), 150 , " ........................") !!}</p>
							</div>
							<?php $count += 1 ?>
							@else
								<?php 
									$newPost = '<div class="related-posts-grid">
												<a href="'.asset($path).'"><img src="'.asset($relatedPost->path).'" alt=" " /></a>
												<h4><a href="'.asset($path).'">'.str_limit(strip_tags($relatedPost->title), 40 , " ........................").'</a></h4>
												<p>'.str_limit(strip_tags($relatedPost->content), 150 , " ........................").'</p>
												</div>' ;

									$arrayP[$nextCount] = $newPost;
									$nextCount += 1;
								?>
							@endif
						@endforeach	
						<div class="clearfix"> </div>
					</div>
					<div class="related-posts-grids">
						<?php  
							$i = 0;
							while ($nextCount != 0) {
								echo $arrayP[$i];
								$i += 1;
								$nextCount -= 1;
							}
						?>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="categories">
				<div class="categ">
					<div class="cat">
						<h3>Jenis Artikel</h3>
						<ul>
							<li><a href="{{ asset('articles/search?kata_kunci=&select-subKateg=coding-art') }}">Macam-macam bacaan Ngoding</a></li>
							<li><a href="{{ asset('articles/search?kata_kunci=&select-subKateg=coding-art') }}">Berita Hot terkini</a></li>
							<li><a href="{{ asset('articles/search?kata_kunci=&select-subKateg=coding-art') }}">Pengetahuan umum yang unik</a></li> 
					</div>
					<div class="cat">
						<h3>Jenis Tutorial</h3>
						<ul>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-mobile') }}">Game Mobile</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-pc') }}">Game PC</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-ps') }}">Game PLayStation</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=game-jadul') }}">Game Jaman Dulu</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=sulap') }}">Sulap</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-php') }}">Ngoding PHP</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-java-desktop') }}">Ngoding Java dengan Netbeans</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-java-mobile') }}">Ngoding Android dengan Java</a></li>
							<li><a href="{{ asset('tutorials/search?kata_kunci=&select-subKateg=coding-vb') }}">Ngoding VB</a></li>
						</ul>
					</div>
					<div class="recent-com">
						<h3>Recent Comments</h3>
						<ul>
							<li><a href="#">Donec consequat</a> suscipit leo at accumsan. In hac habitasse platea dictumst.</li>
							<li><a href="#">Aliquam erat ipsum,</a> consequat id venenatis suscipit, venenatis sed leo.
								Ut nec lacus in sem eleifend semper id ac dolor.</li>
							<li><a href="#">Etiam aliquet convallis enim ut 
									<span>Donec at pretium dui</span></a></li>
							<li><a href="#">Nulla sed massa sagittis</a> venenatis Praesent nec tortor nec massa </li>
							<li><a href="#">Donec faucibus mollis dolor
								<span>in ullamcorper.</span></a></li>
							<li><a href="#">Aliquam erat ipsum,</a> consequat id venenatis suscipit, venenatis sed leo.
								Ut nec lacus in sem eleifend semper id ac dolor.</li>
							<li><a href="#">Etiam aliquet convallis enim ut 
									<span>Donec at pretium dui</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
			<div class="comments">
					<h4>Comments</h4>
					<div class="comments-info">
						<div class="cmnt-icon-left">
							<a href="#"><img src="{{ asset('images/icon3.png') }}" alt=""/></a>
						</div>
						<div class="cmnt-icon-right">
							<p>MAY 13, 2015</p>
							<p><a href="#">Admin</a></p>
							<p class="cmmnt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="clearfix"> </div>
						<div class="aliqua">
							<a href="#">Reply</a>
						</div>
					</div>
					<div class="comments-info">
						<div class="cmnt-icon-left">
							<a href="#"><img src="{{ asset('images/icon3.png') }}" alt=""/></a>
						</div>
						<div class="cmnt-icon-right">
							<p>MAY 13, 2015</p>
							<p><a href="#">Admin</a></p>
							<p class="cmmnt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="clearfix"> </div>
						<div class="aliqua">
							<a href="#">Reply</a>
						</div>
					</div>
					<div class="comments-info">
						<div class="cmnt-icon-left">
							<a href="#"><img src="{{ asset('images/icon3.png') }}" alt=""/></a>
						</div>
						<div class="cmnt-icon-right">
							<p>MAY 13, 2015</p>
							<p><a href="#">Admin </a></p>
							<p class="cmmnt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
							sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
						<div class="clearfix"> </div>
						<div class="aliqua">
							<a href="#">Reply</a>
						</div>
					</div>
				</div>
			<div class="consequat">
				<h4>Leave Your Comment Here</h4>
				<form>
					<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
					<input type="email" value="Email@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
					<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
					<input type="submit" value="Submit" >
				</form>
			</div>
			<br><br>
			@include('layouts.footer')
		</div>
	</div>
	</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#footer-single').attr('class', 'cap1');
</script>
@endpush
