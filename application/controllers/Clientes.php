<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->utils->verifica_sessao();
        $this->load->model('Clientes_model');
    }

	public function get_clientes()
	{
		$response = $this->Clientes_model->get_clientes();
		echo json_encode($response);
	}
}
