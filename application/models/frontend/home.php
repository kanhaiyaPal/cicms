<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_home_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('id' => '1'));
        return $query->row_array();
	}
}