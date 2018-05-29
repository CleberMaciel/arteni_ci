<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'materia_tipo');
        $this->load->model('Materia_sub_model', 'model_sub');
        $this->load->model('Categoria_modelo_model', 'categoria');
    }

    public function index() {
        $data['materia'] = $this->materia_tipo->listar_tipo_materia(5);
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['categoria'] = $this->categoria->listar();
        
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/materia_prima/materia', $data);
        $this->load->view('publico/template/footer');
    }

}
