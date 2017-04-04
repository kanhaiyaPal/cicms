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
		$this->common_data['logout_url'] = base_url('frontend/pages/user_logout');
		$this->common_data['myaccount_url'] = base_url('frontend/pages/my_account');
		$this->common_data['fb_url'] = $this->home->get_settings('site_footer_facebook')['setting_value'];
		$this->common_data['tw_url'] = $this->home->get_settings('site_footer_twitter')['setting_value'];
		$this->common_data['ln_url'] = $this->home->get_settings('site_footer_linkedin')['setting_value'];
		$this->common_data['pn_url'] = $this->home->get_settings('site_footer_pinterest')['setting_value'];
		$this->common_data['in_url'] = $this->home->get_settings('site_footer_instagrams')['setting_value'];
		$this->common_data['gp_url'] = $this->home->get_settings('site_footer_googleplus')['setting_value'];
		
	}
	
	public function index()
	{
		$this->load->helper('form');
		if( ! file_exists(APPPATH.'views/frontend/index.php'))
		{
			show_404();
		}
		
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

		$data['feature_visa_service'] = $this->home->get_visa_services(); 
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/index', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function login()
	{
		if(isset($this->session->usersession)&& ($this->session->usersession != ''))
		{
			redirect('frontend/pages/my_account');
		}
		
		if( ! file_exists(APPPATH.'views/frontend/login.php'))
		{
			show_404();
		}
		
		$meta_info = $this->home->get_login_meta();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('frontend/users');
		$this->load->model('manage/authenticate_admin');
		
		$data['title'] = ucfirst($meta_info['meta_title']); // Capitalize the first letter
		$data['description'] = $meta_info['meta_description'];
		$data['keywords'] = $meta_info['meta_keywords'];
		
		if($this->input->post('user_login')){
			$is_exist = $this->authenticate_admin->check_username($this->input->post('username'));
			if((int)$is_exist > 0){
				$pass_hash_key = $this->authenticate_admin->get_username_password($this->input->post('username'));
				if(($this->authenticate_admin->verify_pass($this->input->post('passkey'),$pass_hash_key->password))){
					$this->session->usersession = array(
												'user'=> $pass_hash_key->username,
												'user_id' => $pass_hash_key->id,
												'email'=> $pass_hash_key->email,
												'profile_id' => $pass_hash_key->profile_id,
												'logged_in' => TRUE
											);
					$this->users->update_user_last_login();
					redirect('frontend/pages/my_account');
				}
			}
		}
		
		if($this->input->post('register')){
			
			$inputCaptcha = $this->input->post('captcha');
			$sessCaptcha = $this->session->userdata('captchaCode');
			if($inputCaptcha === $sessCaptcha){
				
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|is_unique[ci_users.username]');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[ci_users.email]');
				
				if(!($this->form_validation->run() === FALSE)){
					$this->users->create_user();
					$this->session->set_flashdata('registration_success', 'Registration Successfull, Please check your mail for login details');
				}
				
			}else{
				
				$data['register_errors'] = 'Incorrect Captcha';
			}
		}
		
		$data['captcha_img'] = $this->generate_captcha();
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/login', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function user_logout()
	{
		$this->session->unset_userdata('usersession');
		$this->session->set_flashdata('registration_success', 'You are successfully logged Out');
		redirect('login-register');
	}
	
	public function contact_us()
	{
		if( ! file_exists(APPPATH.'views/frontend/contactus.php'))
		{
			show_404();
		}
		
		$meta_info = $this->home->get_contact_meta();
		
		$data['title'] = ucfirst($meta_info['meta_title']); // Capitalize the first letter
		$data['description'] = $meta_info['meta_description'];
		$data['keywords'] = $meta_info['meta_keywords'];
		
		if(NULL != $this->input->post('c_mail')){
			
			$this->load->library('email');

			$this->email->from('no-reply@evisasonline.com', 'Evisas Online');
			$this->email->to($this->input->post('c_mail'));
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');

			$this->email->subject('Evisas Online Enquiry');
			$this->email->message('Dear '.$this->input->post('c_name').',<br/><br/> Thank you for contacting Evisas Online, One of our customer care executive will reach you shortly.<br/></br> Thanks and Regards</br>Team Evisas Online');

			$this->email->send();
			
			/*Admin Email*/
			$this->email->to($this->home->get_settings('site_email')['setting_value']);
			$this->email->subject('Evisas Online Enquiry');
			$this->email->message('Dear Admin, <br/><br/> An Inquiry has been generated by the Contact Us form on Evisas Online.Following is the content:<br/></br>Name:'.$this->input->post('c_name').' <br/>Email:'.$this->input->post('c_mail').' <br/>Mobile:'.$this->input->post('c_mobile').' <br/>Message:'.$this->input->post('c_message').' <br/> Thanks and Regards</br>Team Evisas Online');

			$this->email->send();
			
			$this->home->register_enquiry_record();
			
			$this->session->set_flashdata('mail_sent', 'Message Sent Successfully');
			
		}
		
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
		
		if( ! file_exists(APPPATH.'views/frontend/page_template.php'))
		{
			show_404();
		}
		
		if($url != ''){
			$page_data = $this->home->get_page_data($url);

		}
		
		if(!is_array($page_data)){
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
		$this->load->helper('form');
		
		
		if((NULL == $this->input->post('citizen_of')) || (NULL == $this->input->post('living_in')) || (NULL == $this->input->post('travelling_to')) || (NULL == $this->input->post('visa_service_select')) || (NULL == $this->input->post('total_amount'))){
				show_404();
		}
				
		
		if( ! file_exists(APPPATH.'views/frontend/application_form.php'))
		{
			show_404();
		}
		
		$page_data = $this->home->get_visaapplication_meta();
		$this->load->model('manage/visas_model');
		
		$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
		$data['description'] = $page_data['meta_description'];
		$data['keywords'] = $page_data['meta_keywords'];
		
		$data['country_list'] = $this->visas_model->get_countries();
		$data['top_total_value'] = $this->input->post('total_amount');
		
		$data['selected_visa_ser'] = $this->home->get_visa_service_details($this->input->post('visa_service_select'));
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/application_form', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function start_coapplication()
	{
		$this->load->helper('form');
		
		$master_data_container = array();
		
		$parent_id =  $this->uri->segment(4);
		$applicant_count =  $this->uri->segment(5);
		
		if((NULL !== $parent_id)&&(NULL !== $applicant_count)&& $this->session->flashdata('post_rev_up') )
		{ 
			$post_rev_up = $this->session->flashdata('post_rev_up');
			foreach($post_rev_up as $key=>$val){
				$master_data_container[$key] = $val;
			}
		}else{
			show_404();

		}
				
		if( ! file_exists(APPPATH.'views/frontend/application_form.php'))
		{
			show_404();
		}
		
		$page_data = $this->home->get_visaapplication_meta();
		$this->load->model('manage/visas_model');
		
		$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
		$data['description'] = $page_data['meta_description'];
		$data['keywords'] = $page_data['meta_keywords'];
		
		$data['country_list'] = $this->visas_model->get_countries();
		$data['top_total_value'] = $master_data_container['application_fee'];
		
		$data['selected_visa_ser'] = $this->home->get_visa_service_details($master_data_container['service_selected']);
		$data['master_data'] = $master_data_container;
		$data['parent_id'] = $parent_id;
		$data['applicant_no'] = $applicant_count;
		
		$this->load->model('frontend/visas_front_model');
		$data['existing_applicant_data'] = $this->visas_front_model->get_all_applicants($parent_id);

		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/coapplication_form', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function edit_application($application_id = 0)
	{
		if($application_id !=0){
			$this->load->helper('form');
			$this->load->model('frontend/visas_front_model');
		
			$master_data_container = array();
			
			$parent_id =  $this->uri->segment(5);
			$applicant_count =  $this->uri->segment(6);
			
			if((NULL !== $parent_id)&&(NULL !== $applicant_count)&& $this->visas_front_model->get_applicant_data($application_id) )
			{ 
				$post_rev_up = $this->visas_front_model->get_applicant_data($application_id);
				foreach($post_rev_up as $key=>$val){
					$master_data_container[$key] = $val;
				}
			}else{
				show_404();

			}
					
			if( ! file_exists(APPPATH.'views/frontend/application_form.php'))
			{
				show_404();
			}
			
			$page_data = $this->home->get_visaapplication_meta();
			$this->load->model('manage/visas_model');
			
			$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
			$data['description'] = $page_data['meta_description'];
			$data['keywords'] = $page_data['meta_keywords'];
			
			$data['country_list'] = $this->visas_model->get_countries();
			$data['top_total_value'] = $master_data_container['payable_fee'];
			
			$data['selected_visa_ser'] = $this->home->get_visa_service_details($master_data_container['selected_service']);
			$data['master_data'] = $master_data_container;
			$data['parent_id'] = $parent_id;
			$data['applicant_no'] = $applicant_count;
			
			$data['applicant_files'] =  $this->visas_front_model->get_applicant_files($application_id);
			$data['existing_applicant_data'] = $this->visas_front_model->get_all_applicants($parent_id);
			$data['apl_id'] = $application_id;

			$data = array_merge($data,$this->common_data);
			
			$this->load->view('frontend/template/header', $data);
			$this->load->view('frontend/editapplication_form', $data);
			$this->load->view('frontend/template/footer', $data);
		}
	}
	
	public function delete_application_file()
	{
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$applicant_userfile = $this->input->post('file');
		$applicant_id = $this->input->post('applicant');
		$field_name = $this->input->post('field');
		
		if($applicant_userfile || $applicant_id || $field_name)
		{
			$this->load->model('frontend/visas_front_model');
			$this->visas_front_model->delete_app_file();
			echo $field_name;
			return true;
		}
	}
	
	public function delete_application()
	{
		$application_id = $this->input->post('applicant_id');
		if($application_id !=0){

			$this->load->model('frontend/visas_front_model');
			$this->visas_front_model->delete_applicant($application_id);
		}
	}
	
	public function select_service($service_id = 0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		if(NULL != $this->input->post('visa_service_type')){
			$service_id = $this->input->post('visa_service_type');
		}
		if($service_id){
			if( ! file_exists(APPPATH.'views/frontend/select_service.php'))
			{
				show_404();
			}
			
			$page_meta_data = $this->home->get_service_select_meta();
			
			$data['title'] = ucfirst($page_meta_data['meta_title']); // Capitalize the first letter
			$data['description'] = $page_meta_data['meta_description'];
			$data['keywords'] = $page_meta_data['meta_keywords'];
			
			$visa_service_details = $this->home->get_visa_service_details($service_id);
			
			if(isset($visa_service_details['extended_service_fee'])&& ($visa_service_details['extended_service_fee']!= '')){
				$data['meet_greet'] = true;
			}else{
				$data['meet_greet'] = false;
			}
			
			$data['visa_service_data'] = $visa_service_details;
			
			$form_data['country_list'] = $this->home->get_countries(); 
			$form_data['visa_services'] = $this->home->get_visa_services(); 
			$data['visa_form'] = $this->load->view('frontend/visa_form', $form_data, true);
			
			$data = array_merge($data,$this->common_data);
			
			$this->load->view('frontend/template/header', $data);
			$this->load->view('frontend/select_service', $data);
			$this->load->view('frontend/template/footer', $data);
		}else{
			
			show_404();
		}
	}
	
	public function my_account()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if( ! file_exists(APPPATH.'views/frontend/my_account.php'))
		{
			show_404();
		}
		
		$this->load->model('frontend/users');
		
		if(isset($this->session->usersession)&& ($this->session->usersession != ''))
		{
			$page_data = $this->home->get_myaccount_meta();
			
			$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
			$data['description'] = $page_data['meta_description'];
			$data['keywords'] = $page_data['meta_keywords'];
			
			$data['user_info'] = $this->users->get_user_info($this->session->usersession['user_id']);

			$data = array_merge($data,$this->common_data);
			
			$this->load->view('frontend/template/header', $data);
			$this->load->view('frontend/my_account', $data);
			$this->load->view('frontend/template/footer', $data);
		}else{
			redirect('login-register');
		}
	}
	
	public function view_applications()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if( ! file_exists(APPPATH.'views/frontend/view_applications.php'))
		{
			show_404();
		}
		
		$this->load->model('frontend/visas_front_model');
		
		if(isset($this->session->usersession)&& ($this->session->usersession != ''))
		{
			$page_data = $this->home->get_viewapplications_meta();
			
			$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
			$data['description'] = $page_data['meta_description'];
			$data['keywords'] = $page_data['meta_keywords'];
			
			$all_parents = $this->visas_front_model->get_current_userapplication($this->session->usersession['user_id']);
			foreach($all_parents as $key => $value){
				$co_count = $this->visas_front_model->get_subapplicant_count($value['id']);
				$all_parents[$key]['co-applicants'] =  $co_count;
			}
			
			$data['applications'] = $all_parents;

			$data = array_merge($data,$this->common_data);
			
			$this->load->view('frontend/template/header', $data);
			$this->load->view('frontend/view_applications', $data);
			$this->load->view('frontend/template/footer', $data);
		}else{
			redirect('login-register');
		}
	}
	
	public function edit_main_applicant($applicant_id = 0)
	{
		if($applicant_id){
			if(isset($this->session->usersession)&& ($this->session->usersession != '')){
				$page_data = $this->home->get_editmainapplicant_meta();
			
				$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
				$data['description'] = $page_data['meta_description'];
				$data['keywords'] = $page_data['meta_keywords'];
				
				$this->load->model('frontend/visas_front_model');
				$data['applicant_data'] = $this->visas_front_model->get_applicant_data($applicant_id);
				$data['country_list'] = $this->home->get_countries(); 
				
				$data = array_merge($data,$this->common_data);
			
				$this->load->view('frontend/template/header', $data);
				$this->load->view('frontend/edit_applicant', $data);
				$this->load->view('frontend/template/footer', $data);
			}
		}else{
			redirect('login-register');
		}
	}
	
	public function visa_processing_steps()
	{
		
		if( ! file_exists(APPPATH.'views/frontend/visa_steps.php'))
		{
			show_404();
		}
		
		$page_data = $this->home->get_visasteps_meta();
		
		$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
		$data['description'] = $page_data['meta_description'];
		$data['keywords'] = $page_data['meta_keywords'];
		
		$home_parts_info = $this->home->get_home_data();
		foreach($home_parts_info as $homepart){
			if($homepart['setting_name'] == 'home_feature_block')
				$data['fet_dec'] =  $homepart['setting_val'];
		}
		
		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/visa_steps', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function track_status()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if( ! file_exists(APPPATH.'views/frontend/track_status.php'))
		{
			show_404();
		}
		
		$page_data = $this->home->get_trackstatus_meta();
		
		$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
		$data['description'] = $page_data['meta_description'];
		$data['keywords'] = $page_data['meta_keywords'];
		

		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/track_status', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function testimonials()
	{
		if( ! file_exists(APPPATH.'views/frontend/testimonials.php'))
		{
			show_404();
		}
		
		$page_data = $this->home->get_testimonials_meta();
		
		$data['title'] = ucfirst($page_data['meta_title']); // Capitalize the first letter
		$data['description'] = $page_data['meta_description'];
		$data['keywords'] = $page_data['meta_keywords'];
		
		$data['testimonials_data'] = $this->home->get_testimonials();

		$data = array_merge($data,$this->common_data);
		
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/testimonials', $data);
		$this->load->view('frontend/template/footer', $data);
	}
	
	public function generate_captcha()
	{
		$this->load->helper('captcha');
		$this->load->helper('url');
		
		// Captcha configuration
		$config = array(
			'img_path'      => 'captcha_images/',
			'img_url'       => base_url().'captcha_images/',
			'img_width'     => '160',
			'img_height'    => 40,
			'word_length'   => 8,
			'font_size'     => 25
		);
		$captcha = create_captcha($config);
		
		// Unset previous captcha and store new captcha word
		$this->session->unset_userdata('captchaCode');
		$this->session->set_userdata('captchaCode',$captcha['word']);
		
		// Send captcha image to view
		return $captcha['image'];
	}
}