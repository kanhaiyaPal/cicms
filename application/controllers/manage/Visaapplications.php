<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visaapplications extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function show()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/visaapplications_model');
			
			if( ! file_exists(APPPATH.'views/manage/visas/show_all_appls.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('manage static pages'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['pages_script'] = 'show';
			$data['page_data'] = $this->visaapplications_model->get_visa_applications();

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/show_all_appls', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function show_details_app($id = FALSE)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/visaapplications_model');
			
			if( ! file_exists(APPPATH.'views/manage/visas/show_details_app.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('View Application Details'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['page_data'] = $this->visaapplications_model->get_visa_applications($id);
			$data['back_url'] = base_url('manage/visaapplications/show');

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/show_details_app', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
}