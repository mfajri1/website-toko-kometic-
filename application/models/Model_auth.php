<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

	public function tambah_data($table, $object){
		$this->db->insert($table, $object);

		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}	

	public function activasi($table, $object, $dataGet){
		$this->db->set($object);
		$this->db->from($table);
		$this->db->where($dataGet);
		$this->db->update();	
	}

	public function updateActivasi($table, $object, $dataEmail){
		$this->db->set($object);
		$this->db->from($table);
		$this->db->where($dataEmail);
		$this->db->update();	
	}

	// login
	public function check_login($username, $passEncrypt){
		$this->db->select('
			t_member.*,
			t_login.*
		');
		$this->db->from('t_login');
		$this->db->join('t_member', 't_member.idMember = t_login.levelUser', 'left');
		$this->db->where([
			'username' => $username,
			'password' => $passEncrypt
		]);
		return $this->db->get();	
	}

	public function cek_username($table, $username){
		$this->db->select('
			t_member.*,
			t_login.*
		');
		$this->db->from('t_login');
		$this->db->join('t_member', 't_member.idMember = t_login.levelUser', 'left');
		$this->db->where('username', $username);
		return $this->db->get();	
	}

	public function update_passwordSalah($table, $username, $dataPasswordSalah){
		$data_pass_salah = [
			'passwordSalah' => $dataPasswordSalah
		];
		$this->db->where('username', $username);
		$this->db->update($table, $data_pass_salah);	
	}

	public function update_blokir($table, $username){
		$dataBlokir = [
			'blokir' => 'ya'
		];	
		$this->db->where('username', $username);
		$this->db->update($table, $dataBlokir);
	}

	public function update_lastLogin($table, $dataLastLogin, $username){
		$this->db->where('username', $username);
		$this->db->update($table, $dataLastLogin);	
	}

	public function tambah_agent($table, $data){
		$this->db->insert($table, $data);	
	}

}

/* End of file Model_daftar.php */
/* Location: ./application/models/Model_daftar.php */