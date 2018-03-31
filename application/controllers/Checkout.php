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

    public function foi() {
        $valor = 200.00;
        // URL DE SANDBOX
        $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/';
        $data['email'] = 'macielcleberjr@gmail.com';
        $data['token'] = 'FE6AB1C36B5E4280A72402402126892E';
        $data['currency'] = 'BRL';
        $data['itemId1'] = "1";
        $data['itemDescription1'] = "Descrição do item/produto";
        $data['itemAmount1'] = number_format($valor, 2, '.', '');
        $data['itemQuantity1'] = 1;
        $data['itemWeight1'] = 0;
        $data['reference'] = 153; //aqui vai o código que será usado para receber os retornos das notificações
        $data['senderName'] = "Nome do comprador";
// $data['senderAreaCode'] = "";
// $data['senderPhone'] = "";
        $data['senderEmail'] = "macielcleberjr@gmail.com";
// $data['shippingType'] = "";
// $data['shippingAddressStreet'] = "";
// $data['shippingAddressNumber'] = "";
// $data['shippingAddressComplement'] = "";
// $data['shippingAddressDistrict'] = "";
// $data['shippingAddressPostalCode'] = "";
// $data['shippingAddressCity'] = "";
// $data['shippingAddressState'] = "";
// $data['shippingAddressCountry'] = "";
        $data['redirectURL'] = 'http://localhost/arteni_ci/checkout/finalizado/';
        $data = http_build_query($data);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $xml = curl_exec($curl);
        if ($xml == 'Unauthorized') {
            echo "Unauthorized";
            exit();
        }
        curl_close($curl);
        $xml = simplexml_load_string($xml);
        if (count($xml->error) > 0) {
            echo "XML ERRO";
            var_dump($xml);
            exit();
        }
// Utilize sua lógica para atualizar o pedido com o código da transação, para ser atualizado depois
//        $db->query("UPDATE pedido SET token = '{$xml->code}' WHERE id = $pedido_id");
// Redireciona o comprador para a página de pagamento
        header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml->code);
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

    public function finalizado() {
        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        $code = $_POST['notificationCode'];
        $type = $_POST['notificationType'];
        if ($type == 'transaction') {
            $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/" . $code . "?email=macielcleberjr@gmail.com&token=FE6AB1C36B5E4280A72402402126892E";
            $content = file_get_contents($url);
            $xml = simplexml_load_string($content);
            $this->enviarStatus($xml->status);
//            if ($xml->status > 3) {
////    $db->query("UPDATE pedido SET status = 2 WHERE token = '{$xml->reference}'");
//            }
        }
    }

    public function enviarStatus($status) {
        //1 - Aguardando pagamento
        //2 - En analise
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
        $this->email->to('macielcleberjr@gmail.com');
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
            if ($notificationType && $notificationCode) {

                $this->pagseguro->get_notification($notificationCode);
                /*
                 * FAZ AS ATUALIZAÇÕES COM A NOTIFICAÇÃO DE STATUS
                 */
            }

            // informação quando é enviado um POST completo
            $transacaoID = (isset($_POST['TransacaoID'])) ? $_POST['TransacaoID'] : FALSE;

            // Se existe $transacaoID é uma notificação via POST logo após a
            // solicitação de pagamento, neste momento
            if ($transacaoID) {

                /*
                 * FAZ AS ATUALIZAÇÕES COM A NOTIFICAÇÃO DE STATUS
                 */
            }



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
        }
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
