<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('admin/login/header');
        $this->load->view('admin/login/form');
        $this->load->view('admin/login/footer');
    }

    public function login() {
        $usuario = $this->input->post('email');
        $senha = $this->input->post('password');
        $this->db->where('EMAIL', $usuario);
        $this->db->where('SENHA', $senha);
        $userlogado = $this->db->get('USUARIO')->result();
        if (count($userlogado) == 1) {
            $dados['userlogado'] = $userlogado[0];
            $dados['logado'] = TRUE;
            $this->session->set_userdata($dados);
            redirect('Home');
        } else {
            $dados['userlogado'] = NULL;
            $dados['logado'] = FALSE;
            $this->session->set_userdata($dados);
            redirect('Painel');
        }
    }

    public function sair() {
        $dados['userlogado'] = NULL;
        $dados['logado'] = FALSE;
        $this->session->set_userdata($dados);
        redirect('Painel');
    }

}
