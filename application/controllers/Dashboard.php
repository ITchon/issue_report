<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->model->CheckSession();
        $this->model->load_menu();
    }
	public function show()
	{	
    $issue = array('Open','Work In Progress');
    $num = 0;
        foreach($issue as $s){
    $res = $this->model->get_issue_bycur($s);
    $num = $res->cur_st+$num;
        }

    $issue = "Closed";
    $closed = $this->model->get_issue_bycur($issue);
    $last = $this->model->get_issue_lastfix();
    
    
    $data['last_fix'] = $last->date_updated;
    $data['sum_issue'] = $num;
    $data['closed_issue'] = $closed->cur_st;
	$this->load->view('dashboard',$data);
	$this->load->view('footer');
    }
    
}
