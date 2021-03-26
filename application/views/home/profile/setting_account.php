<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Halaman Setting Profile</h4>
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

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Form Setting Profile</div>
				</div>
				<div class="card-body">
					<form id="editPassword" class="animated bounceInLeft">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fas fa-key"></i>
											</span>
										</div>
										<input type="hidden" name="idUser" class="dataIdUser" value="<?= $this->session->userdata('idUser') ;?>">
										<input type="password" name="password" class="form-control password" aria-label="password" placeholder="Masukkan Password Anda ...">
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="far fa-eye viewPass1"></i>
											</span>
											<span class="input-group-text betul d-none">
												<i class="fas fa-thumbs-up viewTruePass text-success"></i>
											</span>
										</div>
									</div>
									<div class="text-danger small validasiPass"></div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group mb-4">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<i class="fas fa-key"></i>
											</span>
										</div>
										<input type="password" name="password2" class="form-control password2" aria-label="password2" placeholder="Masukkan Ulang Password Anda ...">
										<div class="input-group-append ">
											<span class="input-group-text">
												<i class="far fa-eye viewPass2"></i>
											</span>
											<span class="input-group-text betul2 d-none">
												<i class="fas fa-thumbs-up viewTruePass2 text-success"></i>
											</span>
										</div>
									</div>
									<div class="text-danger small validasiPass2"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 d-flex justify-content-end">
								<button class="btn btn-primary mr-2 mt-3"><i class="fa fa-save"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	
