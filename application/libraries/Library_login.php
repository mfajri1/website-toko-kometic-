<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->model('Model_auth');
	}

	public function proses_login($username, $passEncrypt){
		$cek = $this->CI->Model_auth->check_login($username, $passEncrypt)->row_array();

		if (empty($cek)) {
			$hasilCek = 'gagalCek';
			$cekUsername = $this->CI->Model_auth->cek_username('t_login', $username)->row_array();
			$salahPassword = $cekUsername['passwordSalah'] + 1;
			$updatePasswordSalah = $this->CI->Model_auth->update_passwordSalah('t_login', $username, $salahPassword);
			if($cekUsername['passwordSalah'] >= 3){
				$updateBlokir = $this->CI->Model_auth->update_blokir('t_login', $username);
				$salahPassword = 0;
				$updatePasswordSalah = $this->CI->Model_auth->update_passwordSalah('t_login', $username, $salahPassword);

				$hasilCek 			= 'gagalCek';
				$hasilPasswordSalah = $cekUsername['passwordSalah'];
				$hasilBlokir 		= $cekUsername['blokir'];
				$hasilStatusUser 	= 'none';
				$hasilLevelUser 	= "none";
			}else{
				$hasilCek 			= 'gagalCek';
				$hasilPasswordSalah = $cekUsername['passwordSalah'];
				$hasilBlokir 		= $cekUsername['blokir'];
				$hasilStatusUser 	= 'none';
				$hasilLevelUser 	= 'none';
			}
		}else{
			$hasilCek = 'berhasilCek';
			$salahPassword = 0;
			$updatePasswordSalah = $this->CI->Model_auth->update_passwordSalah('t_login', $username, $salahPassword);

			$cekUsername = $this->CI->Model_auth->cek_username('t_login', $username)->row_array();

			if ($cek['blokir'] == 'tidak') {
				$hasilBlokir = $cek['blokir'];
				$hasilPasswordSalah = "";

				if($cek['statusUser'] == 'nonaktif'){
					$hasilCek 			= 'berhasilCek';
					$hasilPasswordSalah = "";
					$hasilBlokir 		= $cek['blokir'];
					$hasilStatusUser  	= $cek['statusUser'];
					$hasilLevelUser 	= $cek['member'];

				}else{
					$hasilStatusUser = $cek['statusUser'];
					$sessionData = [
						'idUser' 	=> $cek['idUser'],
						'namaUser' 	=> $cek['namaUser'],
						'username' 	=> $cek['username'],
						'emailUser' => $cek['emailUser'],
						'levelUser' => $cek['levelUser'],
						'fotoUser' 	=> $cek['fotoUser'],
						'statusUser' 	=> $cek['statusUser'],
					];


					$this->CI->session->set_userdata($sessionData);

					if($this->CI->session->userdata('member') == 'admin'){
						$hasilLevelUser = $cek['levelUser'];
					}else if($this->CI->session->userdata('member') == 'operator'){
						$hasilLevelUser = $cek['member'];
					}else{
						$hasilLevelUser = $cek['member'];
					}

					$browser = $this->CI->agent->browser() . ' ' . $this->CI->agent->version();
					$os = $this->CI->agent->platform();
					$ip = $this->CI->input->ip_address();

					// mengambl link tempat user masuk web
					$dataAgent = [
						'userId' => $this->CI->session->userdata('idUser'),
						'tanggal' => time(),
						'browser' => $browser,
						'os' => $os,
						'ipAddress' => $ip
					];

					$this->CI->Model_auth->tambah_agent('t_agent_user', $dataAgent);

					$dataLastLogin = [
						'lastLogin' => time(),
					];

					$this->CI->Model_auth->update_lastLogin('t_login', $dataLastLogin, $username);
				}
			}else{
				$hasilCek 			= 'berhasilCek';
				$hasilPasswordSalah = "";
				$hasilBlokir 		= $cek['blokir'];
				$hasilStatusUser  	= $cek['statusUser'];
				$hasilLevelUser 	= $cek['member'];	
			}	
		}

		$hasilLogin = [
			'hasilPasswordSalah' 	=> $hasilPasswordSalah,
			'hasilBlokir' 			=> $hasilBlokir,
			'hasilCek' 				=> $hasilCek,
			'hasilStatusUser' 		=> $hasilStatusUser,
			'hasilLevelUser' 		=> $hasilLevelUser,
		];

		return $hasilLogin;
	}

	

}

/* End of file Library_login.php */
/* Location: ./application/libraries/Library_login.php */
