<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('antrian_model');
        $this->load->model('pendaftaran_model');
        $this->load->model('tagihan_model');
        $this->load->model('pasien_model');
    }
    public function index(){
        $data['menu']="beranda";
        // jika login sebagai front office
        if($this->session->userdata('id_level')==5){
            $data['antrian'] = $this->antrian_model->getAntrianDaftar();
            $data['pendaftaran'] = $this->pendaftaran_model->getPendaftaran();
        // jika login sebagai staff loket
        }if($this->session->userdata('id_level')==7){
            $data['antrian'] = $this->antrian_model->getAntrianBayar();
            $data['pasien'] = $this->pasien_model->getPasienPulang();
        // jika login sebagai poli gigi
        }elseif($this->session->userdata('id_role')==2){
            $data['antrian'] = $this->antrian_model->getAntrianGigi();
        // jika login sebagai poli mata
        }elseif($this->session->userdata('id_role')==3){
            $data['antrian'] = $this->antrian_model->getAntrianMata();
        // jika login sebagai poli kulit
        }elseif($this->session->userdata('id_role')==4){
            $data['antrian'] = $this->antrian_model->getAntrianKulit();
        // jika login sebagai poli bedah
        }elseif($this->session->userdata('id_role')==5){
            $data['antrian'] = $this->antrian_model->getAntrianBedah();
        // jika login sebagai poli obgyn
        }elseif($this->session->userdata('id_role')==6){
            $data['antrian'] = $this->antrian_model->getAntrianObgyn();
        // jika login sebagai poli anak
        }elseif($this->session->userdata('id_role')==7){
            $data['antrian'] = $this->antrian_model->getAntrianAnak();
        // jika login sebagai poli interna
        }elseif($this->session->userdata('id_role')==8){
            $data['antrian'] = $this->antrian_model->getAntrianAnak();
        // jika login sebagai poli umum
        }elseif($this->session->userdata('id_role')==9){
            $data['antrian'] = $this->antrian_model->getAntrianUmum();
        }
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('beranda/index', $data);
        $this->load->view('footer');
    }
}

/* End of file Beranda.php */
/* Location: ./application/controllers/Beranda.php */