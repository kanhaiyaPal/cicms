<?php
class Pagesettings_model extends CI_Model {
	
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
    }
    
    public function get_settings($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get_where('ci_page_settings', array('page_id' => '1'));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_page_settings', array('page_id' => $id));
        return $query->result_array();
    }
    
    public function set_settings($id = 1)
    {
		if($id == 1){
			//home page settings
			
			$this->db->where('page_id', $id);
			$this->db->delete('ci_page_settings');
			
			$data = array(
			   array(
				  'setting_name' => 'home_top_summary',
				  'setting_val' => $this->input->post('home_top_summary'),
				  'page_id' => 1
			   ),
			   array(
				  'setting_name' => 'home_bottom_summary',
				  'setting_val' => $this->input->post('home_bottom_summary'),
				  'page_id' => 1
			   ),
			   array(
				  'setting_name' => 'home_feature_block',
				  'setting_val' => $this->input->post('home_feature_block'),
				  'page_id' => 1
			   )
			);

			return $this->db->insert_batch('ci_page_settings', $data);
		}
		if($id == 2){
			//Contact Us settings
			
			$this->db->where('page_id', $id);
			$this->db->delete('ci_page_settings');
			
			$data = array(
				'setting_name' => 'contact_google_map',
				'setting_val' => $this->input->post('contact_map_code'),
				'page_id' => 2
			);

			return $this->db->insert('ci_page_settings', $data);
		}
    }
}