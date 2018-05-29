<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Medida extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Medida_model', 'medida');

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['medida'] = $this->medida->listar();
        $this->load->view('admin/medida/medida', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $data['NOME'] = $this->input->post('medida');
        $data['DESCRICAO'] = $this->input->post('descricao');
        $this->medida->inserir($data);
        redirect('/Medida');
    }
    
    public function editar($idi) {
        $data['medida'] = $this->medida->editar($idi);
        $this->load->view('admin/template/header');
        $this->load->view('admin/medida/editar', $data);
        $this->load->view('admin/template/footer');
    }

    public function atualizar() {
        $data['ID_MEDIDA'] = $this->input->post('ID_MEDIDA');
        $data['NOME'] = $this->input->post('medida');
        $data['DESCRICAO'] = $this->input->post('descricao');
        $this->medida->atualizar($data);
        redirect('/Medida');
    }

}
