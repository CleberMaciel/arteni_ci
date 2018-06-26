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
        $this->db->select('MODELO.ID_MODELO, MODELO.NOME, MODELO.DESCRICAO, MODELO.QUANTIDADE_INTERNO, MODELO.QUANTIDADE_EXTERNO');
        $this->db->select('CATEGORIA_MODELO.NOME AS CAT_NOME');
        $this->db->select('MATERIA_PRIMA.NOME AS SUB_NOME');
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MODELO_MATERIA.QUANTIDADE AS QUANTIDADE');
        $this->db->from('MODELO');
        $this->db->join('CATEGORIA_MODELO', 'CATEGORIA_MODELO.ID_CATEGORIA = MODELO.ID_CATEGORIA');
        $this->db->join('MODELO_MATERIA', 'MODELO.ID_MODELO = MODELO_MATERIA.ID_MODELO');
        $this->db->join('MATERIA_PRIMA', 'MODELO_MATERIA.ID_MATERIA_PRIMA= MATERIA_PRIMA.ID_MATERIA_PRIMA');
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

    //lista materia prima do modelo
    function exibeModelo($id) {
        return $this->db->query("SELECT MODELO.NOME, PEDIDOS.ID_PEDIDOS, PRODUTO_MP.EXTERNO, PRODUTO_MP.INTERNO
                                from PRODUTO_MP
                                join MODELO 
                                on PRODUTO_MP.ID_MODELO = MODELO.ID_MODELO 
                                join MATERIA_PRIMA AS MAT1
                                on MAT1.ID_MATERIA_PRIMA = PRODUTO_MP.EXTERNO
                               	join MATERIA_PRIMA AS MAT2
                                on MAT2.ID_MATERIA_PRIMA = PRODUTO_MP.INTERNO
                                join ITENS_PEDIDOS
                                on ITENS_PEDIDOS.PRODUTO_ID = PRODUTO_MP.PRODUTO_ID
                                join PEDIDOS
                                on PEDIDOS.ID_PEDIDOS = ITENS_PEDIDOS.ID_PEDIDO
                                WHERE PRODUTO_MP.PRODUTO_ID =" . $id)->result();
    }

    function retornaQuantidade($idmodelo) {
        return $this->db->query("select MODELO.QUANTIDADE_INTERNO, MODELO.QUANTIDADE_EXTERNO from MODELO
                          where MODELO.ID_MODELO =" . $idmodelo)->result();
    }

    function retornaQuantidadeInterno($idmodelo) {
        return $this->db->query("select MODELO.QUANTIDADE_INTERNO from MODELO
                          where MODELO.ID_MODELO =" . $idmodelo)->row()->QUANTIDADE_INTERNO;
    }

    function retornaQuantidadeExterno($idmodelo) {
        return $this->db->query("select MODELO.QUANTIDADE_EXTERNO from MODELO
                          where MODELO.ID_MODELO =" . $idmodelo)->row()->QUANTIDADE_EXTERNO;
    }

    function retornaPredefinicao($idi) {
        return $this->db->query("select MODELO.ID_MODELO, MATERIA_PRIMA.NOME, MATERIA_PRIMA.ID_MATERIA_PRIMA, QUANTIDADE
                            from MODELO_MATERIA
                            join MODELO
                            on MODELO.ID_MODELO = MODELO_MATERIA.ID_MODELO
                            join MATERIA_PRIMA
                            on MATERIA_PRIMA.ID_MATERIA_PRIMA = MODELO_MATERIA.ID_MATERIA_PRIMA
                            WHERE MODELO.ID_MODELO =" . $idi)->result();
    }

    function ativoVenda($id) {
        $this->db->where('ID_MODELO', $id);
        $this->db->set('STATUS_MODELO', 1);
        return $this->db->update('MODELO');
    }

    function inativoVenda($id) {
        $this->db->where('ID_MODELO', $id);
        $this->db->set('STATUS_MODELO', 2);
        return $this->db->update('MODELO');
    }

}
