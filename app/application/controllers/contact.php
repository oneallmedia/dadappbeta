<?php
class Contact extends CI_Controller{

	function Contact(){
		parent::__construct();
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('contact_model');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		header('Access-Control-Allow-Origin: *');
	}

	function add()
	{

		$user_id=$this->session->userdata('user');
		if(isset($user_id) && $user_id!='')
		{
			$data["page"]="add_contact";
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
		$status=$this->contact_model->save($data);
		redirect('contact/contact_list', 'refresh');
	}
	
	function contact_list()
	{
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="contact_list";
			$data["contacts"]=$this->contact_model->get_all_contacts();
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
		$this->contact_model->delete_contact($data['id']);
		redirect('contact/contact_list', 'refresh');
	}



	function edit()

	{
		$data=$this->input->get();
		$user=$this->session->userdata('user');
		if(isset($user['int_user_id']) && $user['int_user_id']!='')
		{
			$data["page"]="edit_contact";
			$data["id"]=$data['id'];
			$data["details"]=$this->contact_model->contact_detail($data['id']);
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
		$this->contact_model->update_contact($data);
		redirect('contact/contact_list', 'refresh');
	}
	
	function save_web_contacts()
	{
		$data=$this->input->post();
		$status=$this->contact_model->save_from_web($data);
		echo json_encode($status);
	}
	
	function verify_contact()
	{
		$data=$this->input->post();
		$response=$this->contact_model->verify_contact($data);
		echo json_encode($response);
	}
}


?>