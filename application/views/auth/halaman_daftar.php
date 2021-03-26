<h2 class="text-center mt-3 h1">Halaman Daftar</h2>
<?= $this->session->flashdata('pesan'); ;?>
<form action="<?= base_url('daftarAksi') ;?>" method="POST" enctype="multipart/form-data" id="daftar">	
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">
					<i class="fas fa-user"></i>
				</span>
			</div>
			<input type="text" name="namaUser" class="form-control" placeholder="Masukkan Nama Anda ..." aria-label="namaUser" aria-describedby="basic-addon1">
		</div>
		<?= form_error('namaUser', '<div class="text-danger small ml-3">','</div>') ;?>
	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">
					<i class="fas fa-user-tie"></i>
				</span>
			</div>
			<input type="text" name="username" class="form-control usernameCheck" placeholder="Masukkan Username Anda ..." aria-label="username" aria-describedby="basic-addon1">
		</div>
		<div class="text-danger small validasiUsername"></div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">
					@
				</span>
			</div>
			<input type="text" name="emailUser" class="form-control emailCheck" placeholder="Masukkan Email Anda ..." aria-label="emailUser" aria-describedby="basic-addon1">
		</div>
		<div class="text-danger small validasiEmail"></div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-key"></i>
				</span>
			</div>
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

	<button type="submit" class="btn btn-primary input-pill w-100">Submit</button>
</form>
<hr>
<div class="link-daftar text-center">
	<p class="mb-0">Apakah Anda Sudah Punya Akun? <a href="<?= base_url('login') ;?>">Klik Disini Untuk Login.</a></p>
	<p>Lupa Password? <a href="<?= base_url('lupaPass') ;?>">Klik Disini Jika Lupa Password.</a></p>
</div>

