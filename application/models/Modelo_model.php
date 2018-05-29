<?php

class Modelo_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        $this->db->insert('MODELO', $p);
        return $this->db->insert_id();
    }

    function listar() {
        $this->db->select_max('ID_MODELO', 'ID_MODELO');
        $this->db->select('NOME', 'NOME');
        $this->db->select('ALTURA', 'ALTURA');
        $this->db->select('LARGURA', 'LARGURA');
        $this->db->select('PROFUNDIDADE', 'PROFUNDIDADE');
        $this->db->select('IMAGEM', 'IMAGEM');
        $this->db->select('STATUS_MODELO', 'STATUS_MODELO');
        $this->db->group_by('ID_MODELO');
        $lista = $this->db->get('MODELO');
        return $lista->result();
    }

    function informacoes($idi) {
        $this->db->select('MODELO.ID_MODELO, MODELO.NOME, MODELO.DESCRICAO');
        $this->db->select('CATEGORIA_MODELO.NOME AS CAT_NOME');
        $this->db->select('SUB_MPT.NOME AS SUB_NOME');
        $this->db->select('MODELO_TIPO.QUANTIDADE AS QUANTIDADE');
        $this->db->from('MODELO');
        $this->db->join('CATEGORIA_MODELO', 'CATEGORIA_MODELO.ID_CATEGORIA = MODELO.ID_CATEGORIA');
        $this->db->join('MODELO_TIPO', 'MODELO.ID_MODELO = MODELO_TIPO.ID_MODELO');
        $this->db->join('SUB_MPT', 'MODELO_TIPO.ID_SUB_MPT = SUB_MPT.ID_SUB_MPT');
        $this->db->where('MODELO.ID_MODELO', $idi);
        return $this->db->get()->result();
    }

//publico
    function detalhes($idi) {
        $this->db->select('*');
        $this->db->from('MODELO');
        $this->db->where('ID_MODELO', $idi);
        return $this->db->get()->result();
    }

}
