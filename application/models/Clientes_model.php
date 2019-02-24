<?php 

class Clientes_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_clientes()
    {
        $query = $this->db->get('clientes');
        return $query->result_array();
    }
}