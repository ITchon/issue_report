<?php

class Model extends CI_Model
{

  public function get_user()
  {
    $sql = "SELECT su.su_id,su.password,su.username, su.firstname ,su.lastname, su.gender,su.email,su.enable,su.delete_flag, sug.name as name
    FROM
    sys_users  AS su 
    INNER JOIN sys_user_groups AS sug ON sug.sug_id = su.sug_id where su.delete_flag != 0 AND sug.sug_id != 1";
    $query = $this->db->query($sql); 
    $result =  $query->result();
    return $result;
  }

  public function CheckSession()        
  {
      if($this->session->userdata('su_id')=="") {
        echo "<script>alert('Please Login')</script>";
        redirect('login','refresh');
     return FALSE;
     
      }else{    return TRUE;    }
  }
  public function CheckPermission($para){
        if($this->session->userdata('sug_id')==1){
         
        }else{

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

  }

  public function load_menu()
  { 
      $menu['menu'] = $this->model->showmenu($this->session->userdata('sug_id'),$this->session->userdata('su_id'));
     $this->load->view('menu',$menu);
 

  }

  function showmenu($sug_id,$su_id)
  {
    $sql =  "SELECT smg.name AS g_name, smg.icon_menu,smg.mg_id, smg.order_no ,sp.controller FROM sys_menu_groups as smg
    INNER JOIN sys_permissions as sp ON sp.sp_id = smg.sp_id
    INNER JOIN sys_permission_groups as spg ON spg.spg_id = sp.spg_id
    INNER JOIN sys_users_groups_permissions as sug ON sug.spg_id = sp.spg_id
    INNER JOIN sys_users_permissions as sup ON sup.sp_id = sp.sp_id
    WHERE sup.su_id = $sug_id AND sug.sug_id = $su_id AND smg.enable != 0 ORDER BY smg.order_no ASC";
    $query = $this->db->query($sql); 
    $result = $query->result();
    return $result;
 }

  public function CheckPermissionGroup($para){
    if($this->session->userdata('sug_id')==1){
         
    }else{
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
 } 
  public function button_show($id,$url)        
  {
     
    $sql="SELECT * FROM  sys_permissions  where controller ='$url'";
    $query = $this->db->query($sql); 
    $res = $query->result();
     if($res != null){
    $spg_id = $res[0]->spg_id;
    $sql = " SELECT * FROM sys_permissions sp inner join sys_users_permissions sup on sup.sp_id = sp.sp_id where su_id = $id and sp.spg_id = $spg_id and sp.button_show IS NOT NULL";
    $query= $this->db->query($sql); 

            $data = $query->result(); 
            foreach ($data as $r ) {

                  $this->session->set_flashdata($r->button_show,'');
            }

     }
  }
//   public function get_user()
//  {
//    $sql =  'SELECT su.su_id,su.password,su.username, su.firstname ,su.lastname, su.gender,su.email,su.enable,su.delete_flag, sug.name as name
//    FROM
//    sys_users  AS su 
//    INNER JOIN sys_user_groups AS sug ON sug.sug_id = su.sug_id where su.delete_flag != 0 AND sug.sug_id != "1"';
//    $query = $this->db->query($sql); 
//    $result =  $query->result();
//    return $result;
//  }


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
function get_owner(){
  $sql ="SELECT * FROM sys_owner";
    $query = $this->db->query($sql);  
   $data = $query->result(); 
   return $data;
 }
function get_mg(){
  $sql ="SELECT * FROM sys_menu_groups ORDER BY order_no ASC";
    $query = $this->db->query($sql);  
   $data = $query->result(); 
   return $data;
 }
function get_issue(){
  $sql = "SELECT * FROM sys_issue where delete_flag != 0";
   $query = $this->db->query($sql);
   $result = $query->result();
   return $result;
 }
function get_issue_bycur($c){
  $sql = "SELECT COUNT(cur_st) as cur_st FROM sys_issue where delete_flag != 0 AND cur_st = '$c'";
   $query = $this->db->query($sql);
   $result = $query->result()[0];
   return $result;
 }
function get_issue_lastfix(){
  $sql = "SELECT MAX(date_updated) as date_updated FROM sys_issue where delete_flag != 0 AND cur_st = 'closed'";
   $query = $this->db->query($sql);
   $result = $query->result()[0];
   return $result;
 }

function get_mg_noby($id){
  $sql ="SELECT * FROM sys_menu_groups where mg_id != $id ORDER BY order_no ASC";
    $query = $this->db->query($sql);  
   $data = $query->result(); 
   return $data;
 }

 function get_sp(){
  $sql ="SELECT * FROM sys_permissions where delete_flag != 0 or controller LIKE '%manage%'
   OR controller LIKE '%show%' order by name";
    $query = $this->db->query($sql);  
   $data = $query->result(); 
   return $data;
 }
 function get_spg(){
  $sql ="SELECT * FROM sys_permission_groups where delete_flag != 0 order by name";
    $query = $this->db->query($sql);  
   $data = $query->result(); 
   return $data;
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

 function insert_menu($name,$spg_id, $sp_id, $mg_id, $icon, $order)
 {
  $num= $this->db->query("SELECT MAX(order_no) as order_no FROM sys_menu_groups"); 
  $res= $num->result()[0];

  $order = $res->order_no+1;
  $sql1 ="INSERT INTO sys_menu_groups (name,spg_id, sp_id, icon_menu, enable, date_created,order_no) 
  VALUES ( '$name','$spg_id', '$sp_id', '$icon', '1', CURRENT_TIMESTAMP,'$order' )";
$query= $this->db->query($sql1); 

  if($query){
      return true;
  }else{
    return false;
  }
 
   
 }

 public function save_edit_menu($name,$icon,$mg_id, $spg_id,$sp_id, $order)
 {

   $sql =  "SELECT * FROM sys_menu_groups where mg_id = $mg_id"; 
  $query = $this->db->query($sql);
  $res = $query->result()[0]; 
   $old_order = $res->order_no;  
   $a = $old_order;
   $b = $order;

 
if($old_order > $order){
  $sql =  "UPDATE sys_menu_groups SET order_no= $order+1,name = '$name' ,icon_menu = '$icon' ,spg_id = $spg_id , sp_id = $sp_id WHERE mg_id=$mg_id"; 
  $query = $this->db->query($sql);
  $sql =  "SELECT * FROM sys_menu_groups where order_no between $b+1 and $a and mg_id != $mg_id ORDER BY sys_menu_groups.order_no ASC"; 
  $query = $this->db->query($sql);
  $res = $query->result(); 
  foreach($res as $r){
  $sql =  "UPDATE sys_menu_groups SET order_no= order_no+1 WHERE mg_id=$r->mg_id"; 
  $query = $this->db->query($sql);
  }

}else{

  $sql =  "UPDATE sys_menu_groups SET order_no= $order WHERE mg_id=$mg_id"; 
  $query = $this->db->query($sql);
  $sql =  "SELECT * FROM sys_menu_groups where order_no between $a and $b and mg_id != $mg_id ORDER BY sys_menu_groups.order_no ASC"; 
  $query = $this->db->query($sql);
  $res = $query->result(); 
  foreach($res as $r){
  $sql =  "UPDATE sys_menu_groups SET order_no= order_no-1 WHERE mg_id=$r->mg_id"; 
  $query = $this->db->query($sql);
  }
}
  

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


 function insert_issue($plant,$pj_id,$date_iden,$is_des,
 $priority,$owner_id,$date_er,$er,$imp_sum,$act_step,$is_type,$cur_st,
 $frr,$note,$fname)
 {
  $sql ="INSERT INTO sys_issue (pj_id,plant,date_identified,is_des,priority,owner_id,date_er,
  esc_req,imp_sum,act_step,is_type,cur_st,final_rs,is_note,entered_by,date_created,
  date_updated,delete_flag) 
  VALUES ( '$pj_id', '$plant', '$date_iden', N'$is_des', '$priority','$owner_id','$date_er'
  ,'$er',N'$imp_sum',N'$act_step','$is_type','$cur_st',N'$frr',N'$note',N'$fname'
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
  $sql ="INSERT INTO issue_img (is_id,file_n,file_code,delete_flag) VALUES ('$is_id'+1, '$file','$c','1')";
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

 public function enableProject($key){
  $query = $this->db->query("SELECT * from sys_projects WHERE pj_id = $key "); 
  $result = $query->result()[0];
  if( $result->enable==0){
  $sqlEdt = "UPDATE sys_projects SET enable='1' , date_updated=CURRENT_TIMESTAMP WHERE pj_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  }
  else{
    $sqlEdt = "UPDATE sys_projects SET enable='0' , date_updated=CURRENT_TIMESTAMP WHERE pj_id={$key};";
    $exc_user = $this->db->query($sqlEdt);
  }

  if ($exc_user){
    
    return TRUE;    
    
  }else{    return FALSE;   }
  
}

 public function enableMenu($key){
  $query = $this->db->query("SELECT * from sys_menu_groups WHERE mg_id = $key "); 
  $result = $query->result()[0];
  if( $result->enable==0){
  $sqlEdt = "UPDATE sys_menu_groups SET enable='1' , date_updated=CURRENT_TIMESTAMP WHERE mg_id={$key};";
  $exc_user = $this->db->query($sqlEdt);
  }
  else{
    $sqlEdt = "UPDATE sys_menu_groups SET enable='0' , date_updated=CURRENT_TIMESTAMP WHERE mg_id={$key};";
    $exc_user = $this->db->query($sqlEdt);
  }

  if ($exc_user){
    
    return TRUE;    
    
  }else{    return FALSE;   }
  
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


  public function issue_totalD()
  {

    $sql="SELECT COUNT(is_id) as total FROM sys_issue WHERE CAST([date_created] as date) = CAST(GETDATE() as date) AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query= $this->db->query($sql);
  $total = $query->result(); 
  if($query){
      return $total[0]->total;
  }else{
    return false;
 }
 }


 public function issue_openD()
  {
   $sql="SELECT COUNT(is_id) as total  FROM sys_issue WHERE cur_st = 'Open' AND CAST([date_created] as date) = CAST(GETDATE() as date) AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query = $this->db->query($sql); 
  $total = $query->result(); 
  if($query){
    if($total[0]->total == 0){
      return null;
    }else{
      return $total[0]->total;
    }
  }else{
    return false;
 }
 }


 public function issue_closedD()
  {
   $sql="SELECT COUNT(is_id) as total  FROM sys_issue WHERE cur_st = 'Closed' AND CAST([date_created] as date) = CAST(GETDATE() as date) AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query = $this->db->query($sql); 
  $total = $query->result(); 
  if($query){
    if($total[0]->total == 0){
      return null;
    }else{
      return $total[0]->total;
    }
  }else{
    return false;
 }
 }


 public function issue_workD()
  {
   $sql="SELECT COUNT(is_id) as total  FROM sys_issue WHERE cur_st = 'Work In Progress' AND  CAST([date_created] as date) = CAST(GETDATE() as date) AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query = $this->db->query($sql); 
  $total = $query->result(); 
  if($query){
    if($total[0]->total == 0){
      return null;
    }else{
      return $total[0]->total;
    }
  }else{
    return false;
 }
 }


  public function issue_totalM()
  {
    $sql="SELECT COUNT(is_id) as total FROM sys_issue WHERE MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query= $this->db->query($sql);
  $total = $query->result(); 
  if($query){

      return $total[0]->total;
    
  }else{
    return false;
 }
 }


 public function issue_openM()
  {
   $sql="SELECT COUNT(is_id) as total  FROM sys_issue WHERE cur_st = 'Open' AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query = $this->db->query($sql); 
  $total = $query->result(); 
  if($query){
    if($total[0]->total == 0){
      return null;
    }else{
      return $total[0]->total;
    }
  }else{
    return false;
 }
 }


 public function issue_closedM()
  {
   $sql="SELECT COUNT(is_id) as total  FROM sys_issue WHERE cur_st = 'Closed' AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query = $this->db->query($sql); 
  $total = $query->result(); 
  if($query){
    if($total[0]->total == 0){
      return null;
    }else{
      return $total[0]->total;
    }
  }else{
    return false;
 }
 }


 public function issue_workM()
  {
   $sql="SELECT COUNT(is_id) as total  FROM sys_issue WHERE cur_st = 'Work In Progress' AND MONTH([date_created]) = MONTH(GETDATE()) AND YEAR([date_created]) = YEAR(GETDATE())";
  $query = $this->db->query($sql); 
  $total = $query->result(); 
  if($query){
    if($total[0]->total == 0){
      return null;
    }else{
      return $total[0]->total;
    }
  }else{
    return false;
 }
 }

 
 public function issue_totalY()
 {
   $sql="SELECT COUNT(is_id) AS total, DATEPART(month,date_created) AS month
   FROM sys_issue 
   WHERE YEAR([date_created]) = YEAR(GETDATE())
   GROUP BY DATEPART(month,date_created)";
 $query= $this->db->query($sql);
 $total = $query->result(); 
 if($query){
     return $total;
 }else{
   return false;
}
}


public function issue_openY()
 {
  $sql="SELECT COUNT(is_id) AS total ,DATEPART(month,date_created) AS month
  FROM sys_issue 
  WHERE cur_st = 'Open' AND YEAR([date_created]) = YEAR(GETDATE())
  GROUP BY DATEPART(month,date_created)";
 $query = $this->db->query($sql); 
 $total = $query->result(); 
 if($query){
     return $total;
 }else{
   return false;
}
}


public function issue_closedY()
 {
  $sql="SELECT COUNT(is_id) AS total ,DATEPART(month,date_created) as month
  FROM sys_issue 
  WHERE cur_st = 'Closed' AND YEAR([date_created]) = YEAR(GETDATE())
  GROUP BY DATEPART(month,date_created)";
 $query = $this->db->query($sql); 
 $total = $query->result(); 
 if($query){
     return $total;
 }else{
   return false;
}
}


public function issue_workY()
 {
  $sql="SELECT COUNT(is_id) AS total ,DATEPART(month,date_created) as month
  FROM sys_issue 
  WHERE cur_st = 'Work In Progress' AND YEAR([date_created]) = YEAR(GETDATE())
  GROUP BY DATEPART(month,date_created)";
 $query = $this->db->query($sql); 
 $total = $query->result(); 
 if($query){
     return $total;
 }else{
   return false;
}
}
  
}

?>
