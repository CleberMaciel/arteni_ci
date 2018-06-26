<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_prima_model', 'model_prima');
        $this->load->model('Produto_model', 'produto');
        $this->load->model('Custo_model', 'custo');
        $this->load->model('Produto_mp_model', 'produto_mp');
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['materia'] = $this->model_prima->listarMateriaCombo();
        $data['custo'] = $this->custo->listar();
        $this->load->view('admin/template/header');
        $this->load->view('admin/produto/produto', $data);
        $this->load->view('admin/template/footer');
    }

    public function listar() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['produto'] = $this->produto->listarProduto();
        $this->load->view('admin/template/header');
        $this->load->view('admin/produto/listar', $data);
        $this->load->view('admin/template/footer');
    }

    public function informacoes($idP) {

        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $this->load->view('admin/template/header');
        $data['informacoes'] = $this->produto->editar($idP);
        $data['materia'] = $this->produto->carregarMateriaPrima($idP);
        $this->load->view('admin/produto/informacoes', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
//        $this->form_validation->set_rules('codigo', 'PRODUTO_CRIACAO', 'required|is_unique[PRODUTO_CRIACAO.CODIGO]');
//
//        if ($this->form_validation->run() == false) {
//            $this->session->set_flashdata('produto_existe', 'msg');
//            redirect('produto');
//        } else {
        $data['NOME'] = $this->input->post('nome');
        $data['LARGURA'] = $this->input->post('largura');
        $data['ALTURA'] = $this->input->post('altura');
        $data['PROFUNDIDADE'] = $this->input->post('profundidade');
        $data['ID_CUSTO'] = $this->input->post('custo');
        $this->produto->inserir($data);
        redirect('produto');
//            foreach ($this->input->post('materia_prima') as $k => $m) {
//               
//                $data['ID_MATERIA_PRIMA'] = $m;
//                $data['QUANTIDADE'] = $this->input->post('quantidade')[$k];
//
//                $qtd_total = $this->model_prima->retornaQuantidade($m);
//                $valor = $qtd_total - $this->input->post('quantidade')[$k];
//                if ($this->input->post('quantidade')[$k] > $qtd_total) {
//                    $this->session->set_flashdata('materia_insuficiente', 'msg');
//                    redirect('produto');
//                } else {
//                    $this->produto_mp->inserir($data);
//                    $this->model_prima->reduzirMateriaPrima($m, $valor);
//                }
//            }
//            redirect('produto');
////        }
    }

    public function adicionarMateria() {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['materia'] = $this->model_prima->listarMateriaCombo();
        $data['custo'] = $this->custo->listar();
        $data['produto'] = $this->produto->listarProduto();
        $this->load->view('admin/template/header');
        $this->load->view('admin/produto/adicionaMateria', $data);
        $this->load->view('admin/template/footer');
    }

    public function salvarProdutoMateria() {
        $data['ID_PRODUTO_CRIACAO'] = $this->input->post('produto');
        foreach ($this->input->post('materia_prima') as $k => $m) {

            $data['ID_MATERIA_PRIMA'] = $m;
            $data['QUANTIDADE'] = $this->input->post('quantidade')[$k];

            $qtd_total = $this->model_prima->retornaQuantidade($m);
            $valor = $qtd_total - $this->input->post('quantidade')[$k];
            if ($this->input->post('quantidade')[$k] > $qtd_total) {
                $this->session->set_flashdata('materia_insuficiente', 'msg');
                redirect('produto');
            } else {
                $this->produto_mp->inserir($data);
                $this->model_prima->reduzirMateriaPrima($m, $valor);
            }
        }
        redirect('produto');
    }

    public function inativo($id) {
        $result = $this->model->inativo($id);
        if ($result == true) {
            $this->session->set_flashdata('tipo_inativo_ok', 'msg');
            redirect('/Materia_tipo');
        } else {
            $this->session->set_flashdata('tipo_inativo_fail', 'msg');
            redirect('/Materia_tipo');
        }
    }

    public
            function ativo($id) {
        $result = $this->model->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('tipo_ativo_ok', 'msg');
            redirect('/Produto');
        } else {
            $this->session->set_flashdata('tipo_ativo_fail', 'msg');
            redirect('/Produto');
        }
    }

}
