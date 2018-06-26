<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Materia_tipo_model', 'materia_tipo');
        $this->load->model('Materia_sub_model', 'model_sub');
        $this->load->model('Modelo_model', 'modelo');
        $this->load->model('Modelo_materia_model', 'modelo_materia1');
        $this->load->model('Materia_prima_model', 'model_prima');
        $this->load->model('Categoria_modelo_model', 'categoria');
        $this->load->model('Materia_materia_model', 'materia_tipo');
    }

    public function index() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $this->load->view('admin/template/header');
        $data['categoria'] = $this->categoria->listar();
        $data['tipo'] = $this->materia_tipo->listarTipo();
        $data['sub'] = $this->model_sub->listar();
        $data['materia'] = $this->model_prima->listarMateria();
        $this->load->view('admin/modelo/modelo', $data);
        $this->load->view('admin/template/footer');
    }

    public function inserir() {

        $config['upload_path'] = './img/materia_prima';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('img')) {
            echo "error";
            $uploadData['file_name'] = "semimagem.jpeg";
        } else {
            $uploadData = $this->upload->data();
        }

        $data['NOME'] = $this->input->post('nome');
        $data['DESCRICAO'] = $this->input->post('descricao');
        $data['ID_CATEGORIA'] = $this->input->post('categoria');
        $data['VALOR'] = str_replace(",", ".", $this->input->post('valor'));
        $data['IMAGEM'] = $uploadData['file_name'];
        $data['PROFUNDIDADE'] = $this->input->post('profundidade');
        $data['ALTURA'] = $this->input->post('altura');
        $data['LARGURA'] = $this->input->post('largura');
        $data['QUANTIDADE_INTERNO'] = $this->input->post('interno');
        $data['QUANTIDADE_EXTERNO'] = $this->input->post('externo');
        $result = $idModelo = $this->modelo->inserir($data);
        foreach ($this->input->post('materia_prima') as $k => $m) {
            $data1['ID_MODELO'] = $idModelo;
            $data1['ID_MATERIA_PRIMA'] = $m;
            $data1['QUANTIDADE'] = $this->input->post('quantidade')[$k];

            $this->modelo_materia1->inserir($data1);
        }

        if ($result == true) {
            $this->session->set_flashdata('modelo_ok', 'msg');
            redirect('/modelo');
        } else {
            $this->session->set_flashdata('medida_fail', 'msg');
            redirect('/modelo');
        }



        redirect('/Modelo/listarModelosCriados');
    }

    //Lista a categoria de modelos no menu de navegação.
    public function listarModelos() {
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['categoria'] = $this->categoria->listar();
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/materia_prima/materia', $data);
        $this->load->view('publico/template/footer');
    }

    public function listarModelosCriados() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['modelo'] = $this->modelo->listar();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/modelo/listar', $data);
        $this->load->view('admin/template/footer');
    }

    //Exibe modelos de uma determinada categoria.
    public function mostrarModelos($id) {
        $data['materia'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['tipo'] = $this->materia_tipo->lista();
        $data['categoria'] = $this->categoria->listar();
        $data['modelos'] = $this->categoria->listarModelos($id);
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/modelo/mostrarModelos', $data);
        $this->load->view('publico/template/footer');
    }

    public function informacoes($idi) {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['modelo'] = $this->modelo->informacoes($idi);
        $data['materia'] = $this->model_prima->listarMateria();
        $data['sub'] = $this->model_sub->listaSub();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/modelo/informacoes', $data);
        $this->load->view('admin/template/footer');
    }

    //public
    public function detalhes($idi) {
        $data['tipo'] = $this->materia_tipo->lista();
        $data['sub'] = $this->model_sub->listaSub();
        $data['materia'] = $this->model_prima->listarMateria();
        $data['externo'] = $this->model_prima->comboModeloExterno();
        $data['interno'] = $this->model_prima->comboModeloInterno();
        $data['categoria'] = $this->categoria->listar();
        $data['modelo'] = $this->modelo->detalhes($idi);
        $this->load->view('publico/template/header', $data);
        $this->load->view('publico/modelo/detalhes', $data);
        $this->load->view('publico/template/footer');
    }

    public function editar($id) {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['sub'] = $this->model_sub->lista();
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
        $data['VALOR'] = str_replace(",", ".", $this->input->post('valor'));
        $data['ID_SUB_MPT'] = $this->input->post('sub');
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
            redirect('/Modelo');
        } else {
            $this->session->set_flashdata('prima_ativo_fail', 'msg');
            redirect('/Materia_prima');
        }
    }

    //ativo ou não ativo venda
    public function inativoVenda($id) {
        $result = $this->modelo->inativoVenda($id);
        if ($result == true) {
            $this->session->set_flashdata('modelo_nao_venda', 'msg');
            redirect('/modelo/listarModelosCriados');
        } else {
            $this->session->set_flashdata('prima_inativo_fail', 'msg');
            redirect('/modelo/listarModelosCriados');
        }
    }

    public function ativoVenda($id) {
        $result = $this->modelo->ativoVenda($id);
        if ($result == true) {
            $this->session->set_flashdata('modelo_venda', 'msg');
            redirect('/modelo/listarModelosCriados');
        } else {
            $this->session->set_flashdata('prima_ativo_fail', 'msg');
            redirect('/modelo/listarModelosCriados');
        }
    }

    public function listaModelos() {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['modelo'] = $this->modelo->listar();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/modelo/listarEditar', $data);
        $this->load->view('admin/template/footer');
    }

    public function editarModelo($ids) {
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
        $data['modelo'] = $this->modelo->informacoes($ids);
        $data['materia'] = $this->model_prima->listarMateria();
        $data['sub'] = $this->model_sub->listaSub();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/modelo/editarModelo', $data);
        $this->load->view('admin/template/footer');
    }

    public function deletar($idmodelo, $idmateria) {
        $this->modelo_materia1->remover($idmodelo, $idmateria);
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }

}
