<?php

	class Admin extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('HomeModel');
			$this->load->model('AdminModel');
		}
		
		public function doInsertProduct(){
			$data_product = array(
				'type' => $this->input->post('type'),
				'typeName' => $this->input->post('typeName'),
				'brand' => $this->input->post('brand'),
				'brandName' => $this->input->post('brandName'),
				'id' => $this->AdminModel->getRandomId(),
				'name' => $this->input->post('product'),
				'description' => $this->input->post('description'),
				'descriptionSmall' => $this->input->post('descriptionS'),
				'nutriFact' => $this->input->post('nutriFact'),
				'image' => $this->input->post('image'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price')
			);
			
			$code = $data_product['brand'].$data_product['type'].$data_product['id'];
			
			$this->AdminModel->checkProduct($code);
			$this->AdminModel->insertProduct($data_product, $code);
		}
		
		public function updAccount(){
			$data['users'] = $this->HomeModel->getDataUsers();
			
			$data['title'] = "Kelola Akun";
			
			$this->load->view('administrator/header', $data);
			$this->load->view('administrator/uAccount', $data);
			$this->load->view('administrator/footer');
		}
		
		public function updateAcc(){
			$pass = $_REQUEST['password'];
			$id = $_REQUEST['username'];
			$this->AdminModel->updateAcc($pass, $id);
			
			redirect(base_url("dashboard/daftar%20akun"));
		}
		
		public function delAccount(){
			$id = $_REQUEST['username'];
			$this->AdminModel->delAccount($id);
			
			redirect(base_url("dashboard/daftar%20akun"));
		}
		
		public function updProduct(){
			$data['products'] = $this->HomeModel->getDataProducts();
			
			$data['title'] = "Kelola Produk";
			
			$this->load->view('administrator/header', $data);
			$this->load->view('administrator/uProduct', $data);
			$this->load->view('administrator/footer');
		}
		
		public function updateProd(){
			$data = array(
				'id' => $_REQUEST['id'],
				'description' => $_REQUEST['description'],
				'descriptionS' => $_REQUEST['descriptionS'],
				'image' => $_REQUEST['image'],
				'quantity' => $_REQUEST['quantity'],
				'price' => $_REQUEST['price']
			);
			$this->AdminModel->updateProd($data);
			
			redirect(base_url("dashboard/daftar%20produk"));
		}
		
		public function delProduct(){
			$id = $_REQUEST['id'];
			$this->AdminModel->delProduct($id);
			
			redirect(base_url("dashboard/daftar%20produk"));
		}
		
		public function lunas(){
			$id = $_REQUEST['id'];
			$this->AdminModel->lunas($id);
			
			redirect(base_url('dashboard/daftar%20transaksi'));
		}
		
		public function batal(){
			$id = $_REQUEST['id'];
			$this->AdminModel->batal($id);
			
			redirect(base_url('dashboard/daftar%20transaksi'));
		}
		
		public function kirim(){
			$id = $_REQUEST['id'];
			$this->AdminModel->kirim($id);
			
			redirect(base_url('dashboard/daftar%20transaksi'));
		}
		
		public function sampai(){
			$id = $_REQUEST['id'];
			$this->AdminModel->sampai($id);
			
			redirect(base_url('dashboard/daftar%20transaksi'));
		}
	}