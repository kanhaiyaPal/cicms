<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testimonials extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function showall()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/testimonials_model');
			
			if( ! file_exists(APPPATH.'views/manage/show_testimonials.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('manage testimonials'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['pages_script'] = 'show';
			$data['testimonial_data'] = $this->testimonials_model->get_testimonials();

			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/show_testimonials', $data);
			$this->load->view('manage/templates/admin_footer', $data);
			
		}else{
			redirect("manage/pages/view");
		}
	}
	
	public function add_new()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/testimonials_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			if( ! file_exists(APPPATH.'views/manage/new_testimonial.php'))
			{
				show_404();
			}
			
			$data['title'] = ucfirst('Add testimonial'); // Capitalize the first letter
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['editor_on'] = 'show';
			$data['return_url'] = base_url('/manage/testimonials/showall');
			
			$this->form_validation->set_rules('testimonial_title', 'Testimonial Title', 'trim|required');
			$this->form_validation->set_rules('testimonial_content', 'Testimonial Content', 'trim|required');
			$this->form_validation->set_rules('t_company', 'Testimonial Company', 'trim|required');
			$this->form_validation->set_rules('t_designation', 'Testimonial Designation', 'trim|required');
			
			if(!($this->form_validation->run() === FALSE)){
				$this->testimonials_model->set_testimonials();
				$this->session->set_flashdata('testimonial_created', 'Testimonial Created Successfully');
				redirect("manage/testimonials/showall");
			}
			
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/new_testimonial', $data);
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
	
	public function delete_testimonial_image()
	{
		$this->load->model('manage/testimonials_model'); 
		
		$t_file = $this->input->post('file');
		$t_id = $this->input->post('id');
		
		$d_file = APPPATH.'..'. DIRECTORY_SEPARATOR .'uploads'. DIRECTORY_SEPARATOR .'testimonials'. DIRECTORY_SEPARATOR . $t_file;
		unlink($d_file);
		
		$this->testimonials_model->remove_image($t_id);
		
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
}