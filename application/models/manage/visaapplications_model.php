<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visaapplications_model extends CI_Model {
	
	public $file_upld_config = '';
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
		$this->file_upld_config['upload_path'] = './uploads/visas';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
    }
    
    public function get_visa_applications($id = FALSE)
    {
        if ($id === FALSE)
        {
			if((NULL !== $this->input->post('from_sr')) && (NULL !== $this->input->post('to_sr')))
			{
				$this->db->where('application_date >=',$this->input->post('from_sr'));
				$this->db->where('application_date <=',$this->input->post('to_sr'));
				$this->db->where('is_coapplicant','0');
				
				$query = $this->db->get('ci_user_applications');
				return $query->result_array();
			}
            $query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => '0'));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_user_applications', array('id' => $id));
        return $query->row_array();
    }
    
    
    public function delete_visa_appplication($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ci_user_applications');
    }
	
	public function get_services($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('ci_visa_services');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_visa_services', array('id' => $id));
        return $query->row_array();
    }
	
	public function get_questions($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get(' ci_service_questions');
            return $query->result_array();
        }
 
        $query = $this->db->get_where(' ci_service_questions', array('service_id' => $id));
        return $query->result_array();
    }
	
	public function set_services($id = 0)
    {
		$data = array(
			'service_title' => $this->input->post('service_title'),
            'for_citizen' => $this->input->post('for_citizen'),
			'travelling_to' => $this->input->post('travelling_to'),
			'living_in' => $this->input->post('living_in'),
			'visa_type' => $this->input->post('visa_type'),
			'intro_content' => $this->input->post('intro_text'),
			'embassy_fee' => $this->input->post('embassy_fee'),
			'service_fee' => $this->input->post('service_fee'),
			'extended_service_fee' => $this->input->post('extended_service_fee'),
			'processing_time' => $this->input->post('processing_time'),
			'visa_validity' => $this->input->post('visa_validity'),
			'visa_max_stay' => $this->input->post('visa_max_stay'),
			'is_active' => $this->input->post('is_active'),
        );

        
        if ($id == 0) {
			$this->db->insert('ci_visa_services', $data);
			$insert_id = $this->db->insert_id();
			$this->set_service_questions($insert_id);
        } else {
            $this->db->where('id', $id);
            $this->db->update('ci_visa_services', $data);
			$this->set_service_questions($id);
        }
    }
	
	public function get_countries($id = FALSE)
	{
		if ($id === FALSE)
        {
            $query = $this->db->get('ci_localisation');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_localisation', array('id' => $id));
        return $query->row_array();
	}
	
	public function set_service_questions($id = 0)
	{
		if((int)$id > 0){

			/*if(!array_filter($this->input->post('ques_title'))){*/
				$this->db->where('service_id', $id);
				$this->db->delete('ci_service_questions');  //remember not to use the id's of questions as they will change
				
				$q_title = $this->input->post('ques_title');
				$q_help = $this->input->post('ques_title');
				$q_req = $this->input->post('quest_opt');
				
				foreach($this->input->post('ques_title') as $key=>$value)
				{
					if($value != ''){
						$data_q = array();
						$data_q = array(
							'question_title' => $q_title[$key],
							'help_text' => $q_help[$key],
							'required' => $q_req[$key],
							'service_id' => (int)$id
						);
						$this->db->insert('ci_service_questions', $data_q);
					}
				}
			/*}*/
		}
	}
	
	public function delete_service($id=0)
	{
		if((int)$id > 0){
			//first delete questionarrie
			$this->db->where('service_id', $id);
			$this->db->delete('ci_service_questions');
			
			$this->db->where('id', $id);
			return $this->db->delete('ci_visa_services');
		}
	}
	
	public function get_coapplicant_count( $id = 0)
	{
		if($id != 0){
			$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $id));
			$rowcount = $query->num_rows();
			return (int)$rowcount;
		}
	}
	
	public function get_coapplicant_data( $id = 0)
	{
		if($id != 0){
			$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $id));
			return $query->result_array();
		}
	}
	
	public function get_applicant_documents($id = 0)
	{
		if($id)
		{
			$query = $this->db->get_where('ci_user_files', array('applicant_id' => $id));
			return $query->row_array();
		}
	}
	
	public function set_documents_status()
	{
		if($this->input->post('passport_approval') == '0')
		{
			$color_pass_val = $this->input->post('passport_approval_reason');
		}else{
			if($this->input->post('passport_approval') === NULL)
			$color_pass_val = '0';
			else
			$color_pass_val = '1';
		}
		if($this->input->post('return_approval') == '0')
		{
			$return_val = $this->input->post('return_approval_reason');
		}else{
			if($this->input->post('return_approval') === NULL)
			$return_val = '0';
			else
			$return_val = '1';
		}
		if($this->input->post('employee_approval') == '0')
		{
			$employee_val = $this->input->post('employee_approval_reason');
		}else{
			if($this->input->post('employee_approval') === NULL)
			$employee_val = '0';
			else
			$employee_val = '1';
		}
		if($this->input->post('residence_approval') == '0')
		{
			$residence_val = $this->input->post('residence_approval_reason');
		}else{
			if($this->input->post('residence_approval') === NULL)
			$residence_val = '0';
			else
			$residence_val = '1';
		}
		if($this->input->post('hotel_approval') == '0')
		{
			$hotel_val = $this->input->post('hotel_approval_reason');
		}else{
			if($this->input->post('hotel_approval') === NULL)
			$hotel_val = '0';
			else
			$hotel_val = '1';
		}
		if($this->input->post('misc_approval') == '0')
		{
			$miscdocs_val = $this->input->post('misc_approval_reason');
		}else{
			if($this->input->post('misc_approval') === NULL)
			$miscdocs_val = '0';
			else
			$miscdocs_val = '1';
		}
		 
		$data = array(
			'coloured_passport_reject' => $color_pass_val,
            'return_ticket_reject' => $return_val,
			'employee_id_reject' => $employee_val,
			'residence_proof_reject' => $residence_val,
			'hotel_reservation_reject' => $hotel_val,
			'misc_documents_reject' => $miscdocs_val
        );
		
		$this->db->where('applicant_id', $this->input->post('applicant_id'));
		$this->db->update('ci_user_files', $data);
	}
	
	public function get_application_status($applicant_id = 0)
	{
		if($applicant_id){
			$query = $this->db->get_where('ci_application_status', array('application_id' => $applicant_id));
			return $query->row_array();
		}else{
			$query = $this->db->get('ci_application_status');
			return $query->result_array();
		}
	}
	
	public function set_application_status()
	{
		$data = array(
            'status' => $this->input->post('new_status'),
			'comments' => $this->input->post('status_comment')
        );
		
		$this->db->where('application_id', $this->input->post('applicantion_id'));
		$this->db->update('ci_application_status', $data);
	}
	
	public function get_payment_status_list($id = false)
	{
		if ($id === FALSE)
        {
            $query = $this->db->get('ci_payment_status');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_payment_status', array('id' => $id));
        return $query->row_array();
	}
	
}