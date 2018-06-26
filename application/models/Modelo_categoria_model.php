<?php

class Modelo_categoria_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('CATEGORIA_MODELO', $p);
    }

    function listar() {
        $lista = $this->db->get('CATEGORIA_MODELO');
        return $lista->result();
    }

}
