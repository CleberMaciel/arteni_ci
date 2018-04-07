<?php

class Checkout_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserirPedidos($p) {
        return $this->db->insert('PEDIDOS', $p);
    }

    function listarCliente() {
        $lista = $this->db->get('CLIENTE');
        return $lista->result();
    }

    function listarEstampaCombo() {
        $this->db->where('ID_ATIVO = 1');
        $lista = $this->db->get('ESTAMPA');
        return $lista->result();
    }

    function editar($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $result = $this->db->get('ESTAMPA');
        return $result->result();
    }

    function atualizarPedido($id, $n) {
        $this->db->where('ID_PEDIDO', $id);
        $this->db->set('STATUS_COMPRA', $n);
        $this->db->set('STATUS_VALIDO', 1);
        return $this->db->update('PEDIDOS');
    }

    function ativo($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $this->db->set('ID_ATIVO', 1);
        return $this->db->update('ESTAMPA');
    }

    function inativo($id) {
        $this->db->where('ID_ESTAMPA', $id);
        $this->db->set('ID_ATIVO', 2);
        return $this->db->update('ESTAMPA');
    }

}
