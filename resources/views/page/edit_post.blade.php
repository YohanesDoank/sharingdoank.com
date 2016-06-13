@extends('layouts.layout')

@section('title')
Sharing's Doank's 
@endsection

@section('selected-show')
cap
@endsection

@section('css-and-js')
<link href="{{ asset('css/createPost.css') }}" rel='stylesheet' type='text/css'>
<link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
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
<script type="text/javascript" src="{{ asset('js/post/edit_post.js') }}"></script>
<script src="{{ asset('js/spinner/ajax-loading.js') }}"></script>
@endsection

@section('content')
<div class="content">
	<div class="container">
		<div class="content-text facilis">	
				<div class="alerts"></div>
				<div class="some-title">
					<h3><a href="single">Edit POST</a></h3>
				</div>
				@foreach ($message as $editValue)
					<!-- ini bagian summernote-->
					<br><br><br>
					<div id="dialog-confirm"></div>
					<div class="form-group">
					    <label for="title" class="control-label col-sm-2">Title</label>
					    <div class="col-sm-10">
                        	<input type="text" class="form-control" placeholder="Judul Artikel" id="title" required data-validation-required-message="Harap tuliskan judul artikel." value="{{ $editValue->title }}">
                        	<p class="help-block text-danger"></p>
					    </div>
					</div>
					<br>
	                <div class="form-group">
	                	<label for="title" class="control-label col-sm-2">Kategori Post</label>
	            		 <div class="col-sm-10">
	            		 <?PHP 
	            		 	if($editValue->kategori == "artikel"){?>
		                		<label><input type="radio" name="etype" value="artikel" checked="checked"> Artikel </label>
		                		<label><input type="radio" name="etype" value="tutorial"> Tutorial </label>
                        <?PHP }
                            else{?>
                            	<label><input type="radio" name="etype" value="artikel" > Artikel </label>
		                		<label><input type="radio" name="etype" value="tutorial" checked="checked"> Tutorial </label>
                        <?php } ?>
	                    </div>
	                </div>
	                <br>
					<div class="form-group">
						<label for="title" class="control-label col-sm-2">Main Photo</label>
					    <div class="col-sm-10" style="margin-top: 5px;">
							<input type="file" name="picture" class="" id="inputpicture"></th>
							<!-- display photo here -->
							<p class="help-block text-danger"></p>
							<?PHP 
							if(!$editValue->path == "")
                            	{?>
                    			<img id="fotoxx" width="230" src="../../{{ $editValue->path }}">
							<?PHP } 
							else { ?>
                    			<img id="fotoxx" width="230" >
							<?PHP } ?>
							<p class="help-block text-danger"></p>
							<button id="btn-delete-foto" class="btn btn-warning" style="display: none;">Delete Foto</button>
                            <button id="btn-kembalikan-foto" class="btn btn-warning" style="display: none;">
                            	Kembalikan Foto
                            </button>
							<p class="help-block text-danger"></p>
					    </div>
					</div>
					<div class="form-group">
					    <label for="message" class="control-label col-sm-2">Article Content</label>
					    <div class="col-sm-10">
					    	<div id="message">{!! $editValue->content !!}</div>
					    </div>
					</div>
					<div class="form-group">
					<label for="message" class="control-label col-sm-2"></label>
					    <div class="col-sm-10">
                			<div id="success">
                				<button type="button" id="btn_submit" class="btn btn-success">Edit</button>
                				<button type="button" data-popup-open="popup-1" id="btn_preview" class="btn btn-success" style="position: absolute; right: 2%;">Preview Post</button>
                			</div>
					    </div>
					</div>
					<div class="popup" data-popup="popup-1">
					    <div class="popup-inner" >
					        <h2 style="padding-bottom: 15px;">Wow! This is Awesome! (Popup #1)</h2>
					        <img id="foto-preview" class="img-responsive" width="210" max-width="210" max-height="210">
					        <p id="content-preview" style="padding-top: 20px;"></p>
					        <p><a data-popup-close="popup-1" href="#">Close</a></p>
					        <a class="popup-close" data-popup-close="popup-1" href="#">X</a>
					    </div>
					</div>
					<!-- sampai sini summernote nya -->
				@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection