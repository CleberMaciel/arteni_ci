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

    function listar_tipo_materia($idi) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
       
        $this->db->from('MATERIA_PRIMA');
        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO', $idi);
        $this->db->where('MATERIA_PRIMA.ID_VENDA', 1);
        return $this->db->get()->result();
    }

    function detalhes($idi) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->from('MATERIA_PRIMA');
        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('MATERIA_PRIMA.ID_MATERIA_PRIMA', $idi);
        return $this->db->get()->result();
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
        $this->db->set('ID_ATIVO', 1);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function inativo($id) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $id);
        $this->db->set('ID_ATIVO', 2);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

}
