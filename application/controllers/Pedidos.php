<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Pedidos_model', 'pedidos');
        $this->load->model('Materia_tipo_model', 'materia_tipo');
    }

    public function index() {
        $this->load->view('publico/template/header');
        $this->load->view('publico/contato/contato');
        $this->load->view('publico/template/footer');
    }

    public function meusPedidos($id) {
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $dados['pedidos'] = $this->pedidos->listarPedidos($id);
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/pedidos/pedidos', $dados);
        $this->load->view('publico/template/footer');
    }

    public function listarPedidosCliente() {
        $data['tipo'] = $this->materia_tipo->listarTipo();

        $dados['pedidos'] = $this->pedidos->listarPedidosClientes();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/cliente/pedidos', $dados);
        $this->load->view('admin/template/footer');
    }

}
