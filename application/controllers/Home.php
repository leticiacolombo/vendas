<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->utils->verifica_sessao();
    }

	public function index()
	{
		$data['pagina'] = 'interface/home';
		$this->load->view('interface/interface', $data);
	}
}
