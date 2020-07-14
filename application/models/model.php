<?php

class Model extends CI_Model
{
    function showmenu(){
        $sql =  'SELECT DISTINCT smg.name AS g_name, smg.icon_menu, sm.mg_id, smg.mg_id AS mg, smg.order_no 
        FROM sys_menus AS sm 
        inner JOIN sys_menu_groups AS smg ON smg.mg_id = sm.mg_id 
        inner join sys_menu_show as sms on sms.mg_id=smg.mg_id 
        ORDER BY smg.order_no ASC';    
        $query = $this->db->query($sql); 
        $result = $query->result();
        return $result;
     }

     function givemeid($para){
        $sql ="SELECT * FROM sys_menu_groups WHERE link='$para' ";
          $query = $this->db->query($sql);  
         $data = $query->result(); 
         return $data;
    }
    
}

?>