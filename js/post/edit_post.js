$(document).ready(function(){

    var id = window.location.href.slice(window.location.href.indexOf('dit/') + 4);
	var fotoSrc = $('#fotoxx').attr('src');
    var fotoSrcTemp = $('#fotoxx').attr('src');
    var cekButton = "";
    var imgSudahBerganti = "";
	var title;
	var textContent;
    var finalSub;
    var cekFinalSub = $('input[name="etype3"]:checked').val();
    var loading = $.loading();
    $('#ajaxLoading img').each(function () {
          var curSrc = $(this).attr('src');
          // alert(curSrc.length);
          var newSrc = "../../" + curSrc;
          $(this).attr('src', newSrc);
        });
    

    if (fotoSrc != null) {
        $('#btn-delete-foto').toggle('show');   
    }
	// MENAMBAH CLASS RESPONSIVE UNTUK TIAP TAG IMG
	$("img").addClass("img-responsive");

	//FUNGSI MENAMPILKAN POP UP BOX PREVIEW POST
	$(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

        e.preventDefault();
        });
	});

    $("input[name='etype']").change(function(){
        var kategoriTerpilih = $('input[name="etype"]:checked').val();
        $('#isi-sub-kategori').html("");
        $('#sub-kategori label').html("");
        $('#isi-sub-kategori2').html("");
        $('#sub-kategori2 label').html("");
        if (kategoriTerpilih == "artikel") {
            // alert("artikel");

            finalSub = "false";
            cekFinalSub = "";
            $('#sub-kategori label').html("Jenis Artikel");
            $('#isi-sub-kategori').append('' +
                '<label><input type="radio" name="etype2" value="coding"> Coding </label>' + 
                '<label style="margin-left:10px;"><input type="radio" name="etype2" value="berita-hot"> Berita Hot </label>' +  
                '<label style="margin-left:10px;"><input type="radio" name="etype2" value="pengetahuan-umum"> Pengetahuan Umum </label>');

            $('#sub-kategori').show();
        }
        else{
            // alert("tutorial");
            $('#sub-kategori label').html("Jenis Tutorial");
            $('#isi-sub-kategori').append('' + 
                '<label><input type="radio" name="etype2" value="coding"> Coding </label>' + 
                '<label style="margin-left:10px;"><input type="radio" name="etype2" value="sulap"> Sulap </label>' +  
                '<label style="margin-left:10px;"><input type="radio" name="etype2" value="game"> Game </label>');

            $('#sub-kategori').show();   

            $("input[name='etype2']").change(function(){
                // alert('x');
                var kategori2 = $('input[name="etype2"]:checked').val();     
                $('#sub-kategori2 label').html("");
                $('#isi-sub-kategori2').html("");
                if (kategori2 == "coding") {
                    finalSub = "true";
                    $('#sub-kategori2 label').html("Jenis Tutorial Coding");
                    $('#isi-sub-kategori2').append('<label><input type="radio" name="etype3" value="coding-php"> PHP </label>' + 
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="coding-dot-net"> .NET </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="coding-java-desktop">Java Desktop </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="coding-java-mobile">Java Mobile </label>');   
                }
                else if (kategori2 == "game") {
                    finalSub = "true";
                    $('#sub-kategori2 label').html("Jenis Tutorial Game");
                    $('#isi-sub-kategori2').append('<label><input type="radio" name="etype3" value="game-ps"> Playstation </label>' + 
                            '<label style="margin-left:10px;"><input type="radio" name="etype3" value="game-pc"> PC </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="game-mobile"> Mobile </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="game-jadul"> Jadul </label>');   
                }
                else{
                    finalSub = "false";
                    cekFinalSub = "";
                }
                $('#sub-kategori2').show();
            });
        }

    });


            $("input[name='etype2']").change(function(){
                // alert('x');
                var kategori2 = $('input[name="etype2"]:checked').val();     
                $('#sub-kategori2 label').html("");
                $('#isi-sub-kategori2').html("");
                if (kategori2 == "coding") {
                    finalSub = "true";
                    $('#sub-kategori2 label').html("Jenis Tutorial Coding");
                    $('#isi-sub-kategori2').append('<label><input type="radio" name="etype3" value="coding-php"> PHP </label>' + 
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="coding-dot-net"> .NET </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="coding-java-desktop">Java Desktop </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="coding-java-mobile">Java Mobile </label>');   
                }
                else if (kategori2 == "game") {
                    finalSub = "true";
                    $('#sub-kategori2 label').html("Jenis Tutorial Game");
                    $('#isi-sub-kategori2').append('<label><input type="radio" name="etype3" value="game-ps"> Playstation </label>' + 
                            '<label style="margin-left:10px;"><input type="radio" name="etype3" value="game-pc"> PC </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="game-mobile"> Mobile </label>' +  
                        '<label style="margin-left:10px;"><input type="radio" name="etype3" value="game-jadul"> Jadul </label>');   
                }
                else{
                    finalSub = "false";
                    cekFinalSub = "";
                }
                $('#sub-kategori2').show();
            });

	// FUNGSI UNTUK SHOW BUTTON DELETE FOTO UTAMA POST
	$('#btn-delete-foto').click(function(event){    
        $('#fotoxx').toggle('hide');
        $('#btn-delete-foto').toggle('show');
        $('#btn-kembalikan-foto').toggle('show');
        $('#fotoxx').attr('src', null);
        
        cekButton = "kembalikan";
        fotoSrc = "";
    });

    $('#btn-kembalikan-foto').click(function(event){
        $('#fotoxx').attr('src', fotoSrcTemp);
        $('#fotoxx').toggle('show');
        $('#btn-delete-foto').toggle('show');
        $('#btn-kembalikan-foto').toggle('show');
        fotoSrc = 
        cekButton = "delete";
    });
	
	

	$("#inputpicture").change(function(){
	    gantiGambar(this);
	}); 

    $('#message').summernote({ 
    	height : 400,
    	placeholder : "Write down your content of articles here..."
    });

    function previewPost(){
    	$('.popup-inner h2').html('');
    	$('#content-preview').html('');
    	$('.popup-inner h2').html($('#title').val());
    	$('#foto-preview').attr('src', fotoSrc);
    	$('#content-preview').html($('#message').summernote('code'));
    }
 

    $('#btn_preview').click(function(e){
    	previewPost();
    });

    // menampilkan popup confirm box
    $('#btn_submit').click(function(e){
        e.preventDefault();
        fnOpenNormalDialog();
    });  
    
    //displaiyng popup confirm box
    function fnOpenNormalDialog() {

        bootbox.dialog({
                message: "Yakinkah anda ingin edit POST ini ?",
                title: "Hapus Post?",
                buttons: {
                    danger: {
                    label: "Proses Edit",
                    className: "btn-primary",
                    callback: function() {
                            callback(true);
                            loading.open();
                        }
                    },
                    main: {
                    label: "Batal",
                    className: "btn-danger",
                        callback: function() {
                            callback(false);
                        }
                    }
                                                    }
         });
    }
    //fungsi confirm create post
    function callback(value) {
        if (value) {
            var isiArtikel = $('#message').summernote('code');
            var titleArtikel = $('#title').val();
            var kategori = $('input[name="etype"]:checked').val();
            var subKategori = $('input[name="etype2"]:checked').val();
            var anakSubKategori =  $('input[name="etype3"]:checked').val();
            var penginput = $('input[name="penginput"]').val();

            alert(subKategori);
            if (finalSub == "true" ){ 
                subKategori = anakSubKategori;
                alert(subKategori);
            }
            else if(cekFinalSub != ""){
                subKategori = anakSubKategori;
                alert(subKategori);   
            }

            if($('#inputpicture').val() == ""){
                requestUploadArtikel(titleArtikel, isiArtikel, kategori, subKategori, null);
            }
            else{
                var ajax = function(imageData){
                requestUploadArtikel(titleArtikel, isiArtikel, kategori, subKategori, imageData);
                }

                imageupload($('#inputpicture').get(0), ajax);

            }
        } else {

        }
    }

    function requestUploadArtikel(title, isi, kategori, subKategori, imageData){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            data: {
                'id'    : id,
                'title' : title,
                'isi' 	: isi,
                'kategori' : kategori,
                'image' : imageData,
                'subKategori' : subKategori,
                'foto' : fotoSrc
            },
            dataType: "json",
            url: window.location +"/update_post",
            success : function(result){
                if (result) {
                    $('.alerts').html("");
                    var sukses = "<div class='alert alert-success text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>";
                    if (result.error_code==0) {
                        bootbox.dialog({
                                message: sukses,
                                title: "Sukses",
                                buttons: {
                                    danger: {
                                    label: "Oke Sipz!",
                                    className: "btn-primary"
                                    }
                                }
                            });
                    }
                    else{
						$('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
                    }
                    loading.close();
                    $('html, body').animate({
                            scrollTop: $('.alerts').offset().top
                    }, 1000);   
            }
        },

        error:function(jqXhr){
        	var errors = jqXhr.responseJSON; 
            console.log(jqXhr);
            var errorMessage;
            var count = 1;
            errorsHtml = "<div class='alert alert-danger text-center' role='alert'><b>";
            $.each( errors , function( key, value ) {
                    errorsHtml +=  count +". "+ value[0] + '<br>' ; 
                    errorMessage += value[0] ; 
                    console.log(value[0]);
                    count += 1;
            });
            errorsHtml += "</b></div>";
            bootbox.dialog({
                        message: errorsHtml,
                        title: "Error",
                        buttons: {
                        danger: {
                        label: "Periksa Kembali..",
                        className: "btn-primary"
                    }
                }
            });
   //          $('.alerts').html("");
            // $('.alerts').append(errorsHtml).fadeIn(200).fadeToggle(10000).fadeOut(50);

            loading.close();
            $('html, body').animate({
                scrollTop: $('.alerts').offset().top
            }, 1000);   

        }
      }, "json");
    }



	function gantiGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            imgSudahBerganti = "OK";
            reader.onload = function (e) {
                $('#fotoxx').attr('src', e.target.result);
                
                fotoSrc = $('#fotoxx').attr('src');
                fotoSrcTemp = $('#fotoxx').attr('src');
                if (cekButton == "kembalikan") {
                    $('#fotoxx').toggle('show');
                    $('#btn-delete-foto').toggle('show');
                    $('#btn-kembalikan-foto').toggle('show');   
                    cekButton = "delete";
                }
                else if(fotoSrc != null ){
                    if ($('#btn-delete-foto').is(":hidden")) {
                        $('#btn-delete-foto').toggle('show');
                    }
                }
                else if(cekButton == null){
                    
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function imageupload(element, ajax){
        console.log('testimageupload');
        
        var elementId = element.id;

        if(element.files && element.files[0]){
            var file = element.files[0];
            var validFileType = ".jpg, .png, .bmp";
            var extension = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
            $("#"+elementId+"-show").attr('src', "");

            console.log(extension);

            //validatefile
            if(validFileType.toLowerCase().indexOf(extension)<0){
                $("#"+elementId+"-alert").show();
                $("#"+elementId+"-show")
                .attr('style', '')
                .css('height','auto')
                return;
            }
            $("#"+elementId+"-alert").hide();

            //showfile
            var reader = new FileReader();
            reader.onload = function(e){
                ajax(e.target.result);
            }

            if (reader.readAsDataURL) {reader.readAsDataURL(element.files[0]);}
            else if(reader.readAsDataurl) {reader.readAsDataurl(element.files[0]);}
            else if(reader.readAsDataUrl) {reader.readAsDataUrl(element.files[0]);}

        }
        else{
            console.log('else');
            $(elementId+"-show").attr('src',"");
        }
    }

});
