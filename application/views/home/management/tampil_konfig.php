<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Table Konfigurasi</h4>
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
						<h4 class="card-title">Table Konfigurasi</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<table class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>Nama User</th>
											<th>Nama web</th>
											<th>Meta Text</th>
											<th>Keywords</th>
											<th>Description</th>
											<th>Sumber</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1 ;?>
										<?php foreach ($tKonfig as $tk): ?>
											<tr>
												<td><?= $i++ ;?></td>
												<td><?= ucwords($tk['namaUser']) ;?></td>
												<td><?= ucwords($tk['namaWeb']) ;?></td>
												<td><?= ucwords($tk['metatext']) ;?></td>
												<td><?= ucwords($tk['keywords']) ;?></td>
												<td><?= ucwords($tk['description']) ;?></td>
												<td><?= ucwords($tk['sumber']) ;?></td>
												<td>
													<a href="" class="text-warning infoKonfig mr-2" data-toggle="modal" data-target="#modalInfoKonfig<?= $tk['idKonfig'] ;?>"><i class="fa fa-info-circle"></i></a>
													<a href="" class="editKonfig" data-toggle="modal" data-target="#modalEditKonfig<?= $tk['idKonfig'] ;?>"><i class="fa fa-edit"></i></a>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Info Konfig -->
<?php foreach ($tKonfig as $tKonf): ?>
	<div class="modal fade" id="modalInfoKonfig<?= $tKonf['idKonfig'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Detail Data Konfigurasi
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 d-flex justify-content-center">
							<div class="avatar avatar-xl">
								<img src="<?= base_url('assets/admin/uploads/konfig/') . $tKonf['imgIcon'] ;?>" alt="" class="avatar-img rounded">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="border-bottom border-top d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 pt-2 ml-4">
									<label class="headProfileJudul">Nama User</label>
								</div>
								<div class="separator pt-2">:</div>
								<div class="value mb-2 pt-2">
									<label class="headProfile"><?= ucwords($tKonf['namaUser']) ;?></label>
								</div>
							</div>
							<div class="border-bottom border-top d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 pt-2 ml-4">
									<label class="headProfileJudul">Nama Website</label>
								</div>
								<div class="separator pt-2">:</div>
								<div class="value mb-2 pt-2">
									<label class="headProfile"><?= ucwords($tKonf['namaWeb']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Meta Text</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tKonf['metatext']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Keywords</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tKonf['keywords']) ;?></label>
								</div>
							</div>	
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Description</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tKonf['description']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Sumber</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2 mr-1">
									<label class="headProfile"><?= ucwords($tKonf['sumber']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Tanggal Daftar</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= date('d-M-Y', $tKonf['tanggalDaftar']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Tanggal Update</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= date('d-M-Y', $tKonf['tanggalUpdate']) ;?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
<?php endforeach ?>


<!-- Modal Edit Konfig -->
<?php foreach ($tKonfig as $tKonf): ?>
	<div class="modal fade" id="modalEditKonfig<?= $tKonf['idKonfig'] ;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data Konfigurasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="editDataUser" action="<?= base_url('editKonfigAksi/') . $tKonf['idKonfig'] ;?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text labelHead" id="basic-addon1">
										Nama Web
									</span>
								</div>
								<input type="hidden" name="idKonfig" class="idUser" value="<?= $tKonf['idKonfig'] ;?>">
								<input type="text" name="namaWeb" class="form-control" placeholder="Masukkan Nama Web Anda ..." aria-label="namaWeb" aria-describedby="basic-addon1" value="<?= $tKonf['namaWeb'] ;?>">
							</div>
						</div>
						<div class="form-group">
							<label for="">Gambar Icon</label>
							<div class="wrap">
								<div class="drop m-auto">
									<div class="uploader">
										<label class="drop-label">Drag and drop images here</label>
										<input type="file" class="image-upload" id="upload-file" name="imgIcon">
									</div>
									<div id="image-preview"></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text labelHead" id="basic-addon1">
										Meta Text
									</span>
								</div>
								<input type="text" name="metatext" class="form-control" placeholder="Masukkan Nama Meta Text ..." aria-label="metatext" aria-describedby="basic-addon1" value="<?= $tKonf['metatext'] ;?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text labelHead" id="basic-addon1">
										Keywords
									</span>
								</div>
								<input type="text" name="keywords" class="form-control" placeholder="Masukkan Nama Keywords ..." aria-label="keywords" aria-describedby="basic-addon1" value="<?= $tKonf['keywords'] ;?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text labelHead" id="basic-addon1">
										Description
									</span>
								</div>
								<input type="text" name="description" class="form-control" placeholder="Masukkan Nama description ..." aria-label="description" aria-describedby="basic-addon1" value="<?= $tKonf['description'] ;?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text labelHead" id="basic-addon1">
										Sumber
									</span>
								</div>
								<input type="text" name="sumber" class="form-control" placeholder="Masukkan Nama sumber ..." aria-label="sumber" aria-describedby="basic-addon1" value="<?= $tKonf['sumber'] ;?>">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>