<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->model->CheckSession();
        $menu['menu'] = $this->model->showmenu($this->session->userdata('sug_id'));
        $sql =  "select * from sys_menus where order_no != 0 and enable != 0 ORDER BY order_no";
        $query = $this->db->query($sql); 
        $url = trim($this->router->fetch_class().'/'.$this->router->fetch_method()); 
         $menu['mg']= $this->model->givemeid($url);
         $menu['submenu']= $query->result();
         $this->load->view('menu',$menu);
       
    }
    public function manage()
    {   
        //$this->model->CheckPermission($this->session->userdata('su_id'));
        //$this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
        $sql =  'SELECT * FROM sys_issue  AS sis 
        inner join sys_projects as sj on sj.pj_id = sis.pj_id 
    where sis.delete_flag != 0 ';
        $query = $this->db->query($sql); 
       $data['result'] = $query->result(); 
        $this->load->view('issue/manage',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function add()
    {   
        //$this->model->CheckPermission($this->session->userdata('su_id'));
        //$this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
        $sql='SELECT spj.pj_id,spj.pj_name FROM sys_issue as sis
        INNER JOIN sys_projects as spj ON spj.pj_id = sis.pj_id 
        INNER JOIN sys_owner as sow ON sow.owner_id = sis.owner_id
        where sis.delete_flag != 0 ';
        //$sql =  'SELECT * FROM sys_users ';
        $query = $this->db->query($sql); 
        $data['result'] = $query->result(); 

        
        $sqlSelG = "SELECT * FROM sys_projects WHERE delete_flag != 0";
        $query = $this->db->query($sqlSelG); 
        $data['result_p'] = $query->result(); 

        $sqlSelG = "SELECT * FROM sys_owner";
        $query = $this->db->query($sqlSelG); 
        $data['result_own'] = $query->result(); 

        $this->load->view('issue/add',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function upload(){

        if(!empty($_FILES['file']['name'])){
     
          // Set preference
          $config['upload_path'] = 'uploads/'; 
          $config['allowed_types'] = '*';
          $config['max_size'] = '102400'; // max_size in kb
          $config['file_name'] = $_FILES['file']['name'];
     
          //Load upload library
          $this->load->library('upload',$config); 
     
          // File upload
          if($this->upload->do_upload('file')){
            // Get data about the file
            $uploadData = $this->upload->data();
          }
          
        }
        redirect('issue/add','refresh'); 
     
      }

    
    
}

