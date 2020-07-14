<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
		$this->load->database(); 
        $this->load->model('model');

    }
	public function index()
	{

	   $this->load->view('menu');
        $this->load->view('index');//bring $data to user_data 
        $this->load->view('footer');
	}
}
