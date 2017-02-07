<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
   	}
	
	public function index()
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('patient/header');
		$this->load->view('patient/index');
		$this->load->view('patient/footer');
	}
}
