<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rujukan_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getRujukan($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_rujukan as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_lab as C', 'B.id_lab = C.id_lab', 'LEFT'); 
        $this->db->join('db_user as D', 'B.id_user = D.id_user'); 
        $this->db->where('A.id_pasien', $id); 
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file Rujukan_model.php */
/* Location: ./application/models/Rujukan_model.php */