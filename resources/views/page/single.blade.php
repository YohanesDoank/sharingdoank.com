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
					<div class="related-posts-grids">
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/5.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodales, lorem velit fringilla metus, et
								semper metus sapien non odio. Nulla facilisi.</p>
						</div>
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/7.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodales, lorem velit fringilla metus, et
								semper metus sapien non odio. Nulla facilisi.</p>
						</div>
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/6.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodales, lorem velit fringilla metus, et
								semper metus sapien non odio. Nulla facilisi.</p>
						</div>
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/8.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodales, lorem velit fringilla metus, et
								semper metus sapien non odio. Nulla facilisi.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="related-posts-grids">
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/6.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodale.</p>
						</div>
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/8.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodales.</p>
						</div>
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/5.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodale.</p>
						</div>
						<div class="related-posts-grid">
							<a href="#"><img src="{{ asset('images/7.jpg') }}" alt=" " /></a>
							<h4><a href="#">Maecenas pulvinar</a></h4>
							<p>Nunc pulvinar augue non felis dictum ultricies. Donec lacinia, 
								enim sit amet volutpat sodale.</p>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="categories">
				<div class="categ">
					<div class="cat">
						<h3>Categories</h3>
						<ul>
							<li><a href="#">Lorem ipsum dolor sit amet</a></li>
							<li><a href="#">Consectetur adipiscing elit</a></li>
							<li><a href="#">Etiam aliquet convallis enim ut</a></li>
							<li><a href="#">Donec at pretium dui</a></li>
							<li><a href="#">Nulla sed massa sagittis venenatis</a></li>
							<li><a href="#">Praesent nec tortor nec massa</a></li>
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
