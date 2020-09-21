<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->load->model('model_issue');
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
        echo "save_edit";
        die();
        $pj_id =  $this->input->post('pj_id');
        $pj_name =  $this->input->post('pj_name');
        $pj_des =  $this->input->post('pj_des');
        $enable =  $this->input->post('enable');
      
        echo $pj_id;

        $this->model_issue->save_edit_project($pj_id, $pj_name,$pj_des, $enable);
        redirect('projects/manage');
    }


    public function changed_pass()
    {
        echo "changed_pass";
        die();
        $pj_id =  $this->input->post('pj_id');
        $pj_name =  $this->input->post('pj_name');
        $pj_des =  $this->input->post('pj_des');
        $enable =  $this->input->post('enable');
      
        echo $pj_id;

        $this->model_issue->save_edit_project($pj_id, $pj_name,$pj_des, $enable);
        redirect('projects/manage');
    }



    
    
}

