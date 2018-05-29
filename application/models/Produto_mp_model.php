<?php

class Produto_mp_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function inserir($p) {
        return $this->db->insert('PRODUTO_MP', $p);
    }

}
