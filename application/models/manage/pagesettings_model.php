<?php
class Pagesettings_model extends CI_Model {

	public $file_upld_config = '';	
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
		$this->file_upld_config['upload_path'] = './uploads/admin';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
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
		
		if($id == 3){
			//Visa Steps Page Setting
			
			$this->load->library('upload', $this->file_upld_config);
			$step_1_imgnm = '';
			if(isset($_FILES['step_1_image'])&&($_FILES['step_1_image']['name'] != '')){
				if($this->upload->do_upload('step_1_image')){
					$fileData = $this->upload->data();
					$step_1_imgnm = $fileData['file_name'];
				}
			}else{ $step_1_imgnm = $this->input->post('old_step_1_image'); }
			$step_2_imgnm = '';
			if(isset($_FILES['step_2_image'])&&($_FILES['step_2_image']['name'] != '')){
				if($this->upload->do_upload('step_2_image')){
					$fileData = $this->upload->data();
					$step_2_imgnm = $fileData['file_name'];
				}
			}else{ $step_2_imgnm = $this->input->post('old_step_2_image'); }
			$step_3_imgnm = '';
			if(isset($_FILES['step_3_image'])&&($_FILES['step_3_image']['name'] != '')){
				if($this->upload->do_upload('step_3_image')){
					$fileData = $this->upload->data();
					$step_3_imgnm = $fileData['file_name'];
				}
			}else{ $step_3_imgnm = $this->input->post('old_step_3_image'); }
			$step_4_imgnm = '';
			if(isset($_FILES['step_4_image'])&&($_FILES['step_4_image']['name'] != '')){
				if($this->upload->do_upload('step_4_image')){
					$fileData = $this->upload->data();
					$step_4_imgnm = $fileData['file_name'];
				}
			}else{ $step_4_imgnm = $this->input->post('old_step_4_image'); }
			$step_5_imgnm = '';
			if(isset($_FILES['step_5_image'])&&($_FILES['step_5_image']['name'] != '')){
				if($this->upload->do_upload('step_5_image')){
					$fileData = $this->upload->data();
					$step_5_imgnm = $fileData['file_name'];
				}
			}else{ $step_5_imgnm = $this->input->post('old_step_5_image'); }
			
			$this->db->where('page_id', $id);
			$this->db->delete('ci_page_settings');
			
			$data = array(
			   array(
				  'setting_name' => 'step_1_image',
				  'setting_val' => $step_1_imgnm,
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_2_image',
				  'setting_val' => $step_2_imgnm,
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_3_image',
				  'setting_val' => $step_3_imgnm,
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_4_image',
				  'setting_val' => $step_4_imgnm,
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_5_image',
				  'setting_val' => $step_5_imgnm,
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_1_title',
				  'setting_val' => $this->input->post('step_1_title'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_2_title',
				  'setting_val' => $this->input->post('step_2_title'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_3_title',
				  'setting_val' => $this->input->post('step_3_title'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_4_title',
				  'setting_val' => $this->input->post('step_4_title'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_5_title',
				  'setting_val' => $this->input->post('step_5_title'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_1_content',
				  'setting_val' => $this->input->post('step_1_content'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_2_content',
				  'setting_val' => $this->input->post('step_2_content'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_3_content',
				  'setting_val' => $this->input->post('step_3_content'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_4_content',
				  'setting_val' => $this->input->post('step_4_content'),
				  'page_id' => 3
			   ),
			   array(
				  'setting_name' => 'step_5_content',
				  'setting_val' => $this->input->post('step_5_content'),
				  'page_id' => 3
			   )
			);

			return $this->db->insert_batch('ci_page_settings', $data);
		}
    }
}