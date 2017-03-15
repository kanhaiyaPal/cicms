<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_home_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('id' => '1')); //home page meta-details are reserved at id 1
        return $query->row_array();
	}
	
	public function get_page_info($id = FALSE)
	{
		if($id == FALSE){
			//return homepage info
			$query = $this->db->get_where('ci_page_settings', array('page_id' => '1')); //home page details are reserved at id 1
			return $query->result_array();
		}
		
		$query = $this->db->get_where('ci_page_settings', array('page_id' => $id)); //home page details are reserved at id 1
		return $query->result_array();
	}
}