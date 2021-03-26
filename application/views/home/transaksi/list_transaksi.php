<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Data Table Barang</h4>
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
						<h4 class="card-title">Data Barang</h4>
						<div class="ml-auto">
							<button class="btn btn-primary btn-sm" id="fil">Filter Data</button>
							<button class="btn btn-primary btn-sm" id="vie">Lihat Semua</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form action="filterListInput" method="POST" enctype="multipart/form-data" id="formFilter">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="filterStart">Tanggal Awal</label>
									<input type="date" name="filterStart" class="form-control form-control-sm" id="filterStart">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="filterEnd">Tanggal Akhir</label>
									<input type="date" name="filterEnd" class="form-control form-control-sm" id="filterEnd">
								</div>
							</div>
							<div class="col-sm-2 mt-auto mb-2">
								<button class="btn btn-primary btn-sm btn-success">Filter</button>
							</div>
						</div>	
					</form>
				</div>
				<div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="multi-filter-select" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Perusahaan</th>
										<th>Kode Order</th>
										<th>Kode Transaksi</th>
										<th>Sales</th>
										<th>Total</th>
										<th>Pembayaran</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="table_list">
									<!-- <?php foreach ($tTransaksi as $tt): ?>
										<tr>
											<td><input type="checkbox" class="check" name="idTransaksi[]" value="<?= $tt['idTransaksi'] ;?>"></td>
											<td><?= cetak(ucwords($tt['perusahaanId'])) ;?></td>
											<td><?= cetak(ucwords($tt['kodeOrder'])) ;?></td>
											<td><?= cetak(ucwords($tt['kodeTransaksi'])) ;?></td>
											<td><?= cetak(ucwords($tt['namaSales'])) ;?></td>
											<td class="totalSemua text-right"><?= cetak(number_format($tt['totalSemua'],0,',','.')) ;?></td>
											<td><?= cetak(ucwords($tt['pembayaran'])) ;?> </td>
											<td>
												<a href="" data-toggle="modal" data-target="#infobarang<?= $tt['idTransaksi'] ;?>"><i class="fa fa-info-circle text-warning"></i> </a>
												<a href="" data-toggle="modal" data-target="#modalEditBarang<?= $tt['idTransaksi'] ;?>"><i class="fa fa-edit"></i> </a>
												<a href="" data-toggle="modal" data-target="#modalHapusBarang<?= $tt['idTransaksi'] ;?>"><i class="fas fa-trash text-danger"></i> </a>
											</td>
										</tr>
									<?php endforeach ?> -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal Tambah Barang -->
<!-- <div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h2 class="modal-title">
					Tambah Data Barang
				</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('tambahBarang');?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="kodeBarang">Kode Barang</label>
								<input type="text" name="kodeBarang" class="form-control form-control-sm kodeBarang" placeholder="Masukkan Kode Barang...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="namaBarang">Nama Barang</label>
								<input type="text" name="namaBarang" class="form-control form-control-sm" placeholder="Masukkan Nama Barang...">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="gambarBarang">Gambar Barang</label>
						<input type="file" name="gambarBarang" class="form-control-file" id="gambarBarang">
					</div>
					<div class="form-group">
						<label for="idKategori">Nama Kategori</label>
						<select class="form-control form-control-sm" name="kategoriId" id="idKategori">
							<option>--Pilih Kategori Barang--</option>
							<?php foreach ($tKategori as $tk): ?>
								<option value="<?= $tk['idKategori'] ;?>"><?= ucwords($tk['namaKategori']) ;?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="suplierId">Suplier</label>
						<select class="form-control form-control-sm" name="suplierId" id="suplierId">
							<option>--Pilih Suplier Barang--</option>
							<?php foreach ($tSuplier as $tsup): ?>
								<option value="<?= $tsup['idSuplier'] ;?>"><?= ucwords($tsup['namaSuplier']) ;?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="Ukuran">Ukuran Barang</label>
								<input type="number" name="ukuran" class="form-control form-control-sm" placeholder="Masukkan Ukuran Barang...">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="perLsnOrPcs">Per Pcs/Lusin/Karton</label>
						<div class="input-group">
							<input type="number" name="perLsnOrPcs" class="form-control form-control-sm perLsnOrPcs" placeholder="Masukkan Jumlah Per Pcs/Lusin/Karton ..." aria-label="perLsnOrPcs" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<select class="form-control form-control-sm" name="satuanId" id="satuanId">
									<option>Satuan Barang</option>
									<?php foreach ($tSatuan as $ts): ?>
										<option value="<?= $ts['idSatuan'] ;?>"><?= ucwords($ts['namaSatuan']) ;?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="isiPerCtn">Isi Per Karton</label>
								<input type="number" name="isiPerCtn" class="form-control form-control-sm isiPerCtn"  placeholder="Masukkan Jumlah Isi Karton...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="hargaModal">Harga Modal</label>
								<input type="number" name="hargaModal" class="form-control form-control-sm hargaModal"  placeholder="Masukkan Harga Modal...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="diskon">Diskon</label>
								<input type="number" name="diskon" class="form-control form-control-sm diskon"  placeholder="Masukkan Diskon...">
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
</div> -->


