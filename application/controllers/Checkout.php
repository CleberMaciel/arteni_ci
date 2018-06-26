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
        $this->load->model('Produtos_model', 'produtos');
        $this->load->model('Produto_mp_model', 'produto_mp');
        $this->load->model('Categoria_modelo_model', 'categoria');
        $this->load->model('Materia_prima_model', 'materia_prima');
        $this->load->model('Modelo_model', 'modelo');
    }

    public function index() {

        $dados = NULL;
//        $usuario = array(
//            'id' => $this->session->userdata('user_clientelogado')->ID_CLIENTE,
//            'nome' => $this->session->userdata('user_clientelogado')->NOME,
//            'ddd' => '21', // só números
//            'telefone' => '99887766', // só números
//            'email' => $this->session->userdata('user_clientelogado')->EMAIL,
//            'shippingType' => 3, //1=Encomenda normal (PAC), 2=SEDEX, 3=Tipo de frete não especificado.
//            'cep' => $this->session->userdata('user_clientelogado')->CEP, // só números
//            'logradouro' => $this->session->userdata('user_clientelogado')->RUA,
//            'numero' => $this->session->userdata('user_clientelogado')->NUMERO,
//            'compl' => $this->session->userdata('user_clientelogado')->COMPLEMENTO,
//            'bairro' => $this->session->userdata('user_clientelogado')->BAIRRO,
//            'cidade' => $this->session->userdata('user_clientelogado')->CIDADE,
//            'uf' => $this->session->userdata('user_clientelogado')->ESTADO,
//            'pais' => 'BRA'
//        );
//
//        $this->pagseguro->set_user($usuario);
// insere produtos para botão PagSeguro
        foreach ($this->cart->contents() as $p) {
            if (isset($p['id_materia'])) {
                $produtos['id_materia'] = $p['id_materia'];
            }
            if (isset($p['id_modelo'])) {
                $produtos['id_modelo'] = $p['id_modelo'];
            }
            $produtos['name'] = $p['name'];
            $produtos['valor'] = number_format($p['price'], 2, '.', '');
            $produtos['descricao'] = "teste";
            $produtos['quantidade'] = $p['qty'];
            $produtos['peso'] = 0;
            if ($produtos != NULL) {
                $dados[] = $produtos;
            }
        }

// ID do pedido
        $referencia = $config['reference'] = rand(999, 9999);
// gera botão

        if ($dados != null) {
            $pedido_total = $this->cart->total();
            $pedido_frete = $pedido_total + 26.02;
            $botao['botao'] = 0;

            $dados1['ID_PEDIDOS'] = $referencia;
            $dados1['CLIENTE'] = $this->session->userdata('user_clientelogado')->ID_CLIENTE;
            $dados1['VALOR_PEDIDO'] = $pedido_frete;
            $dados1['STATUS_COMPRA'] = 0;
            $dados1['STATUS_VALIDO'] = 0;
            $this->pedidos->inserir($dados1);

            foreach ($dados as $d) {
                $itens['ID_PEDIDO'] = $referencia;

                if (isset($d['id_materia'])) {
                    $itens['ID_MATERIA_PRIMA'] = $d['id_materia'];
                    $itens['PRODUTO_ID'] = NULL;
                }
                if (isset($d['id_modelo'])) {
                    $itens['PRODUTO_ID'] = $d['id_modelo'];
                    $itens['ID_MATERIA_PRIMA'] = NULL;
                }

                $itens['QUANTIDADE'] = $d['quantidade'];
                $itens['PRECO'] = number_format($d['valor'], 2, '.', '');
                $this->itens->inserir($itens);
            }
        } else {
            $botao['botao'] = 1;
        }
        $data['categoria'] = $this->categoria->listar();
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $botao['referencia'] = $referencia;
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/checkout/checkout', $botao);
        $this->load->view('publico/template/footer');
    }

