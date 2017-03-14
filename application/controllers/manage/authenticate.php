<?php
class Authenticate extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function admin()
	{
		$this->load->model('manage/Authenticate_admin'); 
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('manage/pages/admin_login');
		}
		else
		{
			$admin_data = $this->authenticate_admin->get_admin_info();
			//create session and redirect to dashboard
			if($this->input->post('username') == $admin_data[0]->username){
				if($this->authenticate_admin->hash_password($this->input->post('pass')) == $admin_data[0]->password){
					$this->session->userdata->adminsession = array('user'=>'Admin','email'=>$admin_data[0]->email);
					redirect('manage/pages/view');
				}else{
					$this->form_validation->set_message('pass', 'Incorrect Password');
				}
			}else{ 
				$this->form_validation->set_message('username', 'Incorrect Username/Password');
			}
			$data['title'] = ucfirst('login'); // Capitalize the first letter
			$data['body_class'] = 'login-bg';
			
			$this->load->view('manage/templates/header', $data);
			$this->load->view('manage/login', $data);
			$this->load->view('manage/templates/footer', $data);
		}
	}
}