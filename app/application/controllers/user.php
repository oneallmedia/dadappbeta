<?php
class User extends CI_Controller{

	function User(){
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		header('Access-Control-Allow-Origin: *');
	}

	function index()
	{

		$user_id=$this->session->userdata('user');
		if(isset($user_id) && $user_id!='')
		{
			//echo "hello";exit;
			redirect('user/dashboard', 'refresh');
		}
		else
		{
			$this->load->view('login');	
		}
	}

	function login(){

		$response_data=array();
		if($this->input->post()){
			$formdata=$this->input->post();
			$status_array=$this->user_model->verifyUser($formdata);
			if(count($status_array)==1)
			{
				$this->session->set_userdata('user', $status_array[0]);
				redirect('user/dashboard', 'refresh');
			}
			else
			{
				redirect('user/index', 'refresh');			
			}
		}else{
			redirect('user/index', 'refresh');
		}
	}

	function dashboard()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="dashboard";
			//$data["course_count"]=$this->course_model->get_count();
			//$data["faculty_count"]=$this->faculty_model->get_count();
			$this->load->view('page',$data);	
		}
		else
		{
			$this->load->view('login');	
		}	
	}

	function profile()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="profile";
			$this->load->view('page',$data);	
		}
		else
		{
			$this->load->view('login');	
		}	
	}

	function profile_update()
	{
		$data=$this->input->post();
		
		$data['file_name']='';
		if($_FILES['profile_image']['name']!='')
		{
			if (($_FILES["profile_image"]["type"] == "image/gif") || ($_FILES["profile_image"]["type"] == "image/jpeg")|| ($_FILES["profile_image"]["type"] == "image/jpg")|| ($_FILES["profile_image"]["type"] == "image/pjpeg")|| ($_FILES["profile_image"]["type"] == "image/x-png")|| ($_FILES["profile_image"]["type"] == "image/png")){
				$ext=explode(".",$_FILES["profile_image"]["name"]);		
				$file_name=date("YmdHis").".".$ext[count($ext)-1];
				move_uploaded_file($_FILES['profile_image'][tmp_name],"uploads/".$file_name);
				$data['file_name']=$file_name;
			}
		}
		$status=$this->user_model->update($data);
		$data["page"]="profile";
		redirect('user/dashboard', 'refresh');
	}

	function signout()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			   $this->session->unset_userdata('user');
			   $this->session->sess_destroy();
			   redirect('user/login', 'refresh');
		}
		else
		{
			redirect('user/login', 'refresh');
		}	
	}

	function settings(){
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('site_name', 'Site Name', 'required');				
		if($this->form_validation->run())
		{	
			$data=array('txt_meta_value'=>$this->input->post('site_name'));
			$this->db->where('txt_meta_key','site_name');
			$this->db->update('tab_settings',$data);

			$data=array('txt_meta_value'=>$this->input->post('time_interval'));
			$this->db->where('txt_meta_key','time_interval');
			$this->db->update('tab_settings',$data);
			
			$data=array('txt_meta_value'=>$this->input->post('time_interval_refresh'));
			$this->db->where('txt_meta_key','time_interval_refresh');
			$this->db->update('tab_settings',$data);
			
			$data=array('txt_meta_value'=>$this->input->post('demo_days'));
			$this->db->where('txt_meta_key','demo_days');
			$this->db->update('tab_settings',$data);
			
			$data=array('txt_meta_value'=>$this->input->post('bottom_text'));
			$this->db->where('txt_meta_key','bottom_text');
			$this->db->update('tab_settings',$data);
			
			$data=array('txt_meta_value'=>$this->input->post('video_ids'));
			$this->db->where('txt_meta_key','video_ids');
			$this->db->update('tab_settings',$data);
			
			if($_FILES['logo_path']['name']!='')
			{
				$ext=explode(".",$_FILES["logo_path"]["name"]);		
				$file_name="logo.".$ext[count($ext)-1];
				move_uploaded_file($_FILES['logo_path']['tmp_name'],"uploads/".$file_name);
				$final_name='uploads/'.$file_name;
				
				$data=array('txt_meta_value'=>$final_name);
				$this->db->where('txt_meta_key','logo_path');
				$this->db->update('tab_settings',$data);
			}

			
			
			redirect('user/settings', 'refresh');
		}
		else
		{
			$query = $this->db->get('tab_settings');
			$data['settings'] = $query->result_array();
			$data["page"]="settings";
			$this->load->view('page',$data);
		}
	}
	
	function get_settings()
	{
		$query = $this->db->get('tab_settings');
		$data['settings'] = $query->result_array();
		echo json_encode($data['settings']);
	}
	

	function changePassword(){
		
	}
	
	function add()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="add_user";
			$this->load->view('page',$data);	
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	function save()
	{
		$data=$this->input->post();
		$user=$this->session->userdata('user');
		if($_FILES['profile_image']['name']!='')
		{
			if (($_FILES["profile_image"]["type"] == "image/gif") || ($_FILES["profile_image"]["type"] == "image/jpeg")|| ($_FILES["profile_image"]["type"] == "image/jpg")|| ($_FILES["profile_image"]["type"] == "image/pjpeg")|| ($_FILES["profile_image"]["type"] == "image/x-png")|| ($_FILES["profile_image"]["type"] == "image/png")){
				$ext=explode(".",$_FILES["profile_image"]["name"]);		
				$file_name=date("YmdHis").".".$ext[count($ext)-1];
				move_uploaded_file($_FILES['profile_image'][tmp_name],"uploads/".$file_name);
				$data['file_name']=$file_name;
			}
		}
		$data['user']=$user['int_user_id'];
		$status=$this->user_model->save($data);
		redirect('user/user_list', 'refresh');
	}
	
	function user_list()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="user_list";
			$data["users"]=$this->user_model->get_all_users($user['int_user_id']);
			$this->load->view('page',$data);	
		}
		else
		{
			$this->load->view('login');	
		}
	}
	
	function delete()
	{
		$data=$this->input->get();
		$this->coupon_model->delete_user($data['id']);
		redirect('user/user_list', 'refresh');
	}



	function edit()

	{
		$data=$this->input->get();
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="edit_user";
			$data["id"]=$data['id'];
			$data["details"]=$this->user_model->user_detail($data['id']);
			$this->load->view('page',$data);	
		}
		else
		{
			$this->load->view('login');
		}
	}



	function update()
	{
		$data=$this->input->post();
		$user=$this->session->userdata('user');
		$data['user']=$user['int_user_id'];
		if($_FILES['profile_image']['name']!='')
		{
			if (($_FILES["profile_image"]["type"] == "image/gif") || ($_FILES["profile_image"]["type"] == "image/jpeg")|| ($_FILES["profile_image"]["type"] == "image/jpg")|| ($_FILES["profile_image"]["type"] == "image/pjpeg")|| ($_FILES["profile_image"]["type"] == "image/x-png")|| ($_FILES["profile_image"]["type"] == "image/png")){
				$ext=explode(".",$_FILES["profile_image"]["name"]);		
				$file_name=date("YmdHis").".".$ext[count($ext)-1];
				move_uploaded_file($_FILES['profile_image'][tmp_name],"uploads/".$file_name);
				$data['file_name']=$file_name;
			}
		}
		$this->user_model->update_indv($data);
		redirect('user/user_list', 'refresh');
	}
	
	function contact_list()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="contact_list";
			$data["contacts"]=$this->user_model->get_all_contacts();
			$this->load->view('page',$data);	
		}
		else
		{
			$this->load->view('login');	
		}
	}
	
	function verify_code()
	{
		$data=$this->input->post();
		$response=$this->user_model->check_code($data);	
		echo json_encode($response);
	}
}


?>