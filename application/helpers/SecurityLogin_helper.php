<?php 

	function __construct(){
		$CI = get_instance();

		$CI->load->model('Model_auth');
	}

	function aksesLogin(){
		$CI = get_instance();

		$username = $CI->session->userdata('username');
		$statusUser = $CI->session->userdata('statusUser');
		// $levelUser = $CI->session->userdata('levelUser');

		if ($username == ""){
			redirect('login','refresh');
		}else if($CI->uri->segment(1) == 'login' || $CI->uri->segment(1) == 'daftar' && $username != ""){
			redirect('home','refresh');
		}

		if ($statusUser == 'nonaktif') {
			redirect('login','refresh');
		}

	}

	function _sendEmail ($emailUser , $randVerifikasi){
		$CI = get_instance();
		// konfigurasi send email

		// daftarkan akun email anda ke dalam https://mailtrap.io/
		$config['mailtype']  = 'html'; // menentukan type pesan yang dikirim
		$config['useragent'] = 'Codeigniter';
	    $config['charset'] 	 = 'utf-8';  
		$config['protocol']  = 'smtp'; // menentukan lewat protokol apa dikirim
		$config['smtp_host'] = 'ssl://smtp.gmail.com'; //url smtp  
	    $config['smtp_user'] = 'farhanfitriadi60@gmail.com'; // akun pengirim  
	    $config['smtp_pass'] = 'nehcsptho070'; //password gmail pengirim  
	    $config['smtp_port'] = 465; //smtp port number  
	    $config['wordwrap']  = TRUE;  
	    $config['newline']   = "\r\n"; //use double quotes
	    $config['crlf']		 = "\r\n";

	    // Load library email dan konfigurasinya
	    $CI->email->initialize($config);

	    // Load library email dan konfigurasinya
	    $CI->load->library('email', $config);
		
		$CI->email->from('farhanfitriadi60@gmail.com', 'Batra'); //dari
		$CI->email->to($emailUser); // tujuan
		/*	
		- kedua ini optional 
		$CI->email->cc('another@example.com');
		$CI->email->bcc('and@another.com');*/
		
		$CI->email->subject('Email Verifikasi'); // judul

		// Lampiran email, isi dengan url/path file
		// $CI->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

		// halaman tujuan untuk verifikasi email
	    // halaman base Tujuan ketika meklik tombol di emailnya
	    $url = base_url('verifikasiDaftar/') . base64_encode($emailUser) . '/' . $randVerifikasi;
		// isi pesan
		$message = "<html><head><title>Halaman Verifikasi Email</title></head><body><p>Hi,</p><p>Trimakasih Sudah Melakukan Konfirmasi Untuk Melakukan Verifikasi Email.</p><p>Tolong Tekan Tombol Ini Untuk Melakukan Verifikasi Email.</p><a href='" . $url . "' target='_blank'>Link Ini</a><br/><p>Batra Cosmetick Team</p></body></html>";
		$CI->email->message($message);
		// echo $CI->email->print_debugger(); //tes debugs

		if ($CI->email->send() == FALSE) {
			$hasil = 'Email Error';
		}
	}






	
 ?>