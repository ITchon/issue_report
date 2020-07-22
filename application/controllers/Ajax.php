<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Ajax extends CI_Controller {
 
 
public function __construct()
    {
        parent::__construct();
     $this->load->helper('url');
        $this->load->model('model');
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
 
    public function store()
    {
        $data = array(
                'title' => $this->input->post('title'),
                'product_code' => $this->input->post('product_code'),
                'description' => $this->input->post('description'),
                'created_at' => date('Y-m-d H:i:s'),
            );
         
        $status = false;
 
        $id = $this->input->post('product_id');
 
        if($id){
           $update = $this->model->update($data);
           $status = true;
        }else{
           $id = $this->model->create($data);
           $status = true;
        }
 
        $data = $this->model->get_by_id($id);
 
        echo json_encode(array("status" => $status , 'data' => $data));
    }
 
    public function delete()
    {
        $this->model->delete();
        echo json_encode(array("status" => TRUE));
    }
 
 
 
}