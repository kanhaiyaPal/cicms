<?php
class Site_settings extends CI_Model {
	
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
    }
    
    public function get_settings($settingname = FALSE)
    {
        if ($settingname === FALSE)
        {
            return false;
        }
        $query = $this->db->get_where('ci_sitesettings', array('setting_name' => $settingname));
        return $query->row_array();
    }
    
    public function set_testimonials($id = 0)
    {
 
        $data = array(
            'title' => $this->input->post('testimonial_title'),
            'content' => $this->input->post('testimonial_content'),
			'order_s' => $this->input->post('testimonial_order')
        );
		
        
        if ($id == 0) {
			$this->db->insert('ci_testimonials', $data);
			return $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            return $this->db->update('ci_testimonials', $data);
        }
    }
	
	public function remove_logo()
	{
		 $data = array(
            'setting_name' => 'site_logo',
            'setting_value' => '',
        );
		$this->db->where('setting_name', 'site_logo');
		return $this->db->update('ci_sitesettings', $data);
	}
}