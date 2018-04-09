<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Checkout_model', 'check');
        $this->load->model('Pedidos_model', 'pedidos');

        $this->load->library('pagseguro');
    }

    public function teste() {
        $dados['vai'] = $this->pedidos->notificarCliente(4319);
        echo "<pre>";
        print_r($dados);
    }

    public function notificar() {
        header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        $code = $_POST['notificationCode'];
        $type = $_POST['notificationType'];
        if ($type == 'transaction') {
            $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/" . $code . "?email=macielcleberjr@gmail.com&token=FE6AB1C36B5E4280A72402402126892E";
            $content = file_get_contents($url);
            $xml = simplexml_load_string($content);
            $this->atualizarPedido($xml->reference, $xml->status);
            $this->enviarStatus($xml->reference, $xml->status);
            // $this->enviarNotificacaoCliente($xml->reference, $xml->status);
        }
    }

    public function atualizarPedido($referencia, $status) {
        $this->check->atualizarPedido($referencia, $status);
    }

    public function enviarStatus($referencia, $status) {
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
        $this->email->to($this->pedidos->notificarCliente($referencia));
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
