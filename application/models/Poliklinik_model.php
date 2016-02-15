<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getPoli($id = FALSE){
        if ($id === FALSE) {
            $query = $this->db->get('db_poli');
            return $query->result();
        }
        $query = $this->db->get_where('db_poli',array('id_poli' => $id));
        return $query->row();
    }
    public function getPoliCode($code){
        $query = $this->db->get_where('db_poli',array('kode' => $code));
        return $query->row();
    }
    public function pasienPulang($data){
        $this->db->insert('db_pulang', $data);
    }
    public function setRujukan($data){
        $this->db->insert('db_rujukan', $data);
    }
}

/* End of file Poliklinik_model.php */
/* Location: ./application/models/Poliklinik_model.php */