<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    // mengambil data semua pasien
    public function getPasien($id = FALSE){
        if($id === FALSE){
            $this->db->select('*');
            $this->db->from('db_pasien as A');
            $this->db->join('db_detail_pasien as B', 'A.id_pasien = B.id_pasien'); 
            $this->db->join('db_pendaftaran as C', 'A.id_pasien = C.id_pasien');
            $this->db->group_by('A.norm'); 
            $this->db->order_by('A.norm', 'ASC');
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->select('C.id_pendaftaran as id_pendaftaran');
        $this->db->from('db_pasien as A');
        $this->db->join('db_detail_pasien as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_pendaftaran as C', 'A.id_pasien = C.id_pasien');
        $this->db->join('db_rujukan as D', 'A.id_pasien = D.id_pasien','LEFT'); 
        $this->db->where('A.id_pasien', $id);
        $this->db->order_by('C.id_pendaftaran', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    // mengambil data pasien yang berobat ke poli sesuai id poli
    public function getPasienPoli($id){
        $hari_mulai = date('Y-m-d').' 00:00:00';
        $this->db->select('*');
        $this->db->select('A.id_pasien as id_pasien');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_poli as C', 'B.id_poli = C.id_poli'); 
        $this->db->join('db_pulang as D', 'B.id_pendaftaran = D.id_pendaftaran', 'LEFT');
        $this->db->where('B.id_poli', $id);
        $this->db->where('B.tgl_daftar >=', $hari_mulai); 
        $this->db->where('D.id_pulang', NULL);  
        $this->db->order_by('B.tgl_daftar', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }
    public function getPasienPoliSingle($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_poli as C', 'B.id_poli = C.id_poli'); 
        $this->db->where('A.id_pasien', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function getPasienPoliLab($id){
        $this->db->select('*');
        $this->db->select('A.id_pasien as id_pasien');
        $this->db->from('db_pasien as A');
        $this->db->join('db_hasil_lab as B', 'A.id_pasien = B.id_pasien'); 
        $this->db->join('db_pendaftaran as C', 'A.id_pasien = C.id_pasien');
        $this->db->join('db_pulang as D', 'C.id_pendaftaran = D.id_pendaftaran', 'LEFT');
        $this->db->join('db_poli as E', 'B.id_poli = E.id_poli');
        $this->db->join('db_lab as F', 'B.id_lab = F.id_lab');
        $this->db->where('D.id_pendaftaran', NULL); 
        $this->db->where('C.id_poli', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getPasienLab($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_rujukan as B', 'B.id_pasien = A.id_pasien'); 
        $this->db->join('db_pendaftaran as C', 'A.id_pasien = C.id_pasien');
        $this->db->join('db_poli as E', 'B.id_poli = E.id_poli'); 
        $this->db->where('B.id_lab', $id);
        $this->db->order_by('B.dicek', 'DESC');
        $this->db->order_by('C.tgl_daftar', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function getPasienPulang($id = FALSE){
        if($id === FALSE){
            $this->db->select('*');
            $this->db->from('db_pasien as A');
            $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien');
            $this->db->join('db_pulang as C', 'B.id_pendaftaran = C.id_pendaftaran');
            $this->db->join('db_total_tagihan as D', 'B.id_pendaftaran = D.id_pendaftaran');
            $this->db->where('D.status', 'Belum Dibayar');
            $this->db->order_by('C.tgl_pulang', 'DESC');
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_pulang as C', 'B.id_pendaftaran = C.id_pendaftaran');
        $this->db->join('db_total_tagihan as D', 'B.id_pendaftaran = D.id_pendaftaran');
        $this->db->join('db_tagihan as E', 'B.id_pendaftaran = E.id_pendaftaran');
        $this->db->where('D.id_pasien', $id);
        $this->db->order_by('C.tgl_pulang', 'DESC');
        $query = $this->db->get();
        return $query->row();
    }
    public function getPasienLunas($id = FALSE, $id_pendaftaran = FALSE){
        $hari_mulai = date('Y-m-d').' 00:00:00';
        if($id === FALSE || $id_pendaftaran === FALSE){
            $this->db->select('*');
            $this->db->from('db_pasien as A');
            $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien');
            $this->db->join('db_total_tagihan as C', 'B.id_pendaftaran = C.id_pendaftaran');
            $this->db->where('B.tgl_daftar >=', $hari_mulai);
            $this->db->where('C.status', 'Lunas');
            $query = $this->db->get();
            return $query->result();
        }
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_pendaftaran as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_total_tagihan as C', 'B.id_pendaftaran = C.id_pendaftaran');
        $this->db->join('db_tagihan as D', 'B.id_pendaftaran = D.id_pendaftaran');
        $this->db->join('db_tagihan_resep as E', 'B.id_pendaftaran = E.id_pendaftaran','LEFT');
        $this->db->where('A.id_pasien', $id);
        $this->db->where('B.id_pendaftaran', $id_pendaftaran);
        $query = $this->db->get();
        return $query->row();
    }
}

/* End of file Pasien_model.php */
/* Location: ./application/models/Pasien_model.php */