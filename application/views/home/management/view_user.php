<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data User</h4>
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
				<a href="#"><?= $this->uri->segment(1) ;?></a>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Data Member</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahUser">
							<i class="fa fa-plus"></i>
							Tambah Member
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12 show-table-users">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Username</th>
											<th>Email</th>
											<th>Level User</th>
											<th>Status User</th>
											<th>Blokir</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($viewUser as $vm): ?>
											<tr>
												<td><?= $i++ ;?></td>
												<td><?= ucwords($vm['username']) ;?></td>
												<td><?= ucwords($vm['emailUser']) ;?></td>
												<td><?= ucwords($vm['member']) ;?></td>
												<td><div class="custom-control custom-switch">
													<input type="checkbox" name="statusUser" value="<?= $vm['statusUser'] ;?>" class="custom-control-input checkStatusUser" id="<?= $vm['idUser'] ;?>" <?= $vm['statusUser'] == 'aktif' ? 'checked' : '' ;?>>
													<label class="custom-control-label" for="<?= $vm['idUser'] ;?>"><?= ucwords($vm['statusUser']) ;?></label>
												</div></td>
												<td><div class="custom-control custom-switch">
													<input type="checkbox" name="blokir" value="<?= $vm['blokir'] ;?>" class="custom-control-input checkBlokir" id="blokir_<?= $vm['idUser'] ;?>" <?= $vm['blokir'] == 'ya' ? 'checked' : '' ;?>>
													<label class="custom-control-label" for="blokir_<?= $vm['idUser'] ;?>"><?= ucwords($vm['blokir']) ;?></label>
												</div></td>
												<td>
													<a href="" class="text-warning mr-2" data-toggle="modal" data-target="#infoUser<?= $vm['idUser'] ;?>"><i class="fa fa-info-circle"></i></a>
													<a href="" class="text-primary mr-2" data-toggle="modal" data-target="#editUser<?= $vm['idUser'] ;?>"><i class="fa fa-edit"></i></a>
													<a href="" id="<?= $vm['idUser'] ;?>" class="text-danger mr-2 hapus"><i class="fa fa-trash"></i></a>
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

<!-- Modal detail data user -->
<?php foreach ($viewUser as $vUser): ?>
	<div class="modal fade" id="infoUser<?= $vUser['idUser'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Detail Data User
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12 d-flex justify-content-center">
							<div class="avatar avatar-xl">
								<img src="<?= base_url('assets/admin/uploads/users/') . $vUser['fotoUser'] ;?>" alt="" class="avatar-img rounded">
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-lg-12 d-flex justify-content-center">
							<h3 class="font-weight-bold"><?= $vUser['namaUser'] ;?></h3>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="border-bottom border-top d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 pt-2 ml-4">
									<label class="headProfileJudul">Username</label>
								</div>
								<div class="separator pt-2">:</div>
								<div class="value mb-2 pt-2">
									<label class="headProfile"><?= ucwords($vUser['namaUser']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Email</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($vUser['emailUser']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Jenis Kelamin</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($vUser['jenisKelamin']) ;?></label>
								</div>
							</div>	
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Nomor Telephone</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($vUser['noTelp']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Alamat</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2 mr-1">
									<label class="headProfile"><?= ucwords($vUser['alamat']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Level User</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($vUser['member']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Status</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($vUser['statusUser']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Tanggal Daftar</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= date('d-M-Y', $vUser['tanggalDaftar']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Tanggal Update</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= date('d-M-Y', $vUser['tanggalUpdate']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Terakhir Login</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= date('d-M-Y, h:i:s', $vUser['lastLogin']) ;?></label>
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

<!-- Modal tambah user -->
<div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Daftar User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="daftarUser" action="<?= base_url('daftarUserAksi') ;?>" method="POST">	
				<div class="modal-body">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="flaticon-user"></i>
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
					<div class="form-group">
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
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-user-ninja"></i>
								</span>
							</div>
							<select class="form-control" name="levelUser" >
								<option>----Pilih Member----</option>
								<?php foreach ($tMember as $tm): ?>
									<option value="<?= $tm['idMember'] ;?>"><?= ucwords($tm['member']) ;?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">
									<i class="fas fa-users-cog"></i>
								</span>
							</div>
							<select class="form-control" name="statusUser">
								<option>----Pilih Status----</option>
								<option value="aktif">Aktif</option>
								<option value="nonaktif">Nonaktif</option>
							</select>
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


<!-- Modal Edit user -->
<?php foreach ($viewUser as $vu): ?>
	<div class="modal fade" id="editUser<?= $vu['idUser'] ;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Daftar User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="editDataUser" action="<?= base_url('editDataUserAksi/') . $vu['idUser'] ;?>" method="POST">

					<div class="modal-body">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="flaticon-user"></i>
									</span>
								</div>
								<input type="text" name="namaUser" class="form-control" placeholder="Masukkan Nama Anda ..." aria-label="namaUser" aria-describedby="basic-addon1" value="<?= $vu['namaUser'] ;?>">
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
								<input type="text" name="username" class="form-control usernameCheck" placeholder="Masukkan Username Anda ..." aria-label="username" aria-describedby="basic-addon1" value="<?= $vu['username'] ;?>">
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
								<input type="text" name="emailUser" class="form-control emailCheck" placeholder="Masukkan Email Anda ..." aria-label="emailUser" aria-describedby="basic-addon1" value="<?= $vu['emailUser'] ;?>">
							</div>
							<div class="text-danger small validasiEmail"></div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="fas fa-genderless"></i>
									</span>
								</div>
								<select class="form-control" name="jenisKelamin">
									<option>----Pilih Jenis Kelamin----</option>
									<option value="pria" <?= $vu['jenisKelamin'] == 'pria' ? 'selected' : '' ;?>>Pria</option>
									<option value="wanita" <?= $vu['jenisKelamin'] == 'wanita' ? 'selected' : '' ;?>>Wanita</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-phone"></i>
									</span>
								</div>
								<input type="text" name="noTelp" class="form-control" placeholder="Masukkan Nomor Telephone Anda ..." aria-label="noTelp" aria-describedby="basic-addon1" value="<?= $vu['noTelp'] ;?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-address-card"></i></span>
								</div>
								<textarea class="form-control" name="alamat" aria-label="With textarea"><?= $vu['alamat'] ;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-user-ninja"></i>
									</span>
								</div>
								<select class="form-control" name="levelUser">
									<option>----Pilih Member----</option>
									<?php foreach ($tMember as $tm): ?>
										<option value="<?= $tm['idMember'] ;?>" <?= $vu['levelUser'] == $tm['idMember'] ? 'selected' : '' ;?>><?= ucwords($tm['member']) ;?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-users-cog"></i>
									</span>
								</div>
								<select class="form-control" name="statusUser">
									<option>----Pilih Status----</option>
									<option value="aktif" <?= $vu['statusUser'] == 'aktif' ? 'selected' : '' ;?>>Aktif</option>
									<option value="nonaktif" <?= $vu['statusUser'] == 'nonaktif' ? 'selected' : '' ;?>>Nonaktif</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">
										<i class="fas fa-user-alt-slash"></i>
									</span>
								</div>
								<select class="form-control" name="blokir">
									<option>----Pilih Blokir----</option>
									<option value="ya" <?= $vu['blokir'] == 'ya' ? 'selected' : '' ;?>>Ya</option>
									<option value="tidak" <?= $vu['blokir'] == 'tidak' ? 'selected' : '' ;?>>Tidak</option>
								</select>
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