<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function getUser($id = FALSE){
        if ($id === FALSE) {
            $query = $this->db->get('db_user');
            return $query->result();
        }
        $query = $this->db->get_where('db_user',array('id_user' => $id));
        return $query->row();
    }
    public function getLevel($id = FALSE){
        if ($id === FALSE) {
            $query = $this->db->get('db_level');
            return $query->result();
        }
        $query = $this->db->get_where('db_level',array('id_level' => $id));
        return $query->row();
    }
    public function getRole($id = FALSE){
        if ($id === FALSE) {
            $query = $this->db->get('db_role');
            return $query->result();
        }
        $query = $this->db->get_where('db_role',array('id_role' => $id));
        return $query->row();
    }
    public function editUser($id, $data){
        $this->db->where('id_user', $id);
        $this->db->update('db_user', $data);
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */