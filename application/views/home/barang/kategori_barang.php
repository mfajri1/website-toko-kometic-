<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Kategori Barang</h4>
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
						<h4 class="card-title">Data Kategori Barang</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalTambahKategori">
							<i class="fa fa-plus"></i>
							Tambah Kategori
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<form action="<?= base_url('hapusAllKategori') ;?>" method="POST" enctype="multipart/form-data" id="deleteAll">
							<table id="multi-filter-select" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th><input type="checkbox" class="checkAll" name="idKategori[]"></th>
										<th>No</th>
										<th>Kode Kategori</th>
										<th>Nama Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 0; ?>
									<?php foreach ($tKategori as $tk): ?>
										<tr>
											<td><input type="checkbox" class="check" name="idKategori[]" value="<?= $tk['idKategori'] ;?>"></td>
											<td><?= $i++ ;?></td>
											<td><?= cetak(ucwords($tk['kodeKategori'])) ;?></td>
											<td><?= cetak(ucwords($tk['namaKategori'])) ;?></td>
											<td>
												<a href="" data-toggle="modal" data-target="#modalEditKategori<?= $tk['idKategori'] ;?>"><i class="fa fa-edit"></i> </a>
												<a href="" data-toggle="modal" data-target="#modalHapusKategori<?= $tk['idKategori'] ;?>"><i class="fas fa-trash text-danger"></i> </a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
							<button type="submit" class="btn btn-danger btn-sm ml-3 mt-1" id="hapusAll">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal tambah Kategori -->
<div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h2 class="modal-title">
					Tambah Data Kategori
				</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('tambahKategori');?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="kodeKategori">Kode Kategori</label>
								<input type="text" name="kodeKategori" class="form-control form-control-sm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="namaKategori">Nama Kategori</label>
								<input type="text" name="namaKategori" class="form-control form-control-sm">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal Edit Kategori -->
<?php foreach ($tKategori as $tk): ?>
	<div class="modal fade" id="modalEditKategori<?= $tk['idKategori'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Edit Data Kategori
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('editKategori/') . $tk['idKategori'] ;?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="kodeKategori">Kode Kategori</label>
									<input type="text" name="kodeKategori" class="form-control form-control-sm" value="<?= $tk['kodeKategori'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaKategori">Nama Kategori</label>
									<input type="text" name="namaKategori" class="form-control form-control-sm" value="<?= $tk['namaKategori'] ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>



<!-- Modal Hapus -->
<?php foreach ($tKategori as $tk): ?>
	<div class="modal fade" id="modalHapusKategori<?= $tk['idKategori'] ;?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin Mau Menghapus Kategori <?= $tk['kodeKategori'] ;?>?.</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('hapusKategori/') . $tk['idKategori'] ;?>" class="btn btn-danger">Hapus</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>