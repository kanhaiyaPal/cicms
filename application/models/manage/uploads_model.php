<?php
class Uploads_model extends CI_Model {
	
	public $file_upld_config = '';
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
		$this->file_upld_config['upload_path'] = './uploads/pages';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
    }
    
    function get_media_name($id){
		$query = $this->db->get_where('ci_media', array('id' => $id));
        return $query->row_array();
	}
	
	function delete_media($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('ci_media');
    }
}