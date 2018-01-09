<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_listar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_prima_model', 'model_prima');
        $this->load->model('Produto_model', 'produto');

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $data['produto'] = $this->produto->listarProduto();
        $this->load->view('admin/template/header');
        $this->load->view('admin/produto/listar', $data);
        $this->load->view('admin/template/footer');
    }

    public function verInformacoes($idP) {
        $data['informacoes'] = $this->produto->verInformacoes($idP);
       // $this->load->view('admin/template/header');
        $this->load->view('admin/produto/informacoes', $data);
        //$this->load->view('admin/template/footer');
    }

}
