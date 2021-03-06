<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_tipo extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('Materia_tipo_model', 'model');
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $this->load->view('admin/template/header');
        $data['tipo'] = $this->model->listarTipo();
        $this->load->view('admin/materiaPrima/tipo', $data);
        $this->load->view('admin/template/footer');
    }

    public function detalhes($idi) {
        $data['materia'] = $this->model->detalhes($idi);
        $data['tipo'] = $this->model->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/materia_prima/detalhes', $data);
        $this->load->view('publico/template/footer');
    }

    public function inserir() {
        $this->form_validation->set_rules('tipo', 'Tipo', 'required|is_unique[MATERIA_PRIMA_TIPO.NOME]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('tipo_existe', 'msg');
            redirect('Materia_tipo');
        } else {
            $data['NOME'] = $this->input->post('tipo');

            $result = $this->model->inserir($data);
            if ($result == true) {
                $this->session->set_flashdata('tipo_ok', 'msg');
                redirect('/Materia_tipo');
            } else {
                $this->session->set_flashdata('tipo_fail', 'msg');
                redirect('/Materia_tipo');
            }
        }
    }

    public function inativo($id) {
        $result = $this->model->inativo($id);
        if ($result == true) {
            $this->session->set_flashdata('tipo_inativo_ok', 'msg');
            redirect('/Materia_tipo');
        } else {
            $this->session->set_flashdata('tipo_inativo_fail', 'msg');
            redirect('/Materia_tipo');
        }
    }

    public function ativo($id) {
        $result = $this->model->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('tipo_ativo_ok', 'msg');
            redirect('/Materia_tipo');
        } else {
            $this->session->set_flashdata('tipo_ativo_fail', 'msg');
            redirect('/Materia_tipo');
        }
        ;
    }

    function excluir($id) {
        $this->model->deletar($id);
        redirect('Materia_tipo');
    }

    public function editar($id) {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
//        $data['sub'] = $this->model_sub->lista();
//        $data['estampa'] = $this->model_estampa->listarEstampaCombo();
//        $data['materia'] = $this->model_prima->listarMateria();
//        $data['cor'] = $this->cor->listar();
//        $data['medida'] = $this->medida->listar();
        $data['model'] = $this->model->editar($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/materiaPrima/tipo_editar', $data);
        $this->load->view('admin/template/footer');
    }

    public function atualizar() {



        $data['ID_MATERIA_PRIMA_TIPO'] = $this->input->post('id');
        $data['NOME'] = $this->input->post('nome');

        $result = $this->model->atualizar($data);
        if ($result == true) {
            $this->session->set_flashdata('prima_atualizada', 'msg');
            redirect('/home');
        } else {
            $this->session->set_flashdata('prima_fail', 'msg');
            redirect('/Materia_tipo');
        }
    }

}
