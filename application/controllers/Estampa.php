<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estampa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Estampa_model', 'estampa');
        $this->load->model('Cor_model', 'cor');

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $this->load->view('admin/template/header');
        $data['estampa'] = $this->estampa->listarEstampa();
        $data['cor'] = $this->cor->listar();
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
            $data['ID_COR'] = $this->input->post('cor');
            $result = $this->estampa->inserir($data);
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
        $result = $this->estampa->inativo($id);
        if ($result == true) {
            $this->session->set_flashdata('estampa_inativo_ok', 'msg');
            redirect('/Estampa');
        } else {
            $this->session->set_flashdata('estampa_fail', 'msg');
            redirect('/Estampa');
        }
    }

    public function ativo($id) {
        $result = $this->estampa->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('estampa_ativo_ok', 'msg');
            redirect('/Estampa');
        } else {
            $this->session->set_flashdata('estampa_ativo_fail', 'msg');
            redirect('/Estampa');
        }
    }

    public function editar($idi) {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['estampa'] = $this->estampa->editar($idi);
        $data['cor'] = $this->cor->listar();
        $this->load->view('admin/template/header');

        $this->load->view('admin/estampa/editar', $data);
        $this->load->view('admin/template/footer');
    }
    
    
    public function atualizar() {
        $data['ID_ESTAMPA'] = $this->input->post('ID_ESTAMPA');
        $data['NOME'] = $this->input->post('estampa');
        $data['ID_COR'] = $this->input->post('cor');
        $this->estampa->atualizar($data);
        redirect('/estampa');
    }

}
