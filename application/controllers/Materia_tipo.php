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
        $this->load->view('admin/materiaPrima/tipo',$data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $data['NOME'] = $this->input->post('texto');
        $data['ATIVO_ID_ATIVO'] = $this->input->post('ativo');
        $this->model->inserir($data);
        redirect('Materia_tipo');
    }

    public function listar() {
        $this->load->view('admin/template/header');
        $data[tipo] = $this->model->listarTipo();
        $this->load->view('admin/template/footer');
    }

}