//finalizar compra no site

    public function finalizar() {

        $data['numero_pedido'] = $referencia = $this->input->post("referencia");
        $data['referencia'] = $referencia;
        $data['estoque'] = "Estoque OK";
        $data['modelo'] = "Sem modelo";
        $pedido_total = $this->cart->total();
        $data['valor_total_frete'] = $pedido_frete = $pedido_total + 26.02;
//carrega o array do carrinho
        $produtos = $this->cart->contents();
//lista os itens de carrinho""
        foreach ($produtos as $p) {
            /*
             * Pego id do modelo personalizado
             * tbm precisa da quantidade solicitada no carrinho
             * e multiplicar pela quantidade necessaria na tabela
             * daquele modelo.
             * busca na tabela de relação PRODUTO_MP
             * as materias primas escolhidas
             *
             */
            if (isset($p['id_modelo'])) {

                if ($p['qty'] > 3 || $p['qty'] < 1) {
                    redirect("Checkout");
                } else {
                    $data['modelo'] = "Com modelo";
                    $data['id'] = $p['id'];

                    $this->check->atualizarPedido($referencia, 3);
                    $data['externo'] = $quantidade_ex = $p['qty'] * $this->modelo->retornaQuantidadeExterno($p['id']);
                    $data['interno'] = $quantidade_in = $p['qty'] * $this->modelo->retornaQuantidadeInterno($p['id']);
                    $teste = $this->modelo->exibeModelo($p['id_modelo']);
                    $data['pre'] = $modelo = $this->modelo->retornaPredefinicao($p['id']);
                    /*
                     * foreach que varre o modelo personalizado
                     * buscando as materias primas usadas,
                     * e reduzindo do estoque sem validação; 
                     */
                    foreach ($teste as $t) {

                        $this->materia_prima->reduzirMateriaPrima($t->INTERNO, $quantidade_in);
                        $this->materia_prima->reduzirMateriaPrima($t->EXTERNO, $quantidade_ex);
                        if ($t->INTERNO) {
                            $total = $this->materia_prima->retornaQuantidade($t->INTERNO);
                            $quantidadeMinima = $this->materia_prima->retornaQuantidadeMin($t->INTERNO);
                            $margem = $total - $quantidadeMinima;
                            if ($quantidadeMinima >= $margem) {
                                $email['info'] = $this->materia_prima->retornarEmailMateria($t->INTERNO);
                                $this->materia_prima->inativoVenda($t->INTERNO);
                                $this->enviarStatus($email);
                            }// if se envia ou nao email
                        }// if se tem interno
                        if ($t->EXTERNO) {
                            $total = $this->materia_prima->retornaQuantidade($t->EXTERNO);
                            $quantidadeMinima = $this->materia_prima->retornaQuantidadeMin($t->EXTERNO);
                            $margem = $total - $quantidadeMinima;
                            if ($quantidadeMinima >= $margem) {
                                $email['info'] = $this->materia_prima->retornarEmailMateria($t->EXTERNO);
                                $this->materia_prima->inativoVenda($t->EXTERNO);
                                $this->enviarStatus($email);
                            }// if se envia ou nao email
                        }// if se tem externo
                    }//foreach

                    foreach ($modelo as $m) {
                        $this->materia_prima->reduzirMateriaPrima($m->ID_MATERIA_PRIMA, $m->QUANTIDADE);

                        $total = $this->materia_prima->retornaQuantidade($m->ID_MATERIA_PRIMA);
                        $quantidadeMinima = $this->materia_prima->retornaQuantidadeMin($m->ID_MATERIA_PRIMA);
                        $margem = $total - $quantidadeMinima;
                        if ($quantidadeMinima >= $margem) {
                            $email['info'] = $this->materia_prima->retornarEmailMateria($m->ID_MATERIA_PRIMA);
                            $this->materia_prima->inativoVenda($m->ID_MATERIA_PRIMA);
                            $this->enviarStatus($email);
                        }// if se envia ou nao email
                    }
                }
            }

            /*
             * pega o id da materia prima
             * e desconta do estoque
             * consulta o estoque minimo com o total ainda em estoque
             * e caso o estoque minimo seja maior que o estoque
             * o materia prima é removida da venda e o adm é notificado.
             */
            if (isset($p['id_materia'])) {

                if ($p['qty'] > 3 || $p['qty'] < 1) {
                    redirect("Checkout");
                } else {
                    $total = $this->materia_prima->retornaQuantidade($p['id_materia']);
                    $quantidadeMinima = $this->materia_prima->retornaQuantidadeMin($p['id_materia']);
                    $quantidade = $p['qty'];
                    $total_compra = $total - $quantidade;
                    $margem = $total - $quantidadeMinima;
                    if ($p['qty'] > $margem || $p['qty'] < 1) {
                        redirect("Checkout");
                    } else {
                        if ($quantidadeMinima >= $margem) {
                            $this->materia_prima->reduzirMateriaPrima($p['id_materia'], $quantidade);
                            $this->check->atualizarPedido($referencia, 3);
                            $email['info'] = $this->materia_prima->retornarEmailMateria($p['id_materia']);
                            $this->materia_prima->inativoVenda($p['id_materia']);
                            $this->enviarStatus($email);
                        } else {
                            $this->materia_prima->reduzirMateriaPrima($p['id_materia'], $quantidade);
                            $this->check->atualizarPedido($referencia, 3);
                        }
                    }
                }
            }
        }
        $this->load->view('publico/checkout/finalizar', $data);
        $this->notificação($referencia);
        $this->notificar_cli($data);
        $this->cart->destroy();
    }

