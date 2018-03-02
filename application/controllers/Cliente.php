<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'materia_tipo');
        $this->load->model('Cliente_model', 'cliente');
    }

    public function index() {
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/cliente/cadastro');
        $this->load->view('publico/template/footer');
    }

    public function login() {
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/cliente/login');
        $this->load->view('publico/template/footer');
    }

    public function autenticar() {
        //validações de email e senha ========
        $usuario = $this->input->post('email');
        $senha = $this->input->post('password');
        $this->db->where('EMAIL', $usuario);
        $this->db->where('SENHA', $senha);
        $this->db->where('STATUS', 1);
        $userlogado = $this->db->get('CLIENTE')->result();
        if (count($userlogado) == 1) {
            $dados['userlogado'] = $userlogado[0];
            $dados['logado'] = TRUE;
            $this->session->set_userdata($dados);
            redirect('/Ecommerce');
        } else {
            $dados['userlogado'] = NULL;
            $dados['logado'] = FALSE;
            $this->session->set_userdata($dados);
            redirect('cliente/login');
        }
    }

    public function sair() {
        $dados['userlogado'] = NULL;
        $dados['logado'] = FALSE;
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
        $data['NOME'] = $this->input->post('nome');
        $data['SOBRENOME'] = $this->input->post('sobrenome');
        $data['EMAIL'] = $this->input->post('email');
        $data['SENHA'] = $this->input->post('password');
        $data['CEP'] = $this->input->post('cep');
        $data['ESTADO'] = $this->input->post('estado');
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

    public function confirmar($email) {
        $data['STATUS'] = 1;
        $this->db->where('md5(EMAIL)', $email);
        if ($this->db->update('CLIENTE', $data)) {
            $data['tipo'] = $this->materia_tipo->listarTipo();
            $this->load->view('publico/template/header', $data);
            $this->load->view('publico/emails/confirma');
            $this->load->view('publico/template/footer');
        }
    }

}