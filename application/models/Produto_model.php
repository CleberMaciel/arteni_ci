<?php

class Produto_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
         $this->db->insert('PRODUTO', $p);
        return $this->db->insert_id();
    }

    function listar() {
        $lista = $this->db->get('PRODUTO');
        return $lista->result();
    }

    function listarProduto() {
        $this->db->select('ID_PRODUTO_CRIACAO');
        $this->db->select('PRODUTO_CRIACAO.NOME');
        $this->db->select('PRODUTO_CRIACAO.ALTURA');
        $this->db->select('PRODUTO_CRIACAO.PROFUNDIDADE');
        $this->db->select('PRODUTO_CRIACAO.LARGURA');
        $this->db->select('CUSTO_PC.ID_CUSTO');
        $this->db->select('CUSTO_PC.DESCRICAO');
        $this->db->from('PRODUTO_CRIACAO');
        $this->db->join('CUSTO_PC', 'CUSTO_PC.ID_CUSTO = PRODUTO_CRIACAO.ID_CUSTO');
        return$this->db->get()->result();
    }

    function carregarMateriaPrima($cod) {
        $this->db->select('PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('PRODUTO_MP.QUANTIDADE');
        $this->db->from('PRODUTO_MP');        
        $this->db->join('MATERIA_PRIMA', 'PRODUTO_MP.ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->join('PRODUTO_CRIACAO', 'PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO= PRODUTO_MP.ID_PRODUTO_CRIACAO');
        $this->db->where('PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO', $cod);
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
