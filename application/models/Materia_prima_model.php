<?php

class Materia_prima_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MATERIA_PRIMA', $p);
    }

    function listarMateria() {
        $lista = $this->db->get('MATERIA_PRIMA');
        return $lista->result();
    }

    function listarMateriaCombo() {
        $this->db->where('STATUS_MP = 1');
        $lista = $this->db->get('MATERIA_PRIMA');
        return $lista->result();
    }

    function detalhes($idi) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->from('MATERIA_PRIMA');
        $this->db->join('SUB_MPT', 'SUB_MPT.ID_SUB_MPT = MATERIA_PRIMA.ID_SUB_MPT');
        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = SUB_MPT.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('MATERIA_PRIMA.ID_MATERIA_PRIMA', $idi);
        return $this->db->get()->result();
    }

    function editar($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $result = $this->db->get('MATERIA_PRIMA');
        return $result->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MATERIA_PRIMA', $data['ID_MATERIA_PRIMA']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA');
    }

    function ativo($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('STATUS_MP', 1);
        return $this->db->update('MATERIA_PRIMA');
    }

    function inativo($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('STATUS_MP', 2);
        return $this->db->update('MATERIA_PRIMA');
    }

    function ativoVenda($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('STATUS_VENDA', 1);
        return $this->db->update('MATERIA_PRIMA');
    }

    function inativoVenda($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('STATUS_VENDA', 2);
        return $this->db->update('MATERIA_PRIMA');
    }

    function retornaQuantidade($idM) {
        return $this->db->query('select QTD_TOTAL from MATERIA_PRIMA where ID_MATERIA_PRIMA =' . $idM)->row()->QTD_TOTAL;
    }

    function reduzirMateriaPrima($idM, $valor) {
        $this->db->select('QTD_TOTAL');
        $this->db->from('MATERIA_PRIMA');
        $this->db->where('ID_MATERIA_PRIMA', $idM);
        $this->db->set('QTD_TOTAL', $valor);
        return $this->db->update('MATERIA_PRIMA');
    }

}
