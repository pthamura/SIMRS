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
	public function setObatApotik($data){
		$this->db->insert_batch('db_apotik_obat', $data);
	}
}

/* End of file Apotik_model.php */
/* Location: ./application/models/Apotik_model.php */