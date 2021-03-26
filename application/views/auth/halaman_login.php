<h2 class="text-center mt-3">Halaman Login</h2>
<form action="<?= base_url('loginAksi') ;?>" method="POST" enctype="multipart/form-data" id="login" class="mb-4 animated bounceInDown">
	<div class="form-group form-username animated bounceInDown">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">
					<i class="fas fa-user-tie"></i>
				</span>
			</div>
			<input type="text" name="username" class="form-control usernameCheck username" placeholder="Masukkan Username Anda ..." aria-label="username" aria-describedby="basic-addon1">
		</div>
		<div class="text-danger small validasiUsername"></div>
	</div>
	<div class="form-group form-password mb-2">
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
	<!-- <div class="form-group ml-3 form-checkInput">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		<label class="form-check-label" for="exampleCheck1">Check me out</label>
	</div> -->
	<button type="submit" class="btn btn-primary input-pill w-100 tombol-submit">Submit</button>
</form>
<hr>
<div class="link-daftar text-center mt-0 animated bounceInDown">
	<p class="mb-0">Apakah Anda Belum Punya Akun? <a href="<?= base_url('daftar') ;?>">Klik Disini Untuk Daftar.</a></p>
	<p>Lupa Password? <a href="<?= base_url('lupaPass') ;?>">Klik Disini Jika Lupa Password.</a></p>
</div>

