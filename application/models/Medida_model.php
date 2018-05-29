<?php

class Medida_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MEDIDA', $p);
    }

    function listar() {
        $lista = $this->db->get('MEDIDA');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('ID_MEDIDA', $id);
        $result = $this->db->get('MEDIDA');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MEDIDA', $data['ID_MEDIDA']);
        $this->db->set($data);
        return $this->db->update('MEDIDA');
    }

}
