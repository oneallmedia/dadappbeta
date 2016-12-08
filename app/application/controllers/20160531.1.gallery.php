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
	
	function delete_image()
	{
		$data=$this->input->post();
		$response=$this->gallery_model->delete_image($data['id']);
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
			$new_path = 'uploads/temp/'.$file_name;
			imagejpeg($rotate,$new_path);
			
			$final_data=array('txt_image_path'=>$new_path);
			$this->db->insert('tab_gallery_images',$final_data);

		}
		$response['success']=true;
		return $response;

	}
	
	function get_gallery()
	{
		$data["images"]=$this->gallery_model->get_gallery();
		echo json_encode($data);
	}
}





?>