<?php

class Model_setting extends CI_Model
{



	public function save_edit_profile($su_id, $username, $fname, $lname, $email, $gender)
{
   $sql1 ="UPDATE sys_users SET username = N'$username',firstname = N'$fname',lastname = '$lname',email = '$email',gender = '$gender', date_updated = CURRENT_TIMESTAMP WHERE su_id = '$su_id'";
  $query = $this->db->query($sql1);
  if ($query){ return true; }else{ return false; }
}

	public function check_cur_password($su_id,$password)
{
	$password = base64_encode(trim($password));
   $sql1 ="SELECT * from sys_users where su_id = '$su_id' AND password = '$password'";
  $query = $this->db->query($sql1);
  $data = $query->result(); 
  if ($data){ return true; }else{ return false; }
}

	public function save_changed_password($su_id,$new_pass)
{
	$password = base64_encode(trim($new_pass));
   $sql1 ="UPDATE sys_users SET password = '$password', date_updated = CURRENT_TIMESTAMP WHERE su_id = '$su_id'";
  $exc_user = $this->db->query($sql1);
  if ($exc_user ){ return true; }else{ return false; }
}



}
?>