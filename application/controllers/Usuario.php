<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model', 'usuario');
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function login() {
        $usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');
        $this->db->where('usuario', $usuario);
        $this->db->where('senha', $senha);
        $userlogado = $this->db->get('usuario')->result();
        if (count($userlogado) == 1) {
            $dados['userlogado'] = $userlogado[0];
            $dados['logado'] = TRUE;
            $this->session->set_userdata($dados);
            redirect('home');
        } else {
            $dados['userlogado'] = NULL;
            $dados['logado'] = FALSE;
            $this->session->set_userdata($dados);
            redirect('usuario');
        }
    }

    public function sair() {
        $dados['userlogado'] = NULL;
        $dados['logado'] = FALSE;
        $this->session->set_userdata($dados);
        redirect('usuario');
    }

    public function inserir() {
        $data['usuario'] = $this->input->post('usuario');
        $data['senha'] = $this->input->post('senha');
        $this->usuario->inserir($data);
        redirect('home');
    }

    public function cadastro() {
        $this->load->view('template/header');
        $this->load->view('cad_user');
        $this->load->view('template/footer');
    }

}
