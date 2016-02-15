<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorium extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('pasien_model');
        $this->load->model('rekammedis_model');
        $this->load->model('laboratorium_model');
        $this->load->model('poliklinik_model');
    }
    // lab pemeriksaan darah
    public function darah(){ 
        $data['pasien'] = $this->pasien_model->getPasienLab(1);
        $data['menu']="labdarah";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('lab/darah', $data);
        $this->load->view('footer');  
    }
    public function inputlabdarah($id){
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['poli'] = $this->poliklinik_model->getPoli();
        $data['menu']="labdarah";
        $this->form_validation->set_rules('id_poliklinik','Poliklinik','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('lab/inputlabdarah', $data);
            $this->load->view('footer');
        }else{
            $dataHL = array(
                'id_pasien' => $id,
                'id_poli' => $this->security->xss_clean($this->input->post('id_poliklinik')),
                'id_lab' => 1,
                'id_user' => $this->session->userdata('id_user')
            );
            $this->laboratorium_model->setHasilLab($dataHL);
            $id_lab_result = $this->db->insert_id();
            $data = array(
                'id_hasil_lab' => $id_lab_result,
                'haemoglobin' => $this->security->xss_clean($this->input->post('haemoglobin')),
                'leucocyt' => $this->security->xss_clean($this->input->post('leucocyt')),
                'difrential_count' => $this->security->xss_clean($this->input->post('difrential_count')),
                'laju_endap_darah' => $this->security->xss_clean($this->input->post('laju_endap_darah')),
                'malaria_ddr' => $this->security->xss_clean($this->input->post('malaria_ddr')),
                'masa_pendarahan' => $this->security->xss_clean($this->input->post('masa_pendarahan')),
                'masa_pembekuan' => $this->security->xss_clean($this->input->post('masa_pembekuan')),
                'golongan_darah' => $this->security->xss_clean($this->input->post('golongan_darah')),
                'thrombocyt' => $this->security->xss_clean($this->input->post('thrombocyt')),
                'haematocyt' => $this->security->xss_clean($this->input->post('haematocyt')),
                'rumplead' => $this->security->xss_clean($this->input->post('rumplead'))
            );
            $this->laboratorium_model->setHasilLabDarah($data);
            $dataR = array('dicek' => 'Y');
            $idR = $this->input->post('id_rujukan');
            $this->laboratorium_model->updateRujukan($dataR, $idR);
            $dataRM = array(
                'id_pasien' => $id,
                'pesan' => 'Pasien telah diperiksa di lab pemeriksaan darah oleh '.$this->session->userdata('fullname'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran')
            );
            $this->rekammedis_model->setRM($dataRM);
            redirect('laboratorium/darah');
        }
    }
    // lab pemeriksaan klinis
    public function klinis(){ 
        $data['pasien'] = $this->pasien_model->getPasienLab(2);
        $data['menu']="labklinis";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('lab/klinis', $data);
        $this->load->view('footer');  
    }
    public function inputlabklinis($id){
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['poli'] = $this->poliklinik_model->getPoli();
        $data['menu']="labklinis";
        $this->form_validation->set_rules('id_poliklinik','Poliklinik','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('lab/inputlabklinis', $data);
            $this->load->view('footer');
        }else{
            $dataHL = array(
                'id_pasien' => $id,
                'id_poli' => $this->security->xss_clean($this->input->post('id_poliklinik')),
                'id_lab' => 2,
                'id_user' => $this->session->userdata('id_user')
            );
            $this->laboratorium_model->setHasilLab($dataHL);
            $id_lab_result = $this->db->insert_id();
            $data = array(
                'id_hasil_lab' => $id_lab_result,
                'protein_total' => $this->security->xss_clean($this->input->post('protein_total')),
                'albumin' => $this->security->xss_clean($this->input->post('albumin')),
                'bilirubin_total' => $this->security->xss_clean($this->input->post('bilirubin_total')),
                'bilirubin_direct' => $this->security->xss_clean($this->input->post('bilirubin_direct')),
                'silirubin_indirect' => $this->security->xss_clean($this->input->post('silirubin_indirect')),
                'sgot' => $this->security->xss_clean($this->input->post('sgot')),
                'sgpt' => $this->security->xss_clean($this->input->post('sgpt')),
                'ureum' => $this->security->xss_clean($this->input->post('ureum')),
                'creatinin' => $this->security->xss_clean($this->input->post('creatinin')),
                'glukosa_puasa' => $this->security->xss_clean($this->input->post('glukosa_puasa')),
                'glukosa_2_jpp' => $this->security->xss_clean($this->input->post('glukosa_2_jpp')),
                'glukosa_sewaktu' => $this->security->xss_clean($this->input->post('glukosa_sewaktu')),
                'trigliseride' => $this->security->xss_clean($this->input->post('trigliseride')),
                'cholestrol_total' => $this->security->xss_clean($this->input->post('cholestrol_total')),
                'asam_urat' => $this->security->xss_clean($this->input->post('asam_urat')),
                'rheumatoid_factor' => $this->security->xss_clean($this->input->post('rheumatoid_factor')),
                'analisis_sperma' => $this->security->xss_clean($this->input->post('analisis_sperma')),
                'pemeriksa' => $this->session->userdata('fullname')
            );
            $this->laboratorium_model->setHasilLabKlinis($data);
            $dataR = array('dicek' => 'Y');
            $idR = $this->input->post('id_rujukan');
            $this->laboratorium_model->updateRujukan($dataR, $idR);
            $dataRM = array(
                'id_pasien' => $id,
                'pesan' => 'Pasien telah diperiksa di lab pemeriksaan klinis oleh '.$this->session->userdata('fullname'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran')
            );
            $this->rekammedis_model->setRM($dataRM);
            redirect('laboratorium/klinis');
        }
    }
    // lab pemeriksaan urine
    public function urine(){ 
        $data['pasien'] = $this->pasien_model->getPasienLab(3);
        $data['menu']="laburine";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('lab/urine', $data);
        $this->load->view('footer');  
    }
    public function inputlaburine($id){
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['poli'] = $this->poliklinik_model->getPoli();
        $data['menu']="laburine";
        $this->form_validation->set_rules('id_poliklinik','Poliklinik','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('lab/inputlaburine', $data);
            $this->load->view('footer');
        }else{
            $dataHL = array(
                'id_pasien' => $id,
                'id_poli' => $this->security->xss_clean($this->input->post('id_poliklinik')),
                'id_lab' => 3,
                'id_user' => $this->session->userdata('id_user')
            );
            $this->laboratorium_model->setHasilLab($dataHL);
            $id_lab_result = $this->db->insert_id();
            $data = array(
                'id_hasil_lab' => $id_lab_result,
                'warna' => $this->security->xss_clean($this->input->post('warna')),
                'bj' => $this->security->xss_clean($this->input->post('bj')),
                'ph' => $this->security->xss_clean($this->input->post('ph')),
                'leukosit' => $this->security->xss_clean($this->input->post('leukosit')),
                'nitrite' => $this->security->xss_clean($this->input->post('nitrite')),
                'protein' => $this->security->xss_clean($this->input->post('protein')),
                'glucosa_reduksi' => $this->security->xss_clean($this->input->post('glucosa_reduksi')),
                'keton' => $this->security->xss_clean($this->input->post('keton')),
                'urobilinogen' => $this->security->xss_clean($this->input->post('urobilinogen')),
                'bilirubin' => $this->security->xss_clean($this->input->post('bilirubin')),
                'eritrosit_blood' => $this->security->xss_clean($this->input->post('eritrosit_blood')),
                'tes_kehamilan' => $this->security->xss_clean($this->input->post('tes_kehamilan')),
                'komentar' => $this->security->xss_clean($this->input->post('komentar')),
                'sedimen_eritrosit' => $this->security->xss_clean($this->input->post('sedimen_eritrosit')),
                'sedimen_lekosit' => $this->security->xss_clean($this->input->post('sedimen_lekosit')),
                'sedimen_epitel' => $this->security->xss_clean($this->input->post('sedimen_epitel')),
                'silinder_jenis' => $this->security->xss_clean($this->input->post('silinder_jenis')),
                'kristal_asam_urat' => $this->security->xss_clean($this->input->post('kristal_asam_urat')),
                'kristal_triple_po4' => $this->security->xss_clean($this->input->post('kristal_triple_po4')),
                'kristal_ca_oksalat' => $this->security->xss_clean($this->input->post('kristal_ca_oksalat')),
                'kristal_ca_co3' => $this->security->xss_clean($this->input->post('kristal_ca_co3')),
                'kristal_ca_po4' => $this->security->xss_clean($this->input->post('kristal_ca_po4')),
                'bakteri' => $this->security->xss_clean($this->input->post('bakteri')),
                'jamur' => $this->security->xss_clean($this->input->post('jamur')),
                'pemeriksa' => $this->session->userdata('fullname'),
                'poli_bangsal' => $this->session->userdata('poli_bangsal')
            );
            $this->laboratorium_model->setHasilLabUrine($data);
            $dataR = array('dicek' => 'Y');
            $idR = $this->input->post('id_rujukan');
            $this->laboratorium_model->updateRujukan($dataR, $idR);
            $dataRM = array(
                'id_pasien' => $id,
                'diagnosa' => $this->security->xss_clean($this->input->post('diagnosa')),
                'pesan' => 'Pasien telah diperiksa di lab pemeriksaan urine oleh '.$this->session->userdata('fullname'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran')
            );
            $this->rekammedis_model->setRM($dataRM);
            redirect('laboratorium/urine');
        }
    }
    // lab feces rutin
    public function feces(){ 
        $data['pasien'] = $this->pasien_model->getPasienLab(4);
        $data['menu']="labfeces";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('lab/feces', $data);
        $this->load->view('footer');  
    }
    public function inputlabfeces($id){
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['poli'] = $this->poliklinik_model->getPoli();
        $data['menu']="labfeces";
        $this->form_validation->set_rules('id_poliklinik','Poliklinik','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('lab/inputlabfeces', $data);
            $this->load->view('footer');
        }else{
            $dataHL = array(
                'id_pasien' => $id,
                'id_poli' => $this->security->xss_clean($this->input->post('id_poliklinik')),
                'id_lab' => 3,
                'id_user' => $this->session->userdata('id_user')
            );
            $this->laboratorium_model->setHasilLab($dataHL);
            $id_lab_result = $this->db->insert_id();
            $data = array(
                'id_hasil_lab' => $id_lab_result,
                'warna' => $this->security->xss_clean($this->input->post('warna')),
                'konsistensi' => $this->security->xss_clean($this->input->post('konsistensi')),
                'lendir' => $this->security->xss_clean($this->input->post('lendir')),
                'darah' => $this->security->xss_clean($this->input->post('darah')),
                'tc_askaris_lumbricoides' => $this->security->xss_clean($this->input->post('tc_askaris_lumbricoides')),
                'tc_ankilostonum_duodenale' => $this->security->xss_clean($this->input->post('tc_ankilostonum_duodenale')),
                'tc_trikuris' => $this->security->xss_clean($this->input->post('tc_trikuris')),
                'tc_stongiloides' => $this->security->xss_clean($this->input->post('tc_stongiloides')),
                'sel_eritrosit' => $this->security->xss_clean($this->input->post('sel_eritrosit')),
                '_sel_lekosit' => $this->security->xss_clean($this->input->post('_sel_lekosit')),
                'sel_epitel' => $this->security->xss_clean($this->input->post('sel_epitel')),
                'parasit_entamuba_histolitica' => $this->security->xss_clean($this->input->post('parasit_entamuba_histolitica')),
                'parasit_entamuba_coli' => $this->security->xss_clean($this->input->post('parasit_entamuba_coli')),
                'parasit_basil_coli' => $this->security->xss_clean($this->input->post('parasit_basil_coli')),
                'sm_serat_daging' => $this->security->xss_clean($this->input->post('sm_serat_daging')),
                'sm_sisa_tumbuhan' => $this->security->xss_clean($this->input->post('sm_sisa_tumbuhan')),
                'sm_globul_lemak' => $this->security->xss_clean($this->input->post('sm_globul_lemak')),
                'pemeriksa' => $this->session->userdata('fullname'),
                'poli_ruang' => $this->session->userdata('poli_ruang')
            );
            $this->laboratorium_model->setHasilLabFeces($data);
            $dataR = array('dicek' => 'Y');
            $idR = $this->input->post('id_rujukan');
            $this->laboratorium_model->updateRujukan($dataR, $idR);
            $dataRM = array(
                'id_pasien' => $id,
                'pesan' => 'Pasien telah diperiksa di lab feces rutin oleh '.$this->session->userdata('fullname'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran')
            );
            $this->rekammedis_model->setRM($dataRM);
            redirect('laboratorium/feces');
        }
    }
    // lab hematologi manual
    public function hematologi(){ 
        $data['pasien'] = $this->pasien_model->getPasienLab(5);
        $data['menu']="labhematologi";
        $this->load->view('header');
        $this->load->view('menu',$data);
        $this->load->view('lab/hematologi', $data);
        $this->load->view('footer');  
    }
    public function inputlabhematologi($id){
        $data['pasien'] = $this->pasien_model->getPasien($id);
        $data['poli'] = $this->poliklinik_model->getPoli();
        $data['menu']="labhematologi";
        $this->form_validation->set_rules('id_poliklinik','Poliklinik','required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('header');
            $this->load->view('menu',$data);
            $this->load->view('lab/inputlabhematologi', $data);
            $this->load->view('footer');
        }else{
            $dataHL = array(
                'id_pasien' => $id,
                'id_poli' => $this->security->xss_clean($this->input->post('id_poliklinik')),
                'id_lab' => 3,
                'id_user' => $this->session->userdata('id_user')
            );
            $this->laboratorium_model->setHasilLab($dataHL);
            $id_lab_result = $this->db->insert_id();
            $data = array(
                'id_hasil_lab' => $id_lab_result,
                'haemoglobin' => $this->security->xss_clean($this->input->post('haemoglobin')),
                'lekosit' => $this->security->xss_clean($this->input->post('lekosit')),
                'hjl_eosinofil' => $this->security->xss_clean($this->input->post('hjl_eosinofil')),
                'hjl_basofil' => $this->security->xss_clean($this->input->post('hjl_basofil')),
                'hjl_netrofil' => $this->security->xss_clean($this->input->post('hjl_netrofil')),
                'hjl_limfosit' => $this->security->xss_clean($this->input->post('hjl_limfosit')),
                'hjl_monosit' => $this->security->xss_clean($this->input->post('hjl_monosit')),
                'trombosit' => $this->security->xss_clean($this->input->post('trombosit')),
                'led_jam' => $this->security->xss_clean($this->input->post('led_jam')),
                'bleeding_time' => $this->security->xss_clean($this->input->post('bleeding_time')),
                'clotting_time' => $this->security->xss_clean($this->input->post('clotting_time')),
                'golongan_darah' => $this->security->xss_clean($this->input->post('golongan_darah')),
                'rhesus' => $this->security->xss_clean($this->input->post('rhesus')),
                'malaria_ddr' => $this->security->xss_clean($this->input->post('malaria_ddr')),
                'pemeriksa' => $this->session->userdata('fullname'),
                'poli_ruang' => $this->session->userdata('poli_ruang')
            );
            $this->laboratorium_model->setHasilLabHematologi($data);
            $dataR = array('dicek' => 'Y');
            $idR = $this->input->post('id_rujukan');
            $this->laboratorium_model->updateRujukan($dataR, $idR);
            $dataRM = array(
                'id_pasien' => $id,
                'diagnosa' => $this->security->xss_clean($this->input->post('diagnosa')),
                'pesan' => 'Pasien telah diperiksa di lab hematologi manual oleh '.$this->session->userdata('fullname'),
                'id_pendaftaran' => $this->input->post('id_pendaftaran')
            );
            $this->rekammedis_model->setRM($dataRM);
            redirect('laboratorium/hematologi');
        }
    }
}

/* End of file Laboratorium.php */
/* Location: ./application/controllers/Laboratorium.php */