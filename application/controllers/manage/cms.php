<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function page_settings()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/pagesettings_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			if( ! file_exists(APPPATH.'views/manage/page_setting.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('manage cms content'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['editor_on'] = 'show';
			
			$this->form_validation->set_rules('home_top_summary', 'Home Top Summary', 'trim|required');
			$this->form_validation->set_rules('home_bottom_summary', 'Home Bottom Summary', 'trim|required');
			$this->form_validation->set_rules('home_feature_block', 'Home Features Block', 'trim|required');
			
			if(!($this->form_validation->run() === FALSE)){
				$this->pagesettings_model->set_settings();
				$this->pagesettings_model->set_settings('2');
				$this->session->set_flashdata('setting_updated', 'Settings Updated Successfully');
				redirect("manage/cms/page_settings");
			}
			
			//load homepage setting from db
			$home_data_ar = $this->pagesettings_model->get_settings();
			
			$data['home_top_sum'] = '';
			$data['home_bot_sum'] = '';
			$data['home_fet_blk'] = '';
			
			$data['contact_g_map'] = '';
			
			foreach($home_data_ar as $fr){
				if($fr['setting_name'] == 'home_top_summary'){
					$data['home_top_sum'] = $fr['setting_val'];
				}
				if($fr['setting_name'] == 'home_bottom_summary'){
					$data['home_bot_sum'] = $fr['setting_val'];
				}
				if($fr['setting_name'] == 'home_feature_block'){
					$data['home_fet_blk'] = $fr['setting_val'];
				}
			}
			
			$contact_data_ar = $this->pagesettings_model->get_settings('2'); /*ID:2 is for Contact Us page*/
			
			foreach($contact_data_ar as $fr){
				if($fr['setting_name'] == 'contact_google_map'){
					$data['contact_g_map'] = $fr['setting_val'];
				}
			}

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/page_setting', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function seo_management()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/seomanagement_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			/*for ajax call*/
			if($this->input->post('title') != NULL){
				$meta_rs = $this->seomanagement_model->get_details($this->input->post('title'));
				echo json_encode($meta_rs);
				return true;
			}
			
			if( ! file_exists(APPPATH.'views/manage/seo_management.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('Seo Mangement'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['seo_js'] = 'show';
			$data['data_pages'] = $this->seomanagement_model->get_all_pages();
			
			$this->form_validation->set_rules('page_meta_title', 'Meta Title', 'trim|required');
			$this->form_validation->set_rules('page_meta_description', 'Meta Description', 'trim|required');
			$this->form_validation->set_rules('page_meta_keywords', 'Meta Keywords', 'trim|required');
			if(!($this->form_validation->run() === FALSE)){
				$this->seomanagement_model->set_details($this->input->post('selected_seo_page'));
				$this->session->set_flashdata('setting_updated', 'Setting Updated Successfully');
				redirect("manage/cms/seo_management");
			}
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/seo_management', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function delete($id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if(($id != '')&& ((int)$id != 0))
			{
				$id = (int)$id;
				$this->load->model('manage/testimonials_model'); 
				$this->testimonials_model->delete_testimonials($id);
				$this->session->set_flashdata('testimonial_delete_success', 'Testimonial deleted successfully');
				redirect("manage/testimonials/showall");
			}
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function update($id = 0)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if(($id != '')&& ((int)$id != 0))
			{
				$id = (int)$id;
				$this->load->model('manage/testimonials_model'); 
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$data['title'] = ucfirst('update Testimonial data'); 
				$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
				$data['editor_on'] = 'show';
				$data['return_url'] = base_url('/manage/testimonials/showall');
				$data['testimonial_data'] = $this->testimonials_model->get_testimonials($id);
				
				$this->form_validation->set_rules('testimonial_title', 'Testimonial Title', 'trim|required');
				$this->form_validation->set_rules('testimonial_content', 'Testimonial Content', 'trim|required');
				
				if(!($this->form_validation->run() === FALSE)){
					$this->testimonials_model->set_testimonials($id);
					$this->session->set_flashdata('testimonial_update_success', 'Testimonial updated successfully');
					redirect("manage/testimonials/showall");
				}
				
				$this->load->view('manage/templates/admin_header', $data);
				$this->load->view('manage/update_testimonial', $data);
				$this->load->view('manage/templates/admin_footer', $data);
				
				
			}
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function parts_management()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/site_settings');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['title'] = ucfirst('Update Site Settings'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['editor_on'] = 'show';
			$data['logo_select_up'] = 'show';
			
			if(isset($_POST['form_marker'])){
				
				if(isset($_FILES['site_logo'])&&(!empty($_FILES['site_logo']))){
					$this->site_settings->set_logo();
				}
				if($this->input->post('site_email') != ''){
					$this->site_settings->set_settings('site_email',$this->input->post('site_email'));
				}
				if($this->input->post('site_phone') != ''){
					$this->site_settings->set_settings('site_phone',$this->input->post('site_phone'));
				}
				if($this->input->post('site_address') != ''){
					$this->site_settings->set_settings('site_address',$this->input->post('site_address'));
				}
				
				if($this->input->post('site_footer_facebook') != ''){
					$this->site_settings->set_settings('site_footer_facebook',$this->input->post('site_footer_facebook'));
				}
				if($this->input->post('site_footer_twitter') != ''){
					$this->site_settings->set_settings('site_footer_twitter',$this->input->post('site_footer_twitter'));
				}
				if($this->input->post('site_footer_instagram') != ''){
					$this->site_settings->set_settings('site_footer_instagram',$this->input->post('site_footer_instagram'));
				}
				if($this->input->post('site_footer_googleplus') != ''){
					$this->site_settings->set_settings('site_footer_googleplus',$this->input->post('site_footer_googleplus'));
				}
				if($this->input->post('site_footer_pinterest') != ''){
					$this->site_settings->set_settings('site_footer_pinterest',$this->input->post('site_footer_pinterest'));
				}
				if($this->input->post('site_footer_linkedin') != ''){
					$this->site_settings->set_settings('site_footer_linkedin',$this->input->post('site_footer_linkedin'));
				}
				
				if($this->input->post('site_footer_disclaimer') != ''){
					$this->site_settings->set_settings('site_footer_disclaimer',$this->input->post('site_footer_disclaimer'));
				}
				
				$this->session->set_flashdata('site_setting_updated', 'Site Settings updated successfully');
				redirect("manage/cms/parts_management");
			}
			
			$site_logo = $this->site_settings->get_settings('site_logo');
			if(strlen($site_logo['setting_value']) > 0){
				$data['site_logo'] = $site_logo['setting_value'];
			}
			$data['site_email'] = $this->site_settings->get_settings('site_email')['setting_value'];
			$data['site_phone'] = $this->site_settings->get_settings('site_phone')['setting_value'];
			$data['site_address'] = $this->site_settings->get_settings('site_address')['setting_value'];
			$data['site_footer_facebook'] = $this->site_settings->get_settings('site_footer_facebook')['setting_value'];
			$data['site_footer_twitter'] = $this->site_settings->get_settings('site_footer_twitter')['setting_value'];
			$data['site_footer_linkedin'] = $this->site_settings->get_settings('site_footer_linkedin')['setting_value'];
			$data['site_footer_pinterest'] = $this->site_settings->get_settings('site_footer_pinterest')['setting_value'];
			$data['site_footer_instagram'] = $this->site_settings->get_settings('site_footer_instagram')['setting_value'];
			$data['site_footer_googleplus'] = $this->site_settings->get_settings('site_footer_googleplus')['setting_value'];
			$data['site_footer_disclaimer'] = $this->site_settings->get_settings('site_footer_disclaimer')['setting_value'];
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/site_settings', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function logo_delete()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/site_settings');
			$md_file = $this->site_settings->get_settings('site_logo');		
			$target = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'admin'. DIRECTORY_SEPARATOR . $md_file['setting_value'];
			unlink($target);
			$this->site_settings->remove_logo();
			echo '{}';
			return;
		}else{
			redirect("manage/pages/view");
		}
	}
}