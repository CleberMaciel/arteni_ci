<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listar_materia extends CI_Controller {

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

    public function listar_materia($idi) {
        $data['materia'] = $this->model->listar_tipo_materia($idi);
        $data['tipo'] = $this->model->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/materia_prima/materia', $data);
        $this->load->view('publico/template/footer');
    }

}
