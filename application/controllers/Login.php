<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->database(); 
        $this->load->model('model');

    }
	public function index()
    {	
        $this->load->view('login');

    }    
 
	
	public function chklogin()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
  
        $data= $this->model->getuser($user,$pass);
        
         if($data==true) {
            $arrData = array('status'=> $data['u_enable'], 'su_id'=>$data['su_id'],
             'password'=> $data['password'],'username'=> $data['username'],
             'firstname'=> $data['firstname'],'sug_id'=>$data['sug_id'],'login' => "OK");	
             $this->session->set_userdata($arrData);
             $username = $this->session->userdata('username');

             if($data['u_enable'] != 1){
               $this->session->set_flashdata('success','<span class="text-danger hide-it"> Your account has been disable </span>');
                redirect('login');  
             }else if($data['sug_enable'] != 1){
               $this->session->set_flashdata('success','<span class="text-danger hide-it"> Your group has been disable </span>');
                redirect('login'); 
             } else{
                redirect('dashboard/show');
             }
        }
     else{
      $this->session->set_flashdata('success',' <span class="text-danger hide-it"> Wrong username or password</span>');
        redirect('login');  
     
     }
   
   }

    

}

