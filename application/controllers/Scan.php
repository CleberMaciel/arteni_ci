<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect('Painel');
        }
    }

    public function index() {
        $this->load->view('admin/template/header');
        $this->load->view('admin/codigo/scan');
        $this->load->view('admin/template/footer');
    }

}
