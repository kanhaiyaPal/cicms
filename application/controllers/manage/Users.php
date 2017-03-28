<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function showall()
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			$this->load->model('manage/users_model'); 
			
			$data['title'] = ucfirst('all registered users'); 
			$data['sidebar'] = $this->load->view('manage/templates/admin_sidebar', $data, true);
			$data['page_data'] = $this->users_model->get_users();
		
			$this->load->view('manage/templates/admin_header', $data);
			$this->load->view('manage/show_all_users', $data);
			$this->load->view('manage/templates/admin_footer', $data);
		}else{
			redirect('manage/pages/view');
		}
	}
	
	public function delete_user($id = FALSE)
	{
		if(isset($this->session->adminsession)&& ($this->session->adminsession != ''))
		{
			if($id){
				$this->load->model('manage/users_model'); 
				$this->users_model->delete_user($id);
			}
		}else{
			redirect('manage/pages/view');
		}
	}
}