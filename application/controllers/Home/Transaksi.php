<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//Do your magic here
		aksesLogin();
	}

	public function view($base, $data=null, $boolean){
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

	public function listTransaksi(){
		$data['title']	= 'List Transaksi';
		$data['tTransaksi'] = $this->Model_transaksi->tampil_data('t_transaksi')->result_array();
		$data['tPerusahaan'] = $this->Model_transaksi->tampil_data('t_perusahaan')->result_array();

		$this->view('home/transaksi/list_transaksi', $data, FALSE);
	}

	public function viewList($id){
		$idPerusahaan = ['perusahaanId' => $id];
		$data['tTransaksi'] = $this->Model_transaksi->tampil_ajax('t_transaksi', $idPerusahaan)->result_array();

		$this->load->view('home/transaksi/view_list', $data, FALSE);
	}

	public function filterList(){
		$tAwal = $this->input->post('filterStart');
		$tAkhir = $this->input->post('filterEnd');
		$fillTransaksi = $this->Model_transaksi->filter_list('t_transaksi', $tAwal, $tAkhir)->result_array();

		// if (count($query) > 0 ) {
		// 	$row = array();
		// 	foreach ($query as $qr) {
		// 		$row['kodeOrder'] = !empty($qr) ? $qr['kodeOrder'] : '';
		// 		$row['tanggalOrder'] = !empty($qr) ? $qr['tanggalOrder'] : '';
		// 		$row['kodeTransaksi'] = !empty($qr) ? $qr['kodeTransaksi'] : '';
		// 		$row['namaSales'] = !empty($qr) ? $qr['namaSales'] : '';
		// 		$row['pembayaran'] = !empty($qr) ? $qr['pembayaran'] : '';
		// 		$row['perusahaanId'] = !empty($qr) ? $qr['perusahaanId'] : '';
		// 		$row['totalHarga'] = !empty($qr) ? $qr['totalHarga'] : '';
		// 		$row['diskon'] = !empty($qr) ? $qr['diskon'] : '';
		// 		$row['bonus'] = !empty($qr) ? $qr['bonus'] : '';
		// 		$row['pajak'] = !empty($qr) ? $qr['pajak'] : '';
		// 		$row['totalSemua'] = !empty($qr) ? $qr['totalSemua'] : '';
		// 		$row['ket'] = !empty($qr) ? $qr['ket'] : '';
		// 		$row['userId'] = !empty($qr) ? $qr['userId'] : '';

		// 		$hasil[] = $row;

		// 		$result = ['message' => $hasil];

		// 		$this->output->set_content_type('application/json')->set_output(json_encode($result));
		// 	}
		// }else{
		// 	$result = ['message' => 'gagal'];
		// 	$this->output->set_content_type('application/json')->set_output(json_encode($result));
		// }

		
		echo json_encode($fillTransaksi);
		// $this->output->set_content_type('application/json')->set_output(json_encode($query));
	}


	public function hapusTransaksiAll(){
		$idTransaksi = $this->input->post('idTransaksi', true);

		$this->Model_transaksi->hapus_transaksi_all('t_transaksi', $idTransaksi);

		redirect('listTransaksi','refresh');
	}

	public function tambahDataTransaksi(){
		$data['title'] = "Tambah Data Transaksi";
		$data['angkaAcak'] = 'OR' . date('dmy'). mt_rand(1000, 9999);
		$data['tPerusahaan'] = $this->Model_barang->tampil_data('t_perusahaan')->result_array();

		$this->view('home/transaksi/tambah_transaksi', $data, FALSE);	
	}

	function validationTransaksi(){
		$validation = $this->form_validation;

		$validation->set_rules('kodeOrder', 'Kode Order', 'trim|required|is_unique[t_transaksi.kodeOrder]');
		$validation->set_rules('tanggalOrder', 'Tanggal Order', 'trim|required');
		$validation->set_rules('kodeTransaksi', 'Kode Transaksi', 'trim|required');
		$validation->set_rules('namaSales', 'Nama Sales', 'trim|required');
		$validation->set_rules('pembayaran', 'Pembayaran', 'trim|required');
		$validation->set_rules('perusahaanId', 'Nama Perushaan', 'trim|required');
		$validation->set_rules('totalHarga', 'Total Harga Belanja', 'trim|required');
		$validation->set_rules('diskon', 'Diskon Belanja', 'trim|required');
		$validation->set_rules('bonus', 'Bonus Belanja', 'trim|required');
		$validation->set_rules('pajak', 'Pajak Belanja', 'trim|required');
		$validation->set_rules('totalSemua', 'Pajak Belanja', 'trim|required');
		$validation->set_rules('ket', 'Keterangan Belanja', 'trim|required');
	}

	public function tambahDataTransaksiAksi(){
		$this->validationTransaksi();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Gagal Menambahkan Transaksi")</script>';
			redirect('tambahTransaksi','refresh');
		} else {
			$input = $this->input;
			$data = [
				'kodeOrder' => $input->post('kodeOrder', true),
				'tanggalOrder' => $input->post('tanggalOrder', true),
				'kodeTransaksi' => $input->post('kodeTransaksi', true),
				'namaSales' => $input->post('namaSales', true),
				'pembayaran' => $input->post('pembayaran', true),
				'perusahaanId' => $input->post('perusahaanId', true),
				'totalHarga' => $input->post('totalHarga', true),
				'diskon' => $input->post('diskon', true),
				'bonus' => $input->post('bonus', true),
				'pajak' => $input->post('pajak', true),
				'totalSemua' => $input->post('totalSemua', true),
				'ket' => $input->post('ket', true),
				'userId' => $this->session->userdata('idUser')
			];

			$this->Model_transaksi->tambah_data('t_transaksi', $data);

			echo '<script>alert("Berhasil Menambahkan Transaksi")</script>';
			redirect('tambahTransaksi','refresh');

		}	
	}


	public function barangTransaksi($kodeTransaksi){
		$data['title'] = 'Barang Orderan';
		$data['kodeTransaksi'] = $kodeTransaksi;
		$data['tKategori'] = $this->Model_barang->tampil_data('t_kategori_barang')->result_array();
		$data['tSuplier'] = $this->Model_barang->tampil_data('t_suplier')->result_array();

		$this->view('home/transaksi/isi_transaksi', $data, FALSE);	
	}


	function validationBarangTransaksi(){
		$validation = $this->form_validation;

		$validation->set_rules('transaksiKode', 'Kode Transaksi', 'trim|required');
		$validation->set_rules('kodeBarang', 'Kode Barang', 'trim|required');
		$validation->set_rules('namaBarang', 'Nama Barang', 'trim|required');
		$validation->set_rules('kategoriId', 'Nama Kategori', 'trim|required');
		$validation->set_rules('suplierId', 'Nama Suplier', 'trim|required');
		$validation->set_rules('ukuran', 'Ukuran Barang', 'trim|required');
		$validation->set_rules('jumlahBarang', 'Jumlah Barang', 'trim|required');
		$validation->set_rules('modalHarga', 'Harga Modal', 'trim|required');
		$validation->set_rules('barangHarga', 'Harga Barang', 'trim|required');
		$validation->set_rules('diskonBarang', 'Diskon Barang', 'trim|required');
		$validation->set_rules('totalHarga', 'Harga Total', 'trim|required');
	}

	public function tambahBarangTransaksi(){
		$this->validationBarangTransaksi();
		$input = $this->input;
		
		$transaksiKode = htmlspecialchars($input->post('transaksiKode', true));
		$kodeBarang = htmlspecialchars($input->post('kodeBarang', true));
		$namaBarang = htmlspecialchars($input->post('namaBarang', true));
		$kategoriId = htmlspecialchars($input->post('kategoriId', true));
		$suplierId = htmlspecialchars($input->post('suplierId', true));
		$ukuran = htmlspecialchars($input->post('ukuran', true));
		$jumlahBarang = htmlspecialchars($input->post('jumlahBarang', true));
		$modalHarga = htmlspecialchars($input->post('modalHarga', true));
		$barangHarga = htmlspecialchars($input->post('barangHarga', true));
		$barangHarga = 12;
		$diskonBarang = htmlspecialchars($input->post('diskonBarang', true));
		$totalHarga = htmlspecialchars($input->post('totalHarga', true));
		$ket = htmlspecialchars($input->post('ket', true));

		$data = [];
		$index = 0 ;

		foreach ($transaksiKode as $tk) {
			array_push($data, [
				'transaksiKode' => $tk,
				'kodeBarang' => $kodeBarang,
				'namaBarang' => $namaBarang,
				'kategoriId' => $kategoriId,
				'suplierId' => $suplierId,
				'ukuran' => $ukuran,
				'jumlahBarang' => $jumlahBarang,
				'modalHarga' => $modalHarga,
				'barangHarga' => $barangHarga,
				'perBagi' => $perBagi,
				'diskonBarang' => $diskonBarang,
				'totalHarga' => $totalHarga,
				'ket' => $ket,
			]);
			$index++;
		}

		$this->Model_transaksi->tambah_barang_transaksi('t_barang_transaksi', $data);

		echo '<script>alert("Berhasil Menambahkan Transaksi")</script>';
		redirect('tambahTransaksi','refresh');

	}

	public function getDataComplete(){
		if (isset($_GET['term'])) {
			$hasil = $this->Model_transaksi->get_data_complete('t_barang', $_GET['term'])->result_array();
			if(count($hasil)){
				foreach ($hasil as $row) {
					$arr_result[] = array(
						'kodeBarang' => $row['kodeBarang']
					);
				}
				echo json_encode($arr_result);
			}else{
				echo json_encode('gagal');
			}	
		}
	}
	

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Home/Transaksi.php */