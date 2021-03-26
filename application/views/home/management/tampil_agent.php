<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Agent User</h4>
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
						<h4 class="card-title">Data Agent</h4>
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
											<th>Nama Pengguna</th>
											<th>Tanggal Login</th>
											<th>Browser</th>
											<th>Sistem Operasi</th>
											<th>Ip Address</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($tAgent as $ta): ?>
											<tr>
												<td><?= $i++ ;?></td>
												<td><?= ucwords($ta['namaUser']) ;?></td>
												<td><?= date('d-M-Y / h:i:s', $ta['tanggal']) ;?></td>
												<td><?= ucwords($ta['browser']) ;?></td>
												<td><?= ucwords($ta['os']) ;?></td>
												<td><?= ucwords($ta['ipAddress']) ;?></td>
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