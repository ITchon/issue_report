<?php

class Model extends CI_Model
{


  public function CheckSession()        
  {
      if($this->session->userdata('su_id')=="") {
        echo "<script>alert('Please Login')</script>";
        redirect('login','refresh');
     return FALSE;
     
      }else{    return TRUE;    }
  }
  public function CheckPermission($para){
        
        $get_url = trim($this->router->fetch_class().'/'.$this->router->fetch_method());

        $sqlChkPerm = "SELECT sp.name,sp.controller
        FROM
        sys_users_permissions AS sup
        INNER JOIN sys_permissions AS sp ON sp.sp_id = sup.sp_id
        LEFT JOIN sys_permission_groups AS spg ON sp.spg_id = spg.spg_id
        WHERE
        sp.enable='1' AND spg.enable='1' AND sup.su_id='{$para}' AND sp.controller='{$get_url}';";
        
        $excChkPerm = $this->db->query($sqlChkPerm);
        $numChkPerm = $excChkPerm->num_rows();
        
        if($numChkPerm == 0) {
            
            echo '<script language="javascript">';
            echo 'alert("Permission '.$get_url.' not found.");';
            echo 'history.go(-1);';
            echo '</script>';
            exit();
            
        }

  }
  public function CheckPermissionGroup($para){
    $get_url = trim($this->router->fetch_class().'/'.$this->router->fetch_method());
    $sqlSelPerm = "SELECT
  p.sp_id,
  p.name,
    p.controller
  FROM
  sys_users_groups_permissions AS ugp
  LEFT JOIN sys_permission_groups AS pg ON pg.spg_id = ugp.spg_id
  inner JOIN sys_permissions AS p ON p.spg_id = pg.spg_id
  WHERE pg.enable='1' AND p.enable='1' AND ugp.sug_id='$para' AND p.controller='{$get_url}';";
    $excChkPerm = $this->db->query($sqlSelPerm);
    $numChkPerm = $excChkPerm->num_rows();
    if($numChkPerm == 0) {
    
    echo '<script language="javascript">';
    echo 'alert("Permission '.$get_url.' not found.");';
    echo 'history.go(-1);';
    echo '</script>';
    exit();
    
    }
 }

  public function getuser($user,$pass) {  
    $pass = base64_encode(trim($pass));
    $sql ="SELECT u.su_id as su_id , u.enable as u_enable ,ug.enable as sug_enable ,
    u.username as username,u.password as password, ug.sug_id,u.firstname as firstname
    FROM sys_users as u
    inner join sys_user_groups ug on u.sug_id = ug.sug_id
    
    WHERE username='$user' and password='$pass' ";
  $query = $this->db->query($sql);  

if($query->num_rows()!=0) {
$result = $query->result_array();
  return $result[0];  
  }
else{       
return false;
  }

} 
 function showmenu(){
    $sql =  'SELECT DISTINCT smg.name AS g_name, smg.icon_menu, sm.mg_id, smg.mg_id AS mg, smg.order_no 
    ,smg.link
    FROM sys_menus AS sm 
    inner JOIN sys_menu_groups AS smg ON smg.mg_id = sm.mg_id 
    ORDER BY smg.order_no ASC';    
    $query = $this->db->query($sql); 
    $result = $query->result();
    return $result;
 }
 function givemeid($para){
  $sql ="SELECT *  FROM sys_menus 
  WHERE link='$para'  ";
    $query = $this->db->query($sql);  
   $data = $query->result(); 
   return $data;
 }

 function insert($fname,$lname,$username,$password,$gender,$email,$sug_id)
 {
$password = base64_encode(trim($password));
  $num= $this->db->query("SELECT * FROM sys_users where username = '$username'"); 
  $chk= $num->result();

 if($chk==null){
    $sql1 ="INSERT INTO sys_users (sug_id, username, password, firstname, lastname, gender, email, enable, date_created, date_updated,delete_flag) VALUES ( '$sug_id', '$username', '$password', '$fname', '$lname', '$gender', '$email', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1' )";
  $query= $this->db->query($sql1); 
  if($query){
      return true;
  }else{
    return 3;
  }
 }
 return false;
   
 }


 function insert_group($gname)
 {
  $num= $this->db->query("SELECT * FROM sys_user_groups where name = '$gname'"); 
  $chk= $num->num_rows();
 if($chk!=1){
  $sql ="INSERT INTO sys_user_groups (name,enable,date_created,delete_flag) VALUES ( '$gname', '1', CURRENT_TIMESTAMP,  '1' );";
    $query = $this->db->query($sql);  
   if($query){
     return true;
   }
   else{
     return 3;
   }
  }
  return false;
 }

 function insert_project($pj_name,$pj_des,$status)
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

