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
    }

    public function index() {
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/checkout/checkout');
        $this->load->view('publico/template/footer');
    }

    public function finalizar() {

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
        $botao['botao'] = $this->pagseguro->get_button($config);


        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/checkout/finalizar', $botao);
        $this->load->view('publico/template/footer');
    }

    public function pedidos() {
        $dados['CLIENTE'] = $this->session->userdata('user_clientelogado')->ID_CLIENTE;
        $dados['PRODUTOS'] = $this->cart->total();
        $dados['STATUS'] = 0;
        $this->pedidos->inserir($dados);
        $pedido = $this->db->insert_id();

        foreach ($this->cart->contents() as $p) {
            $dados_item['PEDIDO'] = $pedido;
            $dados_item['ITEM'] = $p['id'];
            $dados_item['QUANTIDADE'] = $p['qty'];
            $dados_item['PRECO'] = number_format($p['price'], 2, '.', '');
            if ($dados_item != NULL) {
                $this->itens->inserir($dados_item);
            }
        }
        redirect('checkout/finalizar');
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

    public function finalizado() {
        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        $code = $_POST['notificationCode'];
        $type = $_POST['notificationType'];
        if ($type == 'transaction') {
            $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/" . $code . "?email=macielcleberjr@gmail.com&token=FE6AB1C36B5E4280A72402402126892E";
            $content = file_get_contents($url);
            $xml = simplexml_load_string($content);
            foreach ($xml as $elemento) {
                $dados['PEDIDO'] = 111;
                $dados['ITEM'] = $elemento->id;
                $dados['QUANTIDADE'] = $elemento->quantity;
                $dados['PRECO'] = $elemento->amount;
                $this->itens->inserir($dados);
            }

            $this->enviarStatus($xml->status);
//            if ($xml->status > 3) {
//            
////    $db->query("UPDATE pedido SET status = 2 WHERE token = '{$xml->reference}'");
//            }
        }
    }

    public function enviarStatus($status) {
//1 - Aguardando pagamento
//2 - Em analise
//3 - Paga
//4 - Disponivel
//5 - Em disputa
//6 - Devolvida
//7 - Cancelada
//8 - Debitado
//9 - Retenção temporaria
        if ($status == 1) {
            $subject = "Aguardando Pagamento";
            $mensagem = "Estamos aguardando pagamento.";
        } elseif ($status == 2) {
            $subject = "Em analise";
            $mensagem = "Seu pagamento está em analise.";
        } elseif ($status == 3) {
            $subject = "Pago";
            $mensagem = "Recebemos seu pagamento.Obrigado!";
        } elseif ($status == 4) {
            $subject = "";
            $mensagem = "";
        } elseif ($status == 5) {
            $subject = "";
            $mensagem = "";
        } elseif ($status == 6) {
            $subject = "";
            $mensagem = "";
        } elseif ($status == 7) {
            $subject = "";
            $mensagem = "";
        } elseif ($status == 8) {
            $subject = "";
            $mensagem = "";
        } elseif ($status == 9) {
            $subject = "";
            $mensagem = "";
        }

        $this->load->library('email');
//        $mensagem = $this->load->view('publico/emails/confirmar_cadastro', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject($subject);
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to($this->session->userdata('user_clientelogado')->EMAIL);
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            $this->session->set_flashdata('cadastro_concluido', 'msg');
            redirect('/Ecommerce');
        } else {
            print_r($this->email->print_debugger());
        }
    }

    /**
     * Exemplode como consultar status de notificação
     * @param string $code
     */
    public function check($code = NULL) {

        if ($code === NULL) {
            $code = '45AC39-82659E659E9A-72242E0FAAB7-1EEBBF';
        }

        $string = $this->pagseguro->get_notification($code);

        var_dump($string);
    }

// -------------------------------------------------------------------------
    /**
     * Salva um array no arquivo pagseguro...php em cache/
     * @param type $array
     */
    public function debug($array) {

        $data = array();
        foreach ($array as $c => $v) {
            $data[] = $c . ': ' . $v;
        }

        $output = implode("\n", $data);

        $this->load->helper('file');
        write_file(APPPATH . "cache/pagseguro_" . date("Y-m-d_h-i") . ".php", $output);
    }

}
