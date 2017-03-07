<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api extends CI_Controller {

    public function index()
    {
        $this->load->helper('url');

        $this->load->view('rest/rest_api');
    }
}
