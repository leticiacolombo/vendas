<?php 

class Usuarios_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check_usuario($filter)
    {
        $query = $this->db->query("SELECT * FROM usuarios WHERE nome_login = '{$filter['usuario']}' and senha LIKE BINARY '{$filter['senha']}'");
        $result = $query->row_array();
        $query->free_result();
        return $result;
    }
}