<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedores extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->utils->verifica_sessao();
        $this->load->model('Vendedores_model');
    }

	public function get_vendedores()
	{
		$response = $this->Vendedores_model->get_vendedores();
		echo json_encode($response);
	}
}