//adicionar e remover itens do carrinho
    public function adicionar() {

        $dados['id_materia'] = $this->input->post('idmateria');
        $dados['id'] = $this->input->post('idmateria');
        $dados['qty'] = $this->input->post('quantidade');
        $dados['price'] = $this->input->post('preco');
        $dados['name'] = $this->input->post('nome');
        $dados['foto'] = $this->input->post('foto');
        $this->cart->insert($dados);
        $this->session->set_flashdata('item_add', 'msg');
        redirect("checkout");
    }

//adiciona modelo ao carrinho de compras
    public function adicionarModelo() {
        $id = $prod["PRODUTO_ID"] = $config['reference'] = rand(999, 9999);

        $this->produtos->inserir($prod);
        $data['ID_MODELO'] = $this->input->post('idmodelo');
        $data['PRODUTO_ID'] = $id;
        $data['EXTERNO'] = $this->input->post('externo');
        $data['INTERNO'] = $this->input->post('interno');
        $this->produto_mp->inserir($data);

        $dados['id'] = $this->input->post('idmodelo');
        $dados['id_modelo'] = $id;
        $dados['qty'] = 1;
        $dados['price'] = $this->input->post('preco');
        $dados['name'] = $this->input->post('nome');
        $dados['foto'] = $this->input->post('foto');
        $this->cart->insert($dados);
        $this->session->set_flashdata('item_add', 'msg');
        redirect("checkout");
    }

    public function atualizar() {
        foreach ($this->input->post() as $item) {
            if (isset($item['rowid'])) {
                $data = array('rowid' => $item['rowid'], 'qty' => $item['qty']);
                $this->cart->update($data);
            }
        }
        $this->session->set_flashdata('quantidade_atualizada', 'msg');
        redirect('checkout');
    }

    public function remover($id) {
        $data = array('rowid' => $id, 'qty' => 0);
        $this->cart->update($data);
        $this->session->set_flashdata('item_removido', 'msg');
        redirect('checkout');
    }

    public function enviarStatus($data) {

        $this->load->library('email');
        $mensagem = $this->load->view('admin/emails/aviso_estoque', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Aviso sobre o estoque");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to("macielcleberjr@gmail.com");
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            
        } else {
            print_r($this->email->print_debugger());
        }
    }

    public function notificação($data) {

        $this->load->library('email');
        $mensagem = $this->load->view('admin/emails/notificacao', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Novo pedido efetuado");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to("macielcleberjr@gmail.com");
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            
        } else {
            print_r($this->email->print_debugger());
        }
    }

    function correio() {
//        if ($altura < 2) {
//            $altura = 2;
//        } //-18 A altura não pode ser inferior a 2 cm.
//        if ($largura < 11) {
//            $largura = 11;
//        } //-20 A largura não pode ser inferior a 11 cm.
//        if ($comprimento < 16) {
//            $comprimento = 16;
//        } //-22 O comprimento não pode ser inferior a 16 cm.
        $data['nCdServico'] = "04510"; //41106 PAC,40010 SEDEX,40045 SEDEX a Cobrar,40215 SEDEX 10.
        $data['nCdEmpresa'] = '';
        $data['sDsSenha'] = '';
        $data['sCepOrigem'] = '90050001';
        $data['sCepDestino'] = '91787197';
        $data['nVlPeso'] = '1';
        $data['nCdFormato'] = '1';
        $data['nVlComprimento'] = '16';
        $data['nVlAltura'] = '10';
        $data['nVlLargura'] = '15';
        $data['nVlDiametro'] = '0';
        $data['sCdMaoPropria'] = 's';
        $data['nVlValorDeclarado'] = '200';
        $data['sCdAvisoRecebimento'] = 'n';
        $data['StrRetorno'] = 'xml';
        $data = http_build_query($data);
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $curl = curl_init($url . '?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $result = simplexml_load_string($result);
        foreach ($result->cServico as $row) {
            if ($row->Erro == 0) {
                echo "codigo" . $row->Codigo . '<br>';
                echo "valor" . $row->Valor . '<br>';
                echo "prazo" . $row->PrazoEntrega . '<br>';
                echo "vmp" . $row->ValorMaoPropria . '<br>';
                echo "aviso de rece" . $row->ValorAvisoRecebimento . '<br>';
                echo $row->ValorValorDeclarado . '<br>';
                echo $row->EntregaDomiciliar . '<br>';
                echo $row->EntregaSabado;
                // echo print_r($result);
                echo $url . "?" . print_r($data);
            } else {
                echo "<pre>";
                print_r($row);
                echo $url . "?";

                echo print_r($data);
            }
        }
    }

    function notificar_cli($data) {
        $this->load->library('email');
        $mensagem = $this->load->view('admin/emails/pedidos_cli', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Seu pedido foi recebido");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to($this->session->userdata('user_clientelogado')->EMAIL);
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message($mensagem);
        if ($this->email->send()) {
            
        } else {
            print_r($this->email->print_debugger());
        }
    }

}

// fim da  classe



