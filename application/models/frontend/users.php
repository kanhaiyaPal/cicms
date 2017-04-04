<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function create_user()
	{
		$u_firstname = '';
		$u_mobile = '';
		$u_mail = '';
		$u_lastname = '';
		$u_address = '';
		
		$profile_data = array();
		
		if(NULL !== $this->input->post('input-applicant-firstname'))
		{
			$u_firstname = $this->input->post('input-applicant-firstname');
			$u_lastname = $this->input->post('input-applicant-lastname');
			$u_mobile = $this->input->post('input-current-mobile');
			$u_mail = $this->input->post('input-email');
			$u_address = $this->input->post('text-current-address');
			
			//create profile
			$profile_data = array(
				'firstname' => $u_firstname,
				'lastname' => $u_lastname,
				'mobile' => $u_mobile,
				'address' => $u_address,
			);
		}else{
			$u_firstname = $this->input->post('name');
			$u_mobile = $this->input->post('mobile');
			$u_mail = $this->input->post('email');
			
			//create profile
			$profile_data = array(
				'firstname' => $u_firstname,
				'mobile' => $u_mobile,
			);
		}
		
		
		
		$this->db->insert('ci_profiles', $profile_data);
		$profile_id = $this->db->insert_id();
		
		//generate password
		$pass_key = $this->generate_passcode(8); //8 digit passcode
		$this->load->model('manage/authenticate_admin');
		
		
		//save in users table
		$user_data = array(
			'username' => $u_mobile,
			'password' => $this->authenticate_admin->hash_password($pass_key),
			'email' => $u_mail,
			'profile_id' => $profile_id
		);
		$this->db->insert('ci_users', $user_data);
		$user_id = $this->db->insert_id();
		
		//send mail
		$this->load->library('email');
		$this->email->set_mailtype('html');
		$this->email->from('no-reply@evisasonline.com', 'Evisas Online');
		$this->email->to($u_mail);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Evisas Online Registration');
		$this->email->message('Dear '.$u_firstname.',<br/><br/> Thank you for registering with Evisas Online, You can login via following credentials:<br/> Username : <strong>'.$u_mobile.'</strong> <br/> Password : <strong>'.$pass_key.'</strong><br/><small>It is advised that you change your password once you log in for first time.</small><br/></br> Thanks and Regards</br>Team Evisas Online');

		$this->email->send();
		
		return $user_id;
	}
	
	function generate_passcode($random_string_length)
	{
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		
		$string = '';
		$max = strlen($characters) - 1;
		for ($i = 0; $i < (int)$random_string_length; $i++) {
		  $string .= $characters[mt_rand(0, $max)];
		}
		return $string;
	}
	
	function update_user_last_login()
	{
		$this->db->set('last_login', 'NOW()', FALSE);
		$this->db->where('username', $this->session->usersession['user']);
        $this->db->update('ci_users');
	}
	
	public function get_user_info($user_id = 0)
	{
		if($user_id){
			$ret_array = array();
			$query = $this->db->get_where('ci_users',array('id' => $this->session->usersession['user_id']));
			$user_tb = $query->row_array();
			$query_p = $this->db->get_where('ci_profiles',array('id' => $this->session->usersession['profile_id']));
			$user_pr = $query_p->row_array();
			
			return array_merge($user_tb,$user_pr);
		}
	}
}