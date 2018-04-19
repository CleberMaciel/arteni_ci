<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'materia_tipo');
    }

    public function index() {
        $data['materia'] = $this->materia_tipo->listar_tipo_materia(49);
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico//materia_prima/materia', $data);
        $this->load->view('publico/template/footer');
    }

}
