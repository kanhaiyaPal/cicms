<?php
class Seomanagement_model extends CI_Model {
	
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
    }
    
    public function get_details($pagename = FALSE)
    {
        if ($pagename === FALSE)
        {
            $query = $this->db->get_where('ci_seo_data', array('page_title' => 'home'));
            return $query->row_array();
        }
 
        $query = $this->db->get_where('ci_seo_data', array('page_title' => $pagename));
        return $query->row_array();
    }
    
    public function set_details($pagename = 'home')
    {
		if($pagename == 'home'){
			//home page settings
			
			$this->db->where('page_title', 'home');
			$this->db->delete('ci_seo_data');
			
			$data = array(
				'meta_title' => $this->input->post('page_meta_title'),
				'meta_description' => $this->input->post('page_meta_description'),
				'meta_keywords' => $this->input->post('page_meta_keywords'),
				'page_title' => 'home'
			);

			return $this->db->insert('ci_seo_data', $data);
		}else{
			
			$this->db->where('page_title', $pagename);
			$this->db->delete('ci_seo_data');
			
			$data = array(
				'meta_title' => $this->input->post('page_meta_title'),
				'meta_description' => $this->input->post('page_meta_description'),
				'meta_keywords' => $this->input->post('page_meta_keywords'),
				'page_title' => $pagename
			);

			return $this->db->insert('ci_seo_data', $data);
		}
    }
	
	public function get_all_pages()
	{
		$query = $this->db->get('ci_seo_data');
        return $query->result_array();
	}
}