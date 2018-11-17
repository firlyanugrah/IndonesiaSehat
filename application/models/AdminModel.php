<?php

	class AdminModel extends CI_Model{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->load->helper('form');
			$this->load->helper('string');
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		
		public function getRandomId(){
			do{
				$id = random_string('numeric', 4);				
				$query = $this->db->query("SELECT * FROM ms_product WHERE id_product = '".$id."'");
				if($query->num_rows() == 0){
					return $id;
				}else{
					return false;
				}
			}while(false);
		}
		
		public function checkProduct($code){
			$query = $this->db->query("SELECT * FROM ms_product WHERE id = '".$code."'");
			if($query->num_rows() == 0){
				return true;
			}else{
				return false;
			}
		}
		
		public function insertProduct($data_product, $code){
			$dataList = array(
				'id' => $code,
				'id_brand' => $data_product['brand'],
				'id_type' => $data_product['type'],
				'id_product' => $data_product['id'],
				'name' => $data_product['name'],
				'brand' => $data_product['brandName'],
				'type' => $data_product['typeName'],
				'description' => $data_product['description'],
				'description_small' => $data_product['descriptionSmall'],
				'nutri_fact' => $data_product['nutriFact'],
				'image' => $data_product['image'],
				'flavour' => 'Cokelat',
				'quantity' => $data_product['quantity'],
				'price' => $data_product['price']				
			);
			
			$query = $this->db->insert('ms_product', $dataList);
		}
		
		public function updateAcc($pass, $id){
			$this->db->set('password', $pass);
			$this->db->where('username', $id);
			$this->db->update('ms_user');
		}
		
		public function delAccount($id){
			$this->db->set('status', 0);
			$this->db->where('username', $id);
			$this->db->update('ms_user');
		}
		
		public function updateProd($data){
			$this->db->set('description', $data['description']);
			$this->db->set('description_small', $data['descriptionS']);
			$this->db->set('image', $data['image']);
			$this->db->set('quantity', $data['quantity']);
			$this->db->set('price', $data['price']);
			$this->db->where('id', $data['id']);
			$this->db->update('ms_product');
		}
		
		public function delProduct($id){
			$this->db->set('status', 0);
			$this->db->where('id', $id);
			$this->db->update('ms_product');
		}
		
		public function lunas($id){
			$this->db->set('status', 'paid');
			$this->db->where('id', $id);
			$this->db->update('header_transaction');
			
			$this->db->set('status', 'on process');
			$this->db->where('id_transaction', $id);
			$this->db->update('delivery');
		}
		
		public function batal($id){
			$this->db->set('status', 'canceled');
			$this->db->where('id', $id);
			$this->db->update('header_transaction');
			
			$this->db->set('status', 'none');
			$this->db->where('id_transaction', $id);
			$this->db->update('delivery');
		}
		
		public function kirim($id){
			$this->db->set('status', 'on the way');
			$this->db->where('id_transaction', $id);
			$this->db->update('delivery');
		}
		
		public function sampai($id){
			$this->db->set('status', 'delivered');
			$this->db->where('id_transaction', $id);
			$this->db->update('delivery');
		}
	}