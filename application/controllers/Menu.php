<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->model->CheckSession();
        $this->model->load_menu();
    }

	public function manage()
    {	
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));   
        $this->model->CheckPermission($this->session->userdata('su_id'));

        $sql =  'select * from sys_menu_groups';
        $query = $this->db->query($sql); 
       $data['result'] = $query->result(); 




        $this->load->view('menu/manage',$data);//bring $data to user_data 
		$this->load->view('footer');
    }
    
    public function add()
    {   
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));   
        $this->model->CheckPermission($this->session->userdata('su_id'));

        $data['result_sp'] = $this->model->get_sp();
        $data['result_mg'] = $this->model->get_mg();

        $this->load->view('menu/add',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function insert()
    {
        $name =  $this->input->post('name');
        $sp_id =  $this->input->post('sp_id');
        $mg_id =  $this->input->post('mg_id');
        $icon =  $this->input->post('icon');
        $order =  $this->input->post('order');
        $result = $this->model->insert_menu($name, $sp_id,$mg_id,$icon,$order);
        redirect('menu/manage');

    }

    public function edit()
    {
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
        $id = $this->uri->segment('3');
        $sql="SELECT * FROM sys_menu_groups where mg_id = '$id'";
        $query = $this->db->query($sql); 
        $data['result'] = $query->result(); 
        $data['result_sp'] = $this->model->get_sp();
        $data['result_mg'] = $this->model->get_mg_noby($id);

        $this->load->view('menu/edit',$data);//bring $data to user_data 
        $this->load->view('footer');
  
    }

    public function save_edit()
    {
        $mg_id =  $this->input->post('mg_id');
        $sp_id =  $this->input->post('sp_id');
        $name =  $this->input->post('name');
        $order =  $this->input->post('order');


        $this->model->save_edit_menu($mg_id, $sp_id, $name,$order);
        redirect('menu/manage');


  
    }

    
}
