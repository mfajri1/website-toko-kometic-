<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/vendor/fzaninotto/Faker/src/autoload.php';

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		aksesLogin();
	}

	public function view($base, $data='null', $boolean){
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

	public function tampilProfile(){
		$idUser = ['idUser' => $this->session->userdata('idUser')];
		$data['title'] = 'Halaman Profile User';

		$this->view('home/profile/tampil_profile', $data, FALSE);
	}

	public function editFotoProfile($id){
		// var_dump($id);die();
		$idUser = ['idUser' => $id];

		$user = $this->Model_user->tampil_user('t_login', $id)->row_array();
		if ($user['fotoUser'] != '') {
			unlink('./assets/admin/uploads/users/' . $user['fotoUser']);
		}
		
		// helper
		_uploadGambar('users'); 

		if ( ! $this->upload->do_upload('fotoUser')){
			$error = array('error' => $this->upload->display_errors());
			// $hasilUpload = array('error' => $this->upload->display_errors());
			redirect('profile','refresh');
		}else{
			$uploadFotoUser = $this->upload->data();

			//thumbnail
			// helper
			_createThumbs($uploadFotoUser, 'users');

			$session = $this->session;

			$data = [
				'username' => $session->userdata('username'),
				'emailUser' => $session->userdata('emailUser'),
				'tanggalUpdate' => time(),
				'fotoUser' => $uploadFotoUser['file_name']
			];

			$resultUpload = $this->Model_user->upload_foto_user('t_login', $idUser, $data);


			if ($resultUpload == '') {
				// $hasilUpload = 'berhasil';
				echo '<script>alert("berhasil Update");</script>';
				redirect('profile','refresh');
			}else{
				// $hasilUpload = 'gagal';
				echo '<script>alert("gagal Update");</script>';
				redirect('profile','refresh');
			}
		}

		// $result = [
		// 	'hasil' => $hasilUpload
		// ];

		// echo json_encode($result);
			
	}

	public function validation(){
		$validation = $this->form_validation;

		$validation->set_rules('namaUser', 'Nama User', 'trim|required');	
		$validation->set_rules('emailUser', 'Email User', 'trim|required');		
	}

	public function editDataProfile($id){
		$idUser = ['idUser' => $id];

		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$hasil = 'gagal';
		} else {
			$input = $this->input;
			$data = [
				'namaUser' => htmlspecialchars($input->post('namaUser', true)),
				'username' => htmlspecialchars($input->post('username', true)),
				'emailUser' => htmlspecialchars($input->post('emailUser', true)),
				'jenisKelamin' => htmlspecialchars($input->post('jenisKelamin', true)),
				'noTelp' => htmlspecialchars($input->post('noTelp', true)),
				'alamat' => htmlspecialchars($input->post('alamat', true)),
				'tanggalUpdate' => time()
			];

			$queryEdit = $this->Model_user->edit_data_profile('t_login', $idUser, $data);

			$hasil = 'berhasil';
		}

		$result = [
			'hasilEdit' => $hasil
		];

		echo json_encode($result);
	}

	public function setting(){
		$data['title'] = 'Edit Password';

		$this->view('home/profile/setting_account', $data, FALSE);
	}

	public function settingAksi(){
		$id = $this->input->post('idUser', true);
		$idUser = ['idUser' => $id];
		$password = $this->input->post('password', true);
		$encryptpassword = hash('sha512', $password . config_item('encryption_key'));

		$data = [
			'password' => $encryptpassword
		];

		$queryEdit = $this->Model_user->edit_password('t_login', $data, $idUser);

		if ($queryEdit != '') {
			$hasil = 'gagal';
		}else{
			$hasil = 'berhasil';
		}

		$result = [
			'hasilEditPass' => $hasil
		];

		echo json_encode($result);
	}


}

/* End of file Profile.php */
/* Location: ./application/controllers/Home/Profile.php */