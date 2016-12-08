<?php
class User_model extends CI_Model{

	public $table="tab_users";

	function user_model(){
		parent::__construct();
	}

	function verifyUser($data){
		extract($data);
		$password=md5($password);
		$sql="select * from ".$this->table." where lower(txt_email)='".strtolower($username)."' and txt_password='".$password."'  ";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function check_code($data)
	{
		extract($data);
		$sql="select * from tab_contacts where txt_access_code='".$code."'";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		if(count($result)>0)
		{
			$response['success']=true;
		}
		else
		{
			$response['success']=false;
			$response['error']="Invalid Code.";
		}
		return $response;
	}
	
	function signup($data){		
		extract($data);		
		$password=md5($password);		
		$name_array=explode(" ",$name,2);		
		$fname=$name_array[0];		
		$lname=$name_array[1];
		$check_sql="select * from tab_users where txt_email='".$email."'";
		$check_query=$this->db->query($check_sql);
		$check_result=$check_query->result_array();
		if(count($check_result)==0)
		{
			$sql="insert into tab_users(txt_username,txt_password,txt_fname,txt_lname,txt_email,int_user_type) values('".$email."','".$password."','".$fname."','".$lname."','".$email."','2')";		
			$query=$this->db->query($sql);				
			$lastInsertId = $this->db->insert_id();		
			$sql="insert into tab_customer(txt_fname,txt_lname,txt_email,int_user_id) values('".$fname."','".$lname."','".$email."',".$lastInsertId.")";		
			$query=$this->db->query($sql);
			$this->sendSignupMail($email,$password,$email);
			$response["success"]=true;		
			$response["user_id"]=$lastInsertId;		
		}
		else
		{
			$response["success"]=false;		
			$response["error"]="Email Id already exist, please login or reset password.";	
		}
		
		return $response;	
	}

	function sendSignupMail($email,$pass,$username){

		$html="Hello User<br>";
		$html.="Welcome to eShopper.You can login to your account with below details.<br>";
		$html.="Username:".$username."<br>";
		$html.="Password:".$pass."<br>";
		$html.="Regards<br>";
		$subject="Account Details";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email,$subject,$html,$headers);

	}

	function getUserDetails($user){
		$sql="select tab_customer.*,tab_users.txt_password from tab_customer left join tab_users ON tab_customer.int_user_id=tab_users.int_user_id where tab_customer.int_user_id=$user";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function get_all_contacts(){
		$sql="select * from tab_contact_submissions order by int_unique desc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}

	function update($data)
	{
		if($data['old_password']!=$data['password'])
		{
			$password=md5($data['password']);
		}
		else
		{
			$password=$data['old_password'];
		}
		$extra_query='';
		if($data['file_name']!='')
		{
			$extra_query=",txt_profile_image='".$data['file_name']."'";
		}
		$sql="update ".$this->table." set txt_fname='".$data['fname']."', txt_lname='".$data['lname']."', txt_password='$password', txt_email='".$data['email']."'".$extra_query." where int_user_id=".$data['user_id']."";
		$query=$this->db->query($sql);
		$sql_sel="select * from ".$this->table." where int_user_id=".$data['user_id']."";
		$query=$this->db->query($sql_sel);
		$result=$query->result_array();
		$this->session->set_userdata('user', $result[0]);
		return $query?1:0;
	}
	
	function save($data)
	{
		$password=md5($data['password']);
		$sql="insert into ".$this->table."(txt_username, txt_password, txt_fname, txt_lname, txt_email, txt_profile_image, int_user_type) values('".$data['username']."','".$password."','".$data['fname']."','".$data['lname']."','".$data['email']."','".$data['file_name']."','1')";
		$query=$this->db->query($sql);
		return $query?1:0;
	}
	
	function get_all_users($user_id)
	{
		$query="select * from tab_users where int_user_id!=$user_id";
		$query=$this->db->query($query);
		$result=$query->result_array();
		return $result;
	}
	
	function delete_user($id)
	{
		$query="delete from tab_users where int_user_id=$id";
		$query=$this->db->query($query);
		return 1;
	}
	
	function user_detail($id)
	{
		$query="select * from tab_users where int_user_id=$id";
		$query=$this->db->query($query);
		$result=$query->result_array();
		return $result;
	}
	
	function update_indv($data)
	{
		if($data['old_password']!=$data['password'])
		{
			$password=md5($data['password']);
		}
		else
		{
			$password=$data['old_password'];
		}
		$extra_query='';
		if($data['file_name']!='')
		{
			$extra_query=",txt_profile_image='".$data['file_name']."'";
		}
		$sql="update ".$this->table." set txt_fname='".$data['fname']."', txt_lname='".$data['lname']."', txt_password='$password', txt_email='".$data['email']."'".$extra_query." where int_user_id=".$data['user_id']."";
		$query=$this->db->query($sql);
		return $query?1:0;
	}
}

?>