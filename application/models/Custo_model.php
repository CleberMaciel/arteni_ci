<?php

class Custo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('CUSTO_PC', $p);
    }

    function listar() {
        $lista = $this->db->get('CUSTO_PC');
        return $lista->result();
    }

}
