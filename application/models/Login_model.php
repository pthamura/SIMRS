<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function aksiLogin($data){
        $this->db->select('*');
        $this->db->select('A.id_user as id_user');
        $this->db->from('db_user as A');
        $this->db->join('db_level as B', 'A.id_level = B.id_level', 'left');
        $this->db->join('db_role as C', 'A.id_role = C.id_role', 'left');
        $this->db->join('db_jadwal_poli as D', 'A.id_user = D.id_user', 'left');
        $this->db->where($data);
        $this->db->where('A.status', 'active');
        $query = $this->db->get();
        return $query->row();
    }
    public function getLevel($id){
        $query = $this->db->get_where('db_level', array('id_level' => $id));
        return $query->row();
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */