<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekammedis_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getRM($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_rekam_medis as C', 'A.id_pasien = C.id_pasien'); 
        $this->db->where('A.id_pasien', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getRMDaftar($id){
        $this->db->select_max('proses');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_rekam_medis as C', 'A.id_pasien = C.id_pasien'); 
        $this->db->where('C.id_pendaftaran', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function setRM($dataRM){
        $this->db->insert('db_rekam_medis', $dataRM);
    }
}

/* End of file Rekammedis_model.php */
/* Location: ./application/models/Rekammedis_model.php */