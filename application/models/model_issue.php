<?php

class Model_issue extends CI_Model
{
   public function issue_by_id($id){
        $sql ="SELECT `file_code`  FROM issue_img 
        WHERE is_id='$id'  ";
          $query = $this->db->query($sql);  
         $data = $query->result(); 
         return $data;
       }
}