<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function tampil_user($id){
		$this->db->select('
			tm.*,
			tl.*
		');
		$this->db->from('t_login tl');
		$this->db->join('t_member tm', 'tm.idMember = tl.levelUser', 'left');
		$this->db->where('tl.idUser', $id);
		return $this->db->get();	
	}

	public function upload_foto_user($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);
	}

	public function edit_data_profile($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function edit_password($table, $data, $id){
		$this->db->where($id);	
		$this->db->update($table, $data);
	}

}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */