<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() { 
    
        parent::__construct(); 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        $this->load->model('model');
        $this->load->model('model_issue');
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
      $this->load->model('model_issue');
      $totalD = $this->model->issue_totalD();
      $openD = $this->model->issue_openD();
      $closedD = $this->model->issue_closedD();
      $workD = $this->model->issue_workD();
      $day = array( $openD,$workD, $closedD);
      $data['day_data'] = json_encode($day);
      $data['total_day'] = $totalD;

      $totalM = $this->model->issue_totalM();
      $openM = $this->model->issue_openM();
      $closedM = $this->model->issue_closedM();
      $workM = $this->model->issue_workM();
      $month = array( $openM, $workM, $closedM);
      $data['month_data'] = json_encode($month);
      $data['total_month'] = $totalM;

      $totalY = $this->model->issue_totalY();
      $openY = $this->model->issue_openY();
      $closedY = $this->model->issue_closedY();
      $workY = $this->model->issue_workY();

      $data['maxvalue'] =  (max(array_column($totalY, 'total')));
      $data['total'] = json_encode($this->model_issue->sort_month($totalY));
      $data['open'] = json_encode($this->model_issue->sort_month($openY));
      $data['close'] = json_encode($this->model_issue->sort_month($closedY));
      $data['wip'] = json_encode($this->model_issue->sort_month($workY));
      $this->load->view('report/manage',$data);//bring $data to user_data 
      $this->load->view('footer');
    }

    public function search()
    { 
      $sqlSelG = "SELECT * FROM sys_projects WHERE delete_flag != 0";
      $query = $this->db->query($sqlSelG); 
      $data['result_p'] = $query->result(); 

        $this->load->view('report/search',$data);//bring $data to user_data 
        $this->load->view('footer');
    }

    public function list()
    {

       $pj_id =  $this->input->post('pj_id');
       $result = $this->model_issue->list($pj_id);
       $data['result'] = $result;

       $this->load->view('report/list',$data);//bring $data to user_data 
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

