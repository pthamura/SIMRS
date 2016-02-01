<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apotik extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('apotik_model');
		// $this->load->model('gudang_model');
	}
	public function obat(){
		$data['menu'] = 'obatapotik';
		$data['getobat'] = $this->apotik_model->getObatApotik();
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('apotik/obat', $data);
        $this->load->view('footer');
	}
	public function obatmasuk(){
		$data['menu'] = 'obatapotikmasuk';
		$data['getobat'] = $this->apotik_model->getObatApotik();
		$this->form_validation->set_rules('nama_obat[]', 'Nama Obat', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('apotik/obatmasuk', $data);
	        $this->load->view('footer');
		}else{
			# input obat apotik
			$data_asli = array(
				'kode_obat' => $this->security->xss_clean($this->input->post('kode_obat[]')),
				'nama_obat' => $this->security->xss_clean($this->input->post('nama_obat[]')),
				'qty' => $this->security->xss_clean($this->input->post('qty[]')),
				'jenis_update' => 'masuk'
			);
			$data = array();
			for($x = 0, $size = count($data_asli['kode_obat']); $x < $size; $x++) {
			    foreach($data_asli as $key => &$value) {
			        if(!is_array($value)) {
			            $data[$x][$key] = $value;
			        } else {
			            $data[$x][$key] = array_shift($value);
			        }
			    }
			}
			$this->apotik_model->setObatApotik($data);
			redirect('apotik/obat');
		}
	}
	public function obatkeluar(){
		$data['menu'] = 'obatapotikkeluar';
		$data['getobat'] = $this->apotik_model->getObatApotik();
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('apotik/obatkeluar', $data);
	        $this->load->view('footer');
		}else{
			# code...
		}
	}
	public function obatgudang(){
		$data['menu'] = 'obatgudang';
		$data['getobat'] = $this->gudang_model->getObatGudang();
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('apotik/obatgudang', $data);
        $this->load->view('footer');
	}
}

/* End of file Apotik.php */
/* Location: ./application/controllers/Apotik.php */