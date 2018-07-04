<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
				
	}

}

/* End of file print.php */
/* Location: ./application/controllers/print.php */