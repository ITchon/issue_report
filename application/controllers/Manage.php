<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        //$this->model->CheckSession();
        $menu['menu'] = $this->model->showmenu();
        $url = trim($this->router->fetch_class().'/'.$this->router->fetch_method()); 
         $menu['mg']= $this->model->givemeid($url);
         $sql =  "select * from sys_menus where order_no != 0  and enable != 0 ORDER BY order_no";
         $query = $this->db->query($sql); 
         $menu['submenu']= $query->result(); 
        $this->load->view('menu',$menu);
    }
	public function index()
	{	
		$this->load->view('tables');
		$this->load->view('footer');
    }
    
}
