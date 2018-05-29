<?php

class Modelo_tipo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) { 
        return $this->db->insert('MODELO_TIPO', $p);
    }

    function listar() {
        $lista = $this->db->get('CUSTO_PC');
        return $lista->result();
    }

}