 function insert_issue($plant,$pj_id,$date_iden,$is_des,
 $priority,$owner_id,$date_er,$er,$imp_sum,$act_step,$is_type,$cur_st,
 $frr,$note,$fname)
 {
  $sql ="INSERT INTO sys_issue (pj_id,plant,date_identified,is_des,priority,owner_id,date_er,
  escalation_required,imp_sum,act_step,is_type,cur_st,final_rs,is_note,entered_by,date_created,
  date_updated,delete_flag) 
  VALUES ( '$pj_id', '$plant', '$date_iden', '$is_des', '$priority','$owner_id','$date_er'
  ,'$er','$imp_sum','$act_step','$is_type','$cur_st','$frr','$note','$fname'
  ,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,'1')";
    $query = $this->db->query($sql);  
    $last_id = $this->db->insert_id();
    $this->session->set_userdata('is_id',$last_id);
   if($query){
     return $last_id;
   }
   else{
     return false;
   }
 }


 function insert_img($file,$c)
 {
  $is_id = $this->session->userdata('is_id');
  $sql ="INSERT INTO issue_img (is_id,file_n,file_code) VALUES ('$is_id'+1, '$file','$c')";
    $query = $this->db->query($sql);  
   if($query){
     return true;
   }
   else{
     return false;
   }
 }



 function insert_permission($gname, $controller, $spg_id)
 {
  $sql ="INSERT INTO sys_permissions (spg_id,name,controller,enable,date_created,delete_flag) VALUES ( '$spg_id', '$gname', '$controller', '1', CURRENT_TIMESTAMP,  '1' );";
    $query = $this->db->query($sql);  
   if($query){
     return true;
   }
   else{
     return false;
   }
 }

 function insert_permissiongroup($gname)
 {
  $sql ="INSERT INTO sys_permission_groups (name,enable,date_created,delete_flag) VALUES ( '$gname', '1', CURRENT_TIMESTAMP,  '1' );";
    $query = $this->db->query($sql);  
   if($query){
     return true;
   }
   else{
     return false;
   }
 }



 public function enableUser($key=''){

  $sqlEdt = "UPDATE sys_users SET enable='1' , date_updated=CURRENT_TIMESTAMP WHERE su_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;    
    
  }else{    return FALSE;   }
  
}

public function num_enableUser($para){
		
  for($i=0;$i<count($para);$i++){
    
    $this->enableUser($para[$i]);
    
  }
  
  return TRUE;
  
}


public function disableUser($key=''){

  $sqlEdt = "UPDATE sys_users SET enable='0' , date_updated=CURRENT_TIMESTAMP WHERE su_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;    
    
  }else{    return FALSE;   }
  
}

public function num_disableUser($para){

  for($i=0;$i<count($para);$i++){
    
    $this->disableUser($para[$i]);
    
  }
  
  return TRUE;
  
}



 public function enableGroup($key=''){

  $sqlEdt = "UPDATE sys_user_groups SET enable='1' , date_updated=CURRENT_TIMESTAMP WHERE sug_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;  
    
  }else{  return FALSE; }
  
}



public function disableGroup($key=''){

  $sqlEdt = "UPDATE sys_user_groups SET enable='0' , date_updated=CURRENT_TIMESTAMP WHERE sug_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;  
    
  }else{  return FALSE; }
  
}



public function enablePermission($key=''){

  $sqlEdt = "UPDATE sys_permissions SET enable='1', date_updated=CURRENT_TIMESTAMP WHERE sp_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;  
    
  }else{  return FALSE; }
  
}


public function disablePermission($key=''){

  $sqlEdt = "UPDATE sys_permissions SET enable='0', date_updated=CURRENT_TIMESTAMP WHERE sp_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;  
    
  }else{  return FALSE; }
  
}



public function enablePermission_Group($key=''){

  $sqlEdt = "UPDATE sys_permission_groups SET enable='1', date_updated=CURRENT_TIMESTAMP WHERE spg_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;  
    
  }else{  return FALSE; }
  
}



