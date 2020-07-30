<?php

class Model_issue extends CI_Model
{
public function issue_by_id($id)
{
        $sql ="SELECT `file_code`  FROM issue_img 
        WHERE is_id='$id'  ";
          $query = $this->db->query($sql);  
         $data = $query->result(); 
         return $data;

}


public function list($id)
{
        $sql =  "SELECT sis.is_id,sj.pj_name,sis.plant,sis.cur_st,sis.is_des,sis.priority,sis.date_identified,
        sis.date_er,sis.date_updated,sis.delete_flag
        FROM sys_issue  AS sis 
        inner join sys_projects as sj on sj.pj_id = sis.pj_id 
         where sis.delete_flag != 0 AND sis.pj_id = $id ";
          $query = $this->db->query($sql);  
         $data = $query->result(); 
         return $data;

}


public function insert_project($pj_name,$pj_des,$status)
{
        $num= $this->db->query("SELECT * FROM sys_projects where pj_name = '$pj_name'"); 
        $chk= $num->result();
      
       if($chk==null){
          $sql1 ="INSERT INTO sys_projects ( pj_name, pj_des, enable, date_created, date_updated,delete_flag) VALUES ( '$pj_name', '$pj_des', '$status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1' )";
        $query= $this->db->query($sql1); 
        if($query){
            return true;
        }else{
          return 3;
        }
       }
       return false;
        
}

public function save_edit_project($pj_id, $pj_name,$pj_des, $enable)
{
   $sql1 ="UPDATE sys_projects SET pj_name = '$pj_name',pj_des = '$pj_des',enable = '$enable', date_updated = CURRENT_TIMESTAMP WHERE pj_id = '$pj_id'";
  $exc_user = $this->db->query($sql1);
  if ($exc_user ){ return true; }else{ return false; }
}


public function delete_project($id) 
{
  $sql ="UPDATE sys_projects SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE pj_id = '$id'";
  $query = $this->db->query($sql);
     if ($query) { 
        return true; 
     } 
     else{
    return false;
   }
  }

  public function select_issue()
{
  $sql =  'SELECT sis.is_id,sj.pj_name,sis.plant,sis.cur_st,sis.is_des,sis.priority,
  DATE_FORMAT(sis.date_identified, "%Y-%m-%d") AS date_identified,
  DATE_FORMAT(sis.date_er, "%Y-%m-%d") AS date_er,
  DATE_FORMAT(sis.date_updated, "%Y-%m-%d") AS date_updated,
  sis.delete_flag
    FROM sys_issue  AS sis 
    inner join sys_projects as sj on sj.pj_id = sis.pj_id 
     where sis.delete_flag != 0';
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