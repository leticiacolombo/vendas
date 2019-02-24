<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_model');        
    }

	public function index()
	{
		$this->load->view('interface/login');
	}

	public function logar()
	{
		$request = $this->input->post();
		$usuario = $this->Usuarios_model->check_usuario($request);

		if ($usuario) {
			$this->session->set_userdata($usuario);
			header('Location: /vendas/index.php/vendas/efetuar_venda');
		} else {
			header('Location: index');
    		exit();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('Location: index');
		exit();
	}
}
