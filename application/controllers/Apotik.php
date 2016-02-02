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
				'qty_masuk' => $this->security->xss_clean($this->input->post('qty[]')),
				'id_user' => $this->session->userdata('id_user')
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
        $this->form_validation->set_rules('id_obat[]', 'Obat', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('apotik/obatkeluar', $data);
	        $this->load->view('footer');
		}else{
			# input obat keluar
			$data_asli = array(
				'id_apotik_obat' => $this->security->xss_clean($this->input->post('id_obat[]')),
				'qty_keluar' => $this->security->xss_clean($this->input->post('qty[]')),
				'id_user' => $this->session->userdata('id_user')
			);
			$data = array();
			for($x = 0, $size = count($data_asli['id_apotik_obat']); $x < $size; $x++) {
			    foreach($data_asli as $key => &$value) {
			        if(!is_array($value)) {
			            $data[$x][$key] = $value;
			        } else {
			            $data[$x][$key] = array_shift($value);
			        }
			    }
			}
			$this->apotik_model->setObatApotikKeluar($data);
			$id_obat = $this->input->post('id_obat[]');
			$datao['selectin'] = $this->apotik_model->selectIn($id_obat);
			foreach ($datao['selectin'] as $selectin) {
				foreach ($data as $select){
					# qty_masuk dikurangi qty_keluar
		            if($selectin->id_apotik_obat == $select['id_apotik_obat']){
		              	$id = $select['id_apotik_obat'];
		              	$qty_update = $selectin->qty_masuk-$select['qty_keluar'];
		              	$data_update = array(
		              		'qty_masuk' => $qty_update
		              	);
		              	$this->apotik_model->updateApotikObat($id, $data_update);
		            }
				}
			}
			redirect('apotik/obat');
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