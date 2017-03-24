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
		
		$this->visas_front_model->add_application_data();
		redirect('thank-you', 'refresh');
	}
}