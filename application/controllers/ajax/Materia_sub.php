<?php

//Sub pasta

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_sub extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

        public function listarSubMateria() {
        $sub = $this->input->post('sub');
        echo $this->Materia_sub_model->listarSubMateriaAjax($sub);
        
    }

}
