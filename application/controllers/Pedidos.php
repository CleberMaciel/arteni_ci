<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Pedidos_model', 'pedidos');
        $this->load->model('Materia_tipo_model', 'materia_tipo');

        $this->load->model('Materia_sub_model', 'model_sub');
        $this->load->model('Categoria_modelo_model', 'categoria');
    }

    public function index() {
        $this->load->view('publico/template/header');
        $this->load->view('publico/contato/contato');
        $this->load->view('publico/template/footer');
    }

    public function meusPedidos($id) {
        if (!$this->session->userdata('Clientelogado')) {
            redirect('cliente/login');
        }
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['categoria'] = $this->categoria->listar();
        $dados['pedidos'] = $this->pedidos->listarPedidos($id);
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/pedidos/pedidos', $dados);
        $this->load->view('publico/template/footer');
    }

    public function listarPedidosCliente() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['tipo'] = $this->materia_tipo->listarTipo();

        $dados['pedidos'] = $this->pedidos->listarPedidosClientes();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/cliente/pedidos', $dados);
        $this->load->view('admin/template/footer');
    }

    public function verPedido($id) {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $dados['pedidos'] = $this->pedidos->verItensPedido($id);
        $dados['materia'] = $this->pedidos->listarMateriaPedido($id);
        $dados['modelo'] = $this->pedidos->listarModeloPedido($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/cliente/pedido', $dados);
        $this->load->view('admin/template/footer');
    }

    public function verItensPedidos($id) {
        if (!$this->session->userdata('Clientelogado')) {
            redirect('cliente/login');
        }
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['categoria'] = $this->categoria->listar();
        $dados['pedidos'] = $this->pedidos->verItensPedido($id);
        $dados['materia'] = $this->pedidos->listarMateriaPedido($id);
        $dados['modelo'] = $this->pedidos->listarModeloPedido($id);
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/pedidos/itenspedido', $dados);
        $this->load->view('publico/template/footer');
    }

    public function atualizarRastreio() {
        $data['pedido'] = $pedido = $this->input->post('pedido');
        $data['codigo'] = $codigo = $this->input->post('codigo');
        $data['email'] = $email = $this->pedidos->retornarEmail($pedido);
        $this->pedidos->alterarRastreio($pedido, $codigo);
        $this->enviarRastreio($data);
        $this->session->set_flashdata('rastreio_enviado', 'msg');
        redirect('Home');
    }

    public function enviarRastreio($data) {
        $this->load->library('email');
        $mensagem = $this->load->view('admin/emails/rastreio', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Código de rastreio");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to($data['email']);
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            
        } else {
            print_r($this->email->print_debugger());
        }
    }

}
