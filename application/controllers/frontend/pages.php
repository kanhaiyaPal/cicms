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
		
		$this->load->model('frontend/home');
		$meta_info = $this->home->get_home_meta();
		
		$data['title'] = ucfirst($meta_info['meta-title']); // Capitalize the first letter
		$data['description'] = $meta_info['meta-description'];
		$data['keywords'] = $meta_info['meta-keywords'];
		
		$home_info = $this->home->get_page_info();
		
		$data['phone'] = $home_info['phone'];
		$data['address'] = $home_info['address'];
		$data['mailid'] = $home_info['e-mail'];
		$data['timings'] = $home_info['timing'];
		
		$data['login_url'] = 
		$data['aboutus_url'] =
		$data['testimonial_url'] =
		
		$data['social_icons'] =
		

		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/index', $data);
		$this->load->view('frontend/template/footer', $data);
	}
}