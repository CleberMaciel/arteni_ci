<?php

class Cor_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('COR', $p);
    }

    function listar() {
        $lista = $this->db->get('COR');
        return $lista->result();
    }

    function listarEstampaCombo() {
        $this->db->where('STATUS_E  = 1');
        $lista = $this->db->get('ESTAMPA');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('ID_COR', $id);
        $result = $this->db->get('COR');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_COR', $data['ID_COR']);
        $this->db->set($data);
        return $this->db->update('COR');
    }

    function ativo($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $this->db->set('STATUS_E', 1);
        return $this->db->update('ESTAMPA');
    }

    function inativo($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $this->db->set('STATUS_E', 2);
        return $this->db->update('ESTAMPA');
    }

}
