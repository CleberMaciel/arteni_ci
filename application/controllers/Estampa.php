<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estampa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Estampa_model', 'model');
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['estampa'] = $this->model->listarEstampa();
        $this->load->view('admin/estampa/estampa', $data);
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

    public function inativo($id) {
        $result = $this->model->inativo($id);
        if ($result == true) {
            $this->session->set_flashdata('estampa_inativo_ok', 'msg');
            redirect('/Estampa');
        } else {
            $this->session->set_flashdata('estampa_fail', 'msg');
            redirect('/Estampa');
        }
    }

    public function ativo($id) {
        $result = $this->model->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('estampa_ativo_ok', 'msg');
            redirect('/Estampa');
        } else {
            $this->session->set_flashdata('estampa_ativo_fail', 'msg');
            redirect('/Estampa');
        }
    }

}
