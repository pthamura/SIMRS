<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	// obat
	public function getGudangObat($id = FALSE){
		if ($id === FALSE) {
			$query = $this->db->get('db_gudang_obat');
			return $query->result();
		}
		$query = $this->db->get_where('db_gudang_obat', array('id_gudang_obat' => $id));
		return $query->row();
	}
	public function selectIn($id_obat){
		$this->db->select('*');
		$this->db->from('db_gudang_obat');
		$this->db->where_in('id_gudang_obat', $id_obat);
		$query = $this->db->get();
		return $query->result();
	}
	public function setGudangObat($data){
		$this->db->insert_batch('db_gudang_obat', $data);
	}
	public function setGudangObatKeluar($data){
		$this->db->insert_batch('db_gudang_obat_keluar', $data);
	}
	public function updateGudangObat($id, $data_update){
		$this->db->where('id_gudang_obat', $id);
		$this->db->update('db_gudang_obat', $data_update);
	}
	// alat kesehatan
	public function getGudangAlkes($id = FALSE){
		if ($id === FALSE) {
			$query = $this->db->get('db_gudang_alkes');
			return $query->result();
		}
		$query = $this->db->get_where('db_gudang_alkes', array('id_gudang_alkes' => $id));
		return $query->row();
	}
	public function selectInAlkes($id_alkes){
		$this->db->select('*');
		$this->db->from('db_gudang_alkes');
		$this->db->where_in('id_gudang_alkes', $id_alkes);
		$query = $this->db->get();
		return $query->result();
	}
	public function setGudangAlkes($data){
		$this->db->insert_batch('db_gudang_alkes', $data);
	}
	public function setGudangAlkesKeluar($data){
		$this->db->insert_batch('db_gudang_alkes_keluar', $data);
	}
	public function updateGudangAlkes($id, $data_update){
		$this->db->where('id_gudang_alkes', $id);
		$this->db->update('db_gudang_alkes', $data_update);
	}
	// oksigen
	public function getGudangOksigen($id = FALSE){
		if ($id === FALSE) {
			$query = $this->db->get('db_gudang_oksigen');
			return $query->result();
		}
		$query = $this->db->get_where('db_gudang_oksigen', array('id_gudang_oksigen' => $id));
		return $query->row();
	}
	public function setGudangOksigenMasuk($data){
		$this->db->insert_batch('db_gudang_oksigen_masuk', $data);
	}
	public function setGudangOksigenKeluar($data){
		$this->db->insert_batch('db_gudang_oksigen_keluar', $data);
	}
	public function updateGudangOksigen($dataO2){
		$this->db->where('id_gudang_oksigen', 1);
		$this->db->update('db_gudang_oksigen', $dataO2);
	}
}

/* End of file Gudang_model.php */
/* Location: ./application/models/Gudang_model.php */