<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    // front office
    public function getAntrianDaftar(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian',array('tipe' => 'daftar'));
        return $query->row();
    }
    public function setAntrianDaftar($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianDaftar(){
        $this->db->delete('db_antrian', array('tipe'=>'daftar'));
    }
    // loket pembayaran
    public function getAntrianBayar(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian',array('tipe' => 'bayar'));
        return $query->row();
    }
    public function setAntrianBayar($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianBayar(){
        $this->db->delete('db_antrian', array('tipe'=>'bayar'));
    }
    // poli gigi
    public function getAntrianGigi(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 1));
        return $query->row();
    }
    public function setAntrianGigi($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianGigi(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 1));
    }
    // poli gigi
    public function getAntrianMata(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 2));
        return $query->row();
    }
    public function setAntrianMata($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianMata(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 2));
    }
    // poli kulit
    public function getAntrianKulit(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 3));
        return $query->row();
    }
    public function setAntrianKulit($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianKulit(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 3));
    }
    // poli bedah
    public function getAntrianBedah(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 4));
        return $query->row();
    }
    public function setAntrianBedah($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianBedah(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 4));
    }
    // poli obgyn
    public function getAntrianObgyn(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 5));
        return $query->row();
    }
    public function setAntrianObgyn($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianObgyn(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 5));
    }
    // poli anak
    public function getAntrianAnak(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 6));
        return $query->row();
    }
    public function setAntrianAnak($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianAnak(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 6));
    }
    // poli interna
    public function getAntrianInterna(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 7));
        return $query->row();
    }
    public function setAntrianInterna($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianInterna(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 7));
    }
    // poli umum
    public function getAntrianUmum(){
        $this->db->select_max('no_antri');
        $query = $this->db->get_where('db_antrian', array('tipe' => 'poli', 'id_poli' => 8));
        return $query->row();
    }
    public function setAntrianUmum($data){
        $this->db->insert('db_antrian', $data);
    }
    public function resetAntrianUmum(){
        $this->db->delete('db_antrian', array('tipe' => 'poli', 'id_poli' => 8));
    }
}

/* End of file Antrian_model.php */
/* Location: ./application/models/Antrian_model.php */