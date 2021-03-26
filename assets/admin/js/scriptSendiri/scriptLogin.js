$(document).ready(function(){
	// proses daftar
	$("#daftar").submit(function(e){
		e.preventDefault();
		const method = $(this).attr('method');
		const action = $(this).attr('action');
		const data = $(this).serialize();
		// console.log(action); 

		$.ajax({
			url : action,
			type : method,
			dataType : 'json',
			data : data,
			beforeSend : function(){
				swal("Sedang Proses", {
					button: false,
				});
			},
			success : function(result){
				// console.log(result);
				if (result.hasil == true){
					swal({
						icon : "success",
						title : 'Konfirmasi',
						text : 'Anda Berhasil Menambahkan data !!!',
						buttons: {
							confirm: {
								className : 'btn btn-success'
							}
						},
						timer: 5000,
					}).then(function(){
						window.location.href = 'login';
					});

				}else if (result.hasil == false){
					swal({
						icon : "error",
						title : 'Konfirmasi',
						text : 'Periksa Lagi Data Yang Anda Inputkan !!!',
						buttons: {
							confirm: {
								className : 'btn btn-danger'
							}
						},
						timer: 5000,
					}).then(function(){
						location.reload();
					});

				}else if (result.hasil == 'Email Error'){
					swal({
						icon : "question",
						title : 'Konfirmasi',
						text : 'Email Anda Tidak Terkirim !!!',
						buttons: {
							confirm: {
								className : 'btn btn-danger'
							}
						},
						timer: 5000,
					}).then(function(){
						location.reload();
					});

				}else if (result.hasil == 'gagal'){
					swal({
						icon : "question",
						title : 'Konfirmasi',
						text : 'Data Sudah Ada atau Data Kosong!!!',
						buttons: {
							confirm: {
								className : 'btn btn-danger'
							}
						},
						timer: 5000,
					}).then(function(){
						location.reload();
					});

				}else{
					swal({
						icon : "warning",
						title : 'Konfirmasi',
						text : 'Inputan Tidak Boleh Kosong !!!',
						buttons: {
							confirm: {
								className : 'btn btn-danger'
							}
						},
						timer: 5000,
					}).then(function(){
						location.reload();
					});
				}
			},
			error : function(result){
				// console.log(result);
				swal({
					icon : "question",
					title : 'Konfirmasi',
					text : 'Pengiriman Data Error !!!',
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
					timer: 5000,
				}).then(function(){
					location.reload();
				});

			},
		});
	});
	// end proses daftars


	// view password
	let angka = 0;
	$('.viewPass1').on('click',() => {
		angka++;
		if(angka == 1){
			$('.viewPass1').removeClass('fa-eye').addClass('fa-eye-slash text-danger');
			$('.password').attr('type', 'text');
		}else{
			$('.viewPass1').removeClass('fa-eye-slash text-danger').addClass('fa-eye');
			$('.password').attr('type', 'password');
			angka = 0;
		}

	});

	let angka2 = 0;
	$('.viewPass2').on('click',() => {
		angka2++;
		if(angka2 == 1){
			$('.viewPass2').removeClass('fa-eye').addClass('fa-eye-slash text-danger');
			$('.password2').attr('type', 'text');
		}else{
			$('.viewPass2').removeClass('fa-eye-slash text-danger').addClass('fa-eye');
			$('.password2').attr('type', 'password');
			angka2 = 0;
		}

	});
	// end view Password

	


	// validasi input register dan login

	// validasi Username
	$('.usernameCheck').on('keypress',(data) => {
		// cara 1
		/*
		if(data.which == 32){
			$('.validasiUsername').text('Username Tanpa Menggunakan Spasi !!!').removeClass('d-none');
		}else{
			$('.validasiUsername').addClass('d-none');
		}
		*/

		let pola_username = /^[a-zA-Z0-9_.]+$/;
		let valUsername = $('.usernameCheck').val();
		if(!pola_username.test(valUsername)){
			$('.validasiUsername').text('Ingat Tanpa Menggunakan Spasi!!!').removeClass('d-none');
		}

	});

	$('.usernameCheck').blur(() => {
		let pola_username = /^[a-zA-Z0-9_.]+$/;
		let valUsername = $('.usernameCheck').val();
		
		if (valUsername.length >= 1 && valUsername.length < 5){
			$('.validasiUsername').text('Username Anda Kurang Panjang !!! Minimal 6 Karakter').removeClass('d-none');
		}else if(!pola_username.test(valUsername) && valUsername != ""){
			$('.validasiUsername').text('Tanpa Menggunakan Spasi!!!').removeClass('d-none');
		}else if (valUsername.length == 0){
			$('.validasiUsername').addClass('d-none');
		}else{
			$('.validasiUsername').addClass('d-none');
		}
	});
	// end validasi Username


	// validasi Email
	$('.emailCheck').blur(() => {
		let pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
		let valEmail = $('.emailCheck').val();
		// console.log(pola_email.test(valEmail));
		if(valEmail == ""){
			$('.validasiEmail').addClass('d-none');
		}else if(!pola_email.test(valEmail)){
			$('.validasiEmail').text('Penulisan Email Anda Tidak Benar !!!').removeClass('d-none');
		}else{
			$('.validasiEmail').addClass('d-none');
		}

	});
	// end validasi Email


	// validasi password dan password2
	$('.password').blur(() => {
		let valPass = $('.password').val();
		let valPass2 = $('.password2').val();

		if(valPass.length >= 1 && valPass.length < 5){
			$('.validasiPass').text('Password Anda Kurang Panjang !!! Minimal 5 Karakter').removeClass('d-none');
			$('.betul').removeClass('d-none');
			$('.viewTruePass').removeClass('fa-thumbs-up text-success').addClass('fa-thumbs-down text-danger');
		}else if(valPass.length == 0){
			$('.validasiPass').addClass('d-none');
			$('.betul').addClass('d-none');
		}else{
			$('.validasiPass').addClass('d-none');
			$('.betul').removeClass('d-none');
			$('.viewTruePass').removeClass('fa-thumbs-down text-danger').addClass('fa-thumbs-up text-success');
		} 
		// if kesamaan pas
		// if (valPass2 != valPass) {
		// 	$('.validasiPass2').text('Re-Password Tidak Sama !!!').removeClass('d-none');
		// }else{
		// 	$('.validasiPass2').addClass('d-none');
		// }

	});

	$('.password2').blur(() => {
		let valPass = $('.password').val();
		let valPass2 = $('.password2').val();

		if(valPass2.length >= 1 && valPass2.length < 5){
			$('.validasiPass').text('Re-Password Anda Kurang Panjang !!! Minimal 5 Karakter').removeClass('d-none');
			$('.betul2').removeClass('d-none');
			$('.viewTruePass2').removeClass('fa-thumbs-up text-success').addClass('fa-thumbs-down text-danger');
		}else if(valPass2.length == 0){
			$('.validasiPass').addClass('d-none');
			$('.betul2').addClass('d-none');
		}else {
			$('.validasiPass').addClass('d-none');
			$('.betul2').removeClass('d-none');
			$('.viewTruePass2').removeClass('fa-thumbs-down text-danger').addClass('fa-thumbs-up text-success');
		}

		// if kesamaan pass
		if (valPass2 != valPass) {
			$('.validasiPass2').text('Re-Password Tidak Sama !!!').removeClass('d-none');
		}else{
			$('.validasiPass2').addClass('d-none');
		}
	});
	// end validasi password


	// end validasi input register dan login


	// animasi Login
	$('.form-password').hide();
	$('.tombol-submit').hide();

	$('.form-username').click(() => {
		$('.form-password').show();
		$('.form-password').addClass('animated bounceInDown');

		$('.form-password').click(() => {
			$('.tombol-submit').show();
			$('.tombol-submit').addClass('animated bounceInDown');
			
		});	
	});
	// and animasi login

	// proses login
	$('#login').submit((e) => {
		e.preventDefault();
		// aksi
		let method = $('#login').attr('method');
		let action = $('#login').attr('action');
		// data
		let usernameCheck = $('.username').val();
		let passwordCheck = $('.password').val();
		// console.log(`${usernameCheck} && ${passwordCheck}`);
		// console.log(`${method} && ${action}`);

		// ajax
		$.ajax({
			url : action,
			type : method,
			dataType : 'json',
			data : {
				'username' : usernameCheck,
				'password' : passwordCheck
			},
			// beforeSend : function(){
			// 	swal("Sedang Proses", {
			// 		button: false,
			// 	});
			// },
			success : function(result){
				// console.log(result);
				if (result.hasilCek == 'berhasilCek') {
					if (result.hasilStatusUser == 'aktif') {
						if (result.hasilBlokir == 'tidak'){
							if (result.hasilLevelUser == 'admin') {
								swal({
									icon : "success",
									title : 'Konfirmasi',
									text : `Anda Berhasil Login Sebagai ${result.hasilLevelUser} !!!`,
									buttons: {
										confirm: {
											className : 'btn btn-success'
										}
									},
									timer: 5000,
								}).then(function(){
									window.location.href = 'home';
								});
							}else if(result.hasilLevelUser == 'operator'){
								swal({
									icon : "success",
									title : 'Konfirmasi',
									text : `Anda Berhasil Login Sebagai ${result.hasilLevelUser} !!!`,
									buttons: {
										confirm: {
											className : 'btn btn-success'
										}
									},
									timer: 5000,
								}).then(function(){
									window.location.href = 'home';
								});
							}else if(result.hasilLevelUser == 'sales'){
								swal({
									icon : "success",
									title : 'Konfirmasi',
									text : `Anda Berhasil Login Sebagai ${result.hasilLevelUser} !!!`,
									buttons: {
										confirm: {
											className : 'btn btn-success'
										}
									},
									timer: 5000,
								}).then(function(){
									window.location.href = 'home';
								});
							}
						}else{
							swal({
								icon : "warning",
								title : 'Konfirmasi',
								text : 'Akun Anda Sudah Di Blokir !!!',
								buttons: {
									confirm: {
										className : 'btn btn-danger'
									}
								},
								timer: 5000,
							}).then(function(){
								location.reload();
							});
						}
						// akhir hasilBlokir
					}else{
						swal({
								icon : "warning",
								title : 'Konfirmasi',
								text : 'Akun Belum Aktif !!! Aktifasi Terlebih Dahulu !!!',
								buttons: {
									confirm: {
										className : 'btn btn-danger'
									}
								},
								timer: 5000,
							}).then(function(){
								location.reload();
							});
					}
					// akhir hasilStatusUser
				}else{
					if (result.hasilBlokir == 'ya' || result.hasilPasswordSalah == null) {
						swal({
							icon : "warning",
							title : 'Konfirmasi',
							text : `Akun Anda Sudah Di Blokir !!!`,
							buttons: {
								confirm: {
									className : 'btn btn-danger'
								}
							},
							timer: 5000,
						}).then(function(){
							location.reload();
						});
					}else{
						let salahPass = result.hasilPasswordSalah ;
						let sisaKesempatan = 2 - salahPass;
						swal({
							icon : "error",
							title : 'Konfirmasi',
							text : `Gagal Login !!! Sisa Kesempatan ${sisaKesempatan} Dari 3 Kali Kesempatan`,
							buttons: {
								confirm: {
									className : 'btn btn-danger'
								}
							},
							timer: 5000,
						}).then(function(){
							location.reload();
						});
					}
				}
				// akhir hasilCek

			},
			error : function(result){
				// console.log(result);
				swal({
					icon : "question",
					title : 'Konfirmasi',
					text : 'Pengiriman Data Error !!!',
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
					timer: 5000,
				}).then(function(){
					location.reload();
				});

			}
		});
		// akhir ajax

	});



	// end proses login


});