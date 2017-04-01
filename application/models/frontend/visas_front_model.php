<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas_front_model extends CI_Model {
	
	public $file_upld_config = '';
	public function __construct(){
		parent::__construct();
		$this->load->database();

		$this->file_upld_config['upload_path'] = './uploads/visas/user_docs';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
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
	
	public function get_all_applicants($parents_id = 0)
	{
		$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $parents_id));
		$child_res = $query->result_array();
		$query = $this->db->get_where('ci_user_applications',array('id' => $parents_id));
		$self_el = $query->row_array();
		array_push($child_res,$self_el); 
		
		return $child_res;
	}
	
	public function get_applicant_data($id = 0)
	{
		if($id){
			$query = $this->db->get_where('ci_user_applications',array('id' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('ci_user_applications');
			return $query->result_array();
		}
	}
	
	public function delete_applicant($apl_id)
	{
		$this->db->where('id', $apl_id);
        return $this->db->delete('ci_user_applications');
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
			'applicant_passport_expiry' => $this->input->post('input-applicant-expiry'),
			'is_coapplicant' => $this->input->post('is_coapplicant'),
			'selected_service' => $this->input->post('service_selected'),
			'payable_fee' => $this->input->post('application_fee')
        );
		
        
        if ($id) {
			$this->db->where('id', $id);
            $this->db->update('ci_user_applications', $data);
			$this->upload_applicant_images($id);
			return $id;
        } else {
			$this->db->insert('ci_user_applications', $data);
			$insert_id = $this->db->insert_id();
			$this->upload_applicant_images($insert_id);
			return $insert_id;
        }
	}
	
	public function upload_applicant_images($applicant_id = 0)
	{
			if($applicant_id != 0){
				
				/*check if there is any existing data of an applicant*/
				$ext_dt = $this->check_existing_files($applicant_id);
				
				if($ext_dt){ $this->delete_existing_files($ext_dt); }
				
				$this->db->insert('ci_user_files', array('applicant_id' => $applicant_id));
				$user_fl_id = $this->db->insert_id();
				
				$applicant_coloured_passport = '';
				$applicant_return_ticket = '';
				$applicant_emp_id = '';
				$applicant_residence_proof = '';
				$applicant_reservation = '';
				$applicant_misc_docs = '';
				
				$this->load->library('upload', $this->file_upld_config); //load the library
				
				if ((isset($_FILES['file-applicant-passport'])) && (!empty($_FILES['file-applicant-passport']['name']))) {
					
					if($this->upload->do_upload('file-applicant-passport')){
						$fileData = $this->upload->data();
						$applicant_coloured_passport = $fileData['file_name'];
					}else{
						 $ret = $this->upload->display_errors();
						 print_r($ret);
						 exit;
					}
					
				}
				if ((isset($_FILES['file-applicant-returnticket'])) && (!empty($_FILES['file-applicant-returnticket']['name']))) {
					
					if($this->upload->do_upload('file-applicant-returnticket')){
						$fileData = $this->upload->data();
						$applicant_return_ticket = $fileData['file_name'];
					}
					
				}
				if ((isset($_FILES['file-applicant-empid'])) && (!empty($_FILES['file-applicant-empid']['name']))) {
					
					if($this->upload->do_upload('file-applicant-empid')){
						$fileData = $this->upload->data();
						$applicant_emp_id = $fileData['file_name'];
					}
					
				}
				if ((isset($_FILES['file-applicant-residence'])) && (!empty($_FILES['file-applicant-residence']['name']))) {
					
					if($this->upload->do_upload('file-applicant-residence')){
						$fileData = $this->upload->data();
						$applicant_residence_proof = $fileData['file_name'];
					}
					
				}
				if ((isset($_FILES['file-applicant-reservation'])) && (!empty($_FILES['file-applicant-reservation']['name']))) {
					
					if($this->upload->do_upload('file-applicant-reservation')){
						$fileData = $this->upload->data();
						$applicant_reservation = $fileData['file_name'];
					}
					
				}
				if ((isset($_FILES['file-applicant-miscellanious'])) && (!empty($_FILES['file-applicant-miscellanious']['name']))) {
					
					if($this->upload->do_upload('file-applicant-miscellanious')){
						$fileData = $this->upload->data();
						$applicant_misc_docs = $fileData['file_name'];
					}
					
				}
				
				$fil_data = array(
					'coloured_passport' => $applicant_coloured_passport,
					'return_ticket' => $applicant_return_ticket,
					'employee_id' => $applicant_emp_id,
					'residence_proof' => $applicant_residence_proof,
					'hotel_reservation' => $applicant_reservation,
					'misc_documents' => $applicant_misc_docs
				);
				
				$this->db->where('id', $user_fl_id);
				$this->db->update('ci_user_files', $fil_data);			
			}
			
	}
	
	function check_existing_files($applicant_id = 0)
	{
		$query = $this->db->get_where('ci_user_files',array('applicant_id' => $applicant_id));
		$rowcount = $query->num_rows();
		$row_inf = $query->row_array();
		if($rowcount > 0){ return $row_inf['id']; }else{ return false; }
	}
	
	function delete_existing_files($id = 0)
	{
		if($id != 0){
			$query = $this->db->get_where('ci_user_files',array('id' => $id));
			$file_row = $query->row_array();
			
			$c_pass = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['coloured_passport'];
			unlink($c_pass);
			$ret_tic = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['return_ticket'];
			unlink($ret_tic);
			$emp_id = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['employee_id'];
			unlink($emp_id);
			$res_pr = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['residence_proof'];
			unlink($res_pr);
			$ht_res = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['hotel_reservation'];
			unlink($ht_res);
			$misc_doc = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['misc_documents'];
			unlink($misc_doc);
			
			$this->db->where('id', $id);
			return $this->db->delete('ci_user_files');
		}
	}
	
	public function get_parent_appplicant($applicant_id = 0)
	{
		if($applicant_id != 0){
			$query = $this->db->get_where('ci_user_applications',array('id' => $applicant_id));
			$row_inf = $query->row_array();
			if($row_inf['is_coapplicant'] == '0'){ return $applicant_id; }else{ return $row_inf['is_coapplicant']; }
		}
	}
	
	public function get_subapplicant_count($parent_id = 0)
	{
		if($parent_id != 0){
			$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $parent_id));
			$rowcount = $query->num_rows();
			return (int)$rowcount;
		}
	}
}