<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller {
  private $upload_path = "./uploads";
    function __construct() { 
    
        parent::__construct(); 
        $this->load->library('upload');
        $this->load->helper('download'); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->load->model('model_issue');
        $this->model->CheckSession();
        $this->model->load_menu();
        $url = trim($this->router->fetch_class().'/'.$this->router->fetch_method());
        $this->model->button_show($this->session->userdata('su_id'),$url);     
       
    }
    public function manage()
    {   
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));

         $result = $this->model_issue->select_issue();
       $data['result'] = $result; 
        $this->load->view('issue/manage',$data);//bring $data to user_data 
        $this->load->view('issue/img_modal');//bring $data to user_data 
        $this->load->view('footer');
    }

    public function add()
    {   
        $this->model->CheckPermission($this->session->userdata('su_id'));
        $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));
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

        $data['result_own'] = $this->model->get_owner();
 
        $this->load->view('issue/add',$data);//bring $data to user_data 
        $this->load->view('footer');
    }


//     public function upload(){

      
//       $config['upload_path'] = 'uploads/'; 
//       $config['allowed_types'] = '*';
//       $config['max_size'] = '102400'; // max_size in kb
//       $config['encrypt_name'] = TRUE;
      
//         $plant =  $this->input->post('plant');
//         $pj_id  =  $this->input->post('pj_id');
//         $date_iden =  $this->input->post('date_iden');
//         $is_des =  $this->input->post('is_des');
//         $priority =  $this->input->post('priority');
//         $owner_id =  $this->input->post('owner_id');
//         $date_er =  $this->input->post('date_er');
//         $er =  $this->input->post('er');
//         $imp_sum =  $this->input->post('imp_sum');
//         $act_step =  $this->input->post('act_step');
//         $is_type =  $this->input->post('is_type');
//         $cur_st =  $this->input->post('cur_st');
//         $frr =  $this->input->post('frr');
//         $note =  $this->input->post('note');
//         $file = $_FILES['file']['name'];
//         $fname = $this->session->userdata('firstname');

//             //Load upload library
//           $this->load->library('upload',$config); 
//           $this->upload->initialize($config);

//           if(!$this->upload->do_upload('file')) {
//             echo "sus";
//       die();

//  }else{

//   echo $file;
//   die();
//           $last_id = $this->model->insert_issue($plant,$pj_id,$date_iden,$is_des,
//       $priority,$owner_id,$date_er,$er,$imp_sum,$act_step,$is_type,$cur_st,
//       $frr,$note,$fname);

//       $uploaded = $this->upload->data();
//       $code = array('filename'  => $uploaded['file_name']);
//       foreach ($code as $c) {
//       $this->model->insert_img($last_id,$file,$c);
//       }
  

//  }
//           redirect('issue/add','refresh');   

        
        
     
//       }

public function upload(){

      $config["upload_path"]   = $this->upload_path;
      $config["allowed_types"] = "*";
      $config['overwrite'] = TRUE;
      // $config['encrypt_name'] = TRUE;

       if($_FILES != null){
         $file = array(
           'file' => $_FILES['file']['name']
         );
       }else{
         $file = array(
           'file' => ''
         );
       }

      if ( ! empty($_FILES)) 
    {
       $this->load->library('upload', $config);
       $this->upload->initialize($config);
       if ( ! $this->upload->do_upload("file")) {
         echo "failed to upload file(s)";
       }else{
        $uploaded = $this->upload->data();
        $code = array('filename'  => $uploaded['file_name']);
        foreach($code as $c){
          $this->session->set_userdata('filecode', $c);
        }
       }
     }
     echo json_encode($file);
     

    
 
  }

 public function getfilecode()
 {
   $filecode = $this->session->userdata('filecode');
  echo json_encode('clear');

 }

