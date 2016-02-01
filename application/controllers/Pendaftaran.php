<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('pendaftaran_model');
        $this->load->model('antrian_model');
        $this->load->model('poliklinik_model');
        $this->load->model('pasien_model');
        $this->load->model('rekammedis_model');
        $this->load->model('tagihan_model');
    }
    public function poliklinik(){
        $data['pasien'] = $this->pasien_model->getPasien();
        $data['norm'] = $this->pendaftaran_model->getNoRM();
        $data['nodaftar'] = $this->pendaftaran_model->getNoDaftar();
        $data['poli'] = $this->poliklinik_model->getPoli();
        $data['menu']="pendaftaran-poli";
        $this->form_validation->set_rules('norm','No. Rekam Medis','required|numeric');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('pendaftaran/poliklinik', $data);
            $this->load->view('footer');
        }else{
            // jika pasien baru
            if(!$this->input->post('id_pasien')){
                $data = array(
                    'norm' => $this->security->xss_clean($this->input->post('norm')),
                    'nama_lengkap' => ucwords($this->security->xss_clean($this->input->post('nama_lengkap'))),
                    'tpt_lahir' => $this->security->xss_clean($this->input->post('tpt_lahir')),
                    'tgl_lahir' => $this->security->xss_clean($this->input->post('tgl_lahir')),
                    'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
                    'jalan_1' => $this->security->xss_clean($this->input->post('jalan_1')),
                    'jalan_2' => $this->security->xss_clean($this->input->post('jalan_2')),
                    'kelurahan' => $this->security->xss_clean($this->input->post('kelurahan')),
                    'kecamatan' => $this->security->xss_clean($this->input->post('kecamatan')),
                    'kota' => $this->security->xss_clean($this->input->post('kota'))
                );
                // insert pasien
                $this->pendaftaran_model->setPasien($data);
                $id_pasien = $this->db->insert_id();
                $dataDP = array(
                    'id_pasien' => $id_pasien,
                    'pembayaran' => $this->security->xss_clean($this->input->post('pembayaran')),
                    'layanan' => 'Rawat Jalan'
                );
                $this->pendaftaran_model->setDetailPasien($dataDP);
            }else{ // jika pasien lama
                $id_pasien = $this->security->xss_clean($this->input->post('id_pasien'));
            }
            $dataP = array(
                'id_pasien' => $id_pasien,
                'no_daftar' => $this->security->xss_clean($this->input->post('no_daftar')),
                'tujuan' => $this->security->xss_clean($this->input->post('tujuan')),
                'id_poli' => $this->security->xss_clean($this->input->post('id_poli'))
            );
            $this->pendaftaran_model->setPendaftaran($dataP);
            $id_pendaftaran = $this->db->insert_id();
            // insert rekam medis
            $data['poliklinik'] = $this->poliklinik_model->getPoli($this->input->post('id_poli'));
            $dataRM = array(
                'id_pasien' => $id_pasien,
                'pesan' => 'Pasien mendaftar dengan tujuan ke '.$data['poliklinik']->nama_poli.' pada tanggal '.date('Y-m-d H:i:s'),
                'biaya' => 0,
                'proses' => 'Daftar->'.$data['poliklinik']->nama_poli,
                'id_pendaftaran' => $id_pendaftaran
            );
            $this->rekammedis_model->setRM($dataRM);
            // input total tagihan
            if($this->input->post('pembayaran')=='Tunai'){
                $status = 'Belum dibayar';
            }else{
                $status = 'Lunas';
            }
            $dataToTg = array(
                'id_pasien' => $id_pasien,
                'id_pendaftaran' => $id_pendaftaran,
                'total' => 0,
                'status' => $status
            );
            $this->tagihan_model->setTotalTagihan($dataToTg);
            redirect('beranda');
        }
    }
    public function ugd(){
        $data['pasien'] = $this->pasien_model->getPasien();
        $data['norm'] = $this->pendaftaran_model->getNoRM();
        $data['nodaftar'] = $this->pendaftaran_model->getNoDaftar();
        $data['menu']="pendaftaran-ugd";
        $this->form_validation->set_rules('norm','No. Rekam Medis','required|numeric');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('pendaftaran/ugd', $data);
            $this->load->view('footer');
        }else{
            // jika pasien baru
            if(!$this->input->post('id_pasien')){
                $data = array(
                    'norm' => $this->security->xss_clean($this->input->post('norm')),
                    'nama_lengkap' => ucwords($this->security->xss_clean($this->input->post('nama_lengkap'))),
                    'tpt_lahir' => $this->security->xss_clean($this->input->post('tpt_lahir')),
                    'tgl_lahir' => $this->security->xss_clean($this->input->post('tgl_lahir')),
                    'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
                    'jalan_1' => $this->security->xss_clean($this->input->post('jalan_1')),
                    'jalan_2' => $this->security->xss_clean($this->input->post('jalan_2')),
                    'kelurahan' => $this->security->xss_clean($this->input->post('kelurahan')),
                    'kecamatan' => $this->security->xss_clean($this->input->post('kecamatan')),
                    'kota' => $this->security->xss_clean($this->input->post('kota'))
                );
                // insert pasien
                $this->pendaftaran_model->setPasien($data);
                $id_pasien = $this->db->insert_id();
                $dataDP = array(
                    'id_pasien' => $id_pasien,
                    'pembayaran' => $this->security->xss_clean($this->input->post('pembayaran')),
                    'layanan' => 'Rawat Jalan'
                );
                $this->pendaftaran_model->setDetailPasien($dataDP);
            }else{ // jika pasien lama
                $id_pasien = $this->security->xss_clean($this->input->post('id_pasien'));
            }
            $dataP = array(
                'id_pasien' => $id_pasien,
                'no_daftar' => $this->security->xss_clean($this->input->post('no_daftar')),
                'tujuan' => $this->security->xss_clean($this->input->post('tujuan'))
            );
            $this->pendaftaran_model->setPendaftaran($dataP);
            $id_pendaftaran = $this->db->insert_id();
            // insert rekam medis
            $data['poliklinik'] = $this->poliklinik_model->getPoli($this->input->post('id_poli'));
            $dataRM = array(
                'id_pasien' => $id_pasien,
                'pesan' => 'Pasien mendaftar dengan tujuan ke UGD pada tanggal '.date('Y-m-d H:i:s'),
                'biaya' => 0,
                'proses' => 'Daftar->UGD',
                'id_pendaftaran' => $id_pendaftaran
            );
            $this->rekammedis_model->setRM($dataRM);
            // input total tagihan
            if($this->input->post('pembayaran')=='Tunai'){
                $status = 'Belum dibayar';
            }else{
                $status = 'Lunas';
            }
            $dataToTg = array(
                'id_pasien' => $id_pasien,
                'id_pendaftaran' => $id_pendaftaran,
                'total' => 0,
                'status' => $status
            );
            $this->tagihan_model->setTotalTagihan($dataToTg);
            redirect('beranda');
        }
    }
}

/* End of file Pendaftaran.php */
/* Location: ./application/controllers/Pendaftaran.php */