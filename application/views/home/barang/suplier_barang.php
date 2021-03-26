<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Suplier Barang</h4>
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
						<h4 class="card-title">Data Suplier</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalTambahSuplier">
							<i class="fa fa-plus"></i>
							Tambah Data Suplier
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<form action="<?= base_url('hapusAllSuplier') ;?>" method="POST" enctype="multipart/form-data" id="deleteAll">
							<table id="multi-filter-select" class="display table table-striped table-hover" >
								<thead>
									<tr>
										<th><input type="checkbox" class="checkAll" name="idSuplier[]"></th>
										<th>No</th>
										<th>Kode Suplier</th>
										<th>Nama Suplier</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($tSuplier as $ts): ?>
										<tr>
											<td><input type="checkbox" class="check" name="idSuplier[]" value="<?= $ts['idSuplier'] ;?>"></td>
											<td><?= $i++ ;?></td>
											<td><?= cetak(ucwords($ts['kodeSuplier'])) ;?></td>
											<td><?= cetak(ucwords($ts['namaSuplier'])) ;?></td>
											<td>
												<a href="" data-toggle="modal" data-target="#modalEditSuplier<?= $ts['idSuplier'] ;?>"><i class="fa fa-edit"></i> </a>
												<a href="" data-toggle="modal" data-target="#modalHapusSuplier<?= $ts['idSuplier'] ;?>"><i class="fas fa-trash text-danger"></i> </a>
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
<div class="modal fade" id="modalTambahSuplier" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h2 class="modal-title">
					Tambah Data Suplier
				</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('tambahSuplier');?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="kodeSuplier">Kode Suplier</label>
								<input type="text" name="kodeSuplier" class="form-control form-control-sm" placeholder="Masukkan Kode Suplier...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="namaSuplier">Nama Suplier</label>
								<input type="text" name="namaSuplier" class="form-control form-control-sm" placeholder="Masukkan Nama Suplier...">
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


<!-- Modal Edit Suplier -->
<?php foreach ($tSuplier as $ts): ?>
	<div class="modal fade" id="modalEditSuplier<?= $ts['idSuplier'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Edit Data Suplier
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('editSuplier/') . $ts['idSuplier'];?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="kodeSuplier">Kode Suplier</label>
									<input type="text" name="kodeSuplier" class="form-control form-control-sm" placeholder="Masukkan Kode Suplier..." value="<?= $ts['kodeSuplier'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaSuplier">Nama Suplier</label>
									<input type="text" name="namaSuplier" class="form-control form-control-sm" placeholder="Masukkan Nama Suplier..." value="<?= $ts['namaSuplier'] ;?>">
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
<?php foreach ($tSuplier as $ts): ?>
	<div class="modal fade" id="modalHapusSuplier<?= $ts['idSuplier'] ;?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Suplier</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin Mau Menghapus Data Suplier <?= $ts['namaSuplier'] ;?>?.</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('hapusSuplier/') . $ts['idSuplier'] ;?>" class="btn btn-danger">Hapus</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?>