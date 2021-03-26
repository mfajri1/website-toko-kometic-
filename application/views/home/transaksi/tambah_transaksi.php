<div class="page-inner">
	<div class="page-header">
		<h4 class="page-title">Tambah Transaksi</h4>
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
						<h4 class="card-title">Tambah Transaksi</h4>
					</div>
				</div>
				<div class="card-body">
					<form action="<?= base_url('tambahTansaksiAksi') ;?>" method="POST" enctype="multipart/form-data" class="row">
						<div class="col-sm-6 mb-2">
							<div class="form-group">
								<label for="perusahaanId">Nama Perusahaan</label>
								<select class="form-control form-control-sm" name="perusahaanId" id="perusahaanId">
									<option>--Pilih Nama Perusahaan--</option>
									<?php foreach ($tPerusahaan as $tp): ?>
										<option value="<?= $tp['idPerusahaan'] ;?>"><?= $tp['namaPerusahaan'] ;?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="kodeOrder">Kode Order</label>
								<input type="text" name="kodeOrder" class="form-control form-control-sm" placeholder="Masukkan Kode Order..." value="<?= $angkaAcak ;?>">
							</div>
							<div class="form-group">
								<label for="tanggalOrder">Tanggal Order</label>
								<input type="date" name="tanggalOrder" class="form-control form-control-sm" placeholder="Masukkan Tanggal Order...">
							</div>
						</div>
						<div class="col-sm-6 mb-2">
							<div class="form-group">
								<label for="kodeTransaksi">Kode Transaksi</label>
								<input type="text" name="kodeTransaksi" class="form-control form-control-sm" placeholder="Masukkan Kode Transaksi...">
							</div>
							<div class="form-group">
								<label for="namaSales">Nama Sales</label>
								<input type="text" name="namaSales" class="form-control form-control-sm" placeholder="Masukkan Nama Sales...">
							</div>
							<div class="form-group">
								<label for="pembayaran">Pembayaran</label>
								<select class="form-control form-control-sm" name="pembayaran" id="pembayaran">
									<option>--Pilih Pembayaran--</option>
									<option value="cash">Cash</option>
									<option value="kredit">Kredit</option>
								</select>
							</div>
						</div>
						<div class="col-sm-12 mb-2">
							<?php for ($i = 0; $i < 5; $i++) : ?>
								<hr class="baris">
							<?php endfor; ?>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="totalHarga">Harga Belanja</label>
								<input type="text" name="totalHarga" class="form-control form-control-sm totalHarga" placeholder="Masukkan Harga Belanja...">
							</div>
							<div class="form-group">
								<label for="diskon">Diskon</label>
								<input type="text" name="diskon" class="form-control form-control-sm diskon" placeholder="Masukkan Diskon Belanja...">
							</div>
							<div class="form-group">
								<label for="bonus">Bonus</label>
								<input type="text" name="bonus" class="form-control form-control-sm bonus" placeholder="Masukkan Bonus Belanja...">
							</div>
							<div class="form-group">
								<label for="pajak">Pajak</label>
								<input type="text" name="pajak" class="form-control form-control-sm pajak" placeholder="Masukkan Pajak Belanja...">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="totalSemua">Total Belanja</label>
								<input type="text" name="totalSemua" class="form-control form-control-sm totalSemua" placeholder="Masukkan Total Belanja...">
							</div>
							<div class="form-group">
								<label for="ket">Keterangan</label>
								<textarea name="ket" class="form-control" id="ket" rows="5"></textarea>
							</div>
						</div>

						<div class="ml-auto mr-4">
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal Tambah Barang -->
<!-- <div class="modal fade" id="modalTambahPerusahaan" tabindex="-1" role="dialog" aria-hidden="true">
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
</div> -->


<!-- modal info barang -->
<!-- <?php foreach ($tPerusahaan as $tp): ?>
	<div class="modal fade" id="infoDetailPerusahaan<?= $tp['idPerusahaan'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
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
					<div class="row">
						<div class="col-lg-12 d-flex justify-content-center">
							<div class="avatar avatar-xl">
								<img src="<?= base_url('assets/admin/uploads/barang/') . $tp['gambarBarang'] ;?>" alt="" class="avatar-img rounded">
							</div>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-lg-12 d-flex justify-content-center">
							<h3 class="font-weight-bold"><?= $tp['telpPerusahaan'] ;?></h3>	
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="border-bottom border-top d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 pt-2 ml-4">
									<label class="headProfileJudul">Kode Barang</label>
								</div>
								<div class="separator pt-2">:</div>
								<div class="value mb-2 pt-2">
									<label class="headProfile"><?= ucwords($tp['namaPerusahaan']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Nama Barang</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tp['telpPerusahaan']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Kategori</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tp['fax']) ;?></label>
								</div>
							</div>	
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Ukuran</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tp['alamatPerusahaan']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Lsn/Pcs/Ctn</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tp['perLsnOrPcs'] . ' ' . $tp['namaSatuan'] ) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Isi Per Karton</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tp['isiPerCtn']) ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Harga Modal</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2 ">
									<label class="headProfile"><?= number_format($tp['hargaModal'],0,',','.') ;?></label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Diskon</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= ucwords($tp['diskon']) ;?> %</label>
								</div>
							</div>
							<div class="border-bottom d-flex justify-content-between mt-2 mb-2">
								<div class="label mb-2 ml-4">
									<label class="headProfileJudul">Harga Satuan</label>
								</div>
								<div class="separator">:</div>
								<div class="value mb-2">
									<label class="headProfile"><?= number_format($tp['hargaBarang'],0,',','.') ;?></label>
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
	
