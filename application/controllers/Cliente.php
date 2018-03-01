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
        
    }

    public function sair() {
        
    }

    public function enviar_email($data) {
        $this->load->library('email');
        $this->email->from("admin@clebermaciel.online", 'ArtêNí');
        $this->email->subject("Confirmação de cadastro");
        $this->email->reply_to("admin@clebermaciel.online");
        $this->email->to($data['EMAIL']);
        $this->email->cc('admin@clebermaciel.online');
        $this->email->bcc('admin@clebermaciel.online');
        $this->email->message("Cadastro Efetuado com sucesso, obrigado! :)");
        if ($this->email->send()) {
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
            //redirect('/Ecommerce');
        } else {
            redirect('/Ecommerce');
        }
    }

    public
            function cadastro() {
        $this->load->view('template/header');
        $this->load->view('cad_user');
        $this->load->view('template/footer');
    }

}
