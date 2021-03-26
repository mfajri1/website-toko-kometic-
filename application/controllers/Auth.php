<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// aksesLogin();
	}

	public function view($base, $data, $boolean){
		$load = $this->load;
		$data['konfig'] = $this->Model_member->tampil_konfig('t_konfigurasi')->row_array();
		$load->view('template_admin/scriptHeader', $data, $boolean);
		$load->view('template_login/header.php', $data, FALSE);
		$load->view($base, $data, $boolean);	
		$load->view('template_login/footer.php', $data, FALSE);
		$load->view('template_admin/scriptFooter', $data, $boolean);	
	}
	
	

	public function daftar(){
		$data['title'] = 'Halaman Daftar';
		$this->view('auth/halaman_daftar', $data, FALSE);		
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
		$validation->set_rules('password', 'Nama User', 'trim|required|matches[password]');	
	}

	/*
	// mengirim verifikasi email dengan bantuan mailtrap.io
	public function daftarAksi(){
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$hasil = 'gagal';
		}else{
			$emailUser = $this->input->post('emailUser', true);

			// mengubah inputan password jadi kode hash
			$pass = $this->input->post('password', true);
			$encryptPass = hash('sha512', $pass . config_item('encryption_key'));

			// konfigurasi send email

			// daftarkan akun email anda ke dalam https://mailtrap.io/
			$config['mailtype']  = 'html'; // menentukan type pesan yang dikirim
		    $config['charset'] 	 = 'utf-8';  
			$config['protocol']  = 'smtp'; // menentukan lewat protokol apa dikirim
			$config['smtp_host'] = 'smtp.mailtrap.io'; //url smtp  
		    $config['smtp_user'] = 'fcee14fd73410e'; // akun pengirim  
		    $config['smtp_pass'] = '9bcf73c9b28864'; //password pengirim  
		    $config['smtp_port'] = 2525; //smtp port number  
		    $config['wordwrap']  = TRUE;  
		    $config['newline']   = "\r\n"; //use double quotes
		    $config['crlf']		 = "\r\n";

		    // Load library email dan konfigurasinya
		    $this->email->initialize($config);

		    // Load library email dan konfigurasinya
		    $this->load->library('email', $config);
			
			$this->email->from('farhanfitriadi60@gmail.com', 'Batra'); //dari
			$this->email->to($emailUser); // tujuan
				
			//- kedua ini optional 
			//$this->email->cc('another@example.com');
			//$this->email->bcc('and@another.com');
			
			$this->email->subject('Email Verifikasi'); // judul

			// Lampiran email, isi dengan url/path file
			// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

			// halaman tujuan untuk verifikasi email
		    // halaman base Tujuan ketika meklik tombol di emailnya
		    $url = base_url('Auth/verifikasiDaftar/') . base64_encode($emailUser);
			// isi pesan
			$message = "<html><head><title>Halaman Verifikasi Email</title></head><body><p>Hi,</p><p>Trimakasih Sudah Melakukan Konfirmasi Untuk Melakukan Verifikasi Email.</p><p>Tolong Tekan Tombol Ini Untuk Melakukan Verifikasi Email.</p><a href='".$url."' target='_blank'>Link Ini</a><br/><p>Batra Cosmetick Team</p></body></html>";
			$this->email->message($message);
			// echo $this->email->print_debugger(); //tes debugs

			if ($this->email->send()) {
				$input = $this->input;
				$data = [
					'namaUser' => htmlspecialchars($input->post('namaUser', true)),
					'username' => htmlspecialchars($input->post('username', true)),
					'emailUser' => $emailUser,
					'password' => $encryptPass,
					'tanggalDaftar' => time(),
					'tanggalUpdate' => time(),
					'levelUser'	=> 'operator',
					'statusUser' => 'nonaktif',
					'passwordSalah' => 0,
					'lastLogin' => time(),
					'blokir' => 'tidak'
				];

				$queryInsert = $this->Model_auth->tambah_data('t_login', $data);

				$hasil = $queryInsert;

			}else{
				$hasil = 'Email Error';
			}
		}

		$result = [
			'hasil' => $hasil
		];

		echo json_encode($result);
	}
	*/

	//ngirim verifikasi dengan smtp local server
	public function daftarAksi(){
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			$hasil = 'gagal';
		}else{
			// mengirim data ketika mengirim verifikasi email 
			$emailUser = $this->input->post('emailUser', true);
			// mengirimkan angka acak
			$randVerifikasi = mt_rand(1000, 9999); 

			// mengubah inputan password jadi kode hash
			$pass = $this->input->post('password', true);
			$encryptPass = hash('sha512', $pass . config_item('encryption_key'));


			$input = $this->input;
			$data = [
				'namaUser' => htmlspecialchars($input->post('namaUser', true)),
				'username' => htmlspecialchars($input->post('username', true)),
				'emailUser' => $emailUser,
				'password' => $encryptPass,
				'tanggalDaftar' => time(),
				'tanggalUpdate' => time(),
				'fotoUser' => 'default.jpg',
				'levelUser'	=> 3,
				'statusUser' => 'nonaktif',
				'passwordSalah' => 0,
				'lastLogin' => 0,
				'blokir' => 'tidak',
				'randVerifikasi' => $randVerifikasi
			];

			$queryInsert = $this->Model_auth->tambah_data('t_login', $data);

			$hasil = $queryInsert;

			// function kirim verifikasi Email
			_sendEmail($emailUser, $randVerifikasi);
		
		}

		$result = [
			'hasil' => $hasil
		];

		echo json_encode($result);
	}

	public function verifikasiDaftar($emailUser, $randVerifikasi){
		$emailDes = base64_decode($emailUser);
		$dataGet = ['emailUser' => $emailDes, 'randVerifikasi' => $randVerifikasi];

		$data = [
			'statusUser' => 'aktif'
		];

		$updateActiv = $this->Model_auth->activasi('t_login', $data, $dataGet);

		if ($updateActiv = '') {
			echo '<script>alert("gagal aktifasi / Hubungi Admin !!!");</script>';
			redirect('login','refresh');
		}else{
			echo '<script>alert("Berhasil Aktivasi");</script>';
			$dataEmail = ['emailUser' => $emailDes];
			$randVerif = [ 'randVerifikasi' => '0' ];
			$updateActiv = $this->Model_auth->updateActivasi('t_login', $randVerif, $dataEmail);
			redirect('login','refresh');
		}	
	}


	// login
	public function login()
	{
		$data['title'] = "Halaman Login";
		$this->view('auth/halaman_login', $data, FALSE);
	}

	public function validationLogin(){
		$validation = $this->form_validation;
		// $data['userLogin'] = $this->model_register->tampil_user($this->_tableLogin)->result_array();
		$validation->set_rules('username', 'username', 'trim|required',[
			'required' => 'Data Tidak Boleh Kosong'
		]);
		$validation->set_rules('password','Password','trim|required|min_length[3]');
	}

	public function loginAksi(){
		$this->validationLogin();

		if ($this->form_validation->run() == FALSE) {
			redirect('login','refresh');
		} else {
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
			$passEncrypt = hash('sha512', $password . config_item('encryption_key'));

			$hasil = $this->library_login->proses_login($username, $passEncrypt);

			
		}

		echo json_encode($hasil);
		
	}

	public function logout(){
		$this->session->sess_destroy();
		// redirect('login','refresh');	
		echo "berhasil-logout";
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */