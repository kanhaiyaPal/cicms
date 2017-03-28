<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function create_user()
	{
		//create profile
		$profile_data = array(
			'firstname' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
		);
		
		$this->db->insert('ci_profiles', $profile_data);
		$profile_id = $this->db->insert_id();
		
		//generate password
		$pass_key = $this->generate_passcode(8); //8 digit passcode
		$this->load->model('manage/authenticate_admin');
		
		
		//save in users table
		$user_data = array(
			'username' => $this->input->post('mobile'),
			'password' => $this->authenticate_admin->hash_password($pass_key),
			'email' => $this->input->post('email'),
			'profile_id' => $profile_id
		);
		$this->db->insert('ci_users', $user_data);
		
		//send mail
		$this->load->library('email');

		$this->email->from('no-reply@evisasonline.com', 'Evisas Online');
		$this->email->to($this->input->post('email'));
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Evisas Online Registration');
		$this->email->message('Dear '.$this->input->post('name').',<br/><br/> Thank you for registering with Evisas Online, You can login via following credentials:<br/> Username : '.$this->input->post('mobile').' <br/> Password : '.$pass_key.'<br/><small>It is advised that you change your password once you log in for first time.</small><br/></br> Thanks and Regards</br>Team Evisas Online');

		$this->email->send();
			
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
	
}