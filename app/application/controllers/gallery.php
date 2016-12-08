<?php
class Gallery extends CI_Controller{

	public $user=array();

	function Gallery(){
		parent::__construct();
		$this->load->database();
		$this->load->model('gallery_model');
		$this->load->model('user_model');
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		header('Access-Control-Allow-Origin: *');
	}



	function manage_gallery(){
		$this->user=$this->session->userdata('user');
		if($this->user['int_user_id']=='')
		{
			redirect('user/index', 'refresh');	
		}
		else
		{
			$data["page"]="manage_gallery";
			$data["images"]=$this->gallery_model->get_gallery();
			$data["max_image_id"]=$this->gallery_model->get_max_gallery();
			$this->load->view('page',$data);
		}	
	}
	
	
	function manage_videos(){
		$this->user=$this->session->userdata('user');
		if($this->user['int_user_id']=='')
		{
			redirect('user/index', 'refresh');	
		}
		else
		{
			$data["page"]="manage_videos";
			$data["videos"]=$this->gallery_model->get_videos();
			$this->load->view('page',$data);
		}	
	}
	
	
	
	function delete_image()
	{
		$data=$this->input->post();
		$response=$this->gallery_model->delete_image($data['id']);
		echo json_encode($response);
	}
	
	function delete_video()
	{
		$data=$this->input->post();
		$response=$this->gallery_model->delete_video($data['id']);
		echo json_encode($response);
	}



	function save_gallery(){

		$data=$this->input->post();
		$user=$this->session->userdata('user');
		$data['user']=$user['int_user_id'];
		if($_FILES['files']['tmp_name'][0]!='')

		{

			$ext=explode(".",$_FILES["files"]["name"][0]);		

			$file_name=date("YmdHis").".".$ext[count($ext)-1];

			move_uploaded_file($_FILES['files']['tmp_name'][0],"uploads/gallery/".$file_name);
			
			$source = imagecreatefromjpeg("uploads/gallery/".$file_name);
			$rotate = imagerotate($source,90,0);
			$act_path = 'uploads/gallery/'.$file_name;
			$new_path = 'uploads/temp/'.$file_name;
			imagejpeg($rotate,$new_path);
			
			$final_data=array('txt_image_path'=>$act_path,'txt_invert_image'=>$new_path);
			$this->db->insert('tab_gallery_images',$final_data);

		}
		$response['success']=true;
		return $response;

	}
	
	function save_videos(){

		$data=$this->input->post();
		$user=$this->session->userdata('user');
		$data['user']=$user['int_user_id'];
		if($_FILES['video']['tmp_name']!='')

		{

			$ext=explode(".",$_FILES["video"]["name"]);		

			$file_name=date("YmdHis").".".$ext[count($ext)-1];

			move_uploaded_file($_FILES['video']['tmp_name'],"uploads/videos/".$file_name);
			
			
			$new_path = 'uploads/videos/'.$file_name;
			
			
			$final_data=array('txt_video_path'=>$new_path);
			$this->db->insert('tab_videos',$final_data);

		}
		$data["page"]="manage_videos";
		$data["videos"]=$this->gallery_model->get_videos();
		$this->load->view('page',$data);

	}
	
	function get_gallery()
	{
		$data["images"]=$this->gallery_model->get_gallery();
		echo json_encode($data);
	}
	
	function get_videos()
	{
		$data["videos"]=$this->gallery_model->get_videos();
		echo json_encode($data);
	}
}





?>