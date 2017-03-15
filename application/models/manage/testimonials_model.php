<?php
class Testimonials_model extends CI_Model {
	
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
    }
    
    public function get_testimonials($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query =  $this->db->order_by('order_s', 'ASC')->get('ci_testimonials');
            return $query->result_array();
        }
 
        $query = $this->db->order_by('order_s', 'ASC')->get_where('ci_testimonials', array('id' => $id));
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
    
    public function delete_testimonials($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ci_testimonials');
    }
		
}