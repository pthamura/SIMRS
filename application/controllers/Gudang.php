<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('gudang_model');
	}
	// OBAT
	public function daftarobat(){
		$data['menu'] = 'gudangobat';
		$data['getobat'] = $this->gudang_model->getGudangObat();
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('gudang/obat', $data);
        $this->load->view('footer');
	}
	public function obatmasuk(){
		$data['menu'] = 'gudangobatmasuk';
		$this->form_validation->set_rules('nama_obat[]', 'Nama Obat', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('gudang/obatmasuk', $data);
	        $this->load->view('footer');
		}else{
			# input obat gudang
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
			$this->gudang_model->setGudangObat($data);
			redirect('gudang/daftarobat');
		}
	}
	public function obatkeluar(){
		$data['menu'] = 'gudangobatkeluar';
		$data['getobat'] = $this->gudang_model->getGudangObat();
        $this->form_validation->set_rules('id_obat[]', 'Obat', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('gudang/obatkeluar', $data);
	        $this->load->view('footer');
		}else{
			# input obat keluar
			$data_asli = array(
				'id_gudang_obat' => $this->security->xss_clean($this->input->post('id_obat[]')),
				'qty_keluar' => $this->security->xss_clean($this->input->post('qty[]')),
				'id_user' => $this->session->userdata('id_user')
			);
			$data = array();
			for($x = 0, $size = count($data_asli['id_gudang_obat']); $x < $size; $x++) {
			    foreach($data_asli as $key => &$value) {
			        if(!is_array($value)) {
			            $data[$x][$key] = $value;
			        } else {
			            $data[$x][$key] = array_shift($value);
			        }
			    }
			}
			$this->gudang_model->setGudangObatKeluar($data);
			$id_obat = $this->input->post('id_obat[]');
			$datao['selectin'] = $this->gudang_model->selectIn($id_obat);
			foreach ($datao['selectin'] as $selectin) {
				foreach ($data as $select){
					# qty_masuk dikurangi qty_keluar
		            if($selectin->id_gudang_obat == $select['id_gudang_obat']){
		              	$id = $select['id_gudang_obat'];
		              	$qty_update = $selectin->qty_masuk-$select['qty_keluar'];
		              	$data_update = array(
		              		'qty_masuk' => $qty_update
		              	);
		              	$this->gudang_model->updateGudangObat($id, $data_update);
		            }
				}
			}
			redirect('gudang/daftarobat');
		}
	}
	// ALAT KESEHATAN
	public function alatkesehatan(){
		$data['menu'] = 'gudangalkes';
		$data['getalkes'] = $this->gudang_model->getGudangAlkes();
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('gudang/alatkesehatan', $data);
        $this->load->view('footer');
	}
	public function alatkesehatanmasuk(){
		$data['menu'] = 'gudangalkesmasuk';
		$this->form_validation->set_rules('nama_alkes[]', 'Nama Alat Kesehatan', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('gudang/alatkesehatanmasuk', $data);
	        $this->load->view('footer');
		}else{
			# input alkes gudang
			$data_asli = array(
				'kode_alkes' => $this->security->xss_clean($this->input->post('kode_alkes[]')),
				'nama_alkes' => $this->security->xss_clean($this->input->post('nama_alkes[]')),
				'qty_masuk' => $this->security->xss_clean($this->input->post('qty[]')),
				'id_user' => $this->session->userdata('id_user')
			);
			$data = array();
			for($x = 0, $size = count($data_asli['kode_alkes']); $x < $size; $x++) {
			    foreach($data_asli as $key => &$value) {
			        if(!is_array($value)) {
			            $data[$x][$key] = $value;
			        } else {
			            $data[$x][$key] = array_shift($value);
			        }
			    }
			}
			$this->gudang_model->setGudangAlkes($data);
			redirect('gudang/alatkesehatan');
		}
	}
	public function alatkesehatankeluar(){
		$data['menu'] = 'gudangalkeskeluar';
		$data['getalkes'] = $this->gudang_model->getGudangAlkes();
        $this->form_validation->set_rules('id_alkes[]', 'Alat Kesehatan', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('gudang/alatkesehatankeluar', $data);
	        $this->load->view('footer');
		}else{
			# input alkes keluar
			$data_asli = array(
				'id_gudang_alkes' => $this->security->xss_clean($this->input->post('id_alkes[]')),
				'qty_keluar' => $this->security->xss_clean($this->input->post('qty[]')),
				'id_user' => $this->session->userdata('id_user')
			);
			$data = array();
			for($x = 0, $size = count($data_asli['id_gudang_alkes']); $x < $size; $x++) {
			    foreach($data_asli as $key => &$value) {
			        if(!is_array($value)) {
			            $data[$x][$key] = $value;
			        } else {
			            $data[$x][$key] = array_shift($value);
			        }
			    }
			}
			$this->gudang_model->setGudangAlkesKeluar($data);
			$id_alkes = $this->input->post('id_alkes[]');
			$datao['selectin'] = $this->gudang_model->selectInAlkes($id_alkes);
			foreach ($datao['selectin'] as $selectin) {
				foreach ($data as $select){
					# qty_masuk dikurangi qty_keluar
		            if($selectin->id_gudang_alkes == $select['id_gudang_alkes']){
		              	$id = $select['id_gudang_alkes'];
		              	$qty_update = $selectin->qty_masuk-$select['qty_keluar'];
		              	$data_update = array(
		              		'qty_masuk' => $qty_update
		              	);
		              	$this->gudang_model->updateGudangAlkes($id, $data_update);
		            }
				}
			}
			redirect('gudang/alatkesehatan');
		}
	}
	// OKSIGEN
	public function oksigen(){
		$data['menu'] = 'gudangoksigen';
		$data['getoksigen'] = $this->gudang_model->getGudangOksigen();
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('gudang/oksigen', $data);
        $this->load->view('footer');
	}
	public function oksigenmasuk(){
		$data['menu'] = 'gudangoksigenmasuk';
		$this->form_validation->set_rules('qty', 'Jumlah', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('gudang/oksigenmasuk', $data);
	        $this->load->view('footer');
		}else{
			# input oksigen gudang
			$data = array(
				'id_gudang_oksigen' => 1,
				'qty_masuk' => $this->security->xss_clean($this->input->post('qty')),
				'id_user' => $this->session->userdata('id_user')
			);
			$this->gudang_model->setGudangOksigenMasuk($data);
			$oksigen = $this->gudang_model->getGudangOksigen();
			$dataO2 = array(
				'total_qty' => $oksigen->total_qty+$this->security->xss_clean($this->input->post('qty'))
			);
			$this->gudang_model->updateGudangOksigenMasuk($dataO2);
			redirect('gudang/oksigen');
		}
	}
	public function oksigenkeluar(){
		$data['menu'] = 'gudangoksigenkeluar';
        $this->form_validation->set_rules('qty', 'Jumlah', 'required');
		if ($this->form_validation->run() === FALSE){
	        $this->load->view('header');
	        $this->load->view('menu',$data);
	        $this->load->view('gudang/oksigenkeluar', $data);
	        $this->load->view('footer');
		}else{
			# input alkes keluar
			$data = array(
				'id_gudang_oksigen' => 1,
				'qty_keluar' => $this->security->xss_clean($this->input->post('qty')),
				'id_user' => $this->session->userdata('id_user')
			);
			$this->gudang_model->setGudangOksigenKeluar($data);
			$oksigen = $this->gudang_model->getGudangOksigen();
			$dataO2 = array(
				'total_qty' => $oksigen->total_qty-$this->security->xss_clean($this->input->post('qty'))
			);
			$this->gudang_model->updateGudangOksigenMasuk($dataO2);
			redirect('gudang/oksigen');
		}
	}

}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */