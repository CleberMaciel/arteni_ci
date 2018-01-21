<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contato extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('publico/template/header');
        $this->load->view('publico/contato/contato');
        $this->load->view('publico/template/footer');
    }

    public function EnviarEmail() {
        // Carrega a library email
        $this->load->library('email');

        $this->email->from('email@example.com', 'Identification');
        $this->email->to('emailto@example.com');
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        $this->email->send();
    }

}
