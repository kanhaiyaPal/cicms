<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function steps()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('manage/pagesettings_model');
			
			if( ! file_exists(APPPATH.'views/manage/visas/steps.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			$data['title'] = ucfirst('visas processing steps'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			
			$settings = $this->pagesettings_model->get_settings('3');
			
			foreach($settings as $setting)
			{
				$data[$setting['setting_name']] = $setting['setting_val'];
			}
			
			$this->form_validation->set_rules('step_1_title', 'Visa Title', 'trim|required');
			$this->form_validation->set_rules('step_2_title', 'Visa Title', 'trim|required');
			$this->form_validation->set_rules('step_3_title', 'Visa Title', 'trim|required');
			$this->form_validation->set_rules('step_4_title', 'Visa Title', 'trim|required');
			$this->form_validation->set_rules('step_5_title', 'Visa Title', 'trim|required');
			if(!($this->form_validation->run() === FALSE))
			{
				$this->pagesettings_model->set_settings('3');
				$this->session->set_flashdata('setting_updated', 'Visa Steps Updated Successfully');
				redirect("manage/visas/steps");
			}

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/steps', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function types()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if( ! file_exists(APPPATH.'views/manage/visas/types.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			$data['title'] = ucfirst('visas types management'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['pages_script'] = 'show';
			
			$this->load->model('manage/visas_model');
			$data['visa_data'] = $this->visas_model->get_visas();
			

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/types', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function newvisa()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if( ! file_exists(APPPATH.'views/manage/visas/newvisatype.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('manage/visas_model');
			
			$this->form_validation->set_rules('visa_title', 'Visa Title', 'trim|required');
			if(!($this->form_validation->run() === FALSE)){
				$this->visas_model->set_visas();
				$this->session->set_flashdata('visa_created', 'Visa Type Created Successfully');
				redirect("manage/visas/types");
			}
			
			$data['title'] = ucfirst('add new visa type'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['return_url'] = base_url('manage/visas/types');

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/newvisatype', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function updatevisa($id)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if( ! file_exists(APPPATH.'views/manage/visas/updatevisa.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('manage/visas_model');
			
			$data['title'] = ucfirst('update visa type'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['return_url'] = base_url('manage/visas/types');
			$data['visa_data'] = $this->visas_model->get_visas($id);
			
			$this->form_validation->set_rules('visa_title', 'Visa Title', 'trim|required');
			if(!($this->form_validation->run() === FALSE)){
				$this->visas_model->set_visas($id);
				$this->session->set_flashdata('update_visa_success', 'Visa Type Updated Successfully');
				redirect("manage/visas/types");
			}
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/updatevisa', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function deletevisa($id)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/visas_model');
			if((int)$id > 0){
				$id = (int)$id;
				$this->visas_model->delete_visa($id);
				$this->session->set_flashdata('delete_visa_success', 'Visa Type Deleted Successfully');
				redirect("manage/visas/types");
			}
		}
	}
	
	public function service()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if( ! file_exists(APPPATH.'views/manage/visas/services.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			
			$this->load->model('manage/visas_model');
			
			$data['title'] = ucfirst('visa services offered'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['service_data'] = $this->visas_model->get_services();
			$data['country_list'] = $this->visas_model->get_countries();
			$data['visa_types'] = $this->visas_model->get_visas();
			$data['pages_script'] = 'show';

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/services', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function newservice()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if( ! file_exists(APPPATH.'views/manage/visas/newservice.php'))
			{
				// Whoops, we don't have a page for that!
				show_404();
			}
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('manage/visas_model');
			
			$this->form_validation->set_rules('service_title', 'Visa Title', 'trim|required');
			$this->form_validation->set_rules('visa_validity', 'Visa Validity', 'trim|required');
			$this->form_validation->set_rules('visa_max_stay', 'Visa Maximum Stay', 'trim|required');
			$this->form_validation->set_rules('processing_time_rg', 'Visa Processing Time - Regular', 'trim|required');
			$this->form_validation->set_rules('service_fee_rg', 'Visa Service fee - Regular', 'trim|required');
			$this->form_validation->set_rules('embassy_fee_rg', 'Visa Embassy Fee - Regular', 'trim|required');
			$this->form_validation->set_rules('processing_time_prem', 'Visa Processing Time - Premium', 'trim|required');
			$this->form_validation->set_rules('service_fee_prem', 'Visa Service fee - Premium', 'trim|required');
			$this->form_validation->set_rules('embassy_fee_prem', 'Visa Embassy Fee - Premium', 'trim|required');
			$this->form_validation->set_rules('processing_time_ex', 'Visa Processing Time - Express', 'trim|required');
			$this->form_validation->set_rules('service_fee_ex', 'Visa Service fee - Express', 'trim|required');
			$this->form_validation->set_rules('embassy_fee_ex', 'Visa Embassy Fee - Express', 'trim|required');
			$this->form_validation->set_rules('intro_text', 'Introduction Text', 'trim|required');
			$this->form_validation->set_rules('detail_text', 'Details Text', 'trim|required');

			if(( NULL != $this->input->post('meet_greet_combo'))&&($this->input->post('meet_greet_combo')=='1')){
				$this->form_validation->set_rules('extended_service_fee', 'Extended Service Fee', 'trim|required');
			}

			if(!($this->form_validation->run() === FALSE)){
				$this->visas_model->set_services();
				$this->session->set_flashdata('service_created', 'Visa Service Created Successfully');
				redirect("manage/visas/service");
			}
			
			$data['title'] = ucfirst('add new visa type'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['return_url'] = base_url('manage/visas/service');
			$data['country_list'] = $this->visas_model->get_countries();
			$data['visa_types'] = $this->visas_model->get_visas();
			$data['editor_on'] = 'show';
			$data['dynamic_field_gen'] = 'show';

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/newservice', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function delete_service($id)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/visas_model');
			if((int)$id > 0){
				$id = (int)$id;
				$this->visas_model->delete_service($id);
				$this->session->set_flashdata('service_delete_success', 'Visa Service Deleted Successfully');
				redirect("manage/visas/service");
			}
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function update_service($id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if((int)$id > 0){
				if( ! file_exists(APPPATH.'views/manage/visas/newservice.php'))
				{
					// Whoops, we don't have a page for that!
					show_404();
				}
				
				$this->load->helper('form');
				$this->load->library('form_validation');
				$this->load->model('manage/visas_model');
				
				$this->form_validation->set_rules('service_title', 'Visa Title', 'trim|required');
				$this->form_validation->set_rules('visa_validity', 'Visa Validity', 'trim|required');
				$this->form_validation->set_rules('visa_max_stay', 'Visa Maximum Stay', 'trim|required');
				$this->form_validation->set_rules('processing_time_rg', 'Visa Processing Time - Regular', 'trim|required');
				$this->form_validation->set_rules('service_fee_rg', 'Visa Service fee - Regular', 'trim|required');
				$this->form_validation->set_rules('embassy_fee_rg', 'Visa Embassy Fee - Regular', 'trim|required');
				$this->form_validation->set_rules('processing_time_prem', 'Visa Processing Time - Premium', 'trim|required');
				$this->form_validation->set_rules('service_fee_prem', 'Visa Service fee - Premium', 'trim|required');
				$this->form_validation->set_rules('embassy_fee_prem', 'Visa Embassy Fee - Premium', 'trim|required');
				$this->form_validation->set_rules('processing_time_ex', 'Visa Processing Time - Express', 'trim|required');
				$this->form_validation->set_rules('service_fee_ex', 'Visa Service fee - Express', 'trim|required');
				$this->form_validation->set_rules('embassy_fee_ex', 'Visa Embassy Fee - Express', 'trim|required');
				$this->form_validation->set_rules('intro_text', 'Introduction Text', 'trim|required');
				$this->form_validation->set_rules('detail_text', 'Details Text', 'trim|required');
				
				if(( NULL != $this->input->post('meet_greet_combo'))&&($this->input->post('meet_greet_combo')=='1')){
					$this->form_validation->set_rules('extended_service_fee', 'Extended Service Fee', 'trim|required');
				}
				if(( NULL != $this->input->post('meet_greet_combo'))&&($this->input->post('meet_greet_combo')=='0')){
					$_POST['extended_service_fee'] = '';
				}
				if(!($this->form_validation->run() === FALSE)){
					$this->visas_model->set_services($id);
					$this->session->set_flashdata('service_update_success', 'Visa Service Updated Successfully');
					redirect("manage/visas/service");
				}
				
				$data['title'] = ucfirst('edit service'); 
				$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
				$data['return_url'] = base_url('manage/visas/service');
				$data['country_list'] = $this->visas_model->get_countries();
				$data['visa_types'] = $this->visas_model->get_visas();
				$data['editor_on'] = 'show';
				$data['dynamic_field_gen'] = 'show';
				$data['service_data'] = $this->visas_model->get_services($id);
				$data['service_data_questions'] = $this->visas_model->get_questions($id);

				$this->load->view('manage/templates/admin_header', $data);
				$this->load->view('manage/visas/updateservice', $data);
				$this->load->view('manage/templates/admin_footer', $data);
			}
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function get_country_name($id = FALSE)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if($id){
				$this->load->model('manage/visas_model');
				$result =  $this->visas_model->get_countries($id);
				return $result['country_name'];
			}
		}else{
			redirect("manage/pages/view");
		}
	}
}