<?php

class Pedidos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('PEDIDOS', $p);
    }

    function listarPedidos($id) {
        $this->db->select('PEDIDOS.ID_PEDIDOS');
        $this->db->select('PEDIDOS.CLIENTE');
        $this->db->select('PEDIDOS.DATA');
        $this->db->select('PEDIDOS.VALOR_PEDIDO');
        $this->db->select('PEDIDOS.STATUS_COMPRA');
        $this->db->from('PEDIDOS');
        $this->db->join('CLIENTE', 'CLIENTE.ID_CLIENTE= PEDIDOS.CLIENTE');
        $this->db->where('CLIENTE.ID_CLIENTE', $id);
        $this->db->where('STATUS_VALIDO', 1);
        $this->db->order_by('PEDIDOS.DATA', "desc");
        return $this->db->get()->result();
    }

    function listarPedidosClientes() {
        $this->db->select('PEDIDOS.ID_PEDIDOS');
        $this->db->select('CLIENTE.NOME');
        $this->db->select('CLIENTE.EMAIL');
        $this->db->select('PEDIDOS.DATA');
        $this->db->select('PEDIDOS.RASTREIO');
        $this->db->select('PEDIDOS.VALOR_PEDIDO');
        $this->db->select('PEDIDOS.STATUS_COMPRA');
        $this->db->from('PEDIDOS');
        $this->db->join('CLIENTE', 'CLIENTE.ID_CLIENTE= PEDIDOS.CLIENTE');
        $this->db->where('STATUS_VALIDO', 1);

        return $this->db->get()->result();
    }

//    select CLIENTE.EMAIL FROM CLIENTE
//    join PEDIDOS
//    on PEDIDOS.CLIENTE = CLIENTE.ID_CLIENTE AND PEDIDOS.ID_PEDIDOS = 5797 AND STATUS_COMPRA = 3 AND STATUS_VALIDO = 1
    function notificarCliente($referencia) {
        $this->db->select('CLIENTE.EMAIL');
        $this->db->from('CLIENTE');
        $this->db->join('PEDIDOS', 'CLIENTE.ID_CLIENTE = PEDIDOS.CLIENTE');
        $this->db->where('PEDIDOS.ID_PEDIDOS', $referencia);
        $this->db->where('STATUS_VALIDO', 1);
        return $this->db->get()->result();
    }

    function listar_tipo_materia($idi) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
    }

    function exibirDashboardPedidos() {
        return $this->db->query("select COUNT(PEDIDOS.ID_PEDIDOS) as resultado
                                from PEDIDOS
                                where PEDIDOS.STATUS_VALIDO =1")->row()->resultado;
    }

    function exibirUltimosPedidos() {
        return $this->db->query("SELECT PEDIDOS.ID_PEDIDOS, "
                        . "PEDIDOS.RASTREIO, date_format(DATA, '%d/%m/%Y') as DATA_F, "
                        . "PEDIDOS.STATUS_VALIDO, PEDIDOS.VALOR_PEDIDO "
                        . "FROM PEDIDOS "
                        . "WHERE PEDIDOS.STATUS_VALIDO = 1 AND RASTREIO='não enviado' ORDER BY DATA_F DESC")->result();
    }

    function verItensPedido($id) {
        return $this->db->query("select PEDIDOS.ID_PEDIDOS, PEDIDOS.RASTREIO ,CLIENTE.NOME, CLIENTE.RUA, CLIENTE.BAIRRO, CLIENTE.NUMERO, PEDIDOS.DATA, PEDIDOS.VALOR_PEDIDO
                                from CLIENTE    
                                join PEDIDOS
                                on PEDIDOS.CLIENTE = CLIENTE.ID_CLIENTE
                                where PEDIDOS.ID_PEDIDOS =" . $id)->result();
    }

    function listarMateriaPedido($idi) {
        return $this->db->query("select MATERIA_PRIMA.NOME, ITENS_PEDIDOS.QUANTIDADE, ITENS_PEDIDOS.PRECO, PEDIDOS.VALOR_PEDIDO
                                from PEDIDOS
                                join ITENS_PEDIDOS
                                on ITENS_PEDIDOS.ID_PEDIDO = PEDIDOS.ID_PEDIDOS
                                join MATERIA_PRIMA
                                on ITENS_PEDIDOS.ID_MATERIA_PRIMA = MATERIA_PRIMA.ID_MATERIA_PRIMA
                                where PEDIDOS.ID_PEDIDOS =" . $idi)->result();
    }

    function listarModeloPedido($idi) {
        return $this->db->query("select PRODUTO.PRODUTO_ID,MODELO.ID_MODELO, MODELO.NOME, ITENS_PEDIDOS.QUANTIDADE, ITENS_PEDIDOS.PRECO, PRODUTO_MP.EXTERNO, PRODUTO_MP.INTERNO from PEDIDOS join ITENS_PEDIDOS on ITENS_PEDIDOS.ID_PEDIDO = PEDIDOS.ID_PEDIDOS join PRODUTO on PRODUTO.PRODUTO_ID = ITENS_PEDIDOS.PRODUTO_ID join PRODUTO_MP on PRODUTO.PRODUTO_ID = PRODUTO_MP.PRODUTO_ID left join MATERIA_PRIMA as MP on PRODUTO_MP.INTERNO=MP.ID_MATERIA_PRIMA left join MATERIA_PRIMA AS M on PRODUTO_MP.EXTERNO = M.ID_MATERIA_PRIMA join MODELO on MODELO.ID_MODELO = PRODUTO_MP.ID_MODELO where PEDIDOS.ID_PEDIDOS =" . $idi)->result();
    }

    function retornarEmail($pedido) {
        return $this->db->query("select CLIENTE.EMAIL AS EMAIL
                                from CLIENTE
                                join PEDIDOS
                                on CLIENTE.ID_CLIENTE = PEDIDOS.CLIENTE
                                where PEDIDOS.ID_PEDIDOS =" . $pedido)->row()->EMAIL;
    }

    function alterarRastreio($pedido, $codigo) {
        $this->db->where('PEDIDOS.ID_PEDIDOS', $pedido);
        $this->db->set('PEDIDOS.RASTREIO', $codigo);
        return $this->db->update('PEDIDOS');
    }

}
