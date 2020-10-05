<?php

class Model_ajax extends CI_Model
{


    function fetch_menu($spg_id)
    {
      $sql ="SELECT sp.sp_id , sp.name FROM sys_permission_groups spg inner join sys_permissions sp on sp.spg_id = spg.spg_id where sp.spg_id  = $spg_id ";
     $query = $this->db->query($sql); 

     $output = '<optgroup label="" >';
     foreach($query->result() as $row)
     {       
      $selected = '';
       if(strpos($row->name, 'SHOW') !== false){
        $selected = 'selected';
      }
         $output .= '<option '.$selected.' value="'.$row->sp_id.'">'.$row->name.'</option>.';
       
     }

     return $output;
    }
    function insert_issue($data)
    {
    //  $sql ="INSERT INTO sys_issue (pj_id,plant,date_identified,is_des,priority,owner_id,date_er,
    //  esc_req,imp_sum,act_step,is_type,cur_st,final_rs,is_note,entered_by,date_created,
    //  date_updated,delete_flag) 
    //  VALUES ( '$data[pj_id]', '$data[plant]', '$data[date_iden]', N'$data[is_des]', '$data[priority]','$data[owner_id]','$data[date_er]'
    //  ,'$data[er]',N'$data[imp_sum]',N'$data[act_step]','$data[is_type]','$data[cur_st]',N'$data[frr]',N'$data[note]',CURRENT_TIMESTAMP
    //  ,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'1')";
    $sql ="INSERT INTO sys_issue (plant,note) 
     VALUES ( '$data[plant]', '$data[note]')";
       $query = $this->db->query($sql);  
       $last_id = $this->db->insert_id();
      if($query){
        return $last_id;
      }
      else{
        return false;
      }
    }

}

?>