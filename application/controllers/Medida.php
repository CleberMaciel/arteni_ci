<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Medida extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Medida_model', 'model');
        
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['medida'] = $this->model->listarMedida();
        $this->load->view('admin/medida/medida', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $this->form_validation->set_rules('estampa', 'Estampa', 'required|is_unique[ESTAMPA.NOME]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('estampa_existe', 'msg');
            redirect('/Estampa');
        } else {
            $data['NOME'] = $this->input->post('estampa');
            $data['ID_ATIVO'] = $this->input->post('ativo');
            $result = $this->model->inserir($data);
            if ($result == true) {
                $this->session->set_flashdata('estampa_ok', 'msg');
                redirect('/Estampa');
            } else {
                $this->session->set_flashdata('estampa_fail', 'msg');
                redirect('/Estampa');
            }
        }
    }

}
