<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	public function tambah_barang_transaksi($table, $data){
		$this->db->insert_batch($table, $data);	
	}

	public function get_data_complete($table, $kode){
		// $this->db->select('*');
		// $this->db->from($table);
		$this->db->like('kodeBarang', $kode , 'both');
		$this->db->order_by('kodeBarang', 'ASC');
		$this->db->limit(10);
		return $this->db->get($table);
	}

	public function hapus_transaksi_all($table, $id){
		$this->db->where_in('idTransaksi', $id);
		$this->db->delete($table);	
	}

	public function tampil_ajax($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);
		return $this->db->get();	
	}

	public function filter_list($table, $tAwal, $tAkhir){
		$query = "SELECT * FROM `t_transaksi` WHERE `tanggalOrder` BETWEEN '$tAwal' AND '$tAkhir'";
		$result = $this->db->query($query);
		return $result;
		
	}


	// all
	public function tampil_data($table){
		$this->db->select('*');
		$this->db->from($table);
		return $this->db->get();
	}

	public function tambah_data($table, $data){
		$this->db->insert($table, $data);	
	}

	

}

/* End of file Model_transaksi.php */
/* Location: ./application/models/Model_transaksi.php */