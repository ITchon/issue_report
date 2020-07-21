<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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

        $this->load->view('report/manage');//bring $data to user_data 
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

    public function multiple_upload(){

      $is_id = $this->model->test();
      if(isset($_FILES['filename']) && !empty($_FILES['filename']['name'])) 
        {
          $filesCount = count($_FILES['filename']['name']);
          for($i = 0; $i < $filesCount; $i++){
          $_FILES['file']['name']  = $_FILES['filename']['name'][$i];
          $_FILES['file']['type']  = $_FILES['filename']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['filename']['tmp_name'][$i];
          $_FILES['file']['error']    = $_FILES['filename']['error'][$i];
          $_FILES['file']['size']     = $_FILES['filename']['size'][$i];
          $config['upload_path'] = 'upload/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|JPEG|JPG|PNG';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
               if($this->upload->do_upload('file')){
                   $fileData = $this->upload->data();
                   $uploadData[$i]['filedata'] = $fileData['file_name'];
              }
           }
           if(!empty($uploadData)){

                $result = $this->model->upload($uploadData,$is_id);
                echo "Files uploaded successfully.";
           }
           
         }
      }

    
    
}

