<?php
class Seomanagement_model extends CI_Model {
	
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
    }
    
    public function get_details($pagename = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get_where('ci_seo_data', array('page_title' => 'home'));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_seo_data', array('page_title' => $pagename));
        return $query->result_array();
    }
    
    public function set_details($pagename = 'home')
    {
		if($pagename == 'home'){
			//home page settings
			
			$this->db->where('page_title', 'home');
			$this->db->delete('ci_seo_data');
			
			$data = array(
				'meta-title' => 'home_top_summary',
				'meta-decription' => 'home_top_summary',
				'meta-keywords' => 'home_top_summary',
				'page_title' => 'home'
			);

			return $this->db->insert_batch('ci_page_settings', $data);
		}
    }
}