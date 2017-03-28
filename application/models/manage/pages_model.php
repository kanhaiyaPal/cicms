<?php
class Pages_model extends CI_Model {
	
	public $file_upld_config = '';
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
		$this->file_upld_config['upload_path'] = './uploads/pages';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
    }
    
    public function get_pages($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('ci_pages');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_pages', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_pages($id = 0)
    {
        $this->load->helper('url');
 
        $slug = url_title($this->input->post('page_title'), 'dash', TRUE);
 
        $data = array(
            'title' => $this->input->post('page_title'),
            'url' => $slug,
            'content' => $this->input->post('page_content'),
			'meta-description' => $this->input->post('page_description'),
			'meta-tags' => $this->input->post('page_tags'),
			'parent_id' => $this->input->post('page_parent'),
			'public_status' => $this->input->post('page_visibility')
        );
		
		$this->db->set('last_modified', 'NOW()', FALSE);
        
        if ($id == 0) {
			$this->db->insert('ci_pages', $data);
			$insert_id = $this->db->insert_id();
			$this->upload_page_images($insert_id);
        } else {
            $this->db->where('id', $id);
            $this->db->update('ci_pages', $data);
			$this->upload_page_images($id);
        }
    }
    
    public function delete_page($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ci_pages');
    }
	
	function upload_page_images($page_id)
	{
		if(isset($_FILES['page_images'])&&(!empty($_FILES['page_images']))){
			
			$uploadData = array();
			$this->load->library('upload', $this->file_upld_config);
			$filesCount = count($_FILES['page_images']['name']);
			for($i = 0; $i < $filesCount; $i++){
				$_FILES['userFile']['name'] = $_FILES['page_images']['name'][$i];
				$_FILES['userFile']['type'] = $_FILES['page_images']['type'][$i];
				$_FILES['userFile']['tmp_name'] = $_FILES['page_images']['tmp_name'][$i];
				$_FILES['userFile']['error'] = $_FILES['page_images']['error'][$i];
				$_FILES['userFile']['size'] = $_FILES['page_images']['size'][$i];

				if($this->upload->do_upload('userFile')){
					$fileData = $this->upload->data();
					$uploadData[$i]['file_name'] = $fileData['file_name'];
					$uploadData[$i]['full_path'] = $fileData['full_path'];
					$uploadData[$i]['file_type'] = $fileData['file_type'];
					
				}
			}
			//print_r($uploadData);
			foreach($uploadData as $data){
				$img_data = array(
					'media_name' => $data['file_name'],
					'media_path' => $data['full_path'],
					'media_type' => $data['file_type'],
					'page_id' => $page_id
				);
				$this->db->insert('ci_media', $img_data);
			}
			return true;
		}else{
			return false;
		}
	}
	
	function get_page_media($id)
	{
		$query = $this->db->get_where('ci_media', array('page_id' => $id));
        return $query->result_array();
	}
	
	public function get_enquiries($id = FALSE)
	{
		 if ($id === FALSE)
        {
            $query = $this->db->get('ci_inquiry');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_inquiry', array('id' => $id));
        return $query->row_array();
	}
	
	public function delete_inquiry($id = 0)
	{
		if($id){
			$this->db->where('id', $id);
			return $this->db->delete('ci_inquiry');
		}
	}
}