<!-- modal info barang -->
<!-- <?php foreach ($fillTransaksi as $fil): ?>
	<div class="modal fade" id="info<?= $fil['idTransaksi'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Detail Data Barang
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><?= $fil['kodeOrder'] ;?></p>
				</div>
				<div class="modal-footer no-bd">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
<?php endforeach ?> -->


<!-- Modal Edit Barang -->
<!-- <?php foreach ($tBarang as $tb): ?>
	<div class="modal fade" id="modalEditBarang<?= $tb['idBarang'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h2 class="modal-title">
						Edit Data Kategori
					</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('editBarang/') . $tb['idBarang'];?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="kodeBarang">Kode Barang</label>
									<input type="text" name="kodeBarang" class="form-control form-control-sm" placeholder="Masukkan Kode Barang..." value="<?= $tb['kodeBarang'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaBarang">Nama Barang</label>
									<input type="text" name="namaBarang" class="form-control form-control-sm" placeholder="Masukkan Nama Barang..." value="<?= $tb['namaBarang'] ;?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="gambarBarang">Gambar Barang</label>
							<input type="file" name="gambarBarang" class="form-control-file" id="gambarBarang" value="<?= $tb['gambarBarang'] ;?>">
						</div>
						<div class="form-group">
							<label for="idKategori">Nama Kategori</label>
							<select class="form-control form-control-sm" name="kategoriId" id="idKategori">
								<option>--Pilih Kategori Barang--</option>
								<?php foreach ($tKategori as $tk): ?>
									<option value="<?= $tk['idKategori'] ;?>" <?= $tb['kategoriId'] == $tk['idKategori'] ? 'selected' : '' ;?>><?= ucwords($tk['namaKategori']) ;?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="suplierId">Suplier</label>
							<select class="form-control form-control-sm" name="suplierId" id="suplierId">
								<option>--Pilih Suplier Barang--</option>
								<?php foreach ($tSuplier as $tsup): ?>
									<option value="<?= $tsup['idSuplier'] ;?>" <?= $tb['suplierId'] == $tsup['idSuplier'] ? 'selected' : '' ;?> ><?= ucwords($tsup['namaSuplier']) ;?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="ukuran">Ukuran Barang</label>
									<input type="text" name="ukuran" class="form-control form-control-sm" placeholder="Masukkan Ukuran Barang..." value="<?= $tb['ukuran'] ;?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="perLsnOrPcs">Per Lusin/Pcs/Karton</label>s
							<div class="input-group">
								<input type="text" name="perLsnOrPcs" class="form-control form-control-sm perLsnOrPcs" placeholder="Masukkan Jumlah Per Lusin / Pcs ..." aria-label="perLsnOrPcs" aria-describedby="basic-addon2" value="<?= $tb['perLsnOrPcs'] ;?>">
								<div class="input-group-append">
									<select class="form-control form-control-sm" name="satuanId" id="satuanId">
										<option>Satuan Barang</option>
										<?php foreach ($tSatuan as $ts): ?>
											<option value="<?= $ts['idSatuan'] ;?>" <?= $tb['satuanId'] == $ts['idSatuan'] ? 'selected' : '' ;?>><?= ucwords($ts['namaSatuan']) ;?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="isiPerCtn">Isi Per Karton</label>
									<input type="text" name="isiPerCtn" class="form-control form-control-sm" placeholder="Masukkan Jumlah Isi Per Karton..." value="<?= $tb['isiPerCtn'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="hargaModal">Harga Modal</label>
									<input type="text" name="hargaModal" class="form-control form-control-sm hargaModal"  placeholder="Masukkan Harga Modal..." value="<?= $tb['hargaModal'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="diskon">Diskon</label>
									<input type="text" name="diskon" class="form-control form-control-sm diskon"  placeholder="Masukkan Diskon..." value="<?= $tb['diskon'] ;?>">
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
 -->
<!-- Modal Hapus -->
<!-- <?php foreach ($tBarang as $tb): ?>
	<div class="modal fade" id="modalHapusBarang<?= $tb['idBarang'] ;?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin Mau Menghapus Barang <?= $tb['namaBarang'] ;?>?.</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('hapusBarang/') . $tb['idBarang'] ;?>" class="btn btn-danger">Hapus</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?> -->