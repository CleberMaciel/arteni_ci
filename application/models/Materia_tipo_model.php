<?php

class Materia_tipo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MATERIA_PRIMA_TIPO', $p);
    }

    function listarTipo() {
        $lista = $this->db->get('MATERIA_PRIMA_TIPO');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $id);
        $result = $this->db->get('MATERIA_PRIMA_TIPO');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $data['id']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function ativo($id) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $id);
        $this->db->set('ATIVO_ID_ATIVO', 1);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function inativo($id) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $id);
        $this->db->set('ATIVO_ID_ATIVO', 2);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function deletar($id) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $id);
        return $this->db->delete('MATERIA_PRIMA_TIPO');
    }

}
