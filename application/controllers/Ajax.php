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
 
 
 
}