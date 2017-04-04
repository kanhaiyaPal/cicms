<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas_front extends CI_Controller {
	
	public function __construct(){
		parent::__construct();	
		
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function get_visas_acc()
	{
		$this->load->model('frontend/visas_front_model');
		$visa_rs = array();
		
		if((NULL != $this->input->post('citzen_id')) && (NULL != $this->input->post('living_id')) && (NULL != $this->input->post('travelling_id'))){
			
			$visa_rs = $this->visas_front_model->get_visas_user($this->input->post('citzen_id'),$this->input->post('travelling_id'),$this->input->post('living_id'));
		}
		echo json_encode($visa_rs);
	}
	
	public function submit_data()
	{
		$this->load->model('frontend/visas_front_model');
		$this->load->model('frontend/users');
		
		
		
		if(NULL === $this->input->post('citizen_of')){
			show_404();
		}
		
		if( NULL !== $this->input->post('flag-save-coapplicant')){
			$ret_id = $this->visas_front_model->add_application_data($this->input->post('flag-save-coapplicant'));
			if(NULL !== $this->input->post('is_coapplicant')){
				$applicant_id = $this->input->post('is_coapplicant');
			}else{
				$applicant_id = $ret_id;
			}
		}else{
			if(NULL !== $this->input->post('flag-no-multiple'))
			$applicant_id = $this->visas_front_model->add_application_data($this->input->post('flag-no-multiple'));
			else
			$applicant_id = $this->visas_front_model->add_application_data();
		}
				
		if( (NULL !== $this->input->post('flag-coapplicant')) || (NULL !== $this->input->post('flag-save-coapplicant')) ){
			$parent_id = $this->visas_front_model->get_parent_appplicant($applicant_id);
			$applicant_count = $this->visas_front_model->get_subapplicant_count($parent_id);
			$this->session->set_flashdata('post_rev_up',$_POST);
			redirect(base_url()."frontend/pages/start_coapplication/".$parent_id."/".$applicant_count);
		}else{
			if(NULL === $this->session->usersession['user_id']){
				$u_id = $this->users->create_user();
				$this->visas_front_model->update_reg_id($applicant_id,$u_id);
			}
			redirect('thank-you', 'refresh');
		}
		
		/*
		if($this->input->is_ajax_request()){
			$parent_id = $this->visas_front_model->get_parent_appplicant($applicant_id);
			if($parent_id != '0'){ $applicant_count = $this->visas_front_model->get_subapplicant_count($parent_id); }
			echo json_encode(array('parent_id'=> $parent_id,'existing' => $applicant_count ));
			exit();
		}*/
	}
	
	public function delete_user_application_front($application_id = 0)
	{
		if($application_id){
			if(isset($this->session->usersession)&& ($this->session->usersession != '')){
				$this->load->helper('url');
				$this->load->model('frontend/visas_front_model');
			
				$this->visas_front_model->delete_applicant($application_id);
				$this->visas_front_model->delete_co_applicants($application_id);
				$this->session->set_flashdata('app_delete_success','Application deleted successfully');
				redirect('frontend/pages/view_applications', 'refresh');
			}else{
				redirect('login-register');
			}
			
		}
	}

}