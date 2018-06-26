<?php

class Modelo_materia_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MODELO_MATERIA', $p);
    }

    function listar() {
        $lista = $this->db->get('CUSTO_PC');
        return $lista->result();
    }

    function remover($modelo, $materia) {
        $this->db->where('ID_MODELO', $modelo);
        $this->db->where('ID_MATERIA_PRIMA', $materia);
        return $this->db->delete('MODELO_MATERIA');
    }

}
