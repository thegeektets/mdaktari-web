<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

	public function __construct()
	{
       parent::__construct();
       $this->load->model('user_model');
   	}
	
	public function index()
	{
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->view('doctor/header');
		$this->load->view('doctor/index');
		$this->load->view('doctor/footer');
	}
}
