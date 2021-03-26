<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Menu Page</h4>
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
						<h4 class="card-title">Data Menu</h4>
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
											<th>Nama Menu</th>
											<th>Dropdown</th>
											<th>Icon Menu</th>
											<th>Status Menu</th>
											<th>No Urut</th>
											<th>Akses</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $j = 1; ?>
										<?php foreach ($tampilMenu as $tm): ?>
											<tr >
												<td><?= $j++ ;?></td>
												<td><?= $tm['namaMenu'] ;?></td>
												<td><?= $tm['linkDropdown'] ;?></td>
												<td><?= $tm['iconMenu'] ;?></td>
												<td><div class="custom-control custom-switch">
													<input type="checkbox" name="statusMenu" value="<?= $tm['statusMenu'] ;?>" class="custom-control-input checkStatusMenu" id="<?= $tm['idMenu'] ;?>" <?= $tm['statusMenu'] == 'publish' ? 'checked' : '' ;?> <?= $tm['namaMenu'] == 'Management' ? 'disabled' : '' ;?>>
													<label class="custom-control-label" for="<?= $tm['idMenu'] ;?>"><?= ucwords($tm['statusMenu']) ;?></label>
												</div></td>
												<td><div class="form-group"><select class="form-control form-control-sm checkUrut" name="urutMenu" id="<?= $tm['idMenu'] ;?>">
													<?php $batas = 10; ?>
													<?php for ($i = 1; $i < $batas ; $i++) : ?>

														<option value="<?= $i ;?>" <?= $tm['urutMenu'] == $i ? 'selected' : '' ;?> ><?= $i ;?></option>
														
													<?php endfor; ?>
												</select></div></td>
												<td><div class="form-group">
													<select class="form-control form-control-sm checkLevel" name="levelUserAccess" id="<?= $tm['idMenu'] ;?>" <?= $tm['levelUserAccess'] == 1 ? 'disabled' : '' ;?>>
														<?php foreach ($tMember as $tme): ?>
															<option value="<?= $tme['idMember'] ;?>" <?= $tm['levelUserAccess'] == $tme['idMember'] ? 'selected' : '' ;?> ><?= ucwords($tme['member']) ;?></option>
														<?php endforeach ?>
													</select>
												</div></td>
												<td>
													<a href="" data-toggle="modal" data-target="#modalEditMenu<?= $tm['idMenu'] ;?>"><i class="fa fa-edit"></i> </a>
													<a href="" data-toggle="modal" data-target="#modalSuMenu<?= $tm['idMenu'] ;?>"><i class="fas fa-plus-circle text-success"></i> </a>
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


<!-- Modal edit Data Menu -->
<?php foreach ($tampilMenu as $tme): ?>
	<div class="modal fade" id="modalEditMenu<?= $tme['idMenu'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Detail Data Menu
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('editMenu/') . $tme['idMenu'] ;?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaMenu">Nama Menu</label>
									<input type="text" name="namaMenu" class="form-control form-control-sm" value="<?= $tme['namaMenu'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="linkDropdown">Link Dropdown</label>
									<input type="text" name="linkDropdown" class="form-control form-control-sm" value="<?= $tme['linkDropdown'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="iconMenu">Menu Icon</label>
									<input type="text" name="iconMenu" class="form-control form-control-sm" value="<?= $tme['iconMenu'] ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="urutMenu">No Urut Menu</label>
							<select class="form-control" name="statusMenu" >
								<option>----Pilih Status Menu----</option>
								<option value="publish" <?= $tme['statusMenu'] == 'publish' ? 'selected' : '' ;?>>Publish</option>
								<option value="sembunyikan" <?= $tme['statusMenu'] == 'sembunyikan' ? 'selected' : '' ;?>>Sembunyikan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="urutMenu">No Urut Menu</label>
							<select class="form-control" name="urutMenu" >
								<option>----Pilih No Urut Menu----</option>
								<?php for ($j = 1; $j <= 10; $j++) : ?>
									<option value="<?= $j ;?>" <?= $tme['urutMenu'] == $j ? 'selected' : '' ;?>><?= $j ;?></option>
								<?php endfor; ?>
							</select>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<select class="form-control" name="levelUserAccess">
										<option>----Pilih Member Level----</option>
										<?php foreach ($tMember as $tm): ?>
											<option value="<?= $tm['idMember'] ;?>" <?= $tme['levelUserAccess'] == $tm['idMember'] ? 'selected' : '' ;?>><?= ucwords($tm['member']) ;?></option>
										<?php endforeach ?>
									</select>
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


<!-- Modal Tampil Submeu -->
<?php foreach ($tampilMenu as $tmen): ?>
	<div class="modal fade" id="modalSuMenu<?= $tmen['idMenu'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Detail Data SubMenu
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12 show-table-users">
								<div class="table-responsive">
									<table id="add-row" class="display table table-striped table-hover">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Submenu</th>
												<th>Url Submenu</th>
												<th>Status</th>
												<th>No Urut</th>
												<th>Nama Menu</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												$idMe = $tmen['idMenu'];
												$submenu = $this->db->select('ts.*, tm.namaMenu')->from('t_submenu ts')->join('t_menu tm', 'tm.idMenu = ts.menuId', 'left')->where('ts.menuId', $idMe)->get()->result_array();
											 ?>
											 <?php $h = 1 ;?>
											 <?php foreach ($submenu as $sm): ?>
											 	<tr>
											 		<td><?= $h++ ;?></td>
											 		<td><?= ucwords($sm['namaSubmenu']) ;?></td>
											 		<td><?= $sm['urlSubmenu'] ;?></td>
											 		<td><div class="custom-control custom-switch">
											 			<input type="checkbox" name="statusSubmenu" value="<?= $sm['statusSubmenu'] ;?>" class="custom-control-input checkStatusSubmenu" id="<?= $sm['idSubmenu'] ;?>" <?= $sm['statusSubmenu'] == 'publish' ? 'checked' : '' ;?>>
											 			<label class="custom-control-label" for="<?= $sm['idSubmenu'] ;?>"><?= ucwords($sm['statusSubmenu']) ;?></label>
											 		</div></td>
											 		<td><div class="form-group">
											 			<select class="form-control form-control-sm checkUrutSub" name="urutSubmenu" id="<?= $sm['idSubmenu'] ;?>">
											 				<option>----Pilih No Urut Submenu----</option>
											 				<?php for ($d = 1; $d <= 10; $d++) : ?>
											 					<option value="<?= $d ;?>" <?= $sm['urutSubmenu'] == $d ? 'selected' : '' ;?>><?= $d ;?></option>
											 				<?php endfor; ?>
											 			</select>
											 		</div></td>
											 		<td><?= ucwords($sm['namaMenu']) ;?></td>
											 	</tr>
											 <?php endforeach ?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
			</div>
		</div>
	</div>
	
<?php endforeach ?>