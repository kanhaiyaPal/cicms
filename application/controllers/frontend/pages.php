<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function index()
	{
		if( ! file_exists(APPPATH.'views/frontend/index.php'))
		{
			show_404();
		}
		
		$this->load->model('frontend/home.php');
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);

		$this->load->view('frontend/templates/header', $data);
		$this->load->view('frontend/index', $data);
		$this->load->view('frontend/templates/footer', $data);
	}
}