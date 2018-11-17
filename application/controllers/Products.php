<?php

	class Products extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('HomeModel');
			$this->load->model('TransModel');
		}
				
		public function view($type, $detail){
			
			$this->HomeModel->checkDataTypeProduct($type);
			$data['brands'] = $this->HomeModel->getDataBrands();
			$data['products'] = $this->HomeModel->getDataProducts();
			$data['productSpecific'] = $this->HomeModel->getDataProductType($type);
			$data['typeProducts'] = $this->HomeModel->getDataTypeProducts();
			$data['typeProduct'] = $type;
			$data['product'] = $this->HomeModel->getDataProduct($detail);
			$data['reviews'] = $this->HomeModel->getDataReviews();
			$data['users'] = $this->HomeModel->getDataUsers();
			if(isset($_SESSION['id'])){
				$data['count_transactions'] = $this->HomeModel->countDataTransactions();
			}
			
			if($detail == "index"){	
				$this->load->view('product/meta');
				$this->load->view('templates/header', $data);
				$this->load->view('product/products', $data);
			}else{
				$checkPre = strstr($detail, '-of-', true);
				$checkPost = strstr($detail, '-of-');
				
				if($checkPre != 'details' || $checkPost == '-of-'){
					show_404();
				}else{
					$checkIdLenght = strlen(substr($detail,11));
					if($checkIdLenght != 10){
						show_404();
					}else{
						$this->HomeModel->checkDataProduct($detail);
					}
				}
				
				$this->load->view('product/meta_detail');
				$this->load->view('templates/header', $data);
				$this->load->view('product/product', $data);
			}
			$this->load->view('templates/footer');
			$this->load->view('templates/underBody');
			$this->load->view('modal/login');
			$this->load->view('modal/success');
			$this->load->view('modal/alert');
		}
		
		public function addCart(){
			$arr = array(
				'id_transaction' => $_SESSION['transaction'],
				'customer' => $_SESSION['id'],
				'product_code' => $_REQUEST['brand'],
				'jumlah' => $_REQUEST['quantity'],
				'payment' => $_REQUEST['quantity'] * $_REQUEST['price']
			);
			
			$this->TransModel->checkIdTrans($arr);
			$this->TransModel->checkDelivery($arr);
			$checkCart = $this->TransModel->checkCart($arr);
			if($checkCart == true){
				$this->TransModel->reupdateTransaction($arr);
				$this->TransModel->updateCart($arr);
			}else{
				$this->TransModel->addCart($arr);
			}
			$this->TransModel->updateTransaction($arr);
			
			echo "success";
		}
		
		public function payTransaction(){
			
			$arr = array(
				'address' => $_REQUEST['address'],
				'city' => $_REQUEST['city'],
				'fee' => $_REQUEST['fee']
			);
			
			$this->TransModel->payTransaction($arr);
			
			redirect(base_url('konfirmasi?id='.$_SESSION['transaction']));
		}
		
		public function delProductCart(){
			$id = $_SESSION['transaction'];
			$product = $_REQUEST['id'];
			
			$this->TransModel->delProduct($id, $product);
			
			redirect(base_url('keranjang'));
		}
		
		public function delCart(){
			$id = $_SESSION['transaction'];
			
			$this->TransModel->delCart($id);
			
			redirect(base_url('keranjang'));
		}
		
		public function confirmPayment(){
			$arr = array(
				'id_transaction' => $_REQUEST['id'],
				'bank' => $_REQUEST['bank'],
				'nama_pemilik' => $_REQUEST['name'],
				'no_rekening' => $_REQUEST['rek'],
				'nominal' => $_REQUEST['nom']
			);
			
			$this->TransModel->addConfirm($arr);
			$_SESSION['transaction'] = $this->TransModel->newTransaction();
			
			redirect(base_url());
		}
	}