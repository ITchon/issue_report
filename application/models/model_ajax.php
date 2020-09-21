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

}

?>