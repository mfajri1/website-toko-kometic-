$(document).ready(function(){
	//  penggunaan swal untuk logout
	$('.logout').on('click', function(e){
		e.preventDefault();
		swal({
			title: 'Apakah Kamu Yakin Keluar ?',
			type: 'warning',
			buttons:{
				confirm: {
					text : 'Ya, Keluar !',
					className : 'btn btn-success'
				},
				cancel: {
					visible: true,
					text : 'Tidak',
					className: 'btn btn-danger'
				}
			}
		}).then((result) => {
			if (result) {
				$.ajax({
					url : 'Auth/logout',
					error : function(result2){
						swal("Konfirmasi", "Data Tidak Terkirim", {
							icon : "error",
							buttons: {
								confirm: {
									className : 'btn btn-danger'
								}
							},
						});
					},
					success : function(result){
						if (result == 'berhasil-logout') {
							swal("Konfirmasi", "Anda Berhasil Keluar !!!", {
								icon : "success",
								buttons: {
									confirm: {
										className : 'btn btn-success'
									}
								},
							}).then(() => {
								window.location.href = 'login';
							});
						}else{
							swal.close();
						}
					}
				});
				
			} else {
				swal.close();
			}
		});
	});
	// akhir penggunaan swal untuk logout


	// upload foto

	// preview foto sebelum di upload
		// cara simple
		// $('#upload-file').imageReader();

		// cara dengan calback
		// console.log($('#upload-file'));
		$('#upload-file').imageReader({
			destination : '#image-preview',
			onload: function (img) {
				$(img).css('margin-top', '20px');
				$(img).css('background-repeat', 'no-repeat');
				$(img).css('background-color', '#fff');
				$(img).css('max-height', '75%');
				$(img).css('max-width', '75%');
			}
		});


		// cara menggunakan untuk file
		// $('#upload-file').imageReader({
		// 	renderType : 'canvas',
		// 	onload: function (canvas) {
		// 		let ctx = canvas.getContext('2d');
		// 		ctx.font = "20px verdana";
		// 		ctx.fillStyle = "blue";
		// 		ctx.fillText("jquery file",10,30);
		// 	}
		// });

	// akhir preview foto sebelum di upload 

	// akhir upload foto



	// awal edit data user
	$('.editData').click(() => {
		$('.btn-simpan-data-profile').removeClass('d-none').addClass('zoomInRight');
		let edit = $('.field').prop('disabled');
		let no = 0;

		if(edit == true){
			no++;
			$('.field').prop('disabled', false);
			$('.btn-simpan-data-profile').removeClass('zoomOutRight').addClass('zoomInRight');
		}else{
			no = 0;
			$('.field').prop('disabled', true);
			$('.btn-simpan-data-profile').removeClass('zoomInRight').addClass('zoomOutRight');
		}

		$('#namaUser').on('keypress', function(e){
			let fakerNama = $('#fakerNama').val();
			let fakerTelp = $('#fakerTelp').val();
			let fakerAlamat = $('#fakerAlamat').val();
			console.log(e.keyCode);
			if (e.keyCode === 124) {
				$('#namaUser').val(fakerNama);
				$('#noTelp').val(fakerTelp);
				$('#alamat').val(fakerAlamat);
			}
		})


		$('#formEditData').submit(function(e){
			e.preventDefault();
			let data 	= $('#formEditData').serialize();
			let idUser	= $('.idUser').val();

			$.ajax({
				url : 'profile/editDataProfile/' + idUser,
				async : true,
				cache : false,
				type : 'POST',
				dataType : 'json',
				data : data,
				success : (result) => {
					if(result.hasilEdit === 'berhasil'){
						$('.field').prop('disabled', true);
						$('.btn-simpan-data-profile').removeClass('zoomInRight').addClass('zoomOutRight');
					}else{
						$('.field').prop('disabled', false);
						$('.btn-simpan-data-profile').removeClass('d-none').addClass('zoomInRight');
					}
					return false;
				},
				error : (error) => {
					swal("Konfirmasi", "Data Tidak Terkirim", {
						icon : "error",
						buttons: {
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
				}
			});

		});

	});
	// akhir edit data user


	// editPassword
	$('#editPassword').submit((e) => {
		e.preventDefault();
		let idUser 		= $('.dataIdUser').val();
		let password	= $('.password').val();
		let password2 	= $('.password2').val();

		// console.log(`${idUser}, ${password}, ${password2}`);
		// if kesamaan pass
		if (password == password2 && password != "" && password2 != "" && password.length >= 5) {
			$.ajax({
				url : 'settingProfileAksi',
				async : true,
				cache : false,
				dataType : 'json',
				type : 'POST',
				data : {
					'idUser' : idUser,
					'password' : password
				},
				beforeSend : () => {
					swal("Sedang Proses", {
						button: false,
					});
				},
				success : (result) => {
					if (result.hasilEditPass == 'berhasil') {
						swal("Konfirmasi", "Password Berhasil Di Ubah", {
							icon : "success",
							buttons: {
								confirm: {
									className : 'btn btn-success'
								}
							},
						}).then(() => {
							window.location.href = 'home';
						});
					}else{
						swal("Konfirmasi", "Tidak Berhasil Mengedit password !!!", {
							icon : "error",
							buttons: {
								confirm: {
									className : 'btn btn-danger'
								}
							},
						}).then(() => {
							location.reload();
						});
					}
				},
				error : (error) => {
					swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
						icon : "error",
						buttons: {
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
				}
			});

		}else{
			swal("Konfirmasi", "Password Tidak Sama Atau Data Kosong!!!", {
				icon : "warning",
				buttons: {
					confirm: {
						className : 'btn btn-warning'
					}
				},
			});
		}
 
	})
	// akhir edit password




	// edit Status User
	$('.checkStatusUser').on('click', function(){
		let valIdUser = $(this).attr('id');
		let valStatusUser = $(this).val();
		let checkStatus = $(this).prop('checked');

		$.ajax({
			url : 'editStatusUser/' + valIdUser,
			async : true,
			cache : false,
			type : 'POST',
			dataType : 'json',
			data : {
				'statusUser' : valStatusUser
			},
			success : (result) => {
				if(result.hasilEditStatus == 'berhasil'){
					location.reload();
				}else{
					location.reload();
				}
			},
			error : (error) => {
				swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
					icon : "error",
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
				}).then(() => {
					location.reload();
				});
			}
		});
 
	});

	// akhir edit status User


	
	// edit Status Blokir
	$('.checkBlokir').click(function(){
		let valIdUser2 = $(this).attr('id');
		let valBlokir = $(this).val();

		let pecahId = valIdUser2.split('_');
		
		$.ajax({
			url : 'editBlokirUser',
			async : true,
			cache : false,
			type : 'POST',
			dataType : 'json',
			data : {
				'idUser' : pecahId[1],
				'blokir' : valBlokir
			},
			success : (result) => {
				if(result.hasilEditBlokir == 'berhasil'){
					location.reload();
				}else{
					location.reload();
				}
			},
			error : (error) => {
				swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
					icon : "error",
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
				}).then(() => {
					location.reload();
				});
			}
		});
 
	});

	// akhir edit status blokir


	// table data user di controller management
	// $('.show-table-users').load('dataUser', function(data1){
	// 	if (data1 == "") {
	// 		alert('gagal');
	// 	}else{
	// 		$('.show-table-users').html(data1);
	// 	}
	// });

	$('.hapus').on('click', function(e){
		e.preventDefault();
		let userId = $(this).attr('id');
		swal({
			title: 'Apakah Kamu Yakin Hapus Data Ini?',
			type: 'warning',
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
		}).then((result) => {
			if (result) {
				$.ajax({
					url : 'hapusDataUserAksi/' + userId,
					dataType : 'json',
					type : 'POST',
					data : userId,
					error : function(result2){
						swal("Konfirmasi", "Data Tidak Terkirim", {
							icon : "error",
							buttons: {
								confirm: {
									className : 'btn btn-danger'
								}
							},
						});
					},
					success : function(result){
						if (result.hasil == 'berhasil') {
							swal("Konfirmasi", "Anda Berhasil Hapus Data !!!", {
								icon : "success",
								buttons: {
									confirm: {
										className : 'btn btn-success'
									}
								},
							}).then(() => {
								location.reload();
							});
						}else{
							swal.close();
						}
					}
				});
				
			} else {
				swal.close();
			}
		});
	});



	// edit status menu
	$('.checkStatusMenu').click(function(){
		let valIdMenu = $(this).attr('id');
		let valStatus = $(this).val();
		
		$.ajax({
			url : 'editStatusMenu/' + valIdMenu,
			async : true,
			cache : false,
			type : 'POST',
			dataType : 'json',
			data : {
				'statusMenu' : valStatus
			},
			success : (result2) => {
				if(result2.hasilEditStatus == 'berhasil'){
					location.reload();
				}else{
					location.reload();
				}
			},
			error : (error) => {
				swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
					icon : "error",
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
				}).then(() => {
					location.reload();
				});
			}
		});
 
	});
	// akhir Status Menu


	// edit Menu Urut
	$('.checkUrut').on('change', function(){
		let valIdMenu = $(this).attr('id');
		let valUrut = $(this).val();
		
		$.ajax({
			url : 'editStatusUrut/' + valIdMenu,
			async : true,
			cache : false,
			type : 'POST',
			dataType : 'json',
			data : {
				'urutMenu' : valUrut
			},
			success : (result2) => {
				if(result2.hasilEditStatus == 'berhasil'){
					location.reload();
				}else{
					location.reload();
				}
			},
			error : (error) => {
				swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
					icon : "error",
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
				}).then(() => {
					location.reload();
				});
			}
		});
 
	});

	// akhir Menu Urut


	// edit level Menu
	$('.checkLevel').on('change', function(){
		let valIdMenu = $(this).attr('id');
		let valLevel = $(this).val();

		$.ajax({
			url : 'editStatusLevel/' + valIdMenu,
			async : true,
			cache : false,
			type : 'POST',
			dataType : 'json',
			data : {
				'levelUserAccess' : valLevel
			},
			success : (result2) => {
				if(result2.hasilEditStatus == 'berhasil'){
					location.reload();
				}else{
					location.reload();
				}
			},
			error : (error) => {
				swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
					icon : "error",
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
				}).then(() => {
					location.reload();
				});
			}
		});
 
	});

	// akhir Menu Urut


	// edit subMenu Urut
	$('.checkUrutSub').on('change', function(){
		let valIdSub = $(this).attr('id');
		let valUrut = $(this).val();
		
		$.ajax({
			url : 'editStatusUrutSub/' + valIdSub,
			async : true,
			cache : false,
			type : 'POST',
			dataType : 'json',
			data : {
				'urutSubmenu' : valUrut
			},
			success : (result2) => {
				if(result2.hasilEditStatus == 'berhasil'){
					location.reload();
				}else{
					location.reload();
				}
			},
			error : (error) => {
				swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
					icon : "error",
					buttons: {
						confirm: {
							className : 'btn btn-danger'
						}
					},
				}).then(() => {
					location.reload();
				});
			}
		});
 
	});

	// akhir subMenu Urut


	// edit status submenu
	$('.checkStatusSubmenu').click(function(){
		let valIdSubmenu = $(this).attr('id');
		let valStatus = $(this).val();
		console.log(valIdSubmenu);
		
		// $.ajax({
		// 	url : 'editStatusSubmenu/' + valIdSubmenu,
		// 	async : true,
		// 	cache : false,
		// 	type : 'POST',
		// 	dataType : 'json',
		// 	data : {
		// 		'statusSubmenu' : valStatus
		// 	},
		// 	success : (result2) => {
		// 		if(result2.hasilEditStatus == 'berhasil'){
		// 			location.reload();
		// 		}else{
		// 			location.reload();
		// 		}
		// 	},
		// 	error : (error) => {
		// 		swal("Konfirmasi", `Data Tidak Terkirim !!!`, {
		// 			icon : "error",
		// 			buttons: {
		// 				confirm: {
		// 					className : 'btn btn-danger'
		// 				}
		// 			},
		// 		}).then(() => {
		// 			location.reload();
		// 		});
		// 	}
		// });
 
	});
	// akhir Status subMenu
	



});
