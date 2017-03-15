<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function view($page = 'home')
	{

		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if( ! file_exists(APPPATH.'views/manage/'.$page.'.php'))
			{
					// Whoops, we don't have a page for that!
					show_404();
			}

			$data['title'] = ucfirst($page); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/'.$page, $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			$this->admin_login();
		}
	}
	
	public function show()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/pages_model');
			
			if( ! file_exists(APPPATH.'views/manage/show_all_pages.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('manage static pages'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['pages_script'] = 'show';
			$data['page_data'] = $this->pages_model->get_pages();

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/show_all_pages', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			$this->admin_login();
		}
	}
	
	public function new_page()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/pages_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			if( ! file_exists(APPPATH.'views/manage/new_page.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('Add static page'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['editor_on'] = 'show';
			$data['multiple_image_select'] = 'show';
			$data['return_url'] = base_url('/manage/pages/show');
			$data['file_upload_url'] = base_url('/uploads/admin_upload');
			$data['p_pages'] = $this->pages_model->get_pages();
			
			$this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
			if(!($this->form_validation->run() === FALSE)){
				$this->pages_model->set_pages();
				$this->session->set_flashdata('page_created', 'Page Created Successfully');
				redirect("manage/pages/show");
			}
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/new_page', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			$this->admin_login();
		}
	}
	
	function admin_login()
	{
		$this->load->model('manage/authenticate_admin'); 
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if( ! file_exists(APPPATH.'views/manage/login.php'))
		{
				// Whoops, we don't have a page for that!
				show_404();
		}

		$data['title'] = ucfirst('login'); // Capitalize the first letter
		$data['body_class'] = 'login-bg';
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('manage/templates/header', $data);
			$this->load->view('manage/login', $data);
			$this->load->view('manage/templates/footer', $data);
		}
		else
		{
			$admin_data = $this->authenticate_admin->get_admin_info();

			if(($this->input->post('username') == $admin_data->username)&&($this->authenticate_admin->verify_pass($this->input->post('pass'),$admin_data->password))){
				$this->session->adminsession = array(
												'user'=>'Admin',
												'email'=>$admin_data->email,
												'logged_in' => TRUE
											);
				redirect("manage/pages/view");
			}else{ 
				$this->session->set_flashdata('incorrect_data', 'Username or Password is incorrect');
				redirect("manage/pages/view");
			}
		
		}
	}
	
	public function delete_page($id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if(($id != '')&& ((int)$id != 0))
			{
				$id = (int)$id;
				$this->load->model('manage/pages_model'); 
				$this->pages_model->delete_page($id);
				$this->session->set_flashdata('delete_success', 'Page deleted successfully');
				redirect("manage/pages/show");
			}
		}else{
			$this->admin_login();
		}
	}
	
	public function update_page($id)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if(($id != '')&& ((int)$id != 0))
			{
				$id = (int)$id;
				$this->load->model('manage/pages_model'); 
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$data['title'] = ucfirst('update page data'); 
				$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
				$data['editor_on'] = 'show';
				$data['multiple_image_select_up'] = 'show';
				$data['return_url'] = base_url('/manage/pages/show');
				$data['page_data'] = $this->pages_model->get_pages($id);
				$data['p_pages'] = $this->pages_model->get_pages();
				$data['page_media'] = $this->pages_model->get_page_media($id);
				
				$this->form_validation->set_rules('page_title', 'Page Title', 'trim|required');
				if(!($this->form_validation->run() === FALSE)){
					$this->pages_model->set_pages($id);
					$this->session->set_flashdata('update_success', 'Page updated successfully');
					redirect("manage/pages/show");
				}
				
				$this->load->view('manage/templates/admin_header', $data);
				$this->load->view('manage/update_page', $data);
				$this->load->view('manage/templates/admin_footer', $data);
				
				
			}
		}else{
			$this->admin_login();
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('adminsession');
		$this->session->set_flashdata('logout_success', 'Successfully logged out!!');
		redirect("manage/pages/view");
	}
}