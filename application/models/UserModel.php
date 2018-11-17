<?php
	class UserModel extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		
		public function checkLogin($username, $password){
			$query = $this->db->query("SELECT * FROM ms_user WHERE username = '".$username."' AND password = '".$password."'");
			if($query->num_rows() == 1){
				$result = $query->row();
				if($result->status == 1){
					return true;
				}else{
					return "deleted";
				}
			}else{
				return false;
			}
		}
		
		public function dataLogin($username, $password){
			$query = $this->db->query("SELECT * FROM ms_user WHERE username = '".$username."' AND password = '".$password."'");
			return $query->row();
		}
		
		public function checkData($username){
			$query = $this->db->query("SELECT * FROM ms_user WHERE username = '".$username."'");
			if($query->num_rows() == 0){
				return true;
			}else{
				return false;
			}
		}
		
		public function insertData($fName, $lName, $username, $password, $telp){
			$dataList = array(
				'first_name' => $fName,
				'last_name' => $lName,
				'username' => $username,
				'password' => $password,
				'phone' => $telp
			);
			$query = $this->db->insert('ms_user', $dataList);
		}
	}