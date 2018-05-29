<?php

//Sub pasta

defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_tipo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('modelo_tipo_model', 'modelo_tipo');
    }

    function inserir() {
        $data['ID_SUB_MPT'] = $this->input->post('materia_prima');
        $data['ID_MODELO'] = $this->input->post('modelo');
        $data['QUANTIDADE'] = $this->input->post('quantidade');
        $this->modelo_tipo->inserir($data);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

}
