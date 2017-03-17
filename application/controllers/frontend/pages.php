<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	
	public $common_data = array();
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
		
		/*load header and footer data*/
		$this->load->model('frontend/home');
		
		$this->common_data['site_menu'] = $this->home->get_sitemenu();
		$this->common_data['phone'] = $this->home->get_settings('site_phone')['setting_value'];
		$this->common_data['address'] = $this->home->get_settings('site_address')['setting_value'];
		$this->common_data['mailid'] = $this->home->get_settings('site_email')['setting_value'];
		$this->common_data['site_disc'] = $this->home->get_settings('site_footer_disclaimer')['setting_value'];
		$this->common_data['timings'] = '10:00 AM - 10:00 PM';
		$this->common_data['logo'] = $this->home->get_settings('site_logo')['setting_value'];
		$this->common_data['login_url'] = base_url('login-register');
		$this->common_data['fb_url'] = $this->home->get_settings('site_footer_facebook')['setting_value'];
		$this->common_data['tw_url'] = $this->home->get_settings('site_footer_twitter')['setting_value'];
		$this->common_data['ln_url'] = $this->home->get_settings('site_footer_linkedin')['setting_value'];
		$this->common_data['pn_url'] = $this->home->get_settings('site_footer_pinterest')['setting_value'];
		$this->common_data['in_url'] = $this->home->get_settings('site_footer_instagrams')['setting_value'];
		$this->common_data['gp_url'] = $this->home->get_settings('site_footer_googleplus')['setting_value'];
		
	}
	
	public function index()
	{
		if( ! file_exists(APPPATH.'views/frontend/index.php'))
		{
			show_404();
		}
		
		$this->load->model('frontend/home');
		
		$meta_info = $this->home->get_home_meta();
		
		$data['title'] = ucfirst($meta_info['meta_title']); // Capitalize the first letter
		$data['description'] = $meta_info['meta_description'];
		$data['keywords'] = $meta_info['meta_keywords'];
		
		$home_parts_info = $this->home->get_home_data();
		foreach($home_parts_info as $homepart){
			if($homepart['setting_name'] == 'home_top_summary')
				$data['top_dec'] =  $homepart['setting_val'];
			if($homepart['setting_name'] == 'home_bottom_summary')
				$data['bot_dec'] =  $homepart['setting_val'];
			if($homepart['setting_name'] == 'home_feature_block')
				$data['fet_dec'] =  $homepart['setting_val'];
		}
		
		$data['aboutus_url'] = base_url('about-us');
		$data['testimonial_url'] = base_url('testimonials');
		
		$data['testimonial_data'] = $this->home->get_testimonials();
		$data['testimonial_show'] = 'show';
		
		$form_data['country_list'] = $this->home->get_countries(); 
		$form_data['visa_services'] = $this->home->get_visa_services(); 
		$data['visa_form'] = $this->load->view('frontend/visa_form', $form_data, true);
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/index', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function login()
	{
		if( ! file_exists(APPPATH.'views/frontend/login.php'))
		{
			show_404();
		}
		
		$meta_info = $this->home->get_login_meta();
		
		$data['title'] = ucfirst($meta_info['meta_title']); // Capitalize the first letter
		$data['description'] = $meta_info['meta_description'];
		$data['keywords'] = $meta_info['meta_keywords'];
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/login', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function contact_us()
	{
		if( ! file_exists(APPPATH.'views/frontend/contactus.php'))
		{
			show_404();
		}
		
		$this->load->model('frontend/home');
		
		$meta_info = $this->home->get_contact_meta();
		
		$data['title'] = ucfirst($meta_info['meta_title']); // Capitalize the first letter
		$data['description'] = $meta_info['meta_description'];
		$data['keywords'] = $meta_info['meta_keywords'];
		
		$contact_parts_info = $this->home->get_contact_data();
		$data['g_code'] = '';
		foreach($contact_parts_info as $co){
			if($co['setting_name'] == 'contact_google_map')
				$data['g_code'] = $co['setting_val'];
		}
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/contactus', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function default_page($url = '')
	{
		$this->load->model('frontend/home');
		
		if( ! file_exists(APPPATH.'views/frontend/page_template.php'))
		{
			show_404();
		}
		
		if($url != ''){
			$page_data = $this->home->get_page_data($url);
		}
		
		if(($page_data)||(empty($page_data))){
			show_404();
		}
		
		$data['title'] = ucfirst($page_data['title']); // Capitalize the first letter
		$data['description'] = $page_data['meta-description'];
		$data['keywords'] = $page_data['meta-tags'];
		
		$data['page_content'] =  $page_data['content'];
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/page_template', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function start_application()
	{
		if( ! file_exists(APPPATH.'views/frontend/application_form.php'))
		{
			show_404();
		}
		
		$page_data = $this->home->get_visaapplication_meta();
		
		$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
		$data['description'] = $page_data['meta_description'];
		$data['keywords'] = $page_data['meta_keywords'];
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/application_form', $data);
		$this->load->view('frontend/template/footer', $data);
	}
}