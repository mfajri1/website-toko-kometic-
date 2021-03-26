$('document').ready(function(){
	$('.checkAll').click(function(){
		if($(this).is(":checked")){
			$('.check').prop('checked', true);
		}else{
			$('.check').prop('checked', false);
		}
	});

	$('#hapusAll').click(function(e){
		e.preventDefault();
		swal({
			title : 'Apakah Kamu Yakin Menghpus data?',
			type : 'warning',
			buttons:{
				confirm: {
					text : 'Ya, Hapus !',
					className : 'btn btn-success'
				},
				cancel: {
					visible: true,
					text : 'Tidak',
					className: 'btn btn-danger'
				}
			}
		}).then(function(isConfirm){
			if (isConfirm) {
				$('#deleteAll').submit();
			}else{
				$(".check").prop("checked", false);
				swal.close();
				return false;
			}
		});
	});

	

	// $('.hargaModal').blur( function(){
	// 	let nilaiModal = $(this).val();
	// 	let nilaiIsiPerCtn = $('.perLsnOrPcs').val();
	// 	let nilaiSatuan = $('#satuanId').val();

	// 	if (nilaiSatuan == 1) {
	// 		let total = nilaiModal / nilaiIsiPerCtn;
	// 		$('.hargaBarang').val(total.toFixed(0));
	// 	}else if (nilaiSatuan == 2){
	// 		let total = nilaiModal / (nilaiIsiPerCtn * 12);
	// 		$('.hargaBarang').val(total.toFixed(0));
	// 	}else if (nilaiSatuan == 3){
	// 		let total = nilaiModal / (nilaiIsiPerCtn * 12);
	// 		$('.hargaBarang').val(total.toFixed(0));
	// 	}
	// })

	// $('.totalHarga').keyup(function(){
		
	// })

	$('.pajak').blur(function(){
		let totalHarga = parseInt($('.totalHarga').val());
		let bonus = parseInt($('.bonus').val());
		let diskon = parseInt($('.diskon').val());
		let pajak = parseInt($('.pajak').val());

		let totalBelanja = totalHarga - diskon + pajak;

		$('.totalSemua').val(parseInt(totalBelanja));
	});

	$('#idPerusahaan').on('change', function() {
		let idPerusahaan = $('#idPerusahaan').val();
		console.log(idPerusahaan);
		// $('#table_list').html(`<p>Selamat Datang ${idPerusahaan}</p>`);
		$('#table_list').load('ajaxLoad/'+idPerusahaan);
		
	});

	$('#formFilter').hide();
	$('#fil').on('click', function(){
		$('#formFilter').slideToggle('slow');
		$('#formFilter').submit(function(e){
			e.preventDefault();
			let action = $(this).attr('action');
			let method = $(this).attr('method');
			let tAwal = $('[name="filterStart"]').val();
			let tAkhir = $('[name="filterEnd"]').val();

			$.ajax({
				url : action,
				type : method,
				chace : false,
				async : true,
				dataType : 'json',
				data : {
					'filterStart' : tAwal,
					'filterEnd' : tAkhir
				},
				success : function(response){
					console.log(response);
					$('#table_list').html("");
					for (var i = 0; i < response.length; ++i) {
					    $('#table_list').append(`
					    	<tr>
					    		<td>${i}</td>
					    		<td>${response[i].perusahaanId}</td>
					    		<td>${response[i].kodeOrder}</td>
					    		<td>${response[i].kodeTransaksi}</td>
					    		<td>${response[i].namaSales}</td>
					    		<td>${response[i].totalHarga}</td>
					    		<td>${response[i].totalSemua}</td>
					    		<td>
					    			<a href="" id="info${response[i].idTransaksi}"><i class="fa fa-info-circle text-warning"></i> </span>
						    		<a href="" id="info${response[i].idTransaksi}"><i class="fa fa-edit"></i> </a>
						    		<a href="" id="info${response[i].idTransaksi}"><i class="fas fa-trash text-danger"></i> </a>
					    		</td>
					    	</tr>
					    `);
					}
				}
			});

		});

	});
});
	
	

