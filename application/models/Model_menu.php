<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_menu extends CI_Model {

	public function tampil_menu($levelUser){
		$this->db->select('
			t_menu.*,
			t_access.*,
			t_login.*
		');
		$this->db->from('t_menu');
		$this->db->join('t_login', 't_menu.levelUserAccess = t_login.levelUser', 'left');
		$this->db->join('t_access', 't_menu.levelUserAccess = t_access.AccessLevelUser', 'left');
		$this->db->where([
			't_access.userLevel' => $levelUser,
			't_menu.statusMenu' => 'publish'
		]);
		$this->db->group_by('t_menu.idMenu');
		$this->db->order_by('t_menu.urutMenu', 'asc');
		return $this->db->get();	
	}	

	public function tampil_data_menu($table){
		$this->db->select('
			tm.*,
			tmem.member
		');
		$this->db->from('t_menu tm');
		$this->db->join('t_member tmem', 'tmem.idMember = tm.levelUserAccess', 'left');
		return $this->db->get();	
	}

	public function edit_status_menu($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function edit_menu($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}
}

/* End of file Model_menu.php */
/* Location: ./application/models/Model_menu.php */