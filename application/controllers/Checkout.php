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
        $this->load->model('Materia_sub_model', 'model_sub');
        $this->load->model('Produto_model', 'produto');
        $this->load->model('Produto_mp_model', 'produto_mp');
        $this->load->model('Categoria_modelo_model', 'categoria');
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
            $dados1['VALOR_PEDIDO'] = $this->cart->total();
            $dados1['STATUS_COMPRA'] = 0;
            $dados1['STATUS_VALIDO'] = 0;
            $this->pedidos->inserir($dados1);

            foreach ($dados as $d) {
                $itens['ID_PEDIDO'] = $config['reference'];
                $itens['ID_PRODUTO'] = $d['id'];
                $itens['QUANTIDADE'] = $d['quantidade'];
                $itens['PRECO'] = number_format($d['valor'], 2, '.', '');
                $this->itens->inserir($itens);

//                $itens['ID_PEDIDO'] = 1142;
//                $itens['ID_PRODUTO'] = 92;
//                $itens['QUANTIDADE'] = 1;
//                $itens['PRECO'] = 1.0;
//                $this->itens->inserir($itens);
            }
        } else {
            $botao['botao'] = "Sem itens no carrinho";
        }
        $data['categoria'] = $this->categoria->listar();
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/checkout/checkout', $botao);
        $this->load->view('publico/template/footer');
    }

    public function adicionar() {
        $data['ID_MATERIA_PRIMA'] = $this->input->post('idmateria');
        $data['STATUS_PC'] = 1;
        $id_produto = $this->produto->inserir($data);

        $dados['id'] = $id_produto;
        $dados['qty'] = $this->input->post('quantidade');
        $dados['price'] = $this->input->post('preco');
        $dados['name'] = $this->input->post('nome');
        $dados['foto'] = $this->input->post('foto');
        $this->cart->insert($dados);
        redirect("checkout");
    }

    //adiciona modelo ao carrinho de compras
    public function adicionarModelo() {
        $data['ID_MODELO'] = $this->input->post('idmodelo');
        $data['STATUS_PC'] = 1;

        $id_produto = $this->produto->inserir($data);
        foreach ($this->input->post('materiaprima') as $k => $m) {
            $data1['ID_PRODUTO'] = $id_produto;
            $data1['ID_MATERIA_PRIMA'] = $m;

            $data1['EXTERNO'] = $m[1];
            $data1['INTERNO'] = $m[1];
            $data1['QUANTIDADE'] = 1;
            $this->produto_mp->inserir($data1);
        }

        $dados['id'] = $id_produto;
        $dados['qty'] = 1;
        $dados['price'] = $this->input->post('preco');
        $dados['name'] = $this->input->post('nome');
        $dados['foto'] = 1;
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
