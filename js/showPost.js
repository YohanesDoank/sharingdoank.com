function requestEditArtikel(id){
				$.ajax({
	                url: 'editArtikel-' + id,
	                type: 'GET',
	                data: { id: id },
	                success: function(response)
	                {
	                    //window.location.replace("editArtikel-"+id+"");
						
	                }
	            });
		}

$(document).ready(function(){
	var judul; 

	//lagi nyoba datatables
	
    // $('table').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     ajax: 'show_all_post',
    //     columns: [
    //         { data: 'id', name: 'id' },
    //         { data: 'title', name: 'title' },
    //         { data: 'created_at', name: 'created_at' },
    //         { data: 'updated_at', name: 'updated_at' }
    //     ]
    // });

	$('#coba').click(function(e) {
	        var currentForm = this;
	        e.preventDefault();
	        bootbox.confirm("Are you sure?", function(result) {
	            if (result) {
	                currentForm.submit();
	            }
	        });
	    });
	// var search = $('#cari').val();
	// requestLoadArtikel(search);	
		
		$('#cari').keyup(function(){
			search = $('#cari').val();
			requestLoadArtikel(search);	
			
		});

	$('#btn_cancel').click(function (){
		var kosong = "";
		requestLoadArtikel(kosong);
	});

	

    function requestLoadArtikel(kataKunci){

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
				}
			})
    		$.ajax({
				type:"POST",
				data:{
					'kataKunci' : kataKunci
				},	
				dataType: "json",
				url: "show_all_post",
				success: function(result){
					if(result){
						$('tbody').html("");
						$('#jumlahPost').html("");
						if(result.error_code==0){
							var count = 0;
							$.each( result.data, function() {
							
								var date = new Date ( result.data[count].updated_at );
								var weekdays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

								var weekday = weekdays[date.getDay()];
								var tgl = date.getDate();
								var bulan = date.getMonth()+1;
								var tahun = date.getFullYear();
								judul = result.data[count].slug;
								count +=1;
									$('tbody').append(
									"<tr class='"+count+"'>"+
							 		"<td>"+count+"</td> <td>"+result.data[count-1].title+"</td>"+
									"<td>"+ weekday +" , "+ tgl + "/" + bulan+ "/" +tahun+"</td>"+
									"<td width='20%'><button><a id='"+result.data[count-1].id+"'' href='showPost/edit/"+result.data[count-1].id+"' class='glyphicon glyphicon-pencil' aria-hidden='true'></a></button></td>"+
									//"<td><a id='"+result.data[count-1].id+"'' href='kelola/"+pindahEdit(result.data[count-1].id)+"' class='glyphicon glyphicon-pencil'></a></td>"+
									"<td width='20%'><button><a class='glyphicon glyphicon-trash delete-artikel' name="+ judul +" data-id="+result.data[count-1].id+" aria-hidden='true'></a></button>"+
									"</td></tr>"
									);
							});

							$('#jumlahPost').append('Posting Ditemukan = <u>' + count + '</u>');
							$('.delete-artikel').click(function(){
								var id = $(this).attr("data-id");
								var name = $(this).attr("name");
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
								
							});

						}else{
							$('.alert').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.data[0].judul +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
						}
					}
				},
				error : function(jqXhr) {
			        var errors = jqXhr.responseJSON; 
			        //console.log(jqXhr);

			        errorsHtml = "<div class='alert alert-warning text-center' role='alert'>";

			        $.each( errors , function( key, value ) {
			            errorsHtml +=  value[0] ; 
			            //console.log(value[0]);
			        });

			        errorsHtml += "</div>";
			  
					$('.tbody').html("");
			        $('.tbody').append(errorsHtml).fadeIn(200).fadeToggle(10000).fadeOut(50);
			    }
			}, "json");
	}

	function requestDeleteArtikel(id, title){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
			}
		})

		$.ajax({
			type: "POST",
			data: {
				'id' : id,
				'title' : title
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
	        
});

