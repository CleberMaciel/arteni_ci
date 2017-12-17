<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $this->load->view('admin/template/header');
        $this->load->view('admin/produto/produto');
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        
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

}
