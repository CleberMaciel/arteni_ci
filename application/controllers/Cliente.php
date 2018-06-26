<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'materia_tipo');
        $this->load->model('Cliente_model', 'cliente');
        $this->load->model('Pedidos_model', 'pedidos');

        ;

        $this->load->model('Materia_sub_model', 'model_sub');
        $this->load->model('Categoria_modelo_model', 'categoria');


        $this->load->model('Materia_sub_model', 'model_sub');
        $this->load->model('Categoria_modelo_model', 'categoria');
    }

    public function index() {
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['categoria'] = $this->categoria->listar();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/cliente/cadastro');
        $this->load->view('publico/template/footer');
    }

    public function listarCliente() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['cliente'] = $this->cliente->listarCliente();
        $this->load->view('admin/template/header');
        $this->load->view('admin/cliente/cliente', $data);
        $this->load->view('admin/template/footer');
    }

    public function login() {
//        $data['tipo'] = $this->materia_tipo->listarTipo();
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['categoria'] = $this->categoria->listar();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/cliente/login');
        $this->load->view('publico/template/footer');
    }

    public function autenticar() {
//validações de email e senha
        $usuario = $this->input->post('email');
        $senha = $this->input->post('password');
        $this->db->where('EMAIL', $usuario);
        $this->db->where('SENHA', $senha);
        $this->db->where('STATUS', 1);
        $clienteLogado = $this->db->get('CLIENTE')->result();
        if (count($clienteLogado) == 1) {
            $dados['user_clientelogado'] = $clienteLogado[0];
            $dados['Clientelogado'] = TRUE;
            $this->session->set_userdata($dados);
            redirect('/Ecommerce');
        } else {
            $dados['user_clientelogado'] = NULL;
            $dados['Clientelogado'] = FALSE;
            $this->session->set_userdata($dados);
            $this->session->set_flashdata('publico_cliente_fail', 'Usuário ou senha inválidos.');

            redirect('cliente/login');
        }
    }

    public function sair() {
        $dados['user_clientelogado'] = NULL;
        $dados['Clientelogado'] = FALSE;
        $this->session->set_userdata($dados);
        redirect('/Ecommerce');
    }

    public function enviar_email($data) {
        $this->load->library('email');
        $mensagem = $this->load->view('publico/emails/confirmar_cadastro', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Confirmação de cadastro");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to($data['EMAIL']);
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

    public function salvar() {

        $this->form_validation->set_rules('email', 'email', 'required|is_unique[CLIENTE.EMAIL]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('email_cadastrado', 'msg');
            redirect('Ecommerce');
        } else {
            $data['NOME'] = $this->input->post('nome');
            $data['SOBRENOME'] = $this->input->post('sobrenome');
            $data['EMAIL'] = $this->input->post('email');
            $data['SENHA'] = $this->input->post('password');
            $data['CEP'] = str_replace("-", "", $this->input->post('cep'));
            $data['ESTADO'] = $this->input->post('estado');
            $data['TELEFONE'] = $this->input->post('telefone');
            $data['CIDADE'] = $this->input->post('cidade');
            $data['RUA'] = $this->input->post('rua');
            $data['BAIRRO'] = $this->input->post('bairro');
            $data['NUMERO'] = $this->input->post('numero');
            $data['COMPLEMENTO'] = $this->input->post('complemento');
            $data['CPF'] = $this->input->post('cpf');
            $data['DATANASCIMENTO'] = $this->input->post('datanascimento');
            if ($this->cliente->inserir($data)) {
                $this->enviar_email($data);
            } else {
                redirect('/Ecommerce');
            }
        }
    }

    public function confirmar($email) {
        $data['STATUS'] = 1;
        $this->db->where('md5(EMAIL)', $email);
        if ($this->db->update('CLIENTE', $data)) {
            $data['tipo'] = $this->materia_tipo->lista();
            $data['sub'] = $this->model_sub->listaSub();
            $data['categoria'] = $this->categoria->listar();

            $this->load->view('publico/template/header', $data);
            $this->load->view('publico/emails/confirma');
            $this->load->view('publico/template/footer');
        }
    }

    public function conta() {
        $this->load->view('publico/template/header');
        $this->load->view('publico/cliente/conta');
        $this->load->view('publico/template/footer');
    }

    public function alterarSenha() {
        $data['id_cliente'] = $idCliente = $this->session->userdata('user_clientelogado')->ID_CLIENTE;
        $data['senha'] = $senha = $this->cliente->retornaSenha($idCliente);
        $data['senha_post'] = md5($senha_post = $this->input->post('senhaantiga'));
        $data['senha_nova'] = md5($senhanova = $this->input->post('senhanova'));
        $data['senha_nova2'] = md5($senhanova2 = $this->input->post('senhanova2'));

        if ($senha_post == $senha) {
            if ($senhanova == $senhanova2) {
                $this->session->set_flashdata('senha_alterada', 'msg');
                $this->cliente->alterarSenha($senhanova, $idCliente);
                $this->alerta_email();
                $this->sair();
            } else {
                $this->session->set_flashdata('senha_errada', 'msg');
                redirect('/Ecommerce');
            }
        } else {
            $this->session->set_flashdata('senha_errada', 'msg');
            redirect('/Ecommerce');
        }
    }

    public function alerta_email() {
        $this->load->library('email');
//$mensagem = $this->load->view('publico/emails/confirmar_cadastro', $data, TRUE);
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Alteração de senha");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to($this->session->userdata('user_clientelogado')->EMAIL);
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message("Sua senha foi alterada com sucesso.");
        if ($this->email->send()) {
            $this->session->set_flashdata('cadastro_concluido', 'msg');
            redirect('/Ecommerce');
        } else {
            print_r($this->email->print_debugger());
        }
    }

}
