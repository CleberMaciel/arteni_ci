<?php

class Materia_sub_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('SUB_MPT', $p);
    }

    function listar() {
        $lista = $this->db->get('SUB_MPT');
        return $lista->result();
    }

    function lista() {
        $this->db->select('SUB_MPT.ID_SUB_MPT');
        $this->db->select('SUB_MPT.NOME');
        $this->db->select('SUB_MPT.ID_MATERIA_PRIMA_TIPO');
        $this->db->select('MATERIA_PRIMA_TIPO.NOME as NOMET');
        $this->db->from('SUB_MPT');
        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = SUB_MPT.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('SUB_MPT.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO');
        return $this->db->get()->result();
    }

    function listarSubCombo($idi) {
        return $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA, MATERIA_PRIMA.NOME')
                        ->from('MATERIA_PRIMA')
                        ->join('SUB_MPT', 'SUB_MPT.ID_SUB_MPT = MATERIA_PRIMA.ID_SUB_MPT')
                        ->where(array('SUB_MPT.ID_SUB_MPT' => $idi))
                        ->get()
                        ->result();
    }

    function listarSubMateriaAjax($idi) {
        $materia = $this->listarSubCombo($idi);
        $op = "<option></option>";
        foreach ($materia as $m) {
            $op .= "<option value = '{$m->ID_MATERIA_PRIMA}'>$m->NOME</option>" . PHP_EOL;
        }
        return $op;
    }

    function listaSub() {
        $this->db->select('SUB_MPT.ID_SUB_MPT');
        $this->db->select('SUB_MPT.NOME');
        $this->db->select('SUB_MPT.ID_MATERIA_PRIMA_TIPO');
        $this->db->from('SUB_MPT');
        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = SUB_MPT.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('SUB_MPT.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('MATERIA_PRIMA_TIPO.STATUS_MPT',1);
        return $this->db->get()->result();
    }

    function listar_tipo_materia($idi) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
        $this->db->select('MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO');

        $this->db->from('MATERIA_PRIMA');
        $this->db->join('MATERIA_PRIMA_TIPO', 'MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA.ID_MATERIA_PRIMA_TIPO');
        $this->db->where('MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO', $idi);
        $this->db->where('MATERIA_PRIMA.ID_VENDA', 1);
        return $this->db->get()->result();
    }

}
