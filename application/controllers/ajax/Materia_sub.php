<?php

//Sub pasta

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_sub extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

        public function listarSubMateria() {
        $materia_tipo = $this->input->post('materia_tipo');
        echo $this->Materia_sub_model->listarSubMateriaAjax($materia_tipo);
    }

}
