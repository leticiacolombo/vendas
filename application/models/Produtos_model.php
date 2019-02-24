<?php 

class Produtos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_produtos()
    {
        $query = $this->db->get('produtos');
        return $query->result_array();
    }

}