<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_home_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('page_title' => 'home')); //home page meta-details are reserved
        return $query->row_array();
	}
	
	public function get_home_data()
	{
		$query = $this->db->get_where('ci_page_settings', array('page_id' => '1')); //home page details are reserved at id 1
		return $query->result_array();
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
	
	public function get_sitemenu()
	{
		$menu_html = '';
		$t_query = $this->db->get_where('ci_pages', array('public_status' => '1','parent_id' => '0'));
        $top_menu = $t_query->result_array();
		if(count($top_menu) > 0){
			foreach($top_menu as $menu){
				$menu_html .= '<li><a href="'.base_url().$menu['url'].'" >'.ucfirst($menu['title']).'</a>';
				$l_query = $this->db->get_where('ci_pages', array('public_status' => '1','parent_id' => $menu['id']));
				$inner_menu = $l_query->result_array();
				if(count($inner_menu) > 0){
					$menu_html .= '<ul class="wsmenu-submenu">';
					foreach($inner_menu as $imenu){
						$menu_html .= '<li><a href="'.base_url().$imenu['url'].'" >'.ucfirst($imenu['title']).'</a></li>';
					}
					$menu_html .= '</ul>';
				}
				echo '</li>';
			}
		}
		return $menu_html;
	}
	
	public function get_testimonials()
	{
		$t_query = $this->db->get('ci_testimonials');
        return $t_query->result_array();
	}
	
	/*contact us page functions*/
	public function get_contact_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('page_title' => 'contact')); //home page meta-details are reserved
        return $query->row_array();
	}
	
	public function get_contact_data()
	{
		$query = $this->db->get_where('ci_page_settings', array('page_id' => '2')); //home page details are reserved at id 1
		return $query->result_array();
	}
	
	/*Login page function*/
	public function get_login_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('page_title' => 'login')); //home page meta-details are reserved
        return $query->row_array();
	}
	
	/*Static Pages functions*/
	
	public function get_page_data($url = FALSE)
	{
		if($url){
			$query = $this->db->get_where('ci_pages', array('url' => $url)); //home page details are reserved at id 1
			return $query->row_array();
		}
		return false;
	}
	
	/*Visa Service Select Functions*/
	
	public function get_service_select_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('page_title' => 'service-select')); //home page meta-details are reserved
        return $query->row_array();
	}
	
	public function get_visa_service_details($id = FALSE)
	{
		if($id){
			$query = $this->db->get_where('Ci_visa_services', array('id' => $id)); 
			return $query->row_array();
		}
		return false;
	}
	
	/*Visa Form functions*/
	public function get_countries($id = FALSE)
	{
		if ($id === FALSE)
        {
            $query = $this->db->get('ci_localisation');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_localisation', array('id' => $id));
        return $query->row_array();
	}
	
	public function get_visa_services($id = FALSE)
	{
		if ($id === FALSE)
        {
            $query = $this->db->get_where('ci_visa_services',array('is_active'=> 1));
            return $query->result_array();
        }
 
        $query = $this->db->get_where('ci_visa_services', array('id' => $id,'is_active'=> 1 ));
        return $query->row_array();
	}
	
	public function get_visaapplication_meta()
	{
		$query = $this->db->get_where('ci_seo_data', array('page_title' => 'vapplication')); //vapplication page meta-details are reserved
        return $query->row_array();
	}
}