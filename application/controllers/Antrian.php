<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('antrian_model');
    }
    // antrian daftar
    public function antrianDaftar(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'daftar',
            'loket' => $this->security->xss_clean($this->input->post('loket'))
        );
        $this->antrian_model->setAntrianDaftar($data);
        redirect('beranda');
    }
    public function resetantrianDaftar(){
        $this->antrian_model->resetAntrianDaftar();
        redirect('beranda');
    }
    // antrian bayar
    public function antrianBayar(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'bayar',
            'loket' => $this->security->xss_clean($this->input->post('loket'))
        );
        $this->antrian_model->setAntrianBayar($data);
        redirect('beranda');
    }
    public function resetantrianBayar(){
        $this->antrian_model->resetAntrianBayar();
        redirect('beranda');
    }
    // antrian polik gigi
    public function antrianGigi(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 1
        );
        $this->antrian_model->setAntrianGigi($data);
        redirect('beranda');
    }
    public function resetantrianGigi(){
        $this->antrian_model->resetAntrianGigi();
        redirect('beranda');
    }
    // antrian polik mata
    public function antrianMata(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 2
        );
        $this->antrian_model->setAntrianMata($data);
        redirect('beranda');
    }
    public function resetantrianMata(){
        $this->antrian_model->resetAntrianMata();
        redirect('beranda');
    }
    // antrian polik kulit
    public function antrianKulit(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 3
        );
        $this->antrian_model->setAntrianKulit($data);
        redirect('beranda');
    }
    public function resetantrianKulit(){
        $this->antrian_model->resetAntrianKulit();
        redirect('beranda');
    }
    // antrian polik bedah
    public function antrianBedah(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 4
        );
        $this->antrian_model->setAntrianBedah($data);
        redirect('beranda');
    }
    public function resetantrianBedah(){
        $this->antrian_model->resetAntrianBedah();
        redirect('beranda');
    }
    // antrian polik obgyn
    public function antrianObgyn(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 5
        );
        $this->antrian_model->setAntrianObgyn($data);
        redirect('beranda');
    }
    public function resetantrianObgyn(){
        $this->antrian_model->resetAntrianObgyn();
        redirect('beranda');
    }
    // antrian polik anak
    public function antrianAnak(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 6
        );
        $this->antrian_model->setAntrianAnak($data);
        redirect('beranda');
    }
    public function resetantrianAnak(){
        $this->antrian_model->resetAntrianAnak();
        redirect('beranda');
    }
    // antrian polik interna
    public function antrianInterna(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 7
        );
        $this->antrian_model->setAntrianInterna($data);
        redirect('beranda');
    }
    public function resetantrianInterna(){
        $this->antrian_model->resetAntrianInterna();
        redirect('beranda');
    }
    // antrian polik umum
    public function antrianUmum(){
        $data = array(
            'no_antri' => $this->security->xss_clean($this->input->post('no_antri')),
            'tipe' => 'poli',
            'id_poli' => 8
        );
        $this->antrian_model->setAntrianUmum($data);
        redirect('beranda');
    }
    public function resetantrianUmum(){
        $this->antrian_model->resetAntrianUmum();
        redirect('beranda');
    }
}

/* End of file Antrian.php */
/* Location: ./application/controllers/Antrian.php */