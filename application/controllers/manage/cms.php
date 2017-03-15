<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function page_settings()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/pagesettings_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			if( ! file_exists(APPPATH.'views/manage/page_setting.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('manage cms content'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['editor_on'] = 'show';
			
			$this->form_validation->set_rules('home_top_summary', 'Home Top Summary', 'trim|required');
			$this->form_validation->set_rules('home_bottom_summary', 'Home Bottom Summary', 'trim|required');
			$this->form_validation->set_rules('home_feature_block', 'Home Features Block', 'trim|required');
			
			if(!($this->form_validation->run() === FALSE)){
				$this->pagesettings_model->set_settings();
				$this->session->set_flashdata('setting_updated', 'Settings Updated Successfully');
				redirect("manage/cms/page_settings");
			}
			
			//load homepage setting from db
			$home_data_ar = $this->pagesettings_model->get_settings();
			
			$data['home_top_sum'] = '';
			$data['home_bot_sum'] = '';
			$data['home_fet_blk'] = '';
			foreach($home_data_ar as $fr){
				if($fr['setting_name'] == 'home_top_summary'){
					$data['home_top_sum'] = $fr['setting_val'];
				}
				if($fr['setting_name'] == 'home_bottom_summary'){
					$data['home_bot_sum'] = $fr['setting_val'];
				}
				if($fr['setting_name'] == 'home_feature_block'){
					$data['home_fet_blk'] = $fr['setting_val'];
				}
			}

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/page_setting', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function seo_management()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/seomanagement_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			if( ! file_exists(APPPATH.'views/manage/new_testimonial.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('Add testimonial'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['editor_on'] = 'show';
			$data['return_url'] = base_url('/manage/testimonials/showall');
			
			$this->form_validation->set_rules('testimonial_title', 'Testimonial Title', 'trim|required');
			$this->form_validation->set_rules('testimonial_content', 'Testimonial Content', 'trim|required');
			
			if(!($this->form_validation->run() === FALSE)){
				$this->testimonials_model->set_testimonials();
				$this->session->set_flashdata('testimonial_created', 'Testimonial Created Successfully');
				redirect("manage/testimonials/showall");
			}
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/new_testimonial', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function delete($id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if(($id != '')&& ((int)$id != 0))
			{
				$id = (int)$id;
				$this->load->model('manage/testimonials_model'); 
				$this->testimonials_model->delete_testimonials($id);
				$this->session->set_flashdata('testimonial_delete_success', 'Testimonial deleted successfully');
				redirect("manage/testimonials/showall");
			}
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function update($id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if(($id != '')&& ((int)$id != 0))
			{
				$id = (int)$id;
				$this->load->model('manage/testimonials_model'); 
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$data['title'] = ucfirst('update Testimonial data'); 
				$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
				$data['editor_on'] = 'show';
				$data['return_url'] = base_url('/manage/testimonials/showall');
				$data['testimonial_data'] = $this->testimonials_model->get_testimonials($id);
				
				$this->form_validation->set_rules('testimonial_title', 'Testimonial Title', 'trim|required');
				$this->form_validation->set_rules('testimonial_content', 'Testimonial Content', 'trim|required');
				
				if(!($this->form_validation->run() === FALSE)){
					$this->testimonials_model->set_testimonials($id);
					$this->session->set_flashdata('testimonial_update_success', 'Testimonial updated successfully');
					redirect("manage/testimonials/showall");
				}
				
				$this->load->view('manage/templates/admin_header', $data);
				$this->load->view('manage/update_testimonial', $data);
				$this->load->view('manage/templates/admin_footer', $data);
				
				
			}
		}else{
			redirect("manage/pages/view");
		}
	}
}