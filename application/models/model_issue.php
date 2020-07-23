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
   public function sort_month($data){
     $array=[];
    for($i=1;$i<=12;$i++){
      if (in_array($i,array_column($data, 'month')))
      {           
          foreach($data as $r){
          if($i == $r->month){
            array_push($array,$r->total);
               }   
            }
      }
        else
         {   
        array_push($array,0);
          }
      
       }

      return $array;
       }
}