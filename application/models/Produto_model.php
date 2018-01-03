<?php

class Produto_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('PRODUTO_CRIACAO', $p);
    }

    function listarEstampa() {
        $lista = $this->db->get('PRODUTO_CRIACAO');
        return $lista->result();
    }

    function listarEstampaCombo() {
        $this->db->where('ID_ATIVO = 1');
        $lista = $this->db->get('PRODUTO_CRIACAO');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('ID_PRODUTO_CRIACAO', $id);
        $result = $this->db->get('PRODUTO_CRIACAO');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $data['id']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function ativo($id) {
        $this->db->where('ID_PRODUTO_CRIACAO', $id);
        $this->db->set('ID_ATIVO', 1);
        return $this->db->update('PRODUTO_CRIACAO');
    }

    function inativo($id) {
        $this->db->where('ID_PRODUTO_CRIACAO', $id);
        $this->db->set('ID_ATIVO', 2);
        return $this->db->update('PRODUTO_CRIACAO');
    }

}
