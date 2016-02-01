<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index(){
		if(!$this->session->userdata('id_user')){
			$this->load->view('login');
		}else{
			redirect('beranda');
		}
	}
	public function cekLogin(){
		$data = array(
			'username' => $this->security->xss_clean($this->input->post('username')),
			'password' => $this->security->xss_clean(md5($this->input->post('password')))
		);

		$cek = $this->login_model->aksiLogin($data);
		$level = $this->login_model->getLevel($cek->id_level);
		if($cek->id_level == 4){
			if($cek->bulan != date('n') || $cek->tahun != date('Y')){
				$this->session->set_flashdata('msg', 'failed-3');
				redirect('');
			}else{
				if($cek != NULL){
					if($cek->status=='active'){
						$usersession = array(
							'id_user' => $cek->id_user,
							'username' => $cek->username,
							'fullname' => $cek->fullname,
							'gender' => $cek->gender,
							'id_level' => $cek->id_level,
							'id_role' => $cek->id_role,
							'id_poli' => $cek->id_poli,
							'level' => $level->nama_level
						);
						$this->session->set_userdata($usersession);	
						redirect('beranda');
					}else{
						$this->session->set_flashdata('msg', 'failed-1');
						redirect('');
					}
				}else{
					$this->session->set_flashdata('msg', 'failed-2');
					redirect('');
				}
			}
		}else{
			if($cek != NULL){
				if($cek->status=='active'){
					$usersession = array(
						'id_user' => $cek->id_user,
						'username' => $cek->username,
						'fullname' => $cek->fullname,
						'gender' => $cek->gender,
						'id_level' => $cek->id_level,
						'id_role' => $cek->id_role,
						'id_poli' => $cek->id_poli,
						'level' => $level->nama_level
					);
					$this->session->set_userdata($usersession);	
					redirect('beranda');
				}else{
					$this->session->set_flashdata('msg', 'failed-1');
					redirect('');
				}
			}else{
				$this->session->set_flashdata('msg', 'failed-2');
				redirect('');
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
}

/* End of file Signin.php */
/* Location: ./application/controllers/Signin.php */