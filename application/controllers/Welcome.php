<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');


    }
	public function index()
	{
		
		$this->load->view('menu');
		$this->load->view('index');
		$this->load->view('footer');
	}
}
