<?php
class Contact_model extends CI_Model{

	function contact_model(){
		parent::__construct();
	}

	function save($data)
	{
		if($this->check_email($data['contact_email'])==1)
		{
			$access_code=substr(md5(uniqid(rand(), true)),0,8);
			$sql="insert into tab_contacts(txt_name, txt_email, txt_cell, txt_address, txt_zipcode, int_demo, txt_access_code) values('".$data['contact_name']."','".$data['contact_email']."','".$data['contact_cell']."','".$data['contact_address']."','".$data['zipcode']."',0,'".$access_code."')";
			$query=$this->db->query($sql);
			$this->sendRegistrationMail($data['contact_email'],$data['contact_name 	'],$access_code);
			return $query?1:0;
		}
		else
		{
			return 0;
		}
	}
	
	function save_from_web($data)
	{
		if($this->check_email($data['email'])==1)
		{
			$sql_meta="select * from tab_settings where txt_meta_key='demo_days'";
			$query_meta=$this->db->query($sql_meta);
			$result=$query_meta->result_array();
			$access_code = substr(md5(uniqid(rand(), true)),0,8);
			$demo_days=$result[0]['txt_meta_value']!=''?$result[0]['txt_meta_value']:7;
			$sql="insert into tab_contacts(txt_name, txt_email, txt_cell, txt_address, txt_zipcode, int_demo, txt_access_code,dt_expiry) values('".$data['name']."','".$data['email']."','".$data['cell']."','".$data['address']."','".$data['zip']."',1,'".$access_code."','".date('Y-m-d', strtotime("+".$demo_days." days"))."')";
			$query=$this->db->query($sql);
			$this->sendRegistrationMail($data['email'],$data['name'],$access_code);
			$response['success']=true;
		}
		else
		{
			$response['success']=false;
			$response['error']="Email Already Exist";
		}
		return $response;
	}
	
	function sendRegistrationMail($email,$name,$access_code){
		
		$html="Hi ".$name."<br>";		
		$html.="Welcome to Adpact<br>";
		$html.="Your Authorization code is ".$access_code;
		$html.="<br>Regards<br>";
		
		$subject="Welcome TO Adpact";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email,$subject,$html,$headers);

	}
	
	function verify_contact($data)
	{
		$sql="(select * from tab_contacts where lower(txt_access_code)='".$data['code']."' and int_demo=0) UNION (select * from tab_contacts where lower(txt_access_code)='".$data['code']."' and int_demo=1 and dt_expiry>='".date("Y-m-d")."')";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		if(count($result)>0)
		{
			$response['success']=true;
		}
		else
		{
			$response['success']=false;
			$response['error']="Account Not Valid";
		}
		return $response;
	}
	
	function check_email($email)
	{
		$sql="select * from tab_contacts where lower(txt_email)='".strtolower($email)."'";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return count($result)>0?0:1;
	}
	
	function get_all_contacts()
	{
		$query="select * from tab_contacts";
		$query=$this->db->query($query);
		$result=$query->result_array();
		return $result;
	}
	
	function delete_contact($id)
	{
		$query="delete from tab_contacts where int_contact_id=$id";
		$query=$this->db->query($query);
		return 1;
	}
	
	function contact_detail($id)
	{
		$query="select * from tab_contacts where int_contact_id=$id";
		$query=$this->db->query($query);
		$result=$query->result_array();
		return $result;
	}
	
	function update_contact($data)
	{
		$sql="update tab_contacts set txt_name='".$data['contact_name']."', txt_email='".$data['contact_email']."', txt_cell='".$data['contact_cell']."', txt_address='".$data['contact_address']."', txt_zipcode='".$data['zipcode']."' where int_contact_id=".$data['contact_id']."";
		$query=$this->db->query($sql);
		return $query?1:0;
	}
}

?>