public function disablePermission_Group($key=''){

  $sqlEdt = "UPDATE sys_permission_groups SET enable='0', date_updated=CURRENT_TIMESTAMP WHERE spg_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  
  if ($exc_user){
    
    return TRUE;  
    
  }else{  return FALSE; }
  
}


 public function delete_user($id) {
   $sql ="UPDATE sys_users SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE su_id = '$id'";
   $query = $this->db->query($sql);
      if ($query) { 
         return true; 
      } 
      else{
     return false;
    }
   }

   public function num_deleteUser($para){
		
		for($i=0;$i<count($para);$i++){
			
			$this->delete_user($para[$i]);
			
		}
		
		return TRUE;
		
  }
  
    public function delete_group($id) {
   $sql ="UPDATE sys_user_groups SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE sug_id = '$id'";
   $query = $this->db->query($sql);
      if ($query) { 
         return true; 
      } 
      else{
     return false;
   }
   }

   public function delete_permission($id) {
   $sql ="UPDATE sys_permissions SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE sp_id = '$id'";
   $query = $this->db->query($sql);
      if ($query) { 
         return true; 
      } 
      else{
     return false;
   }
   }

   public function delete_permissiongroup($id) {
   $sql ="UPDATE sys_permission_groups SET delete_flag = '0' , date_deleted=CURRENT_TIMESTAMP WHERE spg_id = '$id'";
   $query = $this->db->query($sql);
      if ($query) { 
         return true; 
      } 
     else{
     return false;  
   }
   }

   public function updated_profile_data($fname,$lname,$username,$password,$gender,$email,$sug_id,$su_id)
  {
     $sql1 ="UPDATE sys_users SET 
                      sug_id         = '$sug_id',
                      firstname      = '$fname',
                      lastname       = '$lname',
                      gender         = '$gender',
                      email          = '$email',
                      enable         = '1',
                      date_updated   = CURRENT_TIMESTAMP,
                      delete_flag    = '1' 

                       WHERE su_id          = '$su_id' ";
                      

    $exc_user = $this->db->query($sql1);
    if ($exc_user ){ return true; }else{ return false; }
  }
   public  function fetch_pass($session_id)
      {
        $fetch_pass=$this->db->query("SELECT * from sys_users where su_id='$session_id'");
        $res=$fetch_pass->result();
      }
   public function change_pass($session_id,$new_password)
      {
        $new_password = base64_encode(trim($new_password));
        $update_pass=$this->db->query("UPDATE sys_users set password='$new_password'  where su_id='$session_id'");
      }



 public function save_edit_p($sp_id, $spg_id, $sp_name)
  {
     $sql1 ="UPDATE sys_permissions SET name = '$sp_name', spg_id = '$spg_id', date_updated = CURRENT_TIMESTAMP WHERE sp_id = '$sp_id'";
    $exc_user = $this->db->query($sql1);
    if ($exc_user ){ return true; }else{ return false; }
  }

  public function save_edit_pg($spg_id, $spg_name)
  {
     $sql1 ="UPDATE sys_permission_groups SET name = '$spg_name', date_updated = CURRENT_TIMESTAMP WHERE spg_id = '$spg_id'";
    $exc_user = $this->db->query($sql1);
    if ($exc_user ){ return true; }else{ return false; }
  }

  public function deluserg_permission($sug_id)
  {
    $sql  =  "DELETE FROM sys_users_groups_permissions WHERE sug_id = '$sug_id'";
    $query = $this->db->query($sql); 
    if ($query) { 
      return true; 
    } 
    else{
       return false;
    } 
  }

  public function insertuserg_permission($sug_id,$spg)
  {
     $sql  = "INSERT INTO sys_users_groups_permissions(sug_id, spg_id, date_created) VALUES  ('$sug_id','$spg',CURRENT_TIMESTAMP)";
     $query = $this->db->query($sql);
    if ($query) { 
      return true; 
    } 
    else{
       return false;
    }
  }

   public function save_edit_ug($sug_id, $sug_name)
  {
     $sql1 ="UPDATE sys_user_groups SET name = '$sug_name', date_updated = CURRENT_TIMESTAMP WHERE sug_id = '$sug_id'";
    $exc_user = $this->db->query($sql1);
    if ($exc_user ){ return true; }else{ return false; }
  }


  public function deluser_permission($su_id)
  {
    $sql  =  "DELETE FROM sys_users_permissions WHERE su_id = $su_id";
    $query = $this->db->query($sql); 
    if ($query) { 
      return true; 
    } 
    else{
       return false;
    } 
  }

  public function insertuser_permission($su_id,$sp)
  {
     $sql  = "INSERT INTO sys_users_permissions(su_id, sp_id, date_created) VALUES  ('$su_id','$sp',CURRENT_TIMESTAMP)";
     $query = $this->db->query($sql);
    if ($query) { 
      return true; 
    } 
    else{
       return false;
    }
  }

  public function save_edit_u($su_id, $username, $password,$gender, $fname, $lname, $email, $sug_id)
  {
     $sql ="UPDATE sys_users SET sug_id = '$sug_id', username = '$username', password = '$password', firstname = '$fname', lastname = '$lname',
      gender = '$gender', email = '$email', date_updated = CURRENT_TIMESTAMP WHERE su_id = '$su_id'";
    $exc_user = $this->db->query($sql);
    if ($exc_user ){ return true; }else{ return false; }
  }




    public function download_record($su_id,$su_name,$data)
  {
    $sql  = "INSERT INTO `download_record`(`su_id`, `su_name`, `content`, `date_download`) 
    VALUES ('$su_id','$su_name','$data',CURRENT_TIMESTAMP)";
  $query= $this->db->query($sql); 
  if($query){
      return true;
  }else{
    return false;
 }
 }
 
 public function upload($uploadData,$id){
 foreach($uploadData as $r){
  $file_name = $r['filedata'];
    $sql  = "INSERT INTO issue_img(is_id, file_n) VALUES  ('$id','$file_name')";
  $query= $this->db->query($sql); 
 }

  }
 public function test(){
    $sql  = "INSERT INTO `sys_issue`(`is_id`) 
    VALUES ('')";
  $query= $this->db->query($sql); 
  $lasted_id= $this->db->insert_id(); 
  return $lasted_id;

  }
  
}

?>
