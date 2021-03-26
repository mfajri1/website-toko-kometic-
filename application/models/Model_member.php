<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_Model {

	public function tampil_member($table){
		return $this->db->select('*')->from($table)->get();	
	}

	public function tampil_user_all(){
		$this->db->select('
			tl.*,
			tm.*
		');
		$this->db->from('t_login tl');
		$this->db->join('t_member tm', 'tl.levelUser = tm.idMember', 'left');
		$this->db->group_by('tl.idUser', 'asc');
		return $this->db->get();	
	}

	public function edit_status_user($table, $id, $object){
		$this->db->set($object);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function edit_blokir_user($table, $id, $object){
		$this->db->set($object);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function add_user($table, $data){
		$this->db->insert($table, $data);	
	}

	public function edit_data_user($table, $id, $object){
		$this->db->set($object);
		$this->db->from($table);
		$this->db->where($id);
		$this->db->update();	
	}

	public function hapus_data_user($table, $id){
		$this->db->where($id);
		$this->db->from($table);
		$this->db->delete();	
	}


	public function tampil_konfig($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('idKonfig', 1);
		return $this->db->get();
	}

	public function tampil_konfig_all($table){
		$this->db->select('
			tk.*,
			tl.namaUser
		');
		$this->db->from('t_konfigurasi tk');
		$this->db->join('t_login tl', 'tl.idUser = tk.userId', 'left');
		return $this->db->get();
	}

	public function edit_konfig($table, $data){
		$this->db->set($data);
		$this->db->from($table);
		$this->db->where('idKonfig',1);
		$this->db->update();	
	}

	public function tampil_agent($table){
		$this->db->select('
			ta.*,
			tl.namaUser
		');
		$this->db->from('t_agent_user ta');
		$this->db->join('t_login tl', 'tl.idUser = ta.userId', 'left');
		return $this->db->get();	
	}

}

/* End of file Model_member.php */
/* Location: ./application/models/Model_member.php */