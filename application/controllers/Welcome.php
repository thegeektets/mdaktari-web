<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('registration/header');
		$this->load->view('registration/index');
		$this->load->view('registration/footer');
	}
}
