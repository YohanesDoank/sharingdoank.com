@extends('layouts.layout')

@section('title')
Create Posts
@endsection

@section('selected-create')
active
@endsection

@section('css-and-js')
<link href="{{ asset('css/createPost.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/jquery-2.2.0.js') }}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
</script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" />
<style type="text/css">
	.preview{
		font-size: 0.8em;
	}
</style>
<script type="text/javascript" src="{{ asset('js/bootbox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('summernote/summernote.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/post//create_post.js') }}"></script>
<script src="{{ asset('js/spinner/ajax-loading.js') }}"></script>
@endsection

@section('content')
<div class="content-for-posting">
	<div class="container">
		<div class="content-text facilis">
		<div class="alerts"></div>
				<div class="some-title">
					<h3>Create POST</h3>
				</div>
					<!-- ini bagian summernote-->
					<br><br><br>
					<div class="form-group">
					    <label for="title" class="control-label col-sm-2">Title</label>
					    <input type="text" name="penginput" value="{{ Auth::user()->name }}" hidden="true">
					    <div class="col-sm-10">
                        	<input type="text" class="form-control" placeholder="Judul Artikel" id="title" required data-validation-required-message="Harap tuliskan judul artikel.">
                        	<p class="help-block text-danger"></p>
					    </div>
					</div>
					<br>
					<div id="dialog-confirm"></div>
	                <div class="form-group">
	                	<label for="title" class="control-label col-sm-2">Kategori Post</label>
	            		 <div class="col-sm-10">
		                		<label><input type="radio" name="etype" value="artikel"> Artikel </label>
		                		<label><input type="radio" name="etype" value="tutorial"> Tutorial </label>
		                		&nbsp &nbsp <span class="error-input"></span>
	                    </div>
	                </div>
	                <br>
	                <div class="form-group" id="sub-kategori" hidden="">
	                	<label for="title2" class="control-label col-sm-2"></label>
	            		 <div class="col-sm-10" id="isi-sub-kategori" >
		                		
	                    </div>
	                </div>
	                <br>
	                <div class="form-group" id="sub-kategori2" hidden="">
	                	<label for="title3" class="control-label col-sm-2"></label>
	            		 <div class="col-sm-10" id="isi-sub-kategori2" >
		                		
	                    </div>
	                </div>
	                <br>
					<div class="form-group">
						<label for="title" class="control-label col-sm-2">Main Photo</label>
					    <div class="col-sm-10" style="margin-top: 5px;">
							<input type="file" name="picture" class="" id="inputpicture"></th>
							<!-- display photo here -->
							<p class="help-block text-danger"></p>
							<img id="fotoxx" class="img-responsive" width="300px;" max-width="500px" max-height="250px";>
							<p class="help-block text-danger"></p>
							<button id="btn-delete-foto" class="btn btn-warning" style="display: none;">Delete Foto</button>
                            <button id="btn-kembalikan-foto" class="btn btn-warning" style="display: none;">
                            	Kembalikan Foto
                            </button>
							<p class="help-block text-danger"></p>
					    </div>
					</div>
					<div class="form-group">
					    <label for="title" class="control-label col-sm-2">Spoiler</label>
					    <div class="col-sm-10">
                        	<input type="text" class="form-control" placeholder="Spoiler Post Anda" id="spoiler" required data-validation-required-message="Harap tuliskan judul artikel.">
                        	<p class="help-block text-danger"></p>
					    </div>
					</div>
					<br><br><br><br>
					<div class="form-group">
					    <label for="message" class="control-label col-sm-2">Post Content</label>
					    <div class="col-sm-10">
					    	<div id="message" required data-validation-required-message="Harap tuliskan content artikel."></div>
					    </div>
					</div>
					<div class="form-group">
					<label for="message" class="control-label col-sm-2"></label>
					    <div class="col-sm-10">
                			<div id="success">
                				<button type="button" id="btn_submit" class="btn btn-success">Submit</button>
                				<button type="button" data-popup-open="popup-1" id="btn_preview" class="btn btn-success" style="position: absolute; right: 2%;">Preview Post</button>
                			</div>
					    </div>
					</div>					
					<div class="popup" data-popup="popup-1">
					    <div class="popup-inner">
					        <h2 style="padding-bottom: 15px;">Wow! This is Awesome! (Popup #1)</h2>
					        <img id="foto-preview" class="img-responsive" width="210" max-width="210" max-height="210">
					        <p id="content-preview" style="padding-top: 20px;"></p>
					        <p><a data-popup-close="popup-1" href="#">Close</a></p>
					        <a class="popup-close" data-popup-close="popup-1" href="#">X</a>
					    </div>
					</div>
					<!-- sampai sini summernote nya -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection