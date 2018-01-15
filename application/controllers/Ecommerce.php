<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('publico/template/header');
//        $this->load->view('admin/home');
        $this->load->view('publico/template/footer');
    }

}
