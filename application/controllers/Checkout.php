<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('Clientelogado')) {
            redirect('cliente/login');
        }
        $this->load->library('pagseguro');
        $this->load->library('cart');
        $this->load->model('Materia_tipo_model', 'materia_tipo');
        $this->load->model('Cliente_model', 'cliente');
        $this->load->model('Pedidos_model', 'pedidos');
        $this->load->model('Itens_model', 'itens');
        $this->load->model('Checkout_model', 'check');
    }

    public function index() {
        $dados = NULL;
        $usuario = array(
            'id' => $this->session->userdata('user_clientelogado')->ID_CLIENTE,
            'nome' => $this->session->userdata('user_clientelogado')->NOME,
            'ddd' => '21', // só números
            'telefone' => '99887766', // só números
            'email' => $this->session->userdata('user_clientelogado')->EMAIL,
            'shippingType' => 3, //1=Encomenda normal (PAC), 2=SEDEX, 3=Tipo de frete não especificado.
            'cep' => $this->session->userdata('user_clientelogado')->CEP, // só números
            'logradouro' => $this->session->userdata('user_clientelogado')->RUA,
            'numero' => $this->session->userdata('user_clientelogado')->NUMERO,
            'compl' => $this->session->userdata('user_clientelogado')->COMPLEMENTO,
            'bairro' => $this->session->userdata('user_clientelogado')->BAIRRO,
            'cidade' => $this->session->userdata('user_clientelogado')->CIDADE,
            'uf' => $this->session->userdata('user_clientelogado')->ESTADO,
            'pais' => 'BRA'
        );

        $this->pagseguro->set_user($usuario);

        // insere produtos para botão PagSeguro
        foreach ($this->cart->contents() as $p) {

            $produtos['id'] = $p['id'];
            $produtos['name'] = $p['name'];
            $produtos['valor'] = number_format($p['price'], 2, '.', '');
            $produtos['descricao'] = "teste";
            $produtos['quantidade'] = $p['qty'];
            $produtos['peso'] = 0;
            if ($produtos != NULL) {
                $dados[] = $produtos;
                $this->pagseguro->set_products($dados);
            }
        }

        // ID do pedido
        $config['reference'] = rand(999, 9999);
        // gera botão

        if ($dados != null) {
            $botao['botao'] = $this->pagseguro->get_button($config);


            $dados1['ID_PEDIDOS'] = $config['reference'];
            $dados1['CLIENTE'] = $this->session->userdata('user_clientelogado')->ID_CLIENTE;
            $dados1['PRODUTOS'] = $this->cart->total();
            $dados1['STATUS_COMPRA'] = 0;
            $dados1['STATUS_VALIDO'] = 0;
            $this->pedidos->inserir($dados1);

            foreach ($dados as $d) {
                $itens['PEDIDO'] = $config['reference'];
                $itens['ITEM'] = $d['name'];
                $itens['QUANTIDADE'] = $d['quantidade'];
                $itens['PRECO'] = number_format($d['valor'], 2, '.', '');
                $this->itens->inserir($itens);
            }
        } else {
            $botao['botao'] = "Sem itens no carrinho";
        }

        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/checkout/checkout', $botao);
        $this->load->view('publico/template/footer');
    }

    public function adicionar() {
        $dados['id'] = $this->input->post('id');
        $dados['qty'] = $this->input->post('quantidade');
        $dados['price'] = $this->input->post('preco');
        $dados['name'] = $this->input->post('nome');
        $dados['foto'] = $this->input->post('foto');
        $this->cart->insert($dados);
        redirect("checkout");
    }

    public function atualizar() {
        foreach ($this->input->post() as $item) {
            if (isset($item['rowid'])) {
                $data = array('rowid' => $item['rowid'], 'qty' => $item['qty']);
                $this->cart->update($data);
            }
        }
        redirect('checkout');
    }

    public function remover($id) {
        $data = array('rowid' => $id, 'qty' => 0);
        $this->cart->update($data);
        redirect('checkout');
    }

}
