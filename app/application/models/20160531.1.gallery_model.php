<?php
class Gallery_model extends CI_Model{
	

	function gallery_model(){
		parent::__construct();
	}

	function get_gallery($data)
	{
		$sql="select * from tab_gallery_images order by int_image_id asc";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result;
	}
	
	function save($data)
	{
		$image_id_string=$data['image_ids'];
		$image_id_array=explode(",",$image_id_string);
		for($i=0;$i<count($image_id_array);$i++)
		{
			$image_id=$image_id_array[$i];
			if($data['file_name_'.$image_id.'']!='')
			{
				$sql="update tab_gallery_images set txt_image_path='".$data['file_name_'.$image_id.'']."' where int_image_id=".$image_id."";
				$query=$this->db->query($sql);
			}
		}
		return 1;
	}
	
	function delete_image($id)
	{
		$sql="delete from  tab_gallery_images where int_image_id=".$id."";
		$query=$this->db->query($sql);
		$response['success']=true;
		return $response;
	}

	function get_max_gallery()
	{
		$sql="select max(int_image_id) as max_id from tab_gallery_images";
		$query=$this->db->query($sql);
		$result=$query->result_array();
		return $result[0]['max_id'];	
	}
}

?>