<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos {
    function __construct() {
        
    }

    private $ci = NULL;

    public function pedidos() {
        $this->ci = &get_instance();
        $this->ci->load->library('cart');
        $this->ci->load->model('Pedidos_model', 'pedidos1');
        $this->ci->load->model('Itens_model', 'itens');


        $dados['CLIENTE'] = $this->ci->session->userdata('user_clientelogado')->ID_CLIENTE;
        $dados['PRODUTOS'] = $this->ci->cart->total();
        $dados['STATUS'] = 0;
        $this->ci->pedidos1->inserir($dados);
        $pedido = $this->ci->db->insert_id();

        foreach ($this->ci->cart->contents() as $p1) {
            $dados_item['PEDIDO'] = $pedido;
            $dados_item['ITEM'] = $p1['id'];
            $dados_item['QUANTIDADE'] = $p1['qty'];
            $dados_item['PRECO'] = number_format($p1['price'], 2, '.', '');
            $this->ci->itens->inserir($dados_item);
        }
    }

}
