<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

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
        $sql =  'SELECT * FROM sys_projects  AS spj 
        where spj.delete_flag != 0 ';
        $query = $this->db->query($sql); 
        $data['result'] = $query->result(); 
        $this->load->view('projects/manage',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function add()
    {   
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
        $sql='SELECT * FROM sys_users  INNER JOIN sys_user_groups ON sys_users.sug_id=sys_user_groups.sug_id;';
        //$sql =  'SELECT * FROM sys_users ';
        $query = $this->db->query($sql); 
        $data['result'] = $query->result(); 



        $sqlSelG = "SELECT * FROM sys_user_groups WHERE sug_id<>'0' AND enable='1' AND delete_flag != 0";
        $query = $this->db->query($sqlSelG); 
        $data['excLoadG'] = $query->result(); 

        $this->load->view('projects/add',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function insert()
    {

        $pj_name =  $this->input->post('pj_name');
        $pj_des  =  $this->input->post('pj_des');
        $status =  $this->input->post('status');

       $result = $this->model_issue->insert_project($pj_name,$pj_des,$status);
       if($result == true){
       // echo "<script>alert('Inserted Data Success')</script>";
         $this->session->set_flashdata('error','<div class="alert alert-success hide-it">  
          <span>  <b> Complete - </b> Inserted Data Success</span>
        </div> ');
        redirect('projects/add','refresh'); 
       }
       if($result == false){
        //echo "<script>alert('Username already exist')</script>";
        $this->session->set_flashdata('error','<div class="alert alert-warning hide-it">  
          <span>  <b> Warning - </b> Username already exist</span>
        </div> ');
        redirect('projects/add','refresh'); 
       }
       if($result == 3){
        //echo "<script>alert('Error')</script>";
        $this->session->set_flashdata('error','<div class="alert alert-danger hide-it">  
          <span>  <b> Error - </b> Error!! please try again</span>
        </div> ');
        redirect('projects/add','refresh'); 
       }
       

    }

    public function edit()
    {
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
        $id = $this->uri->segment('3');
        $sql="SELECT * FROM sys_projects where pj_id = '$id';";
        //$sql =  'SELECT * FROM sys_users ';
        $query = $this->db->query($sql); 
        $data['result'] = $query->result(); 

        $this->load->view('projects/edit',$data);//bring $data to user_data 
        $this->load->view('footer');
  
    }

    public function save_edit()
    {
        $pj_id =  $this->input->post('pj_id');
        $pj_name =  $this->input->post('pj_name');
        $pj_des =  $this->input->post('pj_des');
        $enable =  $this->input->post('enable');
      
        echo $pj_id;

        $this->model_issue->save_edit_project($pj_id, $pj_name,$pj_des, $enable);
        redirect('projects/manage');
    }

    public function delete()
    {
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));

        $this->model_issue->delete_project($this->uri->segment('3'));

        redirect('projects/manage');
    }

    public function enable($uid){

        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));   
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $result = $this->model->enableProject($uid);

        if($result!=FALSE){
            redirect('projects/manage','refresh');
        }else{
            echo "<script>alert('Simting wrong')</script>";
       redirect('projects/manage','refresh');
        }
    }

    
    
}

