<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManagementUsers extends CI_Controller {

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

	public function tampilKonfig(){
		$data['title'] = 'Halaman Profile User';
		$data['tKonfig'] = $this->Model_member->tampil_konfig_all('t_konfigurasi')->result_array();

		$this->view('home/management/tampil_konfig', $data, FALSE);
	}

	public function editKonfigAksi($id){
		// helper
		_uploadGambar('konfig');

		if ( ! $this->upload->do_upload('imgIcon')){
			$error = array('error' => $this->upload->display_errors());
			echo '<script>alert("Gagal Upload foto")</script>';
			redirect('managementKonfig','refresh');
		}
		else{
			$uploadIcon = $this->upload->data();
			// helper
			_createThumbs($uploadIcon, 'konfig');

			$input = $this->input;
			$data = [
				'namaWeb' => htmlspecialchars($input->post('namaWeb', true)),
				'imgIcon' => $uploadIcon['file_name'],
				'metatext' => htmlspecialchars($input->post('metatext', true)),
				'keywords' => htmlspecialchars($input->post('keywords', true)),
				'description' => htmlspecialchars($input->post('description', true)),
				'sumber' => htmlspecialchars($input->post('sumber', true)),
				'tanggalUpdate' => time(),
				'userId' => $this->session->userdata('idUser')
			];

			$this->Model_member->edit_konfig('t_konfigurasi', $data);
			echo '<script>alert("Berhasil Upload foto")</script>';
			redirect('managementKonfig','refresh');
		}	
	}

	public function viewUser(){
		$data['title'] = 'Data User';
		$data['viewUser'] = $this->Model_member->tampil_user_all()->result_array();
		$data['tMember'] = $this->Model_member->tampil_member('t_member')->result_array();

		$this->view('home/management/view_user', $data, FALSE);
	}

	public function tampil_data_user(){
		$data['viewUser'] = $this->Model_member->tampil_user_all()->result_array();

		$this->load->view('home/management/tampil_user_all', $data, FALSE);
	}

	public function editStatusUser($id){
		// $id = $this->input->post('idUser', true);
		$idUser = ['idUser' => $id];
		$status = $this->input->post('statusUser', true);

		if($status == 'aktif'){
			$ubahStatus = 'nonaktif';
		}else{
			$ubahStatus = 'aktif';
		}

		$data = [
			'statusUser' => $ubahStatus
		];	

		$queryStatus = $this->Model_member->edit_status_user('t_login', $idUser, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

	public function editBlokirUser(){
		// $id = $this->input->post('idUser', true);
		$id = $this->input->post('idUser', true);
		$idUser = ['idUser' => $id];
		$blokirUser = $this->input->post('blokir', true);

		if($blokirUser == 'ya'){
			$blokirUser = 'tidak';
		}else{
			$blokirUser = 'ya';
		}

		$data = [
			'blokir' => $blokirUser
		];	

		$queryBlokir = $this->Model_member->edit_blokir_user('t_login', $idUser, $data);

		if ($queryBlokir == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditBlokir' => $hasil
		];

		echo json_encode($result);
	}

	public function validation(){
		$validation = $this->form_validation;
		$validation->set_rules('namaUser', 'Nama User', 'trim|required');	
		$validation->set_rules('username', 'Username', 'trim|required|is_unique[t_login.username]', [
			'is_unique' => 'Username Sudah Ada!',
			'required' => 'Data Tidak Boleh Koson'
		]);	
		$validation->set_rules('emailUser', 'Email', 'trim|required|is_unique[t_login.emailUser]', [
			'is_unique' => 'Email Sudah Ada!',
			'required' => 'Data Tidak Boleh Koson'
		]);	
		$validation->set_rules('password', 'Nama User', 'trim|required|matches[password2]');	
		$validation->set_rules('password2', 'Nama User', 'trim|required|matches[password]');	
	}

	public function daftarUserAksi(){
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("gagal")</script>';
			redirect('viewUser','refresh');
		} else {
			$input = $this->input;

			$pass = $input->post('password', true);
			$encryptPass = hash('sha512', $pass . config_item('encryption_key'));

			$data = [
				'namaUser' => htmlspecialchars($input->post('namaUser', true)),
				'username' => htmlspecialchars($input->post('username', true)),
				'emailUser' => htmlspecialchars($input->post('emailUser', true)),
				'password' => $encryptPass,
				'tanggalDaftar' => time(),
				'tanggalUpdate' => time(),
				'fotoUser' => 'default.jpg',
				'levelUser' => htmlspecialchars($input->post('levelUser', true)),
				'statusUser' => htmlspecialchars($input->post('statusUser', true)),
				'passwordSalah' => 0,
				'lastLogin' => time(),
				'blokir' => 'tidak',
				'randVerifikasi' => 0,
			];

			$queryInsert = $this->Model_member->add_user('t_login', $data);

			if ($queryInsert == "") {
				echo '<script>alert("berhasil")</script>';
				redirect('viewUser','refresh');
			}else{
				echo '<script>alert("gagal update")</script>';
				redirect('viewUser','refresh');
			}
		}
	}

	public function editUserAksi($id){
		$idUser = ['idUser' => $id];

		$input = $this->input;
		$data = [
			'namaUser' 		=> htmlspecialchars($input->post('namaUser', true)),
			'username' 		=> htmlspecialchars($input->post('username', true)),
			'emailUser' 	=> htmlspecialchars($input->post('emailUser', true)),
			'jenisKelamin' 	=> htmlspecialchars($input->post('jenisKelamin', true)),
			'noTelp' 		=> htmlspecialchars($input->post('noTelp', true)),
			'alamat' 		=> htmlspecialchars($input->post('alamat', true)),
			'tanggalUpdate' => time(),
			'levelUser' 	=> htmlspecialchars($input->post('levelUser', true)),
			'statusUser' 	=> htmlspecialchars($input->post('statusUser', true)),
			'passwordSalah' => 0,
			'blokir' 		=> htmlspecialchars($input->post('blokir', true)),
			'randVerifikasi' => 0,
		];	

		$queryEdit = $this->Model_member->edit_data_user('t_login', $idUser, $data);

		redirect('viewUser','refresh');
	}

	public function hapusUserAksi($id){
		$idUser = ['idUser' => $id];

		$query = $this->Model_member->hapus_data_user('t_login', $idUser);

		if ($query == "") {
			$hasil = "berhasil";
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasil' => $hasil
		];

		echo json_encode($result);
	}

	public function tampilAgent(){
		$data['title'] = "Data Agent Pengguna";
		$data['tAgent'] = $this->Model_member->tampil_agent('t_agent_user')->result_array();

		$this->view('home/management/tampil_agent', $data, FALSE);
	}

	public function tampilMenu(){
		$data['title'] = "Data Menu";
		$data['tampilMenu'] = $this->Model_menu->tampil_data_menu('t_menu')->result_array();
		$data['tMember'] = $this->Model_member->tampil_member('t_member')->result_array();

		$this->view('home/management/tampil_menu', $data, FALSE);	
	}

	public function editStatusMenu($id){
		$idMenu = ['idMenu' => $id];
		$statusMenu = $this->input->post('statusMenu', true);

		if($statusMenu == 'publish'){
			$ubahStatus = 'sembunyikan';
		}else{
			$ubahStatus = 'publish';
		}

		$data = [
			'statusMenu' => $ubahStatus
		];	

		$queryStatus = $this->Model_menu->edit_status_menu('t_menu', $idMenu, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

	public function editStatusUrut($id){
		$idMenu = ['idMenu' => $id];
		$statusUrut = $this->input->post('urutMenu', true);

		$data = [
			'urutMenu' => $statusUrut
		];	

		$queryStatus = $this->Model_menu->edit_status_menu('t_menu', $idMenu, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

	public function editStatusLevel($id){
		$idMenu = ['idMenu' => $id];
		$statusLevel = $this->input->post('levelUserAccess', true);

		$data = [
			'levelUserAccess' => $statusLevel
		];	

		$queryStatus = $this->Model_menu->edit_status_menu('t_menu', $idMenu, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

	public function editStatusIcon($id){
		$idMenu = ['idMenu' => $id];
		$statusIcon = $this->input->post('iconMenu', true);

		$data = [
			'iconMenu' => $statusIcon
		];	

		$queryStatus = $this->Model_menu->edit_status_menu('t_menu', $idMenu, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

	public function editMenu($id){
		$idMenu = ['idMenu' => $id];
		$validation = $this->form_validation;

		$validation->set_rules('namaMenu', 'Nama Menu', 'trim|required');	
		$validation->set_rules('linkDropdown', 'Link Dropdown', 'trim|required');	
		$validation->set_rules('iconMenu', 'Menu Icon', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			echo '<script>alert("Gagal Memperbarui Menu!!!")</script>';
			redirect('managementMenu','refresh');
		} else {
			$input = $this->input;
			$data = [
				'namaMenu' => htmlspecialchars($input->post('namaMenu', true)),
				'linkDropdown' => htmlspecialchars($input->post('linkDropdown', true)),
				'iconMenu' => htmlspecialchars($input->post('iconMenu', true)),
				'statusMenu' => htmlspecialchars($input->post('statusMenu', true)),
				'urutMenu' => htmlspecialchars($input->post('urutMenu', true)),
				'levelUserAccess' => htmlspecialchars($input->post('levelUserAccess', true))
			];

			$hasilQuery = $this->Model_menu->edit_status_menu('t_menu', $idMenu, $data);

			if ($hasilQuery == '') {
				echo '<script>alert("Berhasil Memperbarui Menu!!!")</script>';
				redirect('managementMenu','refresh');
			}else{
				echo '<script>alert("gagal Query!!!")</script>';
				redirect('managementMenu','refresh');
			}

		}	
	}

	public function editStatusUrutSub($id){
		$idSubmenu = ['idSubmenu' => $id];
		$statusUrut = $this->input->post('urutSubmenu', true);

		$data = [
			'urutSubmenu' => $statusUrut
		];	

		$queryStatus = $this->Model_menu->edit_status_menu('t_submenu', $idSubmenu, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

	public function editStatusSubmenu($id){
		$idSubmenu = ['idSubmenu' => $id];
		$statusSubmenu = $this->input->post('statusSubmenu', true);

		if($statusSubmenu == 'publish'){
			$ubahStatus = 'sembunyikan';
		}else{
			$ubahStatus = 'publish';
		}

		$data = [
			'statusSubmenu' => $ubahStatus
		];	

		$queryStatus = $this->Model_menu->edit_menu('t_submenu', $idSubmenu, $data);

		if ($queryStatus == "") {
			$hasil = 'berhasil';
		}else{
			$hasil = 'gagal';
		}

		$result = [
			'hasilEditStatus' => $hasil
		];

		echo json_encode($result);
	}

}

/* End of file manageaManagemenUsers.php */
/* Location: ./application/controllers/Home/manageaManagemenUsers.php */