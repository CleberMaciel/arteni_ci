<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'materia_tipo');
    }

    public function index() {
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/produtos/produtos');
        $this->load->view('publico/template/footer');
    }

}
