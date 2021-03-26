<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Satuan Barang</h4>
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
						<h4 class="card-title">Data Satuan</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalTambahSatuan">
							<i class="fa fa-plus"></i>
							Tambah Data Satuan
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<form action="<?= base_url('hapusAllSatuan') ;?>" method="POST" enctype="multipart/form-data" id="deleteAll">
							<table id="multi-filter-select" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th><input type="checkbox" class="checkAll" name="idSatuan[]"></th>
										<th>No</th>
										<th>Kode Satuan</th>
										<th>Nama Satuan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($tSatuan as $ts): ?>
										<tr>
											<td><input type="checkbox" class="check" name="idSatuan[]" value="<?= $ts['idSatuan'] ;?>"></td>
											<td><?= $i++ ;?></td>
											<td><?= cetak(ucwords($ts['kodeSatuan'])) ;?></td>
											<td><?= cetak(ucwords($ts['namaSatuan'])) ;?></td>
											<td>
												<a href="" data-toggle="modal" data-target="#modalEditSatuan<?= $ts['idSatuan'] ;?>"><i class="fa fa-edit"></i> </a>
												<a href="" data-toggle="modal" data-target="#modalHapusSatuan<?= $ts['idSatuan'] ;?>"><i class="fas fa-trash text-danger"></i> </a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
							<button type="submit" class="btn btn-danger btn-sm ml-3 mt-2" id="hapusAll">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal Tambah Barang -->
<div class="modal fade" id="modalTambahSatuan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h2 class="modal-title">
					Tambah Data Satuan
				</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('tambahSatuan');?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="kodeSatuan">Kode Satuan</label>
								<input type="text" name="kodeSatuan" class="form-control form-control-sm" placeholder="Masukkan Kode Satuan...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="namaSatuan">Nama Satuan</label>
								<input type="text" name="namaSatuan" class="form-control form-control-sm" placeholder="Masukkan Nama Satuan...">
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


<!-- Modal Edit Satuan -->
<?php foreach ($tSatuan as $ts): ?>
	<div class="modal fade" id="modalEditSatuan<?= $ts['idSatuan'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Edit Data Satuan
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('editSatuan/') . $ts['idSatuan'];?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="kodeSatuan">Kode Satuan</label>
									<input type="text" name="kodeSatuan" class="form-control form-control-sm" placeholder="Masukkan Kode Satuan..." value="<?= $ts['kodeSatuan'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaSatuan">Nama Satuan</label>
									<input type="text" name="namaSatuan" class="form-control form-control-sm" placeholder="Masukkan Nama Satuan..." value="<?= $ts['namaSatuan'] ;?>">
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
<?php foreach ($tSatuan as $ts): ?>
	<div class="modal fade" id="modalHapusSatuan<?= $ts['idSatuan'] ;?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Satuan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin Mau Menghapus Data Satuan <?= $ts['namaSatuan'] ;?>?.</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('hapusSatuan/') . $ts['idSatuan'] ;?>" class="btn btn-danger">Hapus</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>