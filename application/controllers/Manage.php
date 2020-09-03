<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->model->CheckSession();
        $this->model->load_menu();
    }
	public function index()
	{	
		$this->load->view('tables');
		$this->load->view('footer');
    }
    
}