public function insert_issue()
{
  $file = $this->input->post('file');

  $data = array(
    'plant' => $this->input->post('plant'),
    'pj_id' => $this->input->post('pj_id'),
    'date_iden' => $this->input->post('date_iden'),
    'is_des' => $this->input->post('is_des'),
    'priority' => $this->input->post('priority'),
    'owner_id' => $this->input->post('owner_id'),
    'date_er' => $this->input->post('date_er'),
    'er' => $this->input->post('er'),
    'imp_sum' => $this->input->post('imp_sum'),
    'act_step' => $this->input->post('act_step'),
    'is_type' => $this->input->post('is_type'),
    'cur_st' => $this->input->post('cur_st'),
    'frr' => $this->input->post('frr'),
   'note' => $this->input->post('note')
 );
 if($this->input->post('plant') != null){
  $last_id = $this->model_issue->insert_issue($data);
  $this->session->set_userdata('is_id',$last_id);
}
if($file != null){
  foreach ($file as $c) {
    $res = $this->model_issue->insert_img($last_id,$c,$c);
   }
}

if($res !=false){
  echo json_encode('clear');
}else{
 echo json_encode('sad');
}


}

 public function save_img()
 {
 $file = $this->input->post('file');
  if($file !=null){
    echo json_encode($file);
  }else{
   echo json_encode('sad');
  }
die();
  if($file != null){
    $this->model_issue->update_img($file);
  }
 }

public function remove()
{
  $file = $this->input->post("file");
  if ($file && file_exists($this->upload_path . "/" . $file)) {
    unlink($this->upload_path . "/" . $file);
  }
}

public function list_files()
{
  $this->load->helper("file");
  $files = get_filenames($this->upload_path);
  // we need name and size for dropzone mockfile
  foreach ($files as &$file) {
    $file = array(
      'name' => $file,
      'size' => filesize($this->upload_path . "/" . $file)
    );
  }

  header("Content-type: text/json");
  header("Content-type: application/json");
  echo json_encode($files);
}


      public function edit()
    {
      $this->model->CheckPermissionGroup($this->session->userdata('sug_id'));   
      $this->model->CheckPermission($this->session->userdata('su_id'));
        $id = $this->uri->segment('3');
        $result = $this->model_issue->edit_issue($id);
        $data['result'] = $result; 
        

        $is_id =  $data['result'][0]->is_id ;
        $owner_id =  $data['result'][0]->owner_id ;

        $sql="SELECT * FROM sys_projects ";
        $query = $this->db->query($sql); 
        $data['result_pj'] = $query->result(); 

        $data['result_own'] = $this->model->get_owner();
        
        $sqlSelG = "SELECT * FROM issue_img as smg WHERE smg.is_id = $is_id AND smg.delete_flag != 0";
        $query = $this->db->query($sqlSelG); 
        $data['result_img'] = $query->result(); 

        $this->load->view('issue/edit',$data);//bring $data to user_data 
        $this->load->view('footer');
  
    }



    public function save_edit()
    {
      $file = $this->input->post('file');
      
      $is_id  =  $this->input->post('is_id');
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
      $fname = $this->session->userdata('firstname');


        if($plant != null){
        $this->model_issue->save_issue($is_id,$pj_id,$plant,$date_iden,$is_des,$priority,$owner_id,$date_er,$er,$imp_sum,$act_step,$is_type,$cur_st,$frr,$note,$fname);
          if($this->input->post('chk_uid') != null){
            $img_id =  $this->input->post('chk_uid');
            foreach($img_id as $img){
              $this->model_issue->del_img($img);
            }
          }
        }

        if($file != null){
          foreach ($file as $c) {
            $res = $this->model_issue->insert_img($is_id,$c,$c);
           }
        }
        

        redirect('issue/manage','refresh');   
      

    
  }

  public function delete()
    {
        $this->model_issue->delete_issue($this->uri->segment('3'));
        $this->session->set_flashdata('success','<div class="alert alert-success hide-it">  
        <span>  Delete Success</span>
      </div> ');
        redirect('issue/manage');
    }

    public function view()
    {
      $id = $this->uri->segment('3');

      $result = $this->model_issue->edit_issue($id);
      $data['result'] = $result; 
      
  
      $is_id =  $data['result'][0]->is_id ;
      $owner_id =  $data['result'][0]->owner_id ;
      
      $sql="SELECT * FROM sys_projects ;";
      $query = $this->db->query($sql); 
      $data['result_pj'] = $query->result(); 
      $data['result_own'] = $this->model->get_owner();
  
      $sqlSelG = "SELECT * FROM issue_img as smg WHERE smg.is_id = $is_id AND smg.delete_flag != 0";
      $query = $this->db->query($sqlSelG); 
      $data['result_img'] = $query->result(); 
  
      $this->load->view('issue/view',$data);//bring $data to user_data 
      $this->load->view('footer');
        
    }

    
    
}

