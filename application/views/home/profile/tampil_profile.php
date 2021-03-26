<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Halaman Profile</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('profile') ;?>"><?= ucwords($this->uri->segment(1)) ;?></a>
			</li>
		</ul>
	</div>

	<div class="row row-card">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Data Profile Profile</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							<div class="avatar avatar-xl avatar-online" data-target="#modalUpload" data-toggle="modal">
								<img src="<?= base_url('assets/admin/uploads/users/') . $konfigUser['fotoUser'] ;?>" alt="error" class="avatar-img rounded">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 d-flex justify-content-center mt-1 mb-0">
							<h2 class="mt-0"><?= ucwords($konfigUser['namaUser']) ;?></h2>
						</div>
						<div class="col-12 d-flex justify-content-center mt-0">
							<a href="#" data-target="#modalUpload" data-toggle="modal" class="btn btn-link pt-2">
								<span>
									<i class="fas fa-edit"></i>
								</span>
								Edit Foto
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<h4 class="card-title">Info</h4>
										<div class="card-tools">
											<!-- <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
											<button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button> -->
											<button class="btn btn-icon btn-link btn-primary btn-xs editData"><span class="fas fa-user-edit"></span></button>
										</div>
									</div>
								</div>
								<div class="card-body">
									<form id="formEditData" >
										<fieldset class="field" disabled='true'>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa fa-user"></i>
															</span>
															<input type="hidden" name="idUser" class="form-control input-form input-pill idUser" value="<?= ucwords($konfigUser['idUser']) ;?>" readonly>
															<input type="text" name="username" class="form-control input-form input-pill" value="<?= ucwords($konfigUser['username']) ;?>" readonly>
														</div>
													</div>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa fa-user-alt"></i>
															</span>
															<input type="hidden" name="namaUser" class="form-control input-form input-pill" id="fakerNama" value="<?= $faker->name ;?>">
															<input type="text" name="namaUser" class="form-control input-form input-pill" id="namaUser" value="<?= ucwords($konfigUser['namaUser']) ;?>">
														</div>
														<small class="form-text text-muted txtNamaUser d-none"></small>
													</div>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																@
															</span>
															<input type="text" name="emailUser" class="form-control input-form input-pill" value="<?= $konfigUser['emailUser'] ;?>">
														</div>
														<small class="form-text text-muted txtEmailUser d-none"></small>
													</div>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="far fa-calendar-alt"></i>
															</span>
															<input type="text" name="tanggalDaftar" class="form-control input-form input-pill" value="<?= date('d-M-Y,h:i:s', $konfigUser['tanggalDaftar']) ;?>" readonly>
														</div>
													</div>		
												</div>
												<!-- end class col-md-6 -->
												<div class="col-md-6">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa fa-genderless"></i>
															</span>
															<select class="form-control input-pill" id="jenisKelamin" name="jenisKelamin">
																<option <?= $konfigUser['jenisKelamin'] == '' ? 'selected' : ''; ?>>Pilih Jenis Kelamin</option>
																<option value="pria" <?= $konfigUser['jenisKelamin'] == 'pria' ? 'selected' : ''; ?>>Pria</option>
																<option value="wanita" <?= $konfigUser['jenisKelamin'] == 'wanita' ? 'selected' : ''; ?>>Wanita</option>
															</select>
														</div>
														<small class="form-text text-muted txtJenisKelamin d-none"></small>
													</div>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fas fa-phone"></i>
															</span>
															<input type="hidden" id="fakerTelp" value="<?= $faker->phoneNumber ;?>">
															<input type="hidden" id="fakerAlamat" value="<?= $faker->address ;?>">
															<input type="text" name="noTelp" id="noTelp" class="form-control input-form input-pill" value="<?= $konfigUser['noTelp'];?>" placeholder="Masukkan No Telephone Anda...">
														</div>
														<small class="form-text text-muted txtNoTelp d-none"></small>
													</div>
													<div class="form-group">
														<textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Masukkan Alamat Lengkap Anda..."><?= $konfigUser['alamat'] ;?></textarea>
														<small class="form-text text-muted txtAlamat d-none"></small>
													</div>		
												</div>
												<!-- end col-md-5 -->
											</div>
											<!-- end class row -->
											<div class="row">
												<div class="col-12 d-flex justify-content-end">
													<button class="btn btn-primary btn-round mr-2 mt-4 btn-simpan-data-profile animated d-none" name="simpan" type="submit"><span class="btn-label"><i class="far fa-save"></i></span> Simpan</button>
												</div>
											</div>
										</fieldset>
									</form>
								</div>
								<!-- end div card-body -->
							</div>
							<!-- end div class card -->
						</div>
						<!-- end div class col-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title" id="exampleModalLongTitle">Upload Foto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('profile/editFotoProfile/') . $this->session->userdata('idUser') ;?>" method="POST" enctype="multipart/form-data" id="uploadFoto">
				<div class="modal-body">
					<div class="wrap">
						<div class="drop m-auto">
							<div class="uploader">
								<label class="drop-label">Drag and drop images here</label>
								<input type="hidden" name="idUser" class="idUser" value="<?= $konfigUser['idUser'] ;?>">
								<input type="file" class="image-upload" id="upload-file" name="fotoUser">
							</div>
							<div id="image-preview"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
