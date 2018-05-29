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
        $this->db->select('MATERIA_PRIMA.QTD_TOTAL');

        $this->db->from('MATERIA_PRIMA');
//        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA.ID_MATERIA_PRIMA_TIPO');
//        $this->db->where('MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO', $idi);
//        $this->db->where('MATERIA_PRIMA.ID_VENDA', 1);
        return $this->db->get()->result();
    }

    function mostrarMateria($id) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
         $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
        $this->db->select('MATERIA_PRIMA.ID_SUB_MPT');
         $this->db->select('MATERIA_PRIMA.QTD_TOTAL');
        $this->db->from('MATERIA_PRIMA');
        $this->db->join('SUB_MPT', 'SUB_MPT.ID_SUB_MPT = MATERIA_PRIMA.ID_SUB_MPT');
        //   $this->db->join('PRODUTO_MP', 'PRODUTO_MP.ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_MATERIA_PRIMA');
        //   $this->db->join('PRODUTO_CRIACAO','PRODUTO_CRIACAO.ID_PRODUTO_CRIACAO = PRODUTO_MP.ID_PRODUTO_CRIACAO' );
        //    $this->db->join('CUSTO_PC', 'PRODUTO_CRIACAO.ID_CUSTO = CUSTO_PC.ID_CUSTO');

        $this->db->where('MATERIA_PRIMA.ID_SUB_MPT', $id);
        //  $this->db->where('CUSTO_PC.ID_CUSTO', 1);
        $this->db->where('MATERIA_PRIMA.STATUS_VENDA', 1);
        return $this->db->get()->result();
    }

    function lista() {
        $this->db->select('MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO');
        $this->db->select('MATERIA_PRIMA_TIPO.NOME');
        $this->db->from('MATERIA_PRIMA_TIPO');
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
        $this->db->set('STATUS_MPT', 1);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

    function inativo($id) {
        $this->db->where('ID_MATERIA_PRIMA_TIPO', $id);
        $this->db->set('STATUS_MPT', 2);
        return $this->db->update('MATERIA_PRIMA_TIPO');
    }

}
