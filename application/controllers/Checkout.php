<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pagseguro');
        $this->load->library('cart');
        $this->load->model('Materia_tipo_model', 'materia_tipo');
        $this->load->model('Cliente_model', 'cliente');
    }

    public function index() {
        $data['tipo'] = $this->materia_tipo->listarTipo();

        // OPCIONAL //
        // dados do usuário para gerar botão
        $usuario = array(
            'id' => 1,
            'nome' => 'Fulano da Silva',
            'ddd' => '21', // só números
            'telefone' => '99887766', // só números
            'email' => 'macielcleberjr@gmail.com',
            'shippingType' => 3, //1=Encomenda normal (PAC), 2=SEDEX, 3=Tipo de frete não especificado.
            'cep' => '24210445', // só números
            'logradouro' => 'Rua do Cliente',
            'numero' => '123',
            'compl' => '456',
            'bairro' => 'Meu bairro',
            'cidade' => 'Minha cidade',
            'uf' => 'RJ',
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

            $dados[] = $produtos;
        }
        $this->pagseguro->set_products($dados);

        // ID do pedido
        $config['reference'] = rand(999, 9999);

        // gera botão
        $botao['botao'] = $this->pagseguro->get_button($config);


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

    public function retorno_pagseguro() {
        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

        if (count($_POST) > 0) {

            // SALVA O POST PARA DEGUG
            $this->debug($_P0ST);

            $informacao = array();

            // POST recebido, indica que é a requisição do NPI,
            // ou notificação de status
            $this->load->library('pagseguro'); //Carrega a library
            // faz conexão com PS para validar o retorno
            $retorno = $this->pagseguro->notificationPost();

            // quando recebe uma notificação que necessita uma requisição GET 
            // para recuperar status da transação
            $notificationType = (isset($_POST['notificationType']) && $_POST['notificationType'] != '') ? $_POST['notificationType'] : FALSE;
            $notificationCode = (isset($_POST['notificationCode']) && $_POST['notificationCode'] != '') ? $_POST['notificationCode'] : FALSE;

            // É uma notificação de status. Passa a ação para o método que vai 
            // atualizar o status do pedido.
//            if ($notificationType && $notificationCode) {
//
//                $not = $this->pagseguro->get_notification($notificationCode);
//                
//            }
            // informação quando é enviado um POST completo
            $transacaoID = (isset($_POST['TransacaoID'])) ? $_POST['TransacaoID'] : '';

            // Se existe $transacaoID é uma notificação via POST logo após a
            // solicitação de pagamento, neste momento
//            if ($transacaoID) {
//
//                /*
//                 * FAZ AS ATUALIZAÇÕES COM A NOTIFICAÇÃO DE STATUS
//                 */
//            }
            //O post foi validado pelo PagSeguro.
            if ($retorno == "VERIFICADO") {

                if ($_POST['StatusTransacao'] == 'Aprovado') {
                    $informacao['status'] = '1';
                } elseif ($_POST['StatusTransacao'] == 'Em Análise') {
                    $informacao['status'] = '2';
                } elseif ($_POST['StatusTransacao'] == 'Aguardando Pagto') {
                    $informacao['status'] = '3';
                } elseif ($_POST['StatusTransacao'] == 'Completo') {
                    $informacao['status'] = '4';
                } elseif ($_POST['StatusTransacao'] == 'Cancelado') {
                    $informacao['status'] = '5';
                }
            } else if ($retorno == "FALSO") {
                //O post não foi validado pelo PagSeguro.
                $informacao['status'] = '1000';
            } else {
                //Erro na integração com o PagSeguro.
                $informacao['status'] = '6';
            }
        } else {
            // POST não recebido, indica que a requisição é o retorno do Checkout PagSeguro.
            // No término do checkout o usuário é redirecionado para este bloco.
            // redirecionar para página de OBRIGADO e aguarde...
            // redirect('loja');
            redirect('Painel');
        }
        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

        $this->view->load('notificacao', $informacao);
    }

    // -------------------------------------------------------------------------

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
