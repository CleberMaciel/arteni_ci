<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_sub_mpt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_sub_model', 'sub');
        $this->load->model('Materia_tipo_model', 'model_tipo');
        $this->load->model('Estampa_model', 'model_estampa');
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $this->load->view('admin/template/header');
        $data['sub'] = $this->sub->lista();
        $data['tipo'] = $this->model_tipo->listarTipo();
        $this->load->view('admin/materiaPrima/sub_mpt', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $this->form_validation->set_rules('nome', 'NOME', 'required|is_unique[MATERIA_PRIMA.NOME]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('prima_existe', 'msg');
            redirect('Materia_sub_mpt');
        } else {

            $data['NOME'] = $this->input->post('nome');
            $data['ID_MATERIA_PRIMA_TIPO'] = $this->input->post('tipo');
            $result = $this->sub->inserir($data);
            if ($result == true) {
                $this->session->set_flashdata('sub_ok', 'msg');

                redirect('Materia_sub_mpt');
            } else {
                $this->session->set_flashdata('sub_fail', 'msg');
                redirect('Materia_sub_mpt');
            }
        }
    }

    public function editar($id) {
         if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['tipo'] = $this->model_tipo->listarTipo();
        $data['estampa'] = $this->model_estampa->listarEstampaCombo();
        $data['materia'] = $this->model_prima->editar($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/materiaPrima/editar', $data);
        $this->load->view('admin/template/footer');
    }

    public function atualizar() {

        $checked = $this->input->post('img_check');

        if ($checked == true) {
            $config1['upload_path'] = './img/materia_prima';
            $config1['allowed_types'] = 'jpg|jpeg|png';
            $config1['encrypt_name'] = TRUE;
            $config1['max_size'] = 2048;

            $this->load->library('upload', $config1);
            $this->upload->initialize($config1);

            if (!$this->upload->do_upload('img_alterar')) {
                echo "error";
                $uploadData['file_name'] = "semimagem.jpeg";
            } else {
                $uploadData = $this->upload->data();
                $data['IMAGEM'] = $uploadData['file_name'];
            }
        }

        $data['ID_MATERIA_PRIMA'] = $this->input->post('id');
        $data['NOME'] = $this->input->post('nome');
        $data['DESCRICAO'] = $this->input->post('descricao');
        $data['QTD_TOTAL'] = $this->input->post('quantidade');
        $data['VALOR'] = $this->input->post('valor');
        $data['ID_MATERIA_PRIMA_TIPO'] = $this->input->post('tipo');
        $data['ID_ESTAMPA'] = $this->input->post('estampa');


        $result = $this->model_prima->atualizar($data);
        if ($result == true) {
            $this->session->set_flashdata('prima_atualizada', 'msg');
            redirect('/home');
        } else {
            $this->session->set_flashdata('prima_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

    public function inativo($id) {
        $result = $this->model_prima->inativo($id);
        if ($result == true) {
            $this->session->set_flashdata('prima_inativo_ok', 'msg');
            redirect('/Materia_prima');
        } else {
            $this->session->set_flashdata('prima_inativo_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

    public function ativo($id) {
        $result = $this->model_prima->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('prima_ativo_ok', 'msg');
            redirect('/Materia_prima');
        } else {
            $this->session->set_flashdata('prima_ativo_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

    public function inativoVenda($id) {
        $result = $this->model_prima->inativoVenda($id);
        if ($result == true) {
            $this->session->set_flashdata('prima_inativo_ok', 'msg');
            redirect('/Materia_prima');
        } else {
            $this->session->set_flashdata('prima_inativo_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

    public function ativoVenda($id) {
        $result = $this->model_prima->ativoVenda($id);
        if ($result == true) {
            $this->session->set_flashdata('prima_ativo_ok', 'msg');
            redirect('/Materia_prima');
        } else {
            $this->session->set_flashdata('prima_ativo_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

}
