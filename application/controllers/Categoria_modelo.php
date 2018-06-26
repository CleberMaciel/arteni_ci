<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_modelo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Categoria_modelo_model', 'categoria');


        $this->load->model('Materia_sub_model', 'model_sub');
    }

    public function index() {
        $data['categoria'] = $this->categoria->listar();
        $this->load->view('admin/template/header');
        $this->load->view('admin/modelo/categoria',$data);
        $this->load->view('admin/template/footer');
    }

    public function salvar() {


        $data['NOME'] = $this->input->post('nome');

        if ($this->categoria->inserir($data)) {
            $this->enviar_email($data);
        } else {
            redirect('/Categoria_modelo');
        }
    }

}
