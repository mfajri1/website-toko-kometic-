<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		aksesLogin();
	}

	public function view($base, $data, $boolean){
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

	public function tampilDashboard()
	{
		$data['title'] = 'Halaman Dashboard';

		$this->view('home/tampil_dashboard', $data, FALSE);

		// $this->load->view('tes', $data, FALSE);
		
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */