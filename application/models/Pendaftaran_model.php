<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getPendaftaran($id = FALSE){
        $hari_mulai = date('Y-m-d').' 00:00:00';
        // $hari_selesai = date('Y-m-d').' 23:59:59';
        if($id === FALSE){
            $this->db->select('*');
            $this->db->from('db_pasien as A');
            $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien'); 
            $this->db->join('db_poli as C', 'B.id_poli = C.id_poli', 'LEFT');
            $this->db->join('db_total_tagihan as D', 'B.id_pendaftaran = D.id_pendaftaran');
            $this->db->where('B.tgl_daftar >=', $hari_mulai); 
            $this->db->order_by('B.tgl_daftar', 'DESC'); 
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_poli as C', 'B.id_poli = C.id_poli', 'LEFT'); 
        $this->db->join('db_total_tagihan as D', 'B.id_pendaftaran = D.id_pendaftaran');
        $this->db->where('A.id_pasien', $id); 
        $query = $this->db->get();
        return $query->row();
    }
    public function getNoRM(){
        $this->db->select_max('norm');
        $query = $this->db->get('db_pasien');
        return $query->row();
    }
    public function getNoDaftar(){
        $this->db->select_max('no_daftar');
        $query = $this->db->get('db_pendaftaran');
        return $query->row();
    }
    public function setPasien($data){
        $this->db->insert('db_pasien', $data);
    }
    public function setDetailPasien($dataDP){
        $this->db->insert('db_detail_pasien', $dataDP);
    }
    public function setPendaftaran($dataP){
        $this->db->insert('db_pendaftaran', $dataP);
    }
    public function updatePendaftaran($idP, $dataP){
        $this->db->where('id_pendaftaran', $idP);
        $this->db->update('db_pendaftaran', $dataP);
    }
}

/* End of file Pendaftaran_model.php */
/* Location: ./application/models/Pendaftaran_model.php */