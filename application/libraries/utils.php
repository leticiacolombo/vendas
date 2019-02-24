<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils {

	protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }

    public function verifica_sessao()
    {
    	if (!$this->CI->session->userdata('i_usuario')) {
    		header('Location: /vendas/index.php/login');
    		exit();
    	}
    }
}