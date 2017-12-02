<?php

class Materia_prima_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MATERIA_PRIMA', $p);
    }

    function listarMateria() {
//        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA,MATERIA_PRIMA.NOME,MATERIA_PRIMA.DESCRICAO,MATERIA_PRIMA.IMAGEM,MATERIA_PRIMA.QTD_TOTAL, DATE_FORMAT(MATERIA_PRIMA.DATA_ADICIONADO, "%d/%m/%Y") as  DATA, MATERIA_PRIMA_TIPO.NOME, ESTAMPA.NOME');
//        $this->db->from('MATERIA_PRIMA');
//        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA.MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO');
//        $this->db->join('ESTAMPA', 'MATERIA_PRIMA.ESTAMPA_ID_ESTAMPA = ESTAMPA.ID_ESTAMPA');
//        $result = $this->db->get();
//        return $result->result();
        $lista = $this->db->get('MATERIA_PRIMA');
        return $lista->result();
    }

    function atualizar($data) {
        $this->db->where('ID_MATERIA_PRIMA', $data['id']);
        $this->db->set($data);
        return $this->db->update('MATERIA_PRIMA');
    }

    function ativo($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('ATIVO_ID_ATIVO', 1);
        return $this->db->update('MATERIA_PRIMA');
    }

    function inativo($id) {
        $this->db->where('ID_MATERIA_PRIMA', $id);
        $this->db->set('ATIVO_ID_ATIVO', 2);
        return $this->db->update('MATERIA_PRIMA');
    }

}
