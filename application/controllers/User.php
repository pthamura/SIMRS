<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    public function profil($id){
        $data['user'] = $this->user_model->getUser($id);
        $data['level'] = $this->user_model->getLevel();
        $data['role'] = $this->user_model->getRole();
        $this->form_validation->set_rules('fullname','Nama Lengkap','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('user/profil', $data);
            $this->load->view('footer');
        }else{
            if(!$this->input->post('password')){
                $data = array(
                    'fullname' => $this->security->xss_clean($this->input->post('fullname')),
                    'gender' => $this->security->xss_clean($this->input->post('gender')),
                    'phone' => $this->security->xss_clean($this->input->post('phone')),
                    'kode' => $this->security->xss_clean($this->input->post('kode')),
                    'status' => $this->security->xss_clean($this->input->post('status')),
                    'id_level' => $this->security->xss_clean($this->input->post('id_level')),
                    'id_role' => $this->security->xss_clean($this->input->post('id_role'))
                );
            }else{
                $data = array(
                    'password' => $this->security->xss_clean(md5($this->input->post('fullname'))),
                    'fullname' => $this->security->xss_clean($this->input->post('fullname')),
                    'gender' => $this->security->xss_clean($this->input->post('gender')),
                    'phone' => $this->security->xss_clean($this->input->post('phone')),
                    'kode' => $this->security->xss_clean($this->input->post('kode')),
                    'status' => $this->security->xss_clean($this->input->post('status')),
                    'id_level' => $this->security->xss_clean($this->input->post('id_level')),
                    'id_role' => $this->security->xss_clean($this->input->post('id_role'))
                );
            }
            $this->user_model->editUser($id, $data);
            redirect('user/profil/'.$id);
        }
    }
    public function delete($id){
        $this->user_model->deleteUser($id);
        redirect('beranda');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */