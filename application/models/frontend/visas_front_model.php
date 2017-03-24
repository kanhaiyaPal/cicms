<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas_front_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_visas_user($citizen_of = 0,$travelling_to = 0,$living_in = 0){
		if(!($citizen_of||$travelling_to||$living_in)){
			return false;
		}
		
		$ser_ar = array(
			'for_citizen' => $citizen_of,
			'travelling_to' => $travelling_to,
			'living_in' => $living_in,
		);
		
		$query = $this->db->get_where('ci_visa_services',$ser_ar);
		//return $this->db->last_query();
		return $query->result_array();
	}
	
	public function add_application_data($id = FALSE)
	{
 
        $data = array(
			'applicant_citizen_of' => $this->input->post('citizen_of'),
			'applicant_living_in' => $this->input->post('living_in'),
			'applicant_travelling_to' => $this->input->post('travelling_to'),
            'arrival_date' => $this->input->post('input-arrival-date'),
			'departure_date' => $this->input->post('input-departure-date'),
            'applicant_firstname' => $this->input->post('input-applicant-firstname'),
			'applicant_lastname' => $this->input->post('input-applicant-lastname'),
			'present_address' => $this->input->post('text-current-address'),
			'city' => $this->input->post('input-current-city'),
			'mobile' => $this->input->post('input-current-mobile'),
			'email_id' => $this->input->post('input-email'),
			'emirates' => $this->input->post('select-emirates'),
			'uae_phone' => $this->input->post('input-current-phone'),
			'uae_hotel_address' => $this->input->post('text-hotel-address'),
			'emergency_name' => $this->input->post('input-emergency-person'),
			'emergency_phone' => $this->input->post('input-emergency-number'),
			'applicant_gender' => $this->input->post('select-applicant-gender'),
			'applicant_dob' => $this->input->post('input-applicant-dob'),
			'applicant_birthplace' => $this->input->post('input-applicant-birthplace'),
			'applicant_birthcountry' => $this->input->post('select-applicant-birthcountry'),
			'applicant_religion' => $this->input->post('select-applicant-religion'),
			'applicant_profession' => $this->input->post('input-applicant-profession'),
			'applicant_fathername' => $this->input->post('input-applicant-fathername'),
			'applicant_mothername' => $this->input->post('input-applicant-mothername'),
			'applicant_marital' => $this->input->post('input-applicant-maritalstatus'),
			'applicant_passport_number' => $this->input->post('input-applicant-passportnumber'),
			'applicant_passport_placeofissue' => $this->input->post('input-applicant-placeofissue'),
			'applicant_passport_issuningcountry	' => $this->input->post('select-appplicant-pissuecountry'),
			'applicant_passport_issuedate' => $this->input->post('input-applicant-issuedate'),
			'applicant_passport_expiry' => $this->input->post('input-applicant-expiry')
        );
		
        
        if ($id) {
			$this->db->where('id', $id);
            $this->db->update('ci_user_applications', $data);
        } else {
			$this->db->insert('ci_user_applications', $data);
         
        }
	}
}