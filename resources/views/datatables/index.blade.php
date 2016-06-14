@extends('layouts.layout')

@section('title')
Secret!! Showing Posts
@endsection

@section('selected-show')
active
@endsection

@section('css-and-js')
<script src="js/1.9.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href='css/font_OpenSans.css' rel='stylesheet' type='text/css'>
<link href='css/font_Lato.css' rel='stylesheet' type='text/css'>
<link href='css/font_PlayFair.css' rel='stylesheet' type='text/css'> -->
<link href='css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<!-- start-smoth-scrolling -->
<style type="text/css">
    .bootbox-body{
        font-weight: 800;
    }
</style>
@endsection


@section('header')
<div class="header">
    <div class="container">
        <div class="header-info">
            <div class="logo">
                <a href=""><img src="images/logo.png" alt=" " /></a>
            </div>
            <div class="logo-right">
                <span class="menu"><img src="images/menu.png" alt=" "/></span>
                <ul class="nav1">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="articles">Articles</a></li>
                    <li><a href="tutorials">Tutorials</a></li>
                    <li><a href="contact">Contact</a></li>
                    @if (Auth::check())
                    <li class="@yield('selected-create')">
                        <a href="{{ url('/createPost') }}">Create Post</a>
                    </li>
                    <li class="cap">
                        <a href="{{ url('/showPost') }}">Kelola Post</a>
                    </li>
                    <li class="@yield('selected-logout')">
                        <a href="{{ url('/logout') }}">Logout</a>
                    </li>
                    @else
                    <!--<li class="@yield('selected-login')">
                        <a href="{{ url('/login') }}">Login</a>
                    </li>-->
                    @endif
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="articles">
    <div class="container">
        <div class="article">
        <div class="alerts"></div>
        <div class="alerts2"></div>
            <div class="content-info">
                <h2>List Post</h2>
                <p>Ini adalah daftar Postingan...</p>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th colspan="1">Id</th>
                            <th colspan="1">Judul</th>
                            <th colspan="1">Slug</th>
                            <th colspan="1">Created At</th>
                            <th colspan="1">Updated At</th>
                            <th colspan="1"><center>Edit</center></th>
                            <th colspan="1"><center>Delete</center></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div><center><strong><p id="jumlahPost"></p></strong></center></div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'slug', name: 'slug' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { mRender: function(data, type, row){
                    return "<center><a href='post/edit/"+ row.id +"' class='glyphicon glyphicon-edit btn btn-primary'> Edit"
                    "</a></center>";

                },
            },

            { mRender: function(data, type, row){
                    return "<center><a onclick='cekNiatDelete("+row.id+","+row.data+")' class='glyphicon glyphicon-trash delete-artikel btn btn-danger' name="+ row.title +" data-id="+row.id+" aria-hidden='true'> Delete</a></center>";

                }

            }
            
        ],
    });
}

);

function cekNiatDelete(id, name){
    bootbox.dialog({
            message: "Apakah Anda yakin ingin menghapus Posting berjudul : " + name + " ?",
            title: "Hapus Post?",
            buttons: {
                danger: {
                label: "Hapus Saja",
                className: "btn-danger",
                callback: function() {
                    requestDeleteArtikel(id, name);
                    }
                },
                main: {
                label: "Batal",
                className: "btn-primary",
                    callback: function() {
                    }
                }
                                                }
     });
}
function requestDeleteArtikel(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        })

        $.ajax({
            type: "POST",
            data: {
                'id' : id
            },
            dataType: "json",
            url: "showPost/delete",
            success: function(result){
                if(result){
                    $('.alerts').html("");
                    if(result.error_code==0){
                        $('.alerts').append("<div class='alert alert-success text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.title + result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
                        requestLoadArtikel($('#cari').val());
                    }else{
                        $('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
                    }
                    
                }
            },
            error: function(result){
                $('.alerts').html("");
                //$('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200);
            }
        }, "json");
    }
</script>
@endpush