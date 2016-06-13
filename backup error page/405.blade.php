@extends('layouts.layout')

@section('title')
Nyasar ??!!
@endsection

@section('content')
<div class="content tut">
	<div class="container">
		<div class="content-text facilis">
			<div class="content-info">
				<h2>Nyasar Lu Gan :(((</h2>
				<p>Semoga Nyasarnya gak lama-lama dan diberi kekuatan untuk keluar dari jalan ini c:</p>
			</div>
			<center>
				<div class="page-header">
				  <h1>title</h1>
				  <h3><strong><i><u>Tidak Ditemukan</u></i><br> Silahkan menerima kenyataan ini :(</strong></h3>
				</div>
			</center>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	// alert(window.location);
	$('h1').html(window.location + "");
</script>
@endpush
