<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Materia_prima extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_prima_model', 'model_prima');
        $this->load->model('Materia_tipo_model', 'model_tipo');
        $this->load->model('Estampa_model', 'model_estampa');
    }

    public function index() {
        $this->load->view('admin/template/header');
        $data['tipo'] = $this->model_tipo->listarTipo();
        $data['estampa'] = $this->model_estampa->listarEstampa();
        $data['materia'] = $this->model_prima->listarMateria();
        $this->load->view('admin/materiaPrima/materia_prima', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {
        $this->form_validation->set_rules('nome', 'NOME', 'required|is_unique[MATERIA_PRIMA.NOME]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('materia_prima_existe', 'msg');
            redirect('Materia_prima');
        } else {
            //Upload image
            $configImg['upload_path'] = './img/img';
            $configImg['allowed_types'] = 'jpg|png';
            $configImg['max_size'] = '2048';
            $configImg['max_width'] = '1000';
            $configImg['max_height'] = '1000';

            $this->load->library('upload', $configImg);


            $configThumbs['upload_path'] = './img/thumbs';
            $configThumbs['allowed_types'] = 'jpg|png';
            $configThumbs['image_library'] = 'gd2';
            $configThumbs['create_thumb'] = TRUE;
            $configThumbs['maintain_ratio'] = TRUE;
            $configThumbs['width'] = 150;
            $configThumbs['height'] = 150;
            $this->image_lib->resize();
            $this->load->library('image_lib');
            $this->load->library('image_lib', $configThumbs);

            $this->image_lib->resize();

            $data['NOME'] = $this->input->post('tipo');
            $data['DESCRICAO'] = $this->input->post('tipo');
            $data['NOME'] = $this->input->post('tipo');
            $data['NOME'] = $this->input->post('tipo');
            $data['ATIVO_ID_ATIVO'] = $this->input->post('ativo');
            $result = $this->model->inserir($data);
            if ($result == true) {
                $this->session->set_flashdata('tipo_ok', 'msg');
                redirect('/Materia_tipo');
            } else {
                $this->session->set_flashdata('tipo_fail', 'msg');
                redirect('/Materia_tipo');
            }
        }
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

    public function ativo($id) {
        $result = $this->model->ativo($id);
        if ($result == true) {
            $this->session->set_flashdata('tipo_ativo_ok', 'msg');
            redirect('/Materia_tipo');
        } else {
            $this->session->set_flashdata('tipo_ativo_fail', 'msg');
            redirect('/Materia_tipo');
        }
        ;
    }

    function excluir($id) {
        $this->model->deletar($id);
        redirect('Materia_tipo');
    }

}
