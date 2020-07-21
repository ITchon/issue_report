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
        $sql =  'SELECT sis.is_id,sj.pj_name,sis.plant,sis.cur_st,sis.is_des,sis.priority,sis.date_identified,
        sis.date_er,sis.date_er,sis.date_updated,sis.delete_flag
        FROM sys_issue  AS sis 
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

        $plant =  $this->input->post('plant');
        $pj_id  =  $this->input->post('pj_id');
        $date_iden =  $this->input->post('date_iden');
        $is_des =  $this->input->post('is_des');
        $priority =  $this->input->post('priority');
        $owner_id =  $this->input->post('owner_id');
        $date_er =  $this->input->post('date_er');
        $er =  $this->input->post('er');
        $imp_sum =  $this->input->post('imp_sum');
        $act_step =  $this->input->post('act_step');
        $is_type =  $this->input->post('is_type');
        $cur_st =  $this->input->post('cur_st');
        $frr =  $this->input->post('frr');
        $note =  $this->input->post('note');
        $file = $_FILES['file']['name'];
        $fname = $this->session->userdata('firstname');

        $config['upload_path'] = 'uploads/'; 
        $config['allowed_types'] = '*';
        $config['max_size'] = '102400'; // max_size in kb
        $config['encrypt_name'] = TRUE;

          if($plant != null){
        $last_id = $this->model->insert_issue($plant,$pj_id,$date_iden,$is_des,
        $priority,$owner_id,$date_er,$er,$imp_sum,$act_step,$is_type,$cur_st,
        $frr,$note,$fname);
        $is_id = $last_id;
        $this->session->set_flashdata('is_id',$is_id);
          }
          $is_id = $this->session->flashdata('is_id');
            //Load upload library
          $config['is_id'] = $is_id;
          $this->load->library('upload',$config); 
          $this->upload->initialize($config);

          if(!$this->upload->do_upload('file')) {
            redirect('issue/add','refresh');   
 }else{
    $uploaded = $this->upload->data();
    $code = array('filename'  => $uploaded['file_name']);
    $is_id = array('is_id'  => $uploaded['is_id']);
    foreach ($is_id as $is) {
      $is_id = $is;
    }
  foreach ($code as $c) {
  $this->model->insert_img($is_id,$file,$c);
   }
 }
          redirect('issue/add','refresh');   
        
        
     
      }

    
    
}

