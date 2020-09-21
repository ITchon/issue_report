<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->load->model('model_setting');
        $this->model->CheckSession();
        $this->model->load_menu();
       
    }
    public function manage()
    {   
        //$this->model->CheckPermission($this->session->userdata('su_id'));
        //$this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
        $id = $this->session->userdata('su_id');
        $sql =  "SELECT * FROM sys_users
        where delete_flag != 0 AND su_id = $id ";
        $query = $this->db->query($sql); 
        $data['result'] = $query->result()[0]; 
        $this->load->view('setting/manage',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function save_edit()
    {
        $su_id = $this->session->userdata('su_id');
        $username =  $this->input->post('username');
        $fname =  $this->input->post('fname');
        $lname =  $this->input->post('lname');
        $email =  $this->input->post('email');
        $gender =  $this->input->post('gender');
      

        $res = $this->model_setting->save_edit_profile($su_id, $username, $fname, $lname, $email, $gender);
        if($res != false){
        $this->session->set_flashdata('error','<div class="alert alert-success hide-it">  
          <span>  <b> Success - </b> Data Is Changed</span>
        </div> ');
        }else{
        $this->session->set_flashdata('error','<div class="alert alert-warning hide-it">  
          <span>  <b> Warning - </b> Someting Wrong</span>
        </div> ');

        }
        redirect('setting/manage');
    }


    public function changed_pass()
    {
        $su_id = $this->session->userdata('su_id');
        $cur_pass =  $this->input->post('cur_pass');
        $new_pass =  $this->input->post('new_pass');
        $cnew_pass =  $this->input->post('cnew_pass');

        $res = $this->model_setting->check_cur_password($su_id,$cur_pass);
        if($res == false){
        $this->session->set_flashdata('error','<div class="alert alert-warning hide-it">  
          <span>  <b> Warning - </b> Current Password Incorrect</span>
        </div> ');
         redirect('setting/manage');
        }
        else if($new_pass != $cnew_pass){
        $this->session->set_flashdata('error','<div class="alert alert-warning hide-it">  
          <span>  <b> Warning - </b> Confirm Password Dose Not Match</span>
        </div> ');
         redirect('setting/manage');
        }else{
        $this->model_setting->save_changed_password($su_id,$new_pass);
        $this->session->set_flashdata('error','<div class="alert alert-success hide-it">  
          <span>  <b> Success - </b> Password Is Changed</span>
        </div> ');
        }

        redirect('setting/manage');
    }



    
    
}

