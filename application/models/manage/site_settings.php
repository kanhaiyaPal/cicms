<?php
/* 
Available setting name for db
site_logo
site_phone
site_address
site_email
site_footer_disclaimer
site_footer_facebook
site_footer_twitter
site_footer_instagram
site_footer_googleplus
site_footer_pinterest
site_footer_linkedin
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Site_settings extends CI_Model {
	
    public $file_upld_config = '';
	public function __construct()
    {
		parent::__construct();
        $this->load->database();
		$this->file_upld_config['upload_path'] = './uploads/admin';
		$this->file_upld_config['allowed_types'] = 'gif|jpg|png';
        $this->file_upld_config['encrypt_name'] = TRUE;
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
    
    public function set_settings($settingname = FALSE,$settingvalue = FALSE)
    {
		if($settingname){
			if($settingvalue){
				$data = array(
					'setting_name' => $settingname,
					'setting_value' => $settingvalue
				);
				
				$this->db->where('setting_name', $settingname);
				$this->db->delete('ci_sitesettings');
				$this->db->insert('ci_sitesettings', $data);
				return true;
			}
		}
    }
	
	public function set_logo(){
		$this->load->library('upload', $this->file_upld_config);

		if($this->upload->do_upload('site_logo')){
			$fileData = $this->upload->data();
		}else{
			$fileData = FALSE;
		}
		
		if($fileData){
			$this->set_settings('site_logo',$fileData['file_name']);
			//$fileData['full_path']; can be used in future
			//$fileData['file_type']; can be used in future
			return true;
		}
		return false;
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