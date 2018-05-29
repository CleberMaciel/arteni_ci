<?php

class Estampa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('ESTAMPA', $p);
    }

    function listarEstampa() {
        $lista = $this->db->get('ESTAMPA');
        return $lista->result();
    }

    function listarEstampaCombo() {
        $this->db->where('STATUS_E  = 1');
        $lista = $this->db->get('ESTAMPA');
        return $lista->result();
    }

    function editar($idi) {
        $this->db->where('ID_ESTAMPA', $idi);
        $result = $this->db->get('ESTAMPA');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_ESTAMPA', $data['ID_ESTAMPA']);
        $this->db->set($data);
        return $this->db->update('ESTAMPA');
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
