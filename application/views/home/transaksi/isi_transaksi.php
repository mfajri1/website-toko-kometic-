<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Barang Transaksi</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<!-- <li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li> -->
			<!-- <li class="nav-item">
				<a href="#">Home</a>
			</li> -->
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#"><?= $this->uri->segment(1) ;?></a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Barang Transaksi</h4>
						<button class="btn btn-primary btn-round ml-auto tambahDataBarang">
							<i class="fa fa-plus"></i>
							Tambah Barang Transaksi
						</button>
					</div>
				</div>
				<div class="card-body">
					<div id="isiTransaksi" >
						<input type="hidden" value="<?= $kodeTransaksi ;?>" class="kodeTransaksi">
						<form action="<?= base_url('tambahBarangTransaksiAksi') ;?>" method="POST" enctype="multipart/form-data" class="transaksiForm row">
							<div class="form-group inputForm ml-2">
								<label for="kodeOrder">Kode Transaksi</label>
								<input type="text" class="form-control form-control-sm" placeholder="Masukkan Kode Transaksi..." value="<?= $kodeTransaksi ;?>" disabled>
							</div>
							<div class="inputTransaksi col-sm-12">
								
							</div>
							<div class="buttonAksi  my-2 ml-2 d-flex justify-content-start">
								<span class="btn btn-success mr-2">Simpan dan Keluar</span>
								<button type="submit" class="btn btn-primary">Lanjut</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>