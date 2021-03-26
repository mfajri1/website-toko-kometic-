<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Profile Perusahaan</h4>
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
						<h4 class="card-title">Data Profile Perusahaan</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalTambahPerusahaan">
							<i class="fa fa-plus"></i>
							Tambah Profile Perusahaan
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<form action="<?= base_url('hapusAllPerusahaan') ;?>" method="POST" enctype="multipart/form-data" id="deleteAll">
							<table id="multi-filter-select" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th><input type="checkbox" class="checkAll" name="idPerusahaan[]"></th>
										<th>No</th>
										<th>Nama</th>
										<th>No Telp</th>
										<th>Fax</th>
										<th>NPWP</th>
										<th>Alamat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1 ;?>
									<?php foreach ($tPerusahaan as $tp): ?>
										<tr>
											<td><input type="checkbox" class="check" name="idPerusahaan[]" value="<?= $tp['idPerusahaan'] ;?>"></td>
											<td><?= $i++ ;?></td>
											<td><?= cetak(ucwords($tp['namaPerusahaan'])) ;?></td>
											<td><?= cetak(ucwords($tp['telpPerusahaan'])) ;?></td>
											<td><?= cetak(ucwords($tp['fax'])) ;?></td>
											<td><?= cetak(ucwords($tp['npwpPerusahaan'])) ;?></td>
											<td><?= cetak(ucwords($tp['alamatPerusahaan'])) ;?></td>
											<td>
												<a href="" data-toggle="modal" data-target="#modalEditPerusahaan<?= $tp['idPerusahaan'] ;?>"><i class="fa fa-edit"></i> </a>
												<a href="" data-toggle="modal" data-target="#modalHapusPerusahaan<?= $tp['idPerusahaan'] ;?>"><i class="fas fa-trash text-danger"></i> </a>
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
<div class="modal fade" id="modalTambahPerusahaan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h2 class="modal-title">
					Tambah Profile Perusahaan
				</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('tambahPerusahaan');?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="namaPerusahaan">Nama Perusahaan</label>
								<input type="text" name="namaPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Nama Perusahaan...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="telpPerusahaan">No Telp Perusahaan</label>
								<input type="text" name="telpPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Telp Perusahaan...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="fax">No Fax</label>
								<input type="text" name="fax" class="form-control form-control-sm" placeholder="Masukkan Telp Perusahaan...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="npwpPerusahaan">No NPWP Perusahaan</label>
								<input type="text" name="npwpPerusahaan" class="form-control form-control-sm" placeholder="Masukkan No NPWP Perusahaan...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="alamatPerusahaan">Alamat Perusahaan</label>
								<textarea type="text" name="alamatPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Alamat Perusahaan..."></textarea>
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

<!-- Modal Edit Barang -->
<?php foreach ($tPerusahaan as $tp): ?>
	<div class="modal fade" id="modalEditPerusahaan<?= $tp['idPerusahaan'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Edit Data Perusahaan
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('editPerusahaan/') . $tp['idPerusahaan'];?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaPerusahaan">Nama Perusahaan</label>
									<input type="text" name="namaPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Kode Barang..." value="<?= $tp['namaPerusahaan'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="telpPerusahaan">No Telp Perusahaan</label>
									<input type="text" name="telpPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Nama Barang..." value="<?= $tp['telpPerusahaan'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="fax">No Fax</label>
									<input type="text" name="fax" class="form-control form-control-sm" placeholder="Masukkan no Fax..." value="<?= $tp['fax'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="npwpPerusahaan">No NPWP Perusahaan</label>
									<input type="text" name="npwpPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Nama Barang..." value="<?= $tp['npwpPerusahaan'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="alamatPerusahaan">Alamat Perusahaan</label>
									<textarea type="text" name="alamatPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Nama Barang..."><?= $tp['alamatPerusahaan'] ;?></textarea>
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
<?php foreach ($tPerusahaan as $tp): ?>
	<div class="modal fade" id="modalHapusPerusahaan<?= $tp['idPerusahaan'] ;?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Profil Perusahaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin Mau Menghapus Perusahaan <?= $tp['namaPerusahaan'] ;?>?.</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('hapusPerusahaan/') . $tp['idPerusahaan'] ;?>" class="btn btn-danger">Hapus</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>