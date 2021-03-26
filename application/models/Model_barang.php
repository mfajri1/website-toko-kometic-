<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Model {

	public function tampil_barang($table){
		$this->db->select('
			tb.*,
			ts.namaSatuan,
			tk.kodeKategori,
			tk.namaKategori,
			tsup.namaSuplier
		');
		$this->db->from('t_barang tb');
		$this->db->join('t_kategori_barang tk', 'tk.idKategori = tb.kategoriId', 'left');
		$this->db->join('t_satuan ts', 'ts.idSatuan = tb.satuanId', 'left');
		$this->db->join('t_suplier tsup', 'tsup.idSuplier = tb.suplierId', 'left');
		$this->db->group_by('tb.idBarang');
		return $this->db->get();	
	}

	public function detail_gambar($table, $id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id);	
		return $this->db->get();
	}

	public function hapus_all_gambar($table, $id){
		$this->db->where_in('idBarang', $id);
		return $this->db->get($table);	
	}

	public function print_data($table){
		$this->db->select('
			tb.*,
			tk.namaKategori,
			ts.namaSatuan,
			ts.kodeSatuan,
			tsup.namaSuplier
		');
		$this->db->from('t_barang tb');
		$this->db->join('t_kategori_barang tk', 'tk.idKategori = tb.kategoriId', 'left');
		$this->db->join('t_satuan ts', 'ts.idSatuan = tb.satuanId', 'left');
		$this->db->join('t_suplier tsup', 'tsup.idSuplier = tb.suplierId', 'left');
		$this->db->order_by('suplierId', 'desc');
		$this->db->order_by('namaBarang', 'AsC');
		return $this->db->get();	
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

	public function edit_data($table, $id, $data){
		$this->db->where($id);
		$this->db->update($table, $data);	
	}

	public function hapus_data($table, $id){
		$this->db->where($id);
		$this->db->delete($table);	
	}

	public function hapus_all($table, $id, $idString){
		$this->db->where_in($idString, $id);
		$this->db->delete($table);	
	}
	

}

/* End of file Model_barang.php */
/* Location: ./application/models/Model_barang.php */