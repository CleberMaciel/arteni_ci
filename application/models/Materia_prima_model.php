<?php

class Materia_prima_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('MATERIA_PRIMA', $p);
    }

    function listarMateria() {
        return $this->db->get('MATERIA_PRIMA')->result();
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

    function retornaQuantidadeMin($idM) {
        return $this->db->query('select QTD_MIN from MATERIA_PRIMA where ID_MATERIA_PRIMA =' . $idM)->row()->QTD_MIN;
    }

    function reduzirMateriaPrima($id, $valor) {

        return $this->db->query('update MATERIA_PRIMA SET QTD_TOTAL = QTD_TOTAL - ' . $valor . ' WHERE ID_MATERIA_PRIMA = ' . $id);
    }

    function retornaValor($referencia) {
        return $this->db->query('select MATERIA_PRIMA.QTD_TOTAL - ITENS_PEDIDOS.QUANTIDADE AS VALOR
                                from MATERIA_PRIMA
                                join ITENS_PEDIDOS 
                                on ITENS_PEDIDOS.ID_MATERIA_PRIMA  = MATERIA_PRIMA.ID_MATERIA_PRIMA 
                                join PEDIDOS 
                                on PEDIDOS.ID_PEDIDOS = ITENS_PEDIDOS.ID_PEDIDO 
                                WHERE PEDIDOS.ID_PEDIDOS =' . $referencia)->row()->VALOR;
    }

    function retornaIdMateria($referencia) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->from('MATERIA_PRIMA');
        $this->db->join('ITENS_PEDIDOS', 'ITENS_PEDIDOS.ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_');
        $this->db->join('PEDIDOS', 'PEDIDOS.ID_PEDIDOS = ITENS_PEDIDOS.ID_PEDIDO');
        $this->db->where('PEDIDOS.ID_PEDIDOS', $referencia);
        return $this->db->get()->row()->ID_MATERIA_PRIMA;
    }

    function retornarDashboardMateria() {
        return $this->db->query("select COUNT(MATERIA_PRIMA.ID_MATERIA_PRIMA) AS resultado
                            from MATERIA_PRIMA
                            WHERE QTD_MIN >= QTD_TOTAL")->row()->resultado;
    }

    function exibirDashboardMateria() {
        return $this->db->query("select COUNT(MATERIA_PRIMA.ID_MATERIA_PRIMA) AS resultado "
                        . "from MATERIA_PRIMA")->row()->resultado;
    }

    function retornarEmailMateria($idi) {
        return $this->db->query("select MATERIA_PRIMA.ID_MATERIA_PRIMA, MATERIA_PRIMA.NOME, MATERIA_PRIMA.QTD_TOTAL
                       FROM MATERIA_PRIMA WHERE MATERIA_PRIMA.ID_MATERIA_PRIMA =" . $idi)->result();
    }

    function relatorioMateriaEstoque() {
        return $this->db->query("select *"
                        . "from MATERIA_PRIMA where QTD_MIN >= QTD_TOTAL")->result();
    }

    function comboModeloExterno() {
        return $this->db->query("select * from MATERIA_PRIMA where STATUS_MP = 1 AND EXTERNO = 1")->result();
    }

    function comboModeloInterno() {
        return $this->db->query("select * from MATERIA_PRIMA where STATUS_MP = 1 AND EXTERNO = 0")->result();
    }

}
