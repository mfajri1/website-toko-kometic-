<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/vendor/dompdf/dompdf/src/Autoloader.php';
require_once 'vendor/vendor/tecnickcom/tcpdf/tcpdf.php';


class Barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Do your magic here
		aksesLogin();
	}

	public function view($base, $data, $boolean){
		$data['faker'] = Faker\Factory::create('id_ID');
		$data['konfigUser'] = $this->Model_user->tampil_user($this->session->userdata('idUser'))->row_array();
		$data['daftarMenu'] = $this->Model_menu->tampil_menu($this->session->userdata('levelUser'))->result_array();
		$data['konfig'] = $this->Model_member->tampil_konfig('t_konfigurasi')->row_array();
		$load = $this->load;
		$load->view('template_admin/scriptHeader', $data, $boolean);
		$load->view('template_admin/header', $data, $boolean);	
		$load->view('template_admin/navbar', $data, $boolean);	
		$load->view('template_admin/sidebar', $data, $boolean);
		$load->view($base, $data, $boolean);	
		$load->view('template_admin/footer', $data, $boolean);	
		$load->view('template_admin/scriptFooter', $data, $boolean);
	}

	// barang
	public function tampilDataBarang(){
		$data['title'] = 'Halaman Data Barang';
		$data['tBarang'] = $this->Model_barang->tampil_barang('t_barang')->result_array();
		$data['tKategori'] = $this->Model_barang->tampil_data('t_kategori_barang')->result_array();
		$data['tSatuan'] = $this->Model_barang->tampil_data('t_satuan')->result_array();
		$data['tSuplier'] = $this->Model_barang->tampil_data('t_suplier')->result_array();

		$this->view('home/barang/tampil_barang', $data, FALSE);
	}

	function _validationBarang(){
		$validation = $this->form_validation;	

		$validation->set_rules('kodeBarang', 'Kode Barang', 'trim|required|is_unique[t_barang.kodeBarang]');
		$validation->set_rules('namaBarang', 'Nama Barang', 'trim|required');
		$validation->set_rules('kategoriId', 'Kategori Id', 'trim|required');
		$validation->set_rules('suplierId', 'Suplier Id', 'trim|required');
		$validation->set_rules('ukuran', 'Ukuran', 'trim|required');
		$validation->set_rules('perLsnOrPcs', 'Data Hitungan', 'trim|required');
		$validation->set_rules('satuanId', 'Satuan', 'trim|required');
		$validation->set_rules('hargaModal', 'Harga Modal', 'trim|required');
	}

	public function tambahDataBarang(){
		$this->_validationBarang();

		// helpers
		_uploadGambar('barang');

		if ( ! $this->upload->do_upload('gambarBarang')){
			$error = array('error' => $this->upload->display_errors());
			echo "<script>alert('Masalah Upload Gambar')</script>";
			redirect('barang','refresh');	
		} else {
			if ($this->form_validation->run()) {
				$uploadGambar = $this->upload->data();
				// helpers
				_createThumbs($uploadGambar, 'barang');

				$input = $this->input;

				$kategoriId = htmlspecialchars($input->post('kategoriId'), true);
				$perLsnOrPcs = htmlspecialchars($input->post('perLsnOrPcs', true));
				$satuanId = htmlspecialchars($input->post('satuanId', true));
				$hargaModal = htmlspecialchars($input->post('hargaModal', true));
				$suplierId = htmlspecialchars($input->post('suplierId', true));
				$isiPerCtn = htmlspecialchars($input->post('isiPerCtn', true));
				$diskon = htmlspecialchars($input->post('diskon', true));

				if ($satuanId == 1) {
					$harga = $hargaModal / $perLsnOrPcs;
					$disk = $harga * ($diskon/100);
					$hargaBarang = $harga - $disk;
				}else if ($satuanId == 2) {
					$lsn = $perLsnOrPcs * 12;
					$harga = $hargaModal / $lsn;
					$disk = $harga * ($diskon/100);
					$hargaBarang = $harga - $disk;
				}else if ($satuanId == 3) {
					$harga = $hargaModal / $isiPerCtn;
					$disk = $harga * ($diskon/100);
					$hargaBarang = $harga - $disk;
				}

				$data = [
					'kodeBarang' => htmlspecialchars($input->post('kodeBarang', true)),
					'namaBarang' => htmlspecialchars(ucwords($input->post('namaBarang', true))),
					'gambarBarang' => $uploadGambar['file_name'],
					'kategoriId' => htmlspecialchars($input->post('kategoriId', true)),
					'suplierId' => $suplierId,
					'ukuran' => htmlspecialchars($input->post('ukuran', true)),
					'perLsnOrPcs' => $perLsnOrPcs,
					'satuanId' => $satuanId,
					'isiPerCtn' => $isiPerCtn,
					'hargaModal' => $hargaModal,
					'diskon' => $diskon,
					'hargaBarang' => $hargaBarang,
					'idUser' => $this->session->userdata('idUser')
				];

				$this->Model_barang->tambah_data('t_barang', $data);

				echo "<script>alert('Berhasil Upload Data')</script>";
				redirect('barang','refresh');

			}else{
				echo "<script>alert('Data Tidak Boleh Kosong / Kode Barang Harus Berbeda')</script>";
				redirect('barang','refresh');
			}
		}
	}

	public function EditDataBarang($id){
		$idBarang = ['idBarang' => $id];

		if (!empty($_FILES['gambarBarang']['name'])){
			$dataGambar = $this->Model_barang->detail_gambar('t_barang', $idBarang)->row_array();
			unlink('./assets/admin/uploads/barang/' . $dataGambar['gambarBarang']);
			// helper
			_uploadGambar('barang');

			if ( ! $this->upload->do_upload('gambarBarang')){
				$error = array('error' => $this->upload->display_errors());
				echo "<script>alert('Masalah Upload Gambar')</script>";
				redirect('barang/' . $id,'refresh');	
			}else{
				$uploadGambar = $this->upload->data();
				// helper
				_createThumbs($uploadGambar, 'barang');

				$input = $this->input;
				$kategoriId = htmlspecialchars($input->post('kategoriId'), true);
				$perLsnOrPcs = htmlspecialchars($input->post('perLsnOrPcs', true));
				$satuanId = htmlspecialchars($input->post('satuanId', true));
				$hargaModal = htmlspecialchars($input->post('hargaModal', true));
				$suplierId = htmlspecialchars($input->post('suplierId', true));
				$isiPerCtn = htmlspecialchars($input->post('isiPerCtn', true));
				$diskon = htmlspecialchars($input->post('diskon', true));

				if ($satuanId == 1) {
					$harga = $hargaModal / $perLsnOrPcs;
					$disk = $harga * ($diskon/100);
					$hargaBarang = $harga - $disk;
				}else if ($satuanId == 2) {
					$lsn = $perLsnOrPcs * 12;
					$harga = $hargaModal / $lsn;
					$disk = $harga * ($diskon/100);
					$hargaBarang = $harga - $disk;
				}else if ($satuanId == 3) {
					$harga = $hargaModal / $isiPerCtn;
					$disk = $harga * ($diskon/100);
					$hargaBarang = $harga - $disk;
				}

				$data = [
					'kodeBarang' => htmlspecialchars($input->post('kodeBarang', true)),
					'namaBarang' => htmlspecialchars(ucwords($input->post('namaBarang', true))),
					'gambarBarang' => $uploadGambar['file_name'],
					'kategoriId' => htmlspecialchars($input->post('kategoriId', true)),
					'suplierId' => $suplierId,
					'ukuran' => htmlspecialchars($input->post('ukuran', true)),
					'perLsnOrPcs' => $perLsnOrPcs,
					'satuanId' => $satuanId,
					'isiPerCtn' => $isiPerCtn,
					'hargaModal' => $hargaModal,
					'diskon' => $diskon,
					'hargaBarang' => $hargaBarang,
					'idUser' => $this->session->userdata('idUser')
				];

				$this->Model_barang->edit_data('t_barang', $idBarang, $data);


				echo "<script>alert('Berhasil Upload Data')</script>";
				redirect('barang','refresh');
			}

		}else{
			$input = $this->input;

			$kategoriId = htmlspecialchars($input->post('kategoriId'), true);
			$perLsnOrPcs = htmlspecialchars($input->post('perLsnOrPcs', true));
			$satuanId = htmlspecialchars($input->post('satuanId', true));
			$hargaModal = htmlspecialchars($input->post('hargaModal', true));
			$suplierId = htmlspecialchars($input->post('suplierId', true));
			$isiPerCtn = htmlspecialchars($input->post('isiPerCtn', true));
			$diskon = htmlspecialchars($input->post('diskon', true));

			
			if ($satuanId == 1) {
				$harga = $hargaModal / $perLsnOrPcs;
				$disk = $harga * ($diskon/100);
				$hargaBarang = $harga - $disk;
			}else if ($satuanId == 2) {
				$lsn = $perLsnOrPcs * 12;
				$harga = $hargaModal / $lsn;
				$disk = $harga * ($diskon/100);
				$hargaBarang = $harga - $disk;
			}else if ($satuanId == 3) {
				$harga = $hargaModal / $isiPerCtn;
				$disk = $harga * ($diskon/100);
				$hargaBarang = $harga - $disk;
			}

			$data = [
				'kodeBarang' => htmlspecialchars($input->post('kodeBarang', true)),
				'namaBarang' => htmlspecialchars(ucwords($input->post('namaBarang', true))),
				'kategoriId' => htmlspecialchars($input->post('kategoriId', true)),
				'suplierId' => $suplierId,
				'ukuran' => htmlspecialchars($input->post('ukuran', true)),
				'perLsnOrPcs' => $perLsnOrPcs,
				'satuanId' => $satuanId,
				'isiPerCtn' => $isiPerCtn,
				'hargaModal' => $hargaModal,
				'diskon' => $diskon,
				'hargaBarang' => $hargaBarang,
				'idUser' => $this->session->userdata('idUser')
			];

			$this->Model_barang->edit_data('t_barang', $idBarang, $data);

			echo "<script>alert('Berhasil Upload Data')</script>";
			redirect('barang','refresh');
		}	
	}

	public function hapusDataBarang($id){
		$idBarang = ['idBarang' => $id];
		$dataGambar = $this->Model_barang->detail_gambar('t_barang', $idBarang)->row_array();
		unlink('./assets/admin/uploads/barang/' . $dataGambar['gambarBarang']);

		$queryHapus = $this->Model_barang->hapus_data('t_barang', $idBarang);

		redirect('barang','refresh');
	}

	public function hapusBarangAll(){
		$idbarang = $this->input->post('idBarang', true);

		// var_dump($idBarang);die();
		$dataGambar = $this->Model_barang->hapus_all_gambar('t_barang', $idbarang)->result_array();

		foreach ($dataGambar as $ib) {
			unlink('./assets/admin/uploads/barang/' . $ib['gambarBarang']);
		}

		$hapus = $this->Model_barang->hapus_all('t_barang', $idbarang, 'idBarang');


		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Barang")</script>';
			redirect('barang','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Barang")</script>';
			redirect('barang','refresh');
		}	
	}

	// public function printDataBarang(){
	// 	$data['printData'] = $this->Model_barang->print_data('t_barang')->result_array();

	// 	// pdf
	// 	$this->pdf->setPaper('A4', 'potrait');
	// 	$this->pdf->load_view('home/barang/print_barang', $data);
	// }

	public function printDataBarang(){
		// pdf
		$pdf = new TCPDF();
		// membuat page baru 
		// $pdf->AddPage(oriantasi kertas, satuan kertas, ukuran kertas);
		$pdf->AddPage('P', 'mm', 'A4');
		$pdf->setPrintHeader(FALSE);
		$pdf->setPrintFooter(FALSE);
		// set margin default
		// $pdf->SetMargins(left, top, right, bottom);
		$pdf->SetMargins(10, 20, 10);

		// set font
		// $pdf->SetFont(nama font, font style, ukuran font, 'false');
		$pdf->SetFont('', 'B', 14, 'false');

		// membuat cell di pdf
		// $pdf->Cell(left, top, right, bottom, isi cell, column, baris, align);
		$pdf->Cell(0, 8, "Data Barang Batra Kosmetik", 0, 1, 'C');

		$pdf->SetAutoPageBreak(true, 0);

        // Add Header
		$pdf->Ln(5); //kasih baris
		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(12, 5, "No", 1, 0, 'C');
		$pdf->Cell(16, 5, "Kode", 1, 0, 'C');
		$pdf->Cell(40, 5, "Nama", 1, 0, 'C');
		$pdf->Cell(28, 5, "Kategori", 1, 0, 'C');
		$pdf->Cell(15, 5, "Suplier", 1, 0, 'C');
		$pdf->Cell(10, 5, "Size", 1, 0, 'C');
		$pdf->Cell(12, 5, "Isi", 1, 0, 'C');
		$pdf->Cell(18, 5, "Modal", 1, 0, 'C');
		$pdf->Cell(12, 5, "PerLsn", 1, 0, 'C');
		$pdf->Cell(12, 5, "Diskon", 1, 0, 'C');
		$pdf->Cell(15, 5, "harga", 1, 1, 'C');

		$pdf->SetFont('Times', '', 10);
		$prinData = $this->Model_barang->print_data('t_barang')->result_array();
		$no=0;
		foreach ($prinData as $db){
			$no++;
			$pdf->Cell(12, 5, $no, 1, 0, 'C');
			$pdf->Cell(16, 5, $db['kodeBarang'], 1, 0, 'L');
			$pdf->Cell(40, 5, $db['namaBarang'], 1, 0, 'L');
			$pdf->Cell(28, 5, $db['namaKategori'], 1, 0, 'L');
			$pdf->Cell(15, 5, $db['namaSuplier'], 1, 0, 'L');
			$pdf->Cell(10, 5, $db['ukuran'], 1, 0, 'L');
			$pdf->Cell(12, 5, $db['isiPerCtn'] . ' Pcs', 1, 0, 'L');
			$pdf->Cell(18, 5, number_format($db['hargaModal'],0,',','.'), 1, 0, 'R');
			$pdf->Cell(12, 5, $db['perLsnOrPcs'] . ' ' . $db['kodeSatuan'], 1, 0, 'L');
			$pdf->Cell(12, 5, number_format($db['diskon'],0,',','.') .'%', 1, 0, 'R');
			$pdf->Cell(15, 5, number_format($db['hargaBarang'],0,',','.'), 1, 1, 'R');

		}

		$pdf->Output('Data Barang.pdf'); 
	}


	// kategori
	public function tampilKategoriBarang(){
		$data['title'] = 'Kategori Barang';

		$data['tKategori'] = $this->Model_barang->tampil_data('t_kategori_barang')->result_array();

		$this->view('home/barang/kategori_barang', $data, FALSE);	
	}
	
	function _validationKategori(){
		$validation = $this->form_validation;
		$validation->set_rules('kodeKategori', 'Kode Kategori', 'trim|required');	
		$validation->set_rules('namaKategori', 'Nama Kategori', 'trim|required');
	}

	public function tambahKategoriBarang(){
		$this->_validationKategori();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Menambahkan Data Kategori")</script>';
			redirect('kategoriBarang','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeKategori' => htmlspecialchars(ucwords($input->post('kodeKategori', true))),
				'namaKategori' => htmlspecialchars(ucwords($input->post('namaKategori', true))),
			];

			$this->Model_barang->tambah_data('t_kategori_barang', $data);
			echo '<script>alert("Anda Berhasil Menambahkan Data Kategori")</script>';
			redirect('kategoriBarang','refresh');
		}	
	}

	public function editKategoriBarang($id){
		$idKategori = ['idKategori' => $id];
		// var_dump($idKategori);die();

		$this->_validationKategori();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Mengedit Data Kategori")</script>';
			redirect('kategoriBarang','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeKategori' => htmlspecialchars(ucwords($input->post('kodeKategori', true))),
				'namaKategori' => htmlspecialchars(ucwords($input->post('namaKategori', true))),
			];

			$this->Model_barang->edit_data('t_kategori_barang', $idKategori, $data);
			echo '<script>alert("Anda Berhasil Mengedit Data Kategori")</script>';
			redirect('kategoriBarang','refresh');
		}
	}

	public function hapusKategoriBarangAksi($id){
		$idKategori = ['idKategori' => $id];

		$hapus = $this->Model_barang->hapus_data('t_kategori_barang', $idKategori);

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Kategori")</script>';
			redirect('kategoriBarang','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Kategori")</script>';
			redirect('kategoriBarang','refresh');
		}
	}

	public function hapusKategoriAll(){
		$idKategori = $this->input->post('idKategori', true);

		// var_dump($idKategori);die();

		$hapus = $this->Model_barang->hapus_all('t_kategori_barang', $idKategori, 'idKategori');

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Kategori")</script>';
			redirect('kategoriBarang','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Kategori")</script>';
			redirect('kategoriBarang','refresh');
		}	
	}


	// suplier
	public function tampilSuplier(){
		$data['title'] = 'Data Suplier';
		$data['tSuplier'] = $this->Model_barang->tampil_data('t_suplier')->result_array();

		$this->view('home/barang/suplier_barang', $data, FALSE);	
	}

	function _validationSuplier(){
		$validation = $this->form_validation;
		$validation->set_rules('kodeSuplier', 'Kode Suplier', 'trim|required');	
		$validation->set_rules('namaSuplier', 'Nama Suplier', 'trim|required');	
	}

	public function tambahDataSuplier(){
		$this->_validationSuplier();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Menambahkan Data Suplier")</script>';
			redirect('suplier','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeSuplier' => htmlspecialchars(ucwords($input->post('kodeSuplier', true))),
				'namaSuplier' => htmlspecialchars(ucwords($input->post('namaSuplier', true))),
			];

			$this->Model_barang->tambah_data('t_suplier', $data);
			echo '<script>alert("Anda Berhasil Menambahkan Data Suplier")</script>';
			redirect('suplier','refresh');
		}	
	}

	public function editDataSuplier($id){
		$idSuplier = ['idSuplier' => $id];
		// var_dump($idKategori);die();

		$this->_validationSuplier();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Mengedit Data Suplier")</script>';
			redirect('suplier','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeSuplier' => htmlspecialchars(ucwords($input->post('kodeSuplier', true))),
				'namaSuplier' => htmlspecialchars(ucwords($input->post('namaSuplier', true))),
			];

			$this->Model_barang->edit_data('t_suplier', $idSuplier, $data);
			echo '<script>alert("Anda Berhasil Mengedit Data Suplier")</script>';
			redirect('suplier','refresh');
		}
	}

	public function hapusDataSuplier($id){
		$idSuplier = ['idSuplier' => $id];

		$hapus = $this->Model_barang->hapus_data('t_suplier', $idSuplier);

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Suplier")</script>';
			redirect('suplier','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Suplier")</script>';
			redirect('suplier','refresh');
		}
	}

	public function hapusSuplierAll(){
		$idSuplier = $this->input->post('idSuplier', true);

		// var_dump($idSuplier);die();

		$hapus = $this->Model_barang->hapus_all('t_suplier', $idSuplier, 'idSuplier');

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Suplier")</script>';
			redirect('suplier','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Suplier")</script>';
			redirect('suplier','refresh');
		}	
	}


	// satuan
	public function tampilSatuan(){
		$data['title'] = 'Data Satuan';
		$data['tSatuan'] = $this->Model_barang->tampil_data('t_satuan')->result_array();

		$this->view('home/barang/satuan_barang', $data, FALSE);	
	}

	function _validationSatuan(){
		$validation = $this->form_validation;
		$validation->set_rules('kodeSatuan', 'Kode Satuan', 'trim|required');	
		$validation->set_rules('namaSatuan', 'Nama Satuan', 'trim|required');	
	}

	public function tambahDataSatuan(){
		$this->_validationSatuan();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Menambahkan Data Satuan")</script>';
			redirect('satuan','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeSatuan' => htmlspecialchars(ucwords($input->post('kodeSatuan', true))),
				'namaSatuan' => htmlspecialchars(ucwords($input->post('namaSatuan', true))),
			];

			$this->Model_barang->tambah_data('t_satuan', $data);
			echo '<script>alert("Anda Berhasil Menambahkan Data Satuan")</script>';
			redirect('satuan','refresh');
		}	
	}

	public function editDataSatuan($id){
		$idSatuan = ['idSatuan' => $id];
		// var_dump($idKategori);die();

		$this->_validationSatuan();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Mengedit Data Satuan")</script>';
			redirect('satuan','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeSatuan' => htmlspecialchars(ucwords($input->post('kodeSatuan', true))),
				'namaSatuan' => htmlspecialchars(ucwords($input->post('namaSatuan', true))),
			];

			$this->Model_barang->edit_data('t_satuan', $idSatuan, $data);
			echo '<script>alert("Anda Berhasil Mengedit Data Satuan")</script>';
			redirect('satuan','refresh');
		}
	}

	public function hapusDataSatuan($id){
		$idSatuan = ['idSatuan' => $id];

		$hapus = $this->Model_barang->hapus_data('t_satuan', $idSatuan);

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Satuan")</script>';
			redirect('satuan','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Satuan")</script>';
			redirect('satuan','refresh');
		}
	}

	public function hapusSatuanAll(){
		$idSatuan = $this->input->post('idSatuan', true);

		// var_dump($idSatuan);die();

		$hapus = $this->Model_barang->hapus_all('t_satuan', $idSatuan, 'idSatuan');

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Satuan")</script>';
			redirect('satuan','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Satuan")</script>';
			redirect('satuan','refresh');
		}	
	}


	// data perusahaan
	public function tampilProfilPerusahaan(){
		$data['title'] = 'Halaman Manage Profile Perusahaan';
		$data['tPerusahaan'] = $this->Model_barang->tampil_data('t_perusahaan')->result_array();

		$this->view('home/barang/manage_perusahaan', $data, FALSE);
	}

	function _validationPerusahaan(){
		$validation = $this->form_validation;
		$validation->set_rules('namaPerusahaan', 'Nama Perusahaan', 'trim|required');	
		$validation->set_rules('telpPerusahaan', 'Telp Perusahaan', 'trim|required');	
		$validation->set_rules('fax', 'No Fax', 'trim|required');	
		$validation->set_rules('npwpPerusahaan', 'No NPWP', 'trim|required');	
		$validation->set_rules('alamatPerusahaan', 'Alamat Perusahaan', 'trim|required');	
	}

	public function tambahProfilPerusahaan(){
		$this->_validationPerusahaan();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Menambahkan Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');
		} else {
			$input = $this->input;
			$data = [
				'namaPerusahaan' => htmlspecialchars(ucwords($input->post('namaPerusahaan', true))),
				'telpPerusahaan' => htmlspecialchars(ucwords($input->post('telpPerusahaan', true))),
				'fax' => htmlspecialchars(ucwords($input->post('fax', true))),
				'npwpPerusahaan' => htmlspecialchars(ucwords($input->post('npwpPerusahaan', true))),
				'alamatPerusahaan' => htmlspecialchars(ucwords($input->post('alamatPerusahaan', true))),
			];

			$this->Model_barang->tambah_data('t_perusahaan', $data);
			echo '<script>alert("Anda Berhasil Menambahkan Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');
		}	
	}

	public function editprofilPerusahaan($id){
		$idPerusahaan = ['idPerusahaan' => $id];
		// var_dump($idKategori);die();

		$this->_validationPerusahaan();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Anda Gagal Mengedit Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');
		} else {
			$input = $this->input;
			$data = [
				'namaPerusahaan' => htmlspecialchars(ucwords($input->post('namaPerusahaan', true))),
				'telpPerusahaan' => htmlspecialchars(ucwords($input->post('telpPerusahaan', true))),
				'fax' => htmlspecialchars(ucwords($input->post('fax', true))),
				'npwpPerusahaan' => htmlspecialchars(ucwords($input->post('npwpPerusahaan', true))),
				'alamatPerusahaan' => htmlspecialchars(ucwords($input->post('alamatPerusahaan', true))),
			];

			$this->Model_barang->edit_data('t_perusahaan', $idPerusahaan, $data);
			echo '<script>alert("Anda Berhasil Mengedit Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');
		}
	}

	public function hapusProfilPerusahaan($id){
		$idPerusahaan = ['idPerusahaan' => $id];

		$hapus = $this->Model_barang->hapus_data('t_perusahaan', $idPerusahaan);

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');
		}
	}

	public function hapusperusahaanAll(){
		$idPerusahaan = $this->input->post('idPerusahaan', true);

		// var_dump($idPerusahaan);die();

		$hapus = $this->Model_barang->hapus_all('t_perusahaan', $idPerusahaan, 'idPerusahaan');

		if ($hapus == "") {
			echo '<script>alert("Anda Berhasil Menghapus Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');	
		}else{
			echo '<script>alert("Anda Gagal Menghapus Data Perusahaan")</script>';
			redirect('dataPerusahaan','refresh');
		}	
	}

}

/* End of file TampilBarang.php */
/* Location: ./application/controllers/home/TampilBarang.php */