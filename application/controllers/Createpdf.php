<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createpdf extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('pdf_helper');
        $this->load->model('pendaftaran_model');
        $this->load->model('rujukan_model');
        $this->load->model('laboratorium_model');
        $this->load->model('pasien_model');
    }
    public function pdfDaftar($id){
        $data['pendaftaran'] = $this->pendaftaran_model->getPendaftaran($id);
        $this->load->view('pdf/pdfdaftar', $data);
    }
    public function pdfRujukan(){
        $data['rujukan'] = $this->rujukan_model->getRujukan($this->session->userdata('id_user'));
        $this->load->view('pdf/pdfrujukan', $data);
    }
    public function pdfDarah($id){
        $data['hasil'] = $this->laboratorium_model->getHasilLabDarah($id);
        $this->load->view('pdf/pdfdarah', $data);
    }
    public function pdfKlinis($id){
        $data['hasil'] = $this->laboratorium_model->getHasilLabKlinis($id);
        $this->load->view('pdf/pdfklinis', $data);
    }
    public function pdfUrine($id){
        $data['hasil'] = $this->laboratorium_model->getHasilLabUrine($id);
        $this->load->view('pdf/pdfurine', $data);
    }
    public function pdfFeces($id){
        $data['hasil'] = $this->laboratorium_model->getHasilLabFeces($id);
        $this->load->view('pdf/pdffeces', $data);
    }
    public function pdfHematologi($id){
        $data['hasil'] = $this->laboratorium_model->getHasilLabHematologi($id);
        $this->load->view('pdf/pdfhematologi', $data);
    }
    public function pdfBayar($id, $id_pendaftaran){
        $data['hasil'] = $this->pasien_model->getPasienLunas($id, $id_pendaftaran);
        $this->load->view('pdf/pdfbayar', $data);
    }
}

/* End of file Createpdf.php */
/* Location: ./application/controllers/Createpdf.php */