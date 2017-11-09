<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_tipo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'model');
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['tipo'] = $this->model->listarTipo();
        $this->load->view('admin/materiaPrima/tipo', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $data['NOME'] = $this->input->post('texto');
        $data['ATIVO_ID_ATIVO'] = $this->input->post('ativo');
        $result = $this->model->inserir($data);
        if ($result == true) {
            $this->session->set_flashdata('tipo_ok', 'msg');
            redirect('/Materia_tipo');
        } else {
            $this->session->set_flashdata('tipo_fail', 'msg');
            redirect('/Materia_tipo');
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
        $this->model->ativo($id);
        redirect('Materia_tipo');
    }

    function excluir($id) {
        $this->model->deletar($id);
        redirect('Materia_tipo');
    }

}
