<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Ajax extends CI_Controller {
 
 
public function __construct()
    {
        parent::__construct();
     $this->load->helper('url');
        $this->load->model('model');
        $this->load->model('model_ajax');
        $this->load->model('model_issue');
    }
 
 

 
    public function get_user_by_id()
    {
        $id = $this->input->post('id');
         
        $data = $this->model->get_by_id($id);
        
        $arr = array('success' => false, 'data' => '');
        if($data){
        $arr = array('success' => true, 'data' => $data);
        }
        echo json_encode($arr);
      
    }
 
    public function edit_issue()
    {
        $id = $this->input->post('id');
        $data = $this->model_issue->issue_by_id($id);
        $arr = array('success' => false, 'data' => '');
        if($data){
            $arr = array('success' => true, 'data' => $data);
            }
        echo json_encode($arr);

    }
 
 public function fetch_menu()
    {
     if($this->input->post('spg_id'))
     
     {
      echo $this->model_ajax->fetch_menu($this->input->post('spg_id'));
     }
    }
 
    public function delete()
    {
        $this->model->delete();
        echo json_encode(array("status" => TRUE));
    }

    public function insert_issue(){  
  
        // $config['upload_path'] = 'uploads/'; 
        // $config['allowed_types'] = '*';
        // $config['max_size'] = '102400'; // max_size in kb
        // $config['encrypt_name'] = TRUE;
        // $config['overwrite'] = TRUE;
        
    
    
          
          // $plant = $this->input->post('plant');
          // $pj_id = $this->input->post('pj_id');
          // $date_iden = $this->input->post('date_iden');
          // $is_des = $this->input->post('is_des');
          // $priority = $this->input->post('priority');
          // $owner_id = $this->input->post('owner_id');
          // $date_er = $this->input->post('date_er');
          // $er = $this->input->post('er');
          // $imp_sum = $this->input->post('imp_sum');
          // $act_step = $this->input->post('act_step');
          // $is_type = $this->input->post('is_type');
          // $cur_st = $this->input->post('cur_st');
          // $frr = $this->input->post('frr');
          // $note = $this->input->post('note');
    
    
           $data = array(
              'plant' => $this->input->post('plant'),
            //  'pj_id' => $this->input->post('pj_id'),
            //  'date_iden' => $this->input->post('date_iden'),
            //  'is_des' => $this->input->post('is_des'),
            //  'priority' => $this->input->post('priority'),
            //  'owner_id' => $this->input->post('owner_id'),
            //  'date_er' => $this->input->post('date_er'),
            //  'er' => $this->input->post('er'),
            //  'imp_sum' => $this->input->post('imp_sum'),
            //  'act_step' => $this->input->post('act_step'),
            //  'is_type' => $this->input->post('is_type'),
            //  'cur_st' => $this->input->post('cur_st'),
            //  'frr' => $this->input->post('frr'),
             'note' => $this->input->post('note')
           );
    
          echo "<script>";
          echo "console.log(data)";
          echo "</script>";
    
    
            if($plant != null){
              $last_id = $this->model_ajax->insert_issue($data);
              $this->session->set_userdata('is_id',$last_id);
            }
            
            if($data != false){
              echo json_encode(array(
              "statusCode"=>200
          ));
          }else{
              echo json_encode(array(
              "statusCode"=>100
              
          ));
          }
    
      
          
          
    
          redirect('issue/add','refresh');   
        
        
     
      }
 
 
 
}