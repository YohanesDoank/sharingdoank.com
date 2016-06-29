@extends('layouts.layout')

@section('title')
Contact Sharing's Doank's 
@endsection

@section('selected-contact')
active
@endsection

@section('hoverBrand')
.navbar-inverse .navbar-brand:hover { color: brown;}
.navbar-inverse .navbar-nav>.active>a{ background-color: black;border-bottom: solid .4em brown;}
@endsection

@section('content')
@if(Session::has('errors'))
<ul class="pager" style="margin-top: -50px;">
	<li><a ><h1 class="label label-success" style="font-size: 4em;">Pesan anda sudah terkirim!</h1></a></li>
</ul>
@endif
<div class="contact">
		<div class="contact-left">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2620.908687693293!2d2.3574429999999995!3d48.936181!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66eb34e18b951%3A0xc3c6a4ac9498bfce!2sWorld&#39;s+Business+Import!5e0!3m2!1sen!2sin!4v1429768672602" frameborder="0" style="border:0"></iframe>
		</div>
		<div class="contact-right">
			<p class="phn">+62 813 2760 2550</p>
			<p class="phn-bottom">Yogyakarta
					<span>Jln Magelang, Sleman</span></p>
			<p class="lom">Yang mau mampir telpon dulu ya, soalnya biar gak shock tar waktu berkunjung ketempat saya. Hehe Piss</p>
		</div>
		<div class="clearfix"> </div>
		<div class="contact-left1">
			<h3>Contact Si Doank <span>Tanya atau Kritik dan Saran</span></h3>
			<div class="in-left">
				<form method="post" action="sendQuestion">
					<input type="text" name="nama" placeholder="Nama Anda:" required=" ">
					<input type="text" name="no_telp" placeholder="Nomor Telpon:" required=" ">
					<input type="email" name="email" placeholder="E-mail:" required=" ">				
			</div>
			<div class="in-right">
					<textarea name="pesan" placeholder="Pesan:" required=" "></textarea>
				 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="submit" value="SUBMIT">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="contact-right1">
			<h3>Find Us On <span>Social Websites</span></h3>
			<h4>Nullam ac urna velit pellentesque in <label>arcu tortor 
				Pellentesque nec</label></h4>
				<p>Nullam ac urna velit. Pellentesque in arcu tortor. 
				Pellentesque nec est et elit varius pulvinar eget vitae sapien. 
				Aenean vehicula accumsan gravida. Cum sociis natoque penatibus
				et magnis dis parturient montes, nascetur ridiculus mus. Phasellus 
				et lectus in urna consequat consectetur ut eget risus.</p>
			<ul>
				<li><a href="#" class="facebook"> </a></li>
				<li><a href="#" class="twitter"> </a></li>
				<li><a href="#" class="dribble"> </a></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
@endsection

@section('footer-contacts')
cap1
@endsection