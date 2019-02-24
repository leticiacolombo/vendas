<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->utils->verifica_sessao();
        $this->load->model('Produtos_model');
    }

	public function get_produtos()
	{
		$response = $this->Produtos_model->get_produtos();
		echo json_encode($response);
	}
}
