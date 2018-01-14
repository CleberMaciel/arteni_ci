<?php

class Produto_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('PRODUTO_CRIACAO', $p);
    }

    function listarProduto() {
        $this->db->select('ID_PRODUTO_CRIACAO');
        $this->db->select_max('CODIGO');
        $this->db->select('NOME');
        $this->db->select('ALTURA');
        $this->db->select('LARGURA');
        $this->db->select('PROFUNDIDADE');
        $this->db->select('ID_ATIVO');
        $this->db->group_by('CODIGO');
        return $this->db->get('PRODUTO_CRIACAO')->result();
    }

    function verInformacoes($idP) {
        $this->db->where('CODIGO', $idP);
        $result = $this->db->get('PRODUTO_CRIACAO');
        return $result->result();
    }

    function carregarMateriaPrima($cod) {
//        $this->db->select('MATERIA_PRIMA.NOME as NOME');
//        $this->db->from('PRODUTO_CRIACAO');
//        $this->db->join('MATERIA_PRIMA', 'PRODUTO_CRICAO.ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_MATERIA_PRIMA');
//        $this->db->where('PRODUTO_CRIACAO.CODIGO', $cod);
//        return $this->db->get()->result();
        $this->db->select('ID_PRODUTO_CRIACAO');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('PRODUTO_CRIACAO.QUANTIDADE');
        $this->db->from('PRODUTO_CRIACAO');
        $this->db->join('MATERIA_PRIMA', 'MATERIA_PRIMA.ID_MATERIA_PRIMA = PRODUTO_CRIACAO.ID_MATERIA_PRIMA');
        $this->db->where('PRODUTO_CRIACAO.CODIGO', $cod);
        return $this->db->get()->result();
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
