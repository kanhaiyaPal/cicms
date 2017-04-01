<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas_front extends CI_Controller {
	
	public function __construct(){
		parent::__construct();	
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
		$this->load->helper('url');
		
		if(NULL === $this->input->post('citizen_of')){
			show_404();
		}
		
		$applicant_id = $this->visas_front_model->add_application_data();
		
		if( NULL !== $this->input->post('flag-coapplicant')){
			$parent_id = $this->visas_front_model->get_parent_appplicant($applicant_id);
			$applicant_count = $this->visas_front_model->get_subapplicant_count($parent_id);
			$this->session->set_flashdata('post_rev_up',$_POST);
			redirect(base_url()."frontend/pages/start_coapplication/".$parent_id."/".$applicant_count);
		}else{
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
}