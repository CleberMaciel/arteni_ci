<?php

class Materia_prima_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MATERIA_PRIMA', $p);
    }

    function listarMateria() {
        $lista = $this->db->get('MATERIA_PRIMA');
        return $lista->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MATERIA_PRIMA', $data['id']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA');
    }

    function ativo($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('ATIVO_ID_ATIVO', 1);
        return $this->db->update('MATERIA_PRIMA');
    }

    function inativo($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('ATIVO_ID_ATIVO', 2);
        return $this->db->update('MATERIA_PRIMA');
    }

}
