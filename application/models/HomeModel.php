<?php
	class HomeModel extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			
			$this->load->helper('string');

		}
		
		public function getDataBrands(){
			$query = $this->db->get('ms_brand');
			return $query->result();
		}	
		
		public function getDataProducts(){
			$query = $this->db->get('ms_product');
			return $query->result();
		}
		
		public function getDataTypeProducts(){
			$query = $this->db->get('ms_typeProduct');
			return $query->result();
		}
		
		public function getDataUsers(){
			$query = $this->db->query("SELECT * FROM ms_user");
			return $query->result();
		}
		
		public function getDataTransactions(){
			$query = $this->db->query("SELECT * FROM header_transaction");
			return $query->result();
		}
		
		public function getDataReviews(){
			$query = $this->db->query("SELECT * FROM review");
			return $query->result();
		}
		
		public function countDataTransactions(){
			$query = $this->db->query("SELECT * FROM header_transaction WHERE id = '".$_SESSION['transaction']."'");
			if($query->num_rows() != 0){
				$result = $query->row();
				return $result->jenis_barang;
			}else return 0;
		}
		
		public function getDataProductTransactions(){
			$query = $this->db->query("SELECT * FROM product_transaction");
			return $query->result();
		}
		
		public function getDataDeliverys(){
			$query = $this->db->query("SELECT * FROM delivery");
			return $query->result();
		}
		
		public function getDataCitys(){
			$query = $this->db->query("SELECT * FROM ms_city");
			return $query->result();
		}
		
		public function getDataProduct($detail){
			$query = $this->db->query("SELECT * FROM ms_product WHERE id = RIGHT('".$detail."', 10)");
			return $query->row();
		}
		
		public function getDataProductType($type){
			$query = $this->db->query("SELECT * FROM ms_product WHERE type = '".$type."'");
			return $query->result();
		}
		
		public function checkDataTypeProduct($type){
			$query = $this->db->query("SELECT * FROM ms_typeProduct WHERE name = '".$type."'");
			if($query->num_rows() == 0){
				show_404();
			}
		}
		
		public function getDataUser($id){
			$query = $this->db->query("SELECT * FROM ms_user WHERE username = '".$id."'");
			return $query->row();
		}
		
		public function checkDataProduct($detail){
			$query = $this->db->query("SELECT * FROM ms_product WHERE id = RIGHT('".$detail."', 10)");
			if($query->num_rows() == 0){
				show_404();
			}
		}
		
		public function updateProfile($arr){
			$this->db->set('first_name', $arr['first_name']);
			$this->db->set('last_name', $arr['last_name']);
			$this->db->set('password', $arr['password']);
			$this->db->set('address', $arr['address']);
			$this->db->set('city', $arr['city']);
			$this->db->set('postal_code', $arr['postal_code']);
			$this->db->set('phone', $arr['phone']);
			$this->db->where('username', $_SESSION['id']);
			$this->db->update('ms_user');
		}
	}