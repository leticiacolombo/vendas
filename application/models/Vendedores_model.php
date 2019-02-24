<?php 

class Vendedores_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_vendedores()
    {
        $query = $this->db->select('*, timestampdiff(YEAR, dt_admissao, now()) as anos_empresa')
        				->get('vendedores');
        return $query->result_array();
    }
}