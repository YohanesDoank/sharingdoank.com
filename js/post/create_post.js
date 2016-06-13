
$(document).ready(function(){


	var fotoSrc = $('#fotoxx').attr('src');
	var cekButton = "";
	var title;
	var textContent;
    var loading = $.loading();

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

	// FUNGSI UNTUK SHOW BUTTON DELETE FOTO UTAMA POST
	$('#btn-delete-foto').click(function(event){	
		$('#fotoxx').toggle('hide');
        $('#btn-delete-foto').toggle('show');
		$('#btn-kembalikan-foto').toggle('show');
		$('#fotoxx').attr('src', null);

		cekButton = "kembalikan";
		$('#inputpicture').val('');
	});

	// FUNGSI UNTUK SHOW BUTTON KEMBALIKAN FOTO UTAMA POST
	$('#btn-kembalikan-foto').click(function(event){	
		$('#fotoxx').attr('src', fotoSrc);
		$('#fotoxx').toggle('show');
        $('#btn-delete-foto').toggle('show');
		$('#btn-kembalikan-foto').toggle('show');

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
    	$('#foto-preview').attr('src', $('#fotoxx').attr('src'));
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
        var penginput = $('input[name="penginput"]').val();

        if($('#inputpicture').val() == ""){
            requestUploadArtikel(titleArtikel, isiArtikel, kategori, penginput, null);
        }
        else{
            var ajax = function(imageData){
            requestUploadArtikel(titleArtikel, isiArtikel, kategori, penginput, imageData);
            }

            imageupload($('#inputpicture').get(0), ajax);

        }
        } else {
            alert("Rejected");
        }
    }

    function requestUploadArtikel(title, isi, kategori, penginput, imageData){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            type:"POST",
            data: {
                'title' : title,
                'isi' 	: isi,
                'kategori' : kategori,
                'penginput' : penginput,
                'image' : imageData
            },
            dataType: "json",
            url: "post_artikel",
            success : function(result){
                if (result) {
                    $('.alerts').html("");
                    if (result.error_code==0) {
                        $('.alerts').append("<div class='alert alert-success text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
                        
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
            errorsHtml = "<div class='alert alert-warning text-center' role='alert'>";
            $.each( errors , function( key, value ) {
                    errorsHtml +=  value[0] ; 
                    console.log(value[0]);
            });
            errorsHtml += "</div>";
          
            $('.alerts').html("");
			$('.alerts').append(errorsHtml).fadeIn(200).fadeToggle(10000).fadeOut(50);

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
	        reader.onload = function (e) {
	            $('#fotoxx').attr('src', e.target.result);
	            $('#foto-preview').attr('src', e.target.result);
	            
	            
				if (cekButton == "kembalikan") {
					$('#fotoxx').toggle('show');
			        $('#btn-delete-foto').toggle('show');
					$('#btn-kembalikan-foto').toggle('show');	
					cekButton = "delete";
				}
				else if(cekButton == ""){
					$('#btn-delete-foto').toggle('show');
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
