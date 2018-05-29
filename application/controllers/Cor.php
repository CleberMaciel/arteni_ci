<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Cor_model', 'cor');

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['cor'] = $this->cor->listar();
        $this->load->view('admin/cor/cor', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $data['NOME'] = $this->input->post('cor');
        $this->cor->inserir($data);
        redirect('/cor');
    }

    public function editar($idi) {
        $data['cor'] = $this->cor->editar($idi);
        $this->load->view('admin/template/header');
        $this->load->view('admin/cor/editar', $data);
        $this->load->view('admin/template/footer');
    }

    public function atualizar() {
        $data['ID_COR'] = $this->input->post('ID_COR');
        $data['NOME'] = $this->input->post('cor');
        $this->cor->atualizar($data);
        redirect('/Cor');
    }

}
