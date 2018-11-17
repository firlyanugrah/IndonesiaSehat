<?php

	class TransModel extends CI_Model{
		
		public function __construct(){
			
			parent::__construct();			
			$this->load->database();
			$this->load->helper('form');
			$this->load->helper('string');
			$this->load->library('form_validation');
			$this->load->library('session');
		}
		
		/*public function getIdAcc(){
			$query = $this->db->get_where('ms_user', array('username' => $_SESSION['id']));
			$result = $query->row();	
			return $result->id;		
		}
		
		public function getCountTrans(){
			$query = $this->db->get_where('ms_user', array('username' => $_SESSION['id']));
			$result = $query->row();
			return $result->transaction_count;
		}*/
		
		public function checkIdTrans($arr){
			$query = $this->db->get_where('header_transaction', array('id' => $arr['id_transaction']));
			date_default_timezone_set("Asia/Bangkok");
			if($query->num_rows() == 0){
				$arr = array(
					'id' => $arr['id_transaction'],
					'jumlah_barang' => 0,
					'date_transaction' => date('d-m-Y'),
					'delivery_to' => "-",
					'delivery_city' => "Pilih Kota",
					'delivery_fee' => 0,
					'total_payment' => 0,
					'status' => 'unpaid'
				);
				$this->db->insert('header_transaction', $arr);
			}
		}
		
		public function checkDelivery($arr){
			$query = $this->db->get_where('delivery', array('id_transaction' => $arr['id_transaction']));
			if($query->num_rows() == 0){
				$arr = array(
					'id_transaction' => $arr['id_transaction'],
					'status' => "none",
					'delivery_date' => "-"
				);
				$this->db->insert('delivery', $arr);
			}
		}
		
		public function checkCart($arr){
			$query = $this->db->get_where('product_transaction', array('id_transaction' => $arr['id_transaction'], 'product_code' => $arr['product_code']));
			if($query->num_rows() != 0){
				return true;
			}else{
				return false;
			}
		}
		
		public function updateCart($arr){
			$this->db->set('jumlah', $arr['jumlah']);
			$this->db->set('payment', $arr['payment']);
			$this->db->where('id_transaction', $arr['id_transaction']);
			$this->db->update('product_transaction');
		}
		
		public function reupdateTransaction($arr){
			$query = $this->db->get_where('product_transaction', array('id_transaction' => $arr['id_transaction'], 'product_code' => $arr['product_code']));
			$result = $query->row();
			
			$query2 = $this->db->get_where('header_transaction', array('id' => $arr['id_transaction']));
			$result2 = $query2->row();
			
			$jumlah = $result2->jumlah_barang - $result->jumlah;
			$payment = $result2->total_payment - $result->payment;
			$this->db->set('jumlah_barang', $jumlah);
			$this->db->set('total_payment', $payment);
			$this->db->where('id', $arr['id_transaction']);
			$this->db->update('header_transaction');
		}
		
		public function addCart($arr){			
			$this->db->insert('product_transaction', $arr);
		}
		
		public function updateTransaction($arr){
			$query = $this->db->get_where('header_transaction', array('id' => $arr['id_transaction']));
			if($query->num_rows() != 0){
				$query2 = $this->db->get_where('product_transaction', array('id_transaction' => $arr['id_transaction']));
				$count = $query2->num_rows();
				$result = $query->row();
				$jumlah = $arr['jumlah'] + $result->jumlah_barang;
				$payment = $arr['payment'] + $result->total_payment;
				$this->db->set('jumlah_barang', $jumlah);
				$this->db->set('total_payment', $payment);
				$this->db->set('jenis_barang', $count);
				$this->db->where('id', $arr['id_transaction']);
				$this->db->update('header_transaction');
			}
		}
		
		public function payTransaction($arr){
			$query = $this->db->get_where('header_transaction', array('id' => $_SESSION['transaction']));
			if($query->num_rows() != 0){
				$this->db->set('delivery_to', $arr['address']);
				$this->db->set('delivery_city', $arr['city']);
				$this->db->set('delivery_fee', $arr['fee']);
				$this->db->where('id', $_SESSION['transaction']);
				$this->db->update('header_transaction');
			}
			
			$query2 = $this->db->get_where('ms_user', array('username' => $_SESSION['id']));
			if($query2->num_rows() != 0){
				$result = $query2->row();
				$count = $result->transaction_count + 1;
				
				$this->db->set('transaction_count', $count);
				$this->db->where('username', $_SESSION['id']);
				$this->db->update('ms_user');
			}
		}
		
		public function delProduct($id, $product){
			$query = $this->db->get_where('product_transaction', array('id_transaction' => $id, 'product_code' => $product));
			$result = $query->row();
			
			if($query->num_rows() != 0){
				$query2 = $this->db->get_where('header_transaction', array('id' => $id));
				$result2 = $query2->row();
				
				$jumlah = $result2->jumlah_barang - $result->jumlah;
				$payment = $result2->total_payment - $result->payment;
				$count = $result2->jenis_barang - 1;
				
				$this->db->set('jumlah_barang', $jumlah);
				$this->db->set('total_payment', $payment);
				$this->db->set('jenis_barang', $count);
				$this->db->where('id', $id);
				$this->db->update('header_transaction');
				
				$this->db->where('id_transaction', $id);
				$this->db->where('product_code', $product);
				$this->db->delete('product_transaction');
			}
		}
		
		public function delCart($id){
			$query = $this->db->get_where('product_transaction', array('id_transaction' => $id));
			
			if($query->num_rows() != 0){
				$this->db->where('id_transaction', $id);
				$this->db->delete('product_transaction');
				
				$this->db->set('jumlah_barang', 0);
				$this->db->set('total_payment', 0);
				$this->db->set('jenis_barang', 0);
				$this->db->where('id', $id);
				$this->db->update('header_transaction');
			}
		}
		
		public function addConfirm($arr){
			$this->db->insert('confirmation', $arr);
		}
		
		public function newTransaction(){
			$query = $this->db->get_where('ms_user', array('username' => $_SESSION['id']));
			
			if($query->num_rows() != 0){
				$result = $query->row();
				$new = $result->id.$result->transaction_count;
			}
			
			return $new;
		}
	}