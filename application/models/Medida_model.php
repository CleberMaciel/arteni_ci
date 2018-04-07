<?php

class Medida_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MEDIDA', $p);
    }

    function listarMedida() {
        $lista = $this->db->get('MEDIDA');
        return $lista->result();
    }

}
