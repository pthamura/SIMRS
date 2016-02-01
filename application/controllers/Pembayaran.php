<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('pasien_model');
        $this->load->model('rekammedis_model');
        $this->load->model('poliklinik_model');
        $this->load->model('laboratorium_model');
        $this->load->model('tagihan_model');
        $this->load->model('pendaftaran_model');
	}
    public function index(){
        $data['pasien'] = $this->pasien_model->getPasienLunas();
        $data['menu'] = 'bayar';
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('footer');  
    }
    public function detail($id, $id_pendaftaran){
        $data['pasien'] = $this->pasien_model->getPasienPulang($id);
        $data['tagihan'] = $this->tagihan_model->getTagihan($id, $id_pendaftaran);
        $data['totg'] = $this->tagihan_model->getToTg($id, $id_pendaftaran);
        $data['resep'] = $this->tagihan_model->getTagihanResep($id, $id_pendaftaran);
        $data['tresep'] = $this->tagihan_model->getToRs($id, $id_pendaftaran);
        $data['menu'] = 'bayar';
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('pembayaran/detail', $data);
        $this->load->view('footer');  
	}
	public function obat($id, $id_pendaftaran){
        $data = array(
        	'id_pasien' => $id,
        	'id_pendaftaran' => $id_pendaftaran,
        	'nama_obat' => $this->security->xss_clean($this->input->post('nama_obat')),
        	'harga' => $this->security->xss_clean($this->input->post('harga'))
        );
        $this->tagihan_model->setTgObat($data);
        redirect('pembayaran/detail/'.$id.'/'.$id_pendaftaran);
	}
    public function bayar($id, $id_pendaftaran){
        $data = array(
            'total' => $this->input->post('total_tagihan'),
            'status' => 'Lunas'
        );
        $this->tagihan_model->updateTotalTagihan($id, $id_pendaftaran, $data);
        redirect('pembayaran');
    }
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */