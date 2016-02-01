<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poliklinik extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('pasien_model');
        $this->load->model('rekammedis_model');
        $this->load->model('poliklinik_model');
        $this->load->model('laboratorium_model');
        $this->load->model('tagihan_model');
        $this->load->model('pendaftaran_model');
    }
    // poli gigi
    public function gigi(){
        $id = 1;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="gigi";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/gigi', $data);
        $this->load->view('footer');
    }
    // poli mata
    public function mata(){
        $id = 2;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="mata";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/mata', $data);
        $this->load->view('footer');
    }
    // poli kulit
    public function kulit(){
        $id = 3;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="kulit";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/kulit', $data);
        $this->load->view('footer');
    }
    // poli bedah
    public function bedah(){
        $id = 4;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="bedah";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/bedah', $data);
        $this->load->view('footer');
    }
    // poli obgyn
    public function obgyn(){
        $id = 5;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="obgyn";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/obgyn', $data);
        $this->load->view('footer');
    }
    // poli anak
    public function anak(){
        $id = 6;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="anak";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/anak', $data);
        $this->load->view('footer');
    }
    // poli interna
    public function interna(){
        $id = 7;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="interna";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/interna', $data);
        $this->load->view('footer');
    }
    // poli umum
    public function umum(){
        $id = 8;
        $data['pasien'] = $this->pasien_model->getPasienPoli($id);
        $data['menu']="umum";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/umum', $data);
        $this->load->view('footer');
    }
    public function pulang($page, $id){
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['page'] = $page;
        $data['menu'] = $page;
        $this->form_validation->set_rules('receipt', 'Resep', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('header');
            $this->load->view('menu', $data);
            $this->load->view('poliklinik/pulang', $data);
            $this->load->view('footer');
        }else{
            $id_daftar = $this->input->post('id_pendaftaran');
            $data = array(
                'id_pendaftaran' => $id_daftar,
                'id_pasien' => $id,
                'resep_dokter' => $this->security->xss_clean($this->input->post('receipt')),
                'id_user' => $this->session->userdata('id_user')
            );
            $this->poliklinik_model->pasienPulang($data);
            $dataRM = array(
                'id_pasien' => $id,
                'periksa' => 'Poli '.ucfirst($page).': '.$this->security->xss_clean($this->input->post('periksa')),
                'diagnosa' => 'Poli '.ucfirst($page).': '.$this->security->xss_clean($this->input->post('diagnosa')),
                'pesan' => 'Pasien diizinkan pulang oleh '.$this->session->userdata('fullname').' dan didiagnosa '.$this->input->post('diagnosa'),
                'tindakan' => 'Diizinkan pulang',
                'id_pendaftaran' => $id_daftar
            );
            $this->rekammedis_model->setRM($dataRM);
            // input tagihan
            $dataTg = array(
                'id_pasien' => $id,
                'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                'guna' => 'Biaya Poli '.ucfirst($page),
                'biaya' => $this->security->xss_clean($this->input->post('biaya'))
            );
            $this->tagihan_model->setTagihan($dataTg);
            redirect('beranda');
        }
    }
    public function hasillab($page){
        $data['page'] = $page;
        $data['poli'] = $this->poliklinik_model->getPoliCode($page);
        $data['pasien'] = $this->pasien_model->getPasienPoliLab($data['poli']->id_poli);
        $data['menu']="hasillab";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/hasillab', $data);
        $this->load->view('footer');
    }
    public function tindakan($page, $id){
        $data['page'] = $page;
        $data['pasien'] = $this->pasien_model->getPasienPoliSingle($id);
        $data['rm'] = $this->rekammedis_model->getRM($id);
        $data['menu'] = $page;
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('poliklinik/tindakan', $data);
        $this->load->view('footer');
    }
    public function rujukan($page, $id, $tujuan){
        if ($tujuan == 'lab'){
            $data['lab'] = $this->laboratorium_model->getLab();
        }elseif($tujuan == 'poli'){
            $data['poli'] = $this->poliklinik_model->getPoli();
        }
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['tujuan'] = $tujuan;
        $data['id_pasien'] = $id;
        $data['page'] = $page;
        $data['menu'] = $page;
        $this->form_validation->set_rules('periksa','Pemeriksaan','required');
        $this->form_validation->set_rules('diagnosa','Diagnosa','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('poliklinik/rujukan', $data);
            $this->load->view('footer');
        }else{
            // input rujukan
            $poli = $this->poliklinik_model->getPoliCode($page);
            if ($tujuan == 'lab'){
                $data = array(
                    'id_pasien' => $id,
                    'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                    'id_poli_dari' => $poli->id_poli,
                    'id_lab_tujuan' => $this->security->xss_clean($this->input->post('id_lab')),
                    'id_user' => $this->session->userdata('id_user')
                );
            }elseif($tujuan == 'poli'){
                $data = array(
                    'id_pasien' => $id,
                    'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                    'id_poli_dari' => $poli->id_poli,
                    'id_poli_tujuan' => $this->security->xss_clean($this->input->post('id_poli')),
                    'id_user' => $this->session->userdata('id_user')
                );
                // ubah id_poli di pendaftaran
                $dataP = array(
                    'id_poli' => $this->security->xss_clean($this->input->post('id_poli'))
                );
                $this->pendaftaran_model->updatePendaftaran($this->input->post('id_pendaftaran'), $dataP);
            }
            $this->poliklinik_model->setRujukan($data);
            // input rekam medis
            $proses = $this->rekammedis_model->getRMDaftar($this->input->post('id_pendaftaran'));
            if ($tujuan == 'lab'){
                $data['laboratorium'] = $this->laboratorium_model->getLab($this->input->post('id_lab'));
                $dataRM = array(
                    'id_pasien' => $id,
                    'periksa' => 'Poli '.ucfirst($page).': '.$this->security->xss_clean($this->input->post('periksa')),
                    'diagnosa' => 'Poli '.ucfirst($page).': '.$this->security->xss_clean($this->input->post('diagnosa')),
                    'pesan' => 'Pasien mendapat rujukan ke laboratorium '.$data['laboratorium']->nama_lab.' oleh '.$this->session->userdata('fullname'),
                    'tindakan' => 'Poli '.ucfirst($page).': Dirujuk ke laboratorium',
                    'biaya' => $proses->biaya+$this->security->xss_clean($this->input->post('biaya')),
                    'proses' => $proses->proses.'->'.$data['laboratorium']->nama_lab,
                    'id_pendaftaran' => $this->input->post('id_pendaftaran')
                );
            }elseif($tujuan == 'poli'){
                $data['poli'] = $this->poliklinik_model->getPoli($this->input->post('id_poli'));
                $dataRM = array(
                    'id_pasien' => $id,
                    'periksa' => 'Poli '.ucfirst($page).': '.$this->security->xss_clean($this->input->post('periksa')),
                    'diagnosa' => 'Poli '.ucfirst($page).': '.$this->security->xss_clean($this->input->post('diagnosa')),
                    'pesan' => 'Pasien mendapat rujukan ke '.$data['poli']->nama_poli.' oleh '.$this->session->userdata('fullname'),
                    'tindakan' => 'Poli '.ucfirst($page).': Dirujuk ke '.$data['poli']->nama_poli,
                    'biaya' => $proses->biaya+$this->security->xss_clean($this->input->post('biaya')),
                    'proses' => $proses->proses.'->'.$data['poli']->nama_poli,
                    'id_pendaftaran' => $this->input->post('id_pendaftaran')
                );
            }
            $this->rekammedis_model->setRM($dataRM);
            // input tagihan
            $dataTg = array(
                'id_pasien' => $id,
                'id_pendaftaran' => $this->input->post('id_pendaftaran'),
                'guna' => 'Biaya Poli '.ucfirst($page),
                'biaya' => $this->security->xss_clean($this->input->post('biaya'))
            );
            $this->tagihan_model->setTagihan($dataTg);
            redirect('beranda');
        }
    }
}

/* End of file Poliklinik.php */
/* Location: ./application/controllers/Poliklinik.php */