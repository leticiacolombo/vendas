<?php 

class Vendas_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_vendas()
    {
        $query = $this->db->select('*, clientes.nome as nome_cliente, vendedores.nome as nome_vendedor')
                        ->from('vendas')
                        ->join('clientes', 'vendas.i_cliente = clientes.i_cliente')
                        ->join('vendedores', 'vendas.i_vendedor = vendedores.i_vendedor')
                        ->get();
        return $query->result_array();
    }

    public function getSequencial()

    {
        $query = $this->db->select('IFNULL(MAX(i_venda), 0) + 1 as i_venda')
                        ->get('vendas')
                        ->row();
        return $query->i_venda;   
    }

    public function insert_venda($data)
    {
        $this->db->insert('vendas', $data);
    }

    public function insert_venda_itens($data)
    {
        $this->db->insert('vendas_itens', $data);   
    }

    public function get_vendas_itens()
    {
        $query = $this->db->select('*')
                        ->from('vendas_itens')
                        ->join('produtos', 'vendas_itens.i_produto = produtos.i_produto')
                        ->get();
        return $query->result_array();
    }

}