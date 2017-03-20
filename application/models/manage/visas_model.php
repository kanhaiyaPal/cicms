<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visas_model extends CI_Model {
	
	public $file_upld_config = '';
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
		$this->file_upld_config['upload_path'] = './uploads/visas';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
    }
    
    public function get_visas($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('ci_visa_types');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_visa_types', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_visas($id = 0)
    {
        $data = array(
            'title' => $this->input->post('visa_title'),
        );

        
        if ($id == 0) {
			return $this->db->insert('ci_visa_types', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('ci_visa_types', $data);
        }
    }
    
    public function delete_visa($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ci_visa_types');
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
}