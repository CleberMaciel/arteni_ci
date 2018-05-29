<?php

class Categoria_modelo_model extends CI_Model {

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

    function listarModelos($id) {
        $this->db->select('*');
        $this->db->from('MODELO');
        $this->db->where('MODELO.ID_CATEGORIA', $id);
        return $this->db->get()->result();
    }

}
