<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
    // total tagihan pemeriksaan
    public function getToTg($id, $id_pendaftaran){
        $this->db->select_sum('biaya');
        $query = $this->db->get_where('db_tagihan', array('id_pasien' => $id, 'id_pendaftaran' => $id_pendaftaran));
        return $query->row();
    }
    // total tagihan resep
    public function getToRs($id, $id_pendaftaran){
        $this->db->select_sum('harga');
        $query = $this->db->get_where('db_tagihan_resep', array('id_pasien' => $id, 'id_pendaftaran' => $id_pendaftaran));
        return $query->row();
    }
    public function getTagihan($id, $id_pendaftaran){
        $query = $this->db->get_where('db_tagihan', array('id_pasien' => $id, 'id_pendaftaran' => $id_pendaftaran));
        return $query->result();
    }
	public function getTagihanResep($id, $id_pendaftaran){
		$query = $this->db->get_where('db_tagihan_resep', array('id_pasien' => $id, 'id_pendaftaran' => $id_pendaftaran));
		return $query->result();
	}
    public function setTagihan($dataTg){
        $this->db->insert('db_tagihan', $dataTg);
    }
    public function setTotalTagihan($dataToTg){
        $this->db->insert('db_total_tagihan', $dataToTg);
    }
    public function setTgObat($data){
        $this->db->insert('db_tagihan_resep', $data);
    }
    public function updateTotalTagihan($id, $id_pendaftaran, $data){
        $this->db->where('id_pasien', $id);
        $this->db->where('id_pendaftaran', $id_pendaftaran);
        $this->db->update('db_total_tagihan', $data);
    }
}

/* End of file Tagihan_model.php */
/* Location: ./application/models/Tagihan_model.php */