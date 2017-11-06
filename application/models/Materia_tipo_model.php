<?php

class Materia_tipo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MATERIA_PRIMA_TIPO', $p);
    }

    function deletar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('MATERIA_PRIMA_TIPO');
    }

    function listarPessoas() {
        $lista = $this->db->get('MATERIA_PRIMA_TIPO');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('id', $id);
        $result = $this->db->get('MATERIA_PRIMA_TIPO');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

}
