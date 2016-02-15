<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        //Do your magic here
    }
    public function getLab($id = FALSE){
        if($id === FALSE){
            $query = $this->db->get('db_lab');
            return $query->result();
        }
        $query = $this->db->get_where('db_lab',array('id_lab' => $id));
        return $query->row();
    }
    // lab darah
    public function getHasilLabDarah($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_hasil_lab as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_hasil_labdarah as C', 'B.id_hasil_lab = C.id_hasil_lab');
        $this->db->join('db_poli as D', 'B.id_poli = D.id_poli');
        $this->db->where('B.id_pasien', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function setHasilLabDarah($data){
        $this->db->insert('db_hasil_labdarah', $data);
    }
    // lab klinis
    public function getHasilLabKlinis($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_hasil_lab as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_hasil_labklinis as C', 'B.id_hasil_lab = C.id_hasil_lab');
        $this->db->join('db_poli as D', 'B.id_poli = D.id_poli');
        $this->db->where('B.id_pasien', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function setHasilLabKlinis($data){
        $this->db->insert('db_hasil_labklinis', $data);
    }
    // lab urine
    public function getHasilLabUrine($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_hasil_lab as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_hasil_laburine as C', 'B.id_hasil_lab = C.id_hasil_lab');
        $this->db->join('db_poli as D', 'B.id_poli = D.id_poli');
        $this->db->join('db_pendaftaran as E', 'A.id_pasien = E.id_pasien');
        $this->db->join('db_rekam_medis as F', 'E.id_pendaftaran = F.id_pendaftaran');
        $this->db->join('db_detail_pasien as G', 'A.id_pasien = G.id_pasien');
        $this->db->where('B.id_pasien', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function setHasilLabUrine($data){
        $this->db->insert('db_hasil_laburine', $data);
    }
    // lab feces
    public function getHasilLabFeces($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_hasil_lab as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_hasil_labfeces as C', 'B.id_hasil_lab = C.id_hasil_lab');
        $this->db->join('db_poli as D', 'B.id_poli = D.id_poli');
        $this->db->join('db_detail_pasien as E', 'A.id_pasien = E.id_pasien');
        $this->db->where('B.id_pasien', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function setHasilLabFeces($data){
        $this->db->insert('db_hasil_labfeces', $data);
    }
    // lab hematologi
    public function getHasilLabHematologi($id){
        $this->db->select('*');
        $this->db->from('db_pasien as A');
        $this->db->join('db_hasil_lab as B', 'A.id_pasien = B.id_pasien');
        $this->db->join('db_hasil_labhematologi as C', 'B.id_hasil_lab = C.id_hasil_lab');
        $this->db->join('db_poli as D', 'B.id_poli = D.id_poli');
        $this->db->join('db_pendaftaran as E', 'A.id_pasien = E.id_pasien');
        $this->db->join('db_rekam_medis as F', 'E.id_pendaftaran = F.id_pendaftaran');
        $this->db->where('B.id_pasien', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function setHasilLabHematologi($data){
        $this->db->insert('db_hasil_labhematologi', $data);
    }
    public function setHasilLab($dataHL){
        $this->db->insert('db_hasil_lab', $dataHL);
    }
    public function updateRujukan($dataR, $idR){
        $this->db->where('id_rujukan', $idR);
        $this->db->update('db_rujukan', $dataR);
    }
}

/* End of file Laboratorium_model.php */
/* Location: ./application/models/Laboratorium_model.php */