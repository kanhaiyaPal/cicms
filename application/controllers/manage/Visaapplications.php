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
			$co_app_c = array();
			
			foreach($data['page_data'] as $sing_a)
			{
				$co_app_c[$sing_a['id']] = $this->visaapplications_model->get_coapplicant_count($sing_a['id']);
			}
			
			$data['coapplicants'] = $co_app_c;
			
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
			$this->load->model('manage/visas_model');
			
			if( ! file_exists(APPPATH.'views/manage/visas/show_details_app.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('View Application Details'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['page_data'] = $this->visaapplications_model->get_visa_applications($id);
			$data['coapplicants'] = $this->visaapplications_model->get_coapplicant_count($id);
			$data['coapplicants_data'] = $this->visaapplications_model->get_coapplicant_data($id);
			$data['back_url'] = base_url('manage/visaapplications/show');
			$data['country_list'] = $this->visas_model->get_countries();

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/show_details_app', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function delete_application($application_id =0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if($application_id){
				$application_id = (int)$application_id;
				$this->load->model('frontend/visa_front_model'); 
				$this->visa_front_model->delete_applicant($application_id);
				$this->session->set_flashdata('delete_success', 'Application deleted successfully');
				$this->show();
			}
		}else{
			redirect("manage/pages/view");
		}
		
	}
	
	public function show_application_documents( $applicant_id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if($applicant_id){
				
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->load->model('manage/visaapplications_model');
				
				if( ! file_exists(APPPATH.'views/manage/visas/view_application_documents.php'))
				{
					show_404();
				}
				
				$data['title'] = ucfirst('View Application Documents'); 
				$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
				$data['documents'] = $this->visaapplications_model->get_applicant_documents($applicant_id);
				$data['back_url'] = base_url('manage/visaapplications/show');
				

				if($this->input->post('sbmtdocs') && ($this->input->post('sbmtdocs') == 'Save')){
					
					if($this->input->post('passport_approval') == '0')
					{
						$this->form_validation->set_rules('passport_approval_reason', 'Reason for passport rejection', 'trim|required');
					}
					if($this->input->post('return_approval') == '0')
					{
						$this->form_validation->set_rules('return_approval_reason', 'Reason for return ticket rejection', 'trim|required');
					}
					if($this->input->post('employee_approval') == '0')
					{
						$this->form_validation->set_rules('employee_approval_reason', 'Reason for Employee Id rejection', 'trim|required');
					}
					if($this->input->post('residence_approval') == '0')
					{
						$this->form_validation->set_rules('residence_approval_reason', 'Reason for residence proof rejection', 'trim|required');
					}
					if($this->input->post('hotel_approval') == '0')
					{
						$this->form_validation->set_rules('hotel_approval_reason', 'Reason for Hotel reservation copy rejection', 'trim|required');
					}
					if($this->input->post('misc_approval') == '0')
					{
						$this->form_validation->set_rules('misc_approval_reason', 'Reason for Miscellanious Documents rejection', 'trim|required');
					}
													
					if(!($this->form_validation->run() === FALSE)){
						
						$this->visaapplications_model->set_documents_status();
						$this->session->set_flashdata('update_success', 'Status Updated Successfully');
						redirect("manage/visaapplications/show_application_documents/".$this->input->post('applicant_id'));
					}
				}
								
				$this->load->view('manage/templates/admin_header', $data);
				$this->load->view('manage/visas/view_application_documents', $data);
				$this->load->view('manage/templates/admin_footer', $data);
			}
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function application_tracking()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/visaapplications_model');
				
			if( ! file_exists(APPPATH.'views/manage/visas/applicant_tracking.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('View Application Tracking'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['pages_script'] = 'show';
			
			$data['page_data'] = $this->visaapplications_model->get_visa_applications();
			$co_app_c = array();
			
			foreach($data['page_data'] as $sing_a)
			{
				$co_app_c[$sing_a['id']] = $this->visaapplications_model->get_coapplicant_count($sing_a['id']);
			}
			
			$data['coapplicants'] = $co_app_c;
			
			$sta_ar = array();
			$inter_st_im = $this->visaapplications_model->get_application_status();
			foreach($inter_st_im as $im)
			{
				$sta_ar[$im['application_id']] = $im['status'];
			}
			$data['app_status'] = $sta_ar;
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/applicant_tracking', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function applicant_tracking_modify($applicant_id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/visaapplications_model');
				
			if( ! file_exists(APPPATH.'views/manage/visas/change_tracking.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('View Application Tracking'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			
			if((NULL !== $this->input->post('changetracking'))&&($this->input->post('changetracking') == 'Change'))
			{
				$this->visaapplications_model->set_application_status();
				$this->session->set_flashdata('update_success', 'Status Updated Successfully');
				redirect("manage/visaapplications/application_tracking");
			}
			
			$data['status_data'] = $this->visaapplications_model->get_application_status($applicant_id);
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/visas/change_tracking', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
}