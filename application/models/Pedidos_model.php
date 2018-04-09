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
        $this->db->select('PEDIDOS.PRODUTOS');
        $this->db->select('PEDIDOS.STATUS_COMPRA');

        $this->db->from('PEDIDOS');
        $this->db->where('CLIENTE', $id);
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
        return $this->db->get()->row();
    }

    function listar_tipo_materia($idi) {
        $this->db->select('MATERIA_PRIMA.ID_MATERIA_PRIMA');
        $this->db->select('MATERIA_PRIMA.NOME');
        $this->db->select('MATERIA_PRIMA.IMAGEM');
        $this->db->select('MATERIA_PRIMA.VALOR');
        $this->db->select('MATERIA_PRIMA.DESCRICAO');
    }

}
