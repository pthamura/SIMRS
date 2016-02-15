<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apotik_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function getObatApotik($id = FALSE){
		if ($id === FALSE) {
			$query = $this->db->get('db_apotik_obat');
			return $query->result();
		}
		$query = $this->db->get_where('db_apotik_obat', array('id_apotik_obat' => $id));
		return $query->row();
	}
	public function selectIn($id_obat){
		$this->db->select('*');
		$this->db->from('db_apotik_obat');
		$this->db->where_in('id_apotik_obat', $id_obat);
		$query = $this->db->get();
		return $query->result();
	}
	public function setObatApotik($data){
		$this->db->insert_batch('db_apotik_obat', $data);
	}
	public function setObatApotikKeluar($data){
		$this->db->insert_batch('db_apotik_obat_keluar', $data);
	}
	public function updateApotikObat($id, $data_update){
		$this->db->where('id_apotik_obat', $id);
		$this->db->update('db_apotik_obat', $data_update);
	}
}

/* End of file Apotik_model.php */
/* Location: ./application/models/Apotik_model.php */