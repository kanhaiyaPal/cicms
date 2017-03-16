<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_home_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('page_title' => 'home')); //home page meta-details are reserved
        return $query->row_array();
	}
	
	public function get_home_data()
	{
		$query = $this->db->get_where('ci_page_settings', array('page_id' => '1')); //home page details are reserved at id 1
		return $query->result_array();
	}
}