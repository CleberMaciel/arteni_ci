<?php

//Sub pasta

defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_materia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('modelo_materia_model', 'modelo_materia');
    }

    function inserir() {
        $data['ID_MATERIA_PRIMA'] = $this->input->post('materia_prima');
        $data['ID_MODELO'] = $this->input->post('modelo');
        $data['QUANTIDADE'] = $this->input->post('quantidade');
        $this->modelo_materia->inserir($data);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

}
