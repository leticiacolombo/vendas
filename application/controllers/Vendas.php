<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->utils->verifica_sessao();
        $this->load->model('Vendas_model');
    }

	public function efetuar_venda()
	{
		$data['pagina'] = 'vendas/efetuar_venda';
		$this->load->view('interface/interface', $data);
	}

	public function consultar_comissao()
	{
		$data['pagina'] = 'vendas/consultar_comissao';
		$this->load->view('interface/interface', $data);	
	}

	public function set_venda()
	{
		$postdata = file_get_contents("php://input");
    	$request = json_decode($postdata);

    	$vl_total = 0;
    	$vl_total_venda = 0;
    	$vl_comissao = 0;
    	$vl_total_comissao = 0;

    	$produtos = $request->produtos;

    	$seq_venda = $this->Vendas_model->getSequencial();
    	$seq_item = 0;
    	$venda_itens = [];
    	
    	foreach ($produtos as $p) {
    		$seq_item = $seq_item+1;

    		$vl_comissao = 0;
			$percentual = 0;

			$vl_total = $p->vl_unitario * $p->qtd;

    		if ($request->vendedor->anos_empresa > 5) {
    			$percentual = 30;
    		} else {
    			if ($p->produto->tipo=='P') {
    				$percentual = 10;
    			} else {
    				$percentual = 25;
    			}
    		}

    		$vl_comissao = ($vl_total * $percentual / 100);

    		$venda_itens[] = [
    			'i_venda' => $seq_venda,
    			'i_item' => $seq_item,
    			'i_produto' => $p->produto->i_produto,
    			'qtd' => $p->qtd,
    			'vl_unitario' => $p->vl_unitario,
    			'vl_total' => $vl_total,
    			'vl_comissao' => $vl_comissao
    		];

    		$vl_total_venda = $vl_total_venda + $vl_total;
    		$vl_total_comissao = $vl_total_comissao + $vl_comissao;
    	}

    	$venda = [
    		'i_venda' => $seq_venda,
    		'i_cliente' => $request->cliente->i_cliente,
    		'dt_venda' => date('Ymd'),
    		'i_vendedor' => $request->vendedor->i_vendedor,
    		'vl_total_venda' => $vl_total_venda,
    		'vl_total_comissao' => $vl_total_comissao
    	];

		$this->Vendas_model->insert_venda($venda);
		foreach ($venda_itens as $v) {
			$this->Vendas_model->insert_venda_itens($v);
		}
	}

    public function get_vendas()
    {
        $response = $this->Vendas_model->get_vendas();
        echo json_encode($response);
    }

    public function get_vendas_itens()
    {
        $response = $this->Vendas_model->get_vendas_itens();
        echo json_encode($response);
    }
}
