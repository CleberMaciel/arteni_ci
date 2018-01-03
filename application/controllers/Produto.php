<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_prima_model', 'model_prima');
        $this->load->model('Produto_model', 'produto');

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $data['materia'] = $this->model_prima->listarMateria();
        $this->load->view('admin/template/header');
        $this->load->view('admin/produto/produto', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $this->form_validation->set_rules('codigo', 'PRODUTO_CRIACAO', 'required|is_unique[PRODUTO_CRIACAO.CODIGO]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('produto_existe', 'msg');
            redirect('/Produto');
        } else {
            $data['ID_ATIVO'] = $this->input->post('ativo');
            $data['CODIGO'] = $this->input->post('codigo');
            $data['NOME'] = $this->input->post('nome');
            $data['LARGURA'] = $this->input->post('largura');
            $data['ALTURA'] = $this->input->post('altura');
            $data['PROFUNDIDADE'] = $this->input->post('profundidade');
            $data['ID_MATERIA_PRIMA'] = $this->input->post('materia_prima');
            $data['QUANTIDADE'] = $this->input->post('quantidade');

            $result = $this->produto->inserir($data);
            if ($result == true) {
                $this->session->set_flashdata('estampa_ok', 'msg');
                redirect('/Produto');
            } else {
                $this->session->set_flashdata('estampa_fail', 'msg');
                redirect('/Produto');
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
            redirect('/Produto');
        } else {
            $this->session->set_flashdata('tipo_ativo_fail', 'msg');
            redirect('/Produto');
        }
    }

}
