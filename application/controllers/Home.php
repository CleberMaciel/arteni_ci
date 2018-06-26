<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }

        $this->load->model('Materia_prima_model', 'materia');
        $this->load->model('Pedidos_model', 'pedidos');
        $this->load->model('Pedidos_model', 'pedidos');
    }

    public function index() {
        $data['materia'] = $this->materia->retornarDashboardMateria();
        $data['pedido'] = $this->pedidos->exibirDashboardPedidos();
        $data['pedidos'] = $this->pedidos->exibirUltimosPedidos();
        $data['materia_estoque'] = $this->materia->exibirDashboardMateria();
        $data['teste'] = "Cu";
        $this->load->view('admin/template/header');
        $this->load->view('admin/home', $data);
        $this->load->view('admin/template/footer');
    }

}
