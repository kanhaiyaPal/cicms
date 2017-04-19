<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas_front_model extends CI_Model {
	
	public $file_upld_config = '';
	public function __construct(){
		parent::__construct();
		$this->load->database();

		$this->file_upld_config['upload_path'] = './uploads/visas/user_docs';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png|pdf|bmp';
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
		$query = $this->db->get_where('ci_user_files',array('applicant_id' => $apl_id));
		$ap_row = $query->row_array();
		$this->delete_existing_files($ap_row['id']);
		$this->db->where('id', $apl_id);
        return $this->db->delete('ci_user_applications');
	}
	
	public function delete_co_applicants($apl_id)
	{
		$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $apl_id));
		$ap_row = $query->result_array();
		foreach($ap_row as $aprw)
		{
			$query = $this->db->get_where('ci_user_files',array('applicant_id' => $apl_id));
			$ap_row = $query->row_array();
			$this->delete_existing_files($ap_row['id']);
			$this->db->where('id', $aprw['id']);
			$this->db->delete('ci_user_applications');
		}
	}
	
	public function add_application_data($id = FALSE)
	{
		if(NULL === $this->session->usersession['user_id']){
			$reg_user_id = 0;
		}else{
			$reg_user_id = $this->session->usersession['user_id'];
		}
 
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
			'applicant_passport_issuingcountry' => $this->input->post('select-appplicant-pissuecountry'),
			'applicant_passport_issuedate' => $this->input->post('input-applicant-issuedate'),
			'applicant_passport_expiry' => $this->input->post('input-applicant-expiry'),
			'is_coapplicant' => $this->input->post('is_coapplicant'),
			'selected_service' => $this->input->post('service_selected'),
			'payable_fee' => $this->input->post('application_fee'),
			'reg_id' => $reg_user_id
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
			$this->insert_track_status($insert_id);
			$this->insert_payment_status($insert_id);
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
				
				$this->load->library('upload'); //load the library
				
				$this->upload->initialize($this->file_upld_config);
				
				if ((isset($_FILES['file-applicant-passport'])) && (!empty($_FILES['file-applicant-passport']['name']))) {
					
					if($this->upload->do_upload('file-applicant-passport')){
						$fileData = $this->upload->data();
						$applicant_coloured_passport = $fileData['file_name'];
					}/*else{
						 $ret = $this->upload->display_errors();
						 print_r($ret);
						 exit;
					}*/
				}else{
					if(NULL !== $this->input->post('pro-file-applicant-passport'))
					$applicant_coloured_passport = $this->input->post('pro-file-applicant-passport');
				}
				if ((isset($_FILES['file-applicant-returnticket'])) && (!empty($_FILES['file-applicant-returnticket']['name']))) {
					
					if($this->upload->do_upload('file-applicant-returnticket')){
						$fileData = $this->upload->data();
						$applicant_return_ticket = $fileData['file_name'];
					}
					
				}else{
					if(NULL !== $this->input->post('pro-file-applicant-returnticket'))
					$applicant_return_ticket = $this->input->post('pro-file-applicant-returnticket');
				}
				if ((isset($_FILES['file-applicant-empid'])) && (!empty($_FILES['file-applicant-empid']['name']))) {
					
					if($this->upload->do_upload('file-applicant-empid')){
						$fileData = $this->upload->data();
						$applicant_emp_id = $fileData['file_name'];
					}
					
				}else{
					if(NULL !== $this->input->post('pro-file-applicant-empid'))
					$applicant_emp_id = $this->input->post('pro-file-applicant-empid');
				}
				if ((isset($_FILES['file-applicant-residence'])) && (!empty($_FILES['file-applicant-residence']['name']))) {
					
					if($this->upload->do_upload('file-applicant-residence')){
						$fileData = $this->upload->data();
						$applicant_residence_proof = $fileData['file_name'];
					}else{
						 $ret = $this->upload->display_errors();
						 print_r($ret);
						 exit;
					}
					
				}else{
					if(NULL !== $this->input->post('pro-file-applicant-residence'))
					$applicant_residence_proof = $this->input->post('pro-file-applicant-residence');
				}
				if ((isset($_FILES['file-applicant-reservation'])) && (!empty($_FILES['file-applicant-reservation']['name']))) {
					
					if($this->upload->do_upload('file-applicant-reservation')){
						$fileData = $this->upload->data();
						$applicant_reservation = $fileData['file_name'];
					}
					
				}else{
					if(NULL !== $this->input->post('pro-file-applicant-reservation'))
					$applicant_reservation = $this->input->post('pro-file-applicant-reservation');
				}
				if ((isset($_FILES['file-applicant-miscellanious'])) && (!empty($_FILES['file-applicant-miscellanious']['name']))) {
					
					if($this->upload->do_upload('file-applicant-miscellanious')){
						$fileData = $this->upload->data();
						$applicant_misc_docs = $fileData['file_name'];
					}
					
				}else{
					if(NULL !== $this->input->post('pro-file-applicant-miscellanious'))
					$applicant_misc_docs = $this->input->post('pro-file-applicant-miscellanious');
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
	
	public function insert_track_status($application_id = 0)
	{
		if($application_id){
			$data = array(
				'application_id' => $application_id,
				'status' => 'submitted',
				'comments' => 'Application Submitted by system'
			);
			
			$this->db->insert('ci_application_status', $data);
		}
	}
	
	public function insert_payment_status($application_id = 0)
	{
		if($application_id){
			$data = array(
				'application_id' => $application_id,
				'status' => 'pending',
				'reference_number' => 'Testing'
			);
			
			$this->db->insert('ci_application_status', $data);
		}	
	}
	
	function delete_existing_files($id = 0)
	{
		if($id != 0){
			$query = $this->db->get_where('ci_user_files',array('id' => $id));
			$file_row = $query->row_array();
			
			if(($file_row['coloured_passport'] != '')  && (NULL === $this->input->post('pro-file-applicant-passport'))){
				$c_pass = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['coloured_passport'];
				unlink($c_pass);
			}
			if(($file_row['return_ticket'] != '') && (NULL === $this->input->post('pro-file-applicant-returnticket'))){
				$ret_tic = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['return_ticket'];
				unlink($ret_tic);
			}
			if(($file_row['employee_id'] != '') && (NULL === $this->input->post('pro-file-applicant-empid'))){
				$emp_id = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['employee_id'];
				unlink($emp_id);
			}
			if(($file_row['residence_proof'] != '') && (NULL === $this->input->post('pro-file-applicant-residence'))){
				$res_pr = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['residence_proof'];
				unlink($res_pr);
			}
			if(($file_row['hotel_reservation'] != '')  && (NULL === $this->input->post('pro-file-applicant-reservation'))){
				$ht_res = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['hotel_reservation'];
				unlink($ht_res);
			}
			if(($file_row['misc_documents'] != '') && (NULL === $this->input->post('pro-file-applicant-miscellanious'))){
				$misc_doc = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $file_row['misc_documents'];
				unlink($misc_doc);
			}
			
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
	
	public function get_applicant_files($applicant_id = 0)
	{
		if($applicant_id != 0){
			$query = $this->db->get_where('ci_user_files',array('applicant_id' => $applicant_id));
			return $query->row_array();
		}
	}
	
	public function delete_app_file()
	{
		$applicant_userfile = $this->input->post('file');
		$applicant_id = $this->input->post('applicant');
		$field_name = $this->input->post('field');
		
		$d_file = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'visas'. DIRECTORY_SEPARATOR . 'user_docs'. DIRECTORY_SEPARATOR . $applicant_userfile;
		unlink($d_file);
		
		$wh_array = array($field_name => '');
		
		$this->db->where('applicant_id', $applicant_id);
		return $this->db->update('ci_user_files', $wh_array);		
	}
	
	public function get_subapplicant_count($parent_id = 0)
	{
		if($parent_id != 0){
			$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $parent_id));
			$rowcount = $query->num_rows();
			return (int)$rowcount;
		}
	}
	
	public function get_application_status($parent_id = 0)
	{
		if($parent_id != 0){
			$parent_id = $this->get_parent_appplicant($parent_id);
			$query = $this->db->get_where('ci_application_status',array('application_id' => $parent_id));
			return $query->row_array();
		}
	}
	
	public function get_payment_status($parent_id = 0)
	{
		if($parent_id != 0){
			$query = $this->db->get_where('ci_payment_status',array('application_id' => $parent_id));
			return $query->row_array();
		}
	}
	
	public function get_subapplicant_parent($parent_id = 0)
	{
		if($parent_id != 0){
			$query = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $parent_id));
			return $query->result_array();
		}
	}
	
	public function get_current_userapplication($user_id = 0)
	{
		if($user_id){
			$this->db->order_by('id', 'ASC');
			$query = $this->db->get_where('ci_user_applications',array('reg_id' => $user_id,'is_coapplicant' => '0'));
			return $query->result_array();
		}
	}
	
	public function update_reg_id($application_id = 0,$user_id = 0)
	{
		if($application_id && $user_id){
			//check if applicant is parent
			$query_f = $this->db->get_where('ci_user_applications',array('id' => $application_id));
			$tb_app = $query_f->row_array();
			if($tb_app['is_coapplicant'] == '0')
			{
				$this->db->where('id', $application_id);
				$this->db->update('ci_user_applications', array('reg_id' => $user_id));	
				
				$query_p = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $application_id));
				$child_num = $query_p->num_rows();
				$child_ar = $query_p->result_array();
				
				if($child_num > 0){
					foreach($child_ar as $child){
						$this->db->where('id', $child['id']);
						$this->db->update('ci_user_applications', array('reg_id' => $user_id));	
					}
				}
			}else{
				
				$this->db->where('id', $application_id);
				$this->db->update('ci_user_applications', array('reg_id' => $user_id));	
				
				$query_pa = $this->db->get_where('ci_user_applications',array('is_coapplicant' => $tb_app['is_coapplicant']));
				$child_num = $query_pa->num_rows();
				$child_ar = $query_pa->result_array();
				
				if($child_num > 0){
					foreach($child_ar as $child){
						$this->db->where('id', $child['id']);
						$this->db->update('ci_user_applications', array('reg_id' => $user_id));	
					}
				}
				
				$this->db->where('id', $tb_app['is_coapplicant']);
				$this->db->update('ci_user_applications', array('reg_id' => $user_id));	
			}
		}
	}
	
	public function generate_unique_tracking()
	{
		$application_id = $_REQUEST['applicantion_id'];
		$parent_id = 0;
		
		$query_f = $this->db->get_where('ci_user_applications',array('id' => $application_id));
		$tb_app = $query_f->row_array();
		
		if($tb_app['tracking_no'] == ''){
			if($tb_app['is_coapplicant'] == '0')
			{
				$parent_id = $application_id;
			}else{
				$query_p = $this->db->get_where('ci_user_applications',array('id' => $tb_app['is_coapplicant']));
				$tb_ap = $query_p->row_array();
				$parent_id = $tb_ap['id'];
			}
			
			$query = $this->db->get_where('ci_user_applications',array('id' => $parent_id));
			$parent_dt = $query->row_array();
			
			$first_two = '';
			$last_four = '';
			$first_two .= ucfirst(substr($parent_dt['applicant_firstname'], 0, 1));
			$first_two .= ucfirst(substr($parent_dt['applicant_lastname'], 0, 1));
			
			$last_four = strtoupper(substr($parent_dt['applicant_passport_number'], -4));
			
			$tracking_id = $this->test_uniqueness_tracking($first_two,$last_four);
			
			//update payment status
			$this->db->where('application_id', $parent_id);
			$this->db->update('ci_payment_status', array('staus' => 'paid','reference_number' => 'Testing'));
			
			//update parent
			$this->db->where('id', $parent_id);
			$this->db->update('ci_user_applications', array('tracking_no' => $tracking_id,'application_date' => date('d-m-Y')));
			
			//update sub-applicants
			$this->db->where('is_coapplicant', $parent_id);
			$this->db->update('ci_user_applications', array('tracking_no' => $tracking_id,'application_date' => date('d-m-Y')));
		}
	}
	
	public function test_uniqueness_tracking($first_two = '',$last_four = '')
	{
		$charactersM = 4;
		$possibleM = '123456789';
		$codeM = '';
		$i = 0;
		while ($i < $charactersM) { 
			$codeM .= substr($possibleM, mt_rand(0, strlen($possibleM)-1), 1);
			$i++;
		}
		$ranStrM = $first_two.$codeM.$last_four;
		
		$query = $this->db->get_where('ci_user_applications',array('tracking_no' => $ranStrM));
		$parent_c = $query->num_rows();
		if($parent_c > 0) {
			$this->test_uniqueness_tracking($first_two,$last_four);
		} else {	
			return $ranStrM;
		}
	}
}