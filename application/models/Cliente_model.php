<?php

class Cliente_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('CLIENTE', $p);
    }

    function listarCliente() {
        $lista = $this->db->get('CLIENTE');
        return $lista->result();
    }

    function listarEstampaCombo() {
        $this->db->where('ID_ATIVO = 1');
        $lista = $this->db->get('ESTAMPA');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $result = $this->db->get('ESTAMPA');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $data['id']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function ativo($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $this->db->set('ID_ATIVO', 1);
        return $this->db->update('ESTAMPA');
    }

    function inativo($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $this->db->set('ID_ATIVO', 2);
        return $this->db->update('ESTAMPA');
    }

    function retornaSenha($ids) {
        $this->db->select("CLIENTE.SENHA");
        $this->db->from("CLIENTE");
        $this->db->where("CLIENTE.ID_CLIENTE", $ids);
        return $this->db->get()->row()->SENHA;
    }

    function alterarSenha($nova, $ids) {
        $this->db->set("CLIENTE.SENHA", $nova);
        $this->db->where("CLIENTE.ID_CLIENTE", $ids);
        return $this->db->update("CLIENTE");
    }

}