<?php endforeach ?> -->


<!-- Modal Edit Barang -->
<!-- <?php foreach ($tPerusahaan as $tp): ?>
	<div class="modal fade" id="modalEditPerusahaan<?= $tp['idPerusahaan'] ;?>" tabindex="-1" role="dialog" aria-hidden="true">
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
				<form action="<?= base_url('editBarang/') . $tp['idPerusahaan'];?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="namaPerusahaan">Kode Barang</label>
									<input type="text" name="namaPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Kode Barang..." value="<?= $tp['namaPerusahaan'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="telpPerusahaan">Nama Barang</label>
									<input type="text" name="telpPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Nama Barang..." value="<?= $tp['telpPerusahaan'] ;?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="gambarBarang">Gambar Barang</label>
							<input type="file" name="gambarBarang" class="form-control-file" id="gambarBarang" value="<?= $tp['gambarBarang'] ;?>">
						</div>
						<div class="form-group">
							<label for="idPerusahaan">Nama Kategori</label>
							<select class="form-control form-control-sm" name="kategoriId" id="idPerusahaan">
								<option>--Pilih Kategori Barang--</option>
								<?php foreach ($tKategori as $tk): ?>
									<option value="<?= $tk['idPerusahaan'] ;?>" <?= $tp['kategoriId'] == $tk['idPerusahaan'] ? 'selected' : '' ;?>><?= ucwords($tk['fax']) ;?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="suplierId">Suplier</label>
							<select class="form-control form-control-sm" name="suplierId" id="suplierId">
								<option>--Pilih Suplier Barang--</option>
								<?php foreach ($tSuplier as $tsup): ?>
									<option value="<?= $tsup['idSuplier'] ;?>" <?= $tp['suplierId'] == $tsup['idSuplier'] ? 'selected' : '' ;?> ><?= ucwords($tsup['npwpPerusahaan']) ;?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="alamatPerusahaan">Ukuran Barang</label>
									<input type="text" name="alamatPerusahaan" class="form-control form-control-sm" placeholder="Masukkan Ukuran Barang..." value="<?= $tp['alamatPerusahaan'] ;?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="perLsnOrPcs">Per Lusin/Pcs/Karton</label>s
							<div class="input-group">
								<input type="text" name="perLsnOrPcs" class="form-control form-control-sm perLsnOrPcs" placeholder="Masukkan Jumlah Per Lusin / Pcs ..." aria-label="perLsnOrPcs" aria-describedby="basic-addon2" value="<?= $tp['perLsnOrPcs'] ;?>">
								<div class="input-group-append">
									<select class="form-control form-control-sm" name="satuanId" id="satuanId">
										<option>Satuan Barang</option>
										<?php foreach ($tSatuan as $ts): ?>
											<option value="<?= $ts['idSatuan'] ;?>" <?= $tp['satuanId'] == $ts['idSatuan'] ? 'selected' : '' ;?>><?= ucwords($ts['namaSatuan']) ;?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="isiPerCtn">Isi Per Karton</label>
									<input type="text" name="isiPerCtn" class="form-control form-control-sm" placeholder="Masukkan Jumlah Isi Per Karton..." value="<?= $tp['isiPerCtn'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="hargaModal">Harga Modal</label>
									<input type="text" name="hargaModal" class="form-control form-control-sm hargaModal"  placeholder="Masukkan Harga Modal..." value="<?= $tp['hargaModal'] ;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="diskon">Diskon</label>
									<input type="text" name="diskon" class="form-control form-control-sm diskon"  placeholder="Masukkan Diskon..." value="<?= $tp['diskon'] ;?>">
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
<?php endforeach ?> -->

<!-- Modal Hapus -->
<!-- <?php foreach ($tPerusahaan as $tp): ?>
	<div class="modal fade" id="modalHapusPerusahaan<?= $tp['idPerusahaan'] ;?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Barang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin Mau Menghapus Barang <?= $tp['telpPerusahaan'] ;?>?.</p>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('hapusBarang/') . $tp['idPerusahaan'] ;?>" class="btn btn-danger">Hapus</a>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach ?> -->