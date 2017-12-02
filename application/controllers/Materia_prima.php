<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_prima extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_prima_model', 'model_prima');
        $this->load->model('Materia_tipo_model', 'model_tipo');
        $this->load->model('Estampa_model', 'model_estampa');
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['tipo'] = $this->model_tipo->listarTipo();
        $data['estampa'] = $this->model_estampa->listarEstampa();
        $data['materia'] = $this->model_prima->listarMateria();
        $this->load->view('admin/materiaPrima/materia_prima', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $this->form_validation->set_rules('nome', 'NOME', 'required|is_unique[MATERIA_PRIMA.NOME]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('prima_existe', 'msg');
            redirect('Materia_prima');
        } else {
            $data['NOME'] = $this->input->post('nome');
            $data['DESCRICAO'] = $this->input->post('descricao');
            $data['QTD_TOTAL'] = $this->input->post('quantidade');
            $data['IMAGEM'] = $this->input->post('img');
            $data['MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO'] = $this->input->post('tipo');
            $data['ESTAMPA_ID_ESTAMPA'] = $this->input->post('estampa');
            $data['ATIVO_ID_ATIVO'] = $this->input->post('ativo');
            $result = $this->model_prima->inserir($data);
            if ($result == true) {
                $this->session->set_flashdata('prima_ok', 'msg');
                redirect('/Materia_prima');
            } else {
                $this->session->set_flashdata('prima_fail', 'msg');
                redirect('/Materia_prima');
            }
        }
    }

    public function inativo($id) {
        $result = $this->model_prima->inativo($id);
        if ($result == true) {
            $this->session->set_flashdata('prima_inativo_ok', 'msg');
            redirect('/Materia_prima');
        } else {
            $this->session->set_flashdata('prima_inativo_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

    public function ativo($id) {
        $result = $this->model_prima->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('prima_ativo_ok', 'msg');
            redirect('/Materia_prima');
        } else {
            $this->session->set_flashdata('prima_ativo_fail', 'msg');
            redirect('/Materia_prima');
        }
        ;
    }
}
