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

          if(redirect('issue/add','refresh')){
            $this->session->set_userdata('is_id','');
          }
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
        $this->session->set_flashdata('file',$file);
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
        $this->session->set_userdata('is_id',$is_id);
          }
            //Load upload library
          $this->load->library('upload',$config); 
          $this->upload->initialize($config);

          if ($this->upload->do_upload('file')) {
            $uploaded = $this->upload->data();
    $code = array('filename'  => $uploaded['file_name']);
    $this->session->set_flashdata('code',$code);
    $is_id = $this->session->userdata('is_id');
    $code = $this->session->flashdata('code');
    $file = $this->session->flashdata('file');
  
  foreach ($code as $c) {
  $this->model->insert_img($is_id,$file,$c);
   }
 }
          redirect('issue/add','refresh');   
        
        
     
      }
      public function uploadlol()
    {       
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = '*';
            $config['encrypt_name'] = TRUE;
        $d_no =  $this->input->post('d_no');
        $dcn_id =  $this->input->post('dcn_id');
        $p_no =  $this->input->post('p_no');
        $p_name =  $this->input->post('p_name');
        $path =  $this->input->post('path');
        $file = $_FILES['file_name']['name'];
        


      $num= $this->db->query("SELECT * FROM drawing where d_no = '$d_no'"); 
  $chk= $num->num_rows();
 if($chk != 0){
    $this->session->set_flashdata('success','<div class="alert alert-danger hide-it">  
          <span> ชื่อนี้ถูกใช้เเล้วd</span>
        </div> ');
        $this->session->set_flashdata('d_no',$d_no);
      
 }else if($chk != 1){
    $num= $this->db->query("SELECT * FROM part where p_no = '$p_no'"); 
  $chk= $num->num_rows();
  if($chk>=1){
    $this->session->set_flashdata('success','<div class="alert alert-danger hide-it">  
          <span> ชื่อนี้ถูกใช้เเล้วp</span>
        </div> ');
        $this->session->set_flashdata('p_no',$p_no);
     
 }else{
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('file_name'))
          {
          echo "<script>";
          echo 'alert(" File Failed ");';
          echo 'history.go(-1);';
          echo '</script>';
          exit();
          redirect('drawing/add','refresh');   
          }
          else
          {
      if($p_no != null || $p_name != null){
        $uploaded = $this->upload->data();
    $code = array('filename'  => $uploaded['file_name']);
    foreach ($code as $c) {
      $last_id = $this->model->insert_drawing($d_no, $dcn_id, $path, $file,$c);
      $d_id = $last_id;
      $result = $this->model->insert_part1($p_no,$p_name,$d_id);
  }
      $this->session->set_flashdata('success','<div class="alert alert-success hide-it">  
        <span> เพิ่มข้อมูลเรียบร้อยเเล้ว </span>
      </div> ');
  }else{
    $uploaded = $this->upload->data();
    $code = array('filename'  => $uploaded['file_name']);
    foreach ($code as $c) {
        $last_id = $this->model->insert_drawing($d_no, $dcn_id, $path, $file, $c);
    }  
      $this->session->set_flashdata('success','<div class="alert alert-success hide-it">
        <span> เพิ่มข้อมูลเรียบร้อยเเล้ว </span>
      </div> ');
  } 

          }
  
}
    
}     redirect('drawing/add','refresh');    



}

    
    
}

