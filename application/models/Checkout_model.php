<?php

class Checkout_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserirPedidos($p) {
        return $this->db->insert('PEDIDOS', $p);
    }

    function atualizarPedido($id, $n) {
        $this->db->where('ID_PEDIDOS', $id);
        $this->db->set('STATUS_COMPRA', $n);
        $this->db->set('STATUS_VALIDO', 1);
        return $this->db->update('PEDIDOS');
    }

}
