

<?php

class Model_issue extends CI_Model
{

public function issue_by_id($id)
{
        $sql ="SELECT `file_code`  FROM issue_img 
        WHERE is_id='$id' AND delete_flag != 0  ";
          $query = $this->db->query($sql);  
         $data = $query->result(); 
         return $data;

}


public function list($src_pj,$src_st)
{
  if($src_pj !=0){
    $src_pj =  implode(',',$src_pj);
  }
  if($src_st !=0){
    $src_st =  implode(',',$src_st);
  }
        $sql =  "SELECT sis.is_id,sj.pj_name,sis.plant,sis.cur_st,sis.is_des,sis.priority,sis.date_identified,
        sis.date_er,sis.date_updated,sis.delete_flag
        FROM sys_issue  AS sis 
        inner join sys_projects as sj on sj.pj_id = sis.pj_id 
         where sis.delete_flag != 0 AND sis.cur_st IN ($src_st) AND sj.pj_id IN ($src_pj)";
          $query = $this->db->query($sql);  
         $data = $query->result(); 
         return $data;

}


public function insert_project($pj_name,$pj_des,$status)
{
        $num= $this->db->query("SELECT * FROM sys_projects where pj_name = '$pj_name'"); 
        $chk= $num->result();
      
       if($chk==null){
          $sql1 ="INSERT INTO sys_projects ( pj_name, pj_des, enable, date_created, date_updated,delete_flag) VALUES ( N'$pj_name', N'$pj_des', '$status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1' )";
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
   $sql1 ="UPDATE sys_projects SET pj_name = N'$pj_name',pj_des = N'$pj_des',enable = '$enable', date_updated = CURRENT_TIMESTAMP WHERE pj_id = '$pj_id'";
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
  $sql =  "SELECT sis.is_id,sj.pj_name,sis.plant,sis.cur_st,sis.is_des,sis.priority,sis.entered_by,
  sis.date_identified AS date_identified,
  sis.date_er AS date_er,
  sis.date_updated AS date_updated,
  sis.delete_flag
    FROM sys_issue  AS sis 
    inner join sys_projects as sj on sj.pj_id = sis.pj_id 
     where sis.delete_flag != 0 ORDER BY sis.is_id  ASC";
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


       public function edit_issue($id)
 {
  $sql =  "SELECT sis.is_id,sj.pj_name,sis.plant,sis.cur_st,sis.is_des,
  sis.priority,sis.pj_id,sis.owner_id,sow.owner_name,sis.imp_sum,sis.act_step,sis.is_type,
  sis.final_rs,sis.is_note,sis.esc_req,sis.entered_by,
sis.date_identified AS date_identified,
sis.date_er AS date_er,
sis.date_updated AS date_updated,
sis.delete_flag

FROM sys_issue  AS sis 
left join sys_projects as sj on sj.pj_id = sis.pj_id
left join sys_owner as sow on sow.owner_id = sis.owner_id 
where sis.delete_flag != 0 AND sis.is_id = $id ";

          $query = $this->db->query($sql);  
         $result = $query->result(); 
         return $result;
 }




  public function save_issue($is_id,$pj_id,$plant,$date_iden,$is_des,$priority,$owner_id,$date_er,$er,$imp_sum,$act_step,$is_type,$cur_st,$frr,$note,$fname)
 {
   $sql1 ="UPDATE sys_issue SET 
            pj_id = '$pj_id',            
            plant = '$plant',
            date_identified = '$date_iden',
            is_des = N'$is_des',
            priority = '$priority',
            owner_id = '$owner_id',
            date_er = '$date_er',
            esc_req = '$er',
            imp_sum = N'$imp_sum',
            act_step = N'$act_step',
            is_type = '$is_type',
            cur_st = '$cur_st',
            final_rs = N'$frr',
            is_note = N'$note',
            entered_by = '$fname',
            date_created = CURRENT_TIMESTAMP,
            date_updated = CURRENT_TIMESTAMP,
            delete_flag = 1,
            date_deleted = ''
            WHERE is_id = $is_id";
  $exc_user = $this->db->query($sql1);
  if ($exc_user ){ return true; }else{ return false; }
 }


 function insert_img($file,$c)
 {
  $is_id = $this->session->userdata('is_id');
  $sql ="INSERT INTO issue_img (is_id,file_n,file_code,delete_flag) VALUES ('$is_id', '$file','$c','1')";
    $query = $this->db->query($sql);  
   if($query){
     return true;
   }
   else{
     return false;
   }
 }

 public function del_img($img)
 {
  $sql ="UPDATE issue_img SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE img_id = '$img'";
    $query = $this->db->query($sql);  
   if($query){
     return true;
   }
   else{
     return false;
   }
 }

 public function delete_issue($id) {
  $sql ="UPDATE sys_issue SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE is_id = '$id'";
  $query = $this->db->query($sql);
     if ($query) { 
        return true; 
     } 
     else{
    return false;
   }
  }
 
}