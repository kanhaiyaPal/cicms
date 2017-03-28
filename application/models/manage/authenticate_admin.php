<?php
class Authenticate_admin extends CI_Model {

        public function __construct()
        {
			parent::__construct();
            $this->load->database();
        }
		
		public function get_admin_info()
		{
			$query = $this->db->get_where('ci_users',array('id'=> 1));
			return $query->row();
		}
		
		public function hash_password($password){
		   return password_hash($password, PASSWORD_BCRYPT);
		}
		
		public function verify_pass($password,$hash){
			return password_verify($password,$hash);
		}
		
		public function get_username_password($username = FALSE)
		{
			if($username){
				$query = $this->db->get_where('ci_users',array('username' => $username));
				return $query->row();
			}
		}
		
		public function check_username($username = False)
		{
			if($username){
				$query = $this->db->get_where('ci_users',array('username' => $username));
				return $query->num_rows();
			}
		}
}