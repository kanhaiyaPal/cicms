<?php
class Uploads extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function admin_upload()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			// ...
			// SERVER CODE that processes ajax upload and returns a JSON response. Your server action 
			// must return a json object containing initialPreview, initialPreviewConfig, & append.
			// An example for PHP Server code is mentioned below.
			// ...
			$p1 = $p2 = [];
			if (empty($_FILES['page_images']['name'])) {
				echo '{}';
				return;
			}
			for ($i = 0; $i < count($_FILES['page_images']['name']); $i++) {
				$ext = explode('.', basename($_FILES['page_images']['name'][$i]));
				$filename = md5(uniqid()) . "." . array_pop($ext);
				$target = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'admin'. DIRECTORY_SEPARATOR . $filename;
				if(move_uploaded_file($_FILES['page_images']['tmp_name'][$i], $target)) {
					$j = $i + 1;
					$key = $filename;
					$url = base_url('/uploads/admin_delete');
					$p1[$i] = base_url('/uploads/admin/')."{$key}"; // sends the data
					$p2[$i] = ['width' => '120px', 'url' => $url, 'key' => $key ];
				} else {
					echo '{}';
					return;
				}
				
			}
			echo json_encode([
				'initialPreview' => $p1, 
				'initialPreviewConfig' => $p2,   
				'append' => true // whether to append these configurations to initialPreview.
								 // if set to false it will overwrite initial preview
								 // if set to true it will append to initial preview
								 // if this propery not set or passed, it will default to true.
			 ]);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function admin_delete()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$key = $_REQUEST['key'];
			
			$this->load->model('manage/uploads_model');
			$md_file = $this->uploads_model->get_media_name($key);		
			$target = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'pages'. DIRECTORY_SEPARATOR . $md_file['media_name'];
			unlink($target);
			$this->uploads_model->delete_media($key);
			echo '{}';
			return;
		}else{
			redirect("manage/pages/view");
		}
	}
}