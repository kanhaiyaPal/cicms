<?php
class Testimonials_model extends CI_Model {
	
	public $file_upld_config = '';
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
		
		$this->file_upld_config['upload_path'] = './uploads/testimonials';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png|bmp';
        $this->file_upld_config['encrypt_name'] = TRUE;
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
		$this->load->library('upload'); //load the library
		$this->upload->initialize($this->file_upld_config);
		
		$testimonial_pic = '';
		if ($id == 0) {
			if ((isset($_FILES['t_file'])) && (!empty($_FILES['t_file']['name']))) {
				if($this->upload->do_upload('t_file')){
					$fileData = $this->upload->data();
					$testimonial_pic = $fileData['file_name'];
				}
			}
		}else{
			if(isset($_POST['pro-testimonial-img'])){
				$testimonial_pic = $this->input->post('pro-testimonial-img');
			}else{
				if((isset($_FILES['file_new_image'])) && (!empty($_FILES['file_new_image']['name']))){
					if($this->upload->do_upload('file_new_image')){
						$fileData = $this->upload->data();
						$testimonial_pic = $fileData['file_name'];
					}
				}
			}
		}
				
		$data = array(
            'title' => $this->input->post('testimonial_title'),
			'company' => $this->input->post('t_company'),
			'designation' => $this->input->post('t_designation'),
            'content' => $this->input->post('testimonial_content'),
			'image' =>	$testimonial_pic,
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
	
	public function remove_image($t_id = 0)
	{
		if($t_id != 0){
			$wh_array = array('image' => '');
		
			$this->db->where('id', $t_id);
			return $this->db->update('ci_testimonials', $wh_array);
		}
	}
	
}