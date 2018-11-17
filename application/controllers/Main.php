<?php
	class Main extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('UserModel');
			$this->load->model('HomeModel');
		}
		
		public function login_process(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			/*$url = $this->input->post('url');*/
			$checkLogin = $this->UserModel->checkLogin($username, $password);
			
			if($checkLogin == true){
				$row = $this->UserModel->dataLogin($username, $password);
				$sess_array = array(
					'id' => $row->username,
					'name' => $row->last_name,
					'level' => $row->level,
					'transaction' => $row->id.str_pad($row->transaction_count, 3, "0", STR_PAD_LEFT)
				);
				$this->session->set_userdata($sess_array);
				if($row->level == 1){
					echo "member";
				}else if($row->level == 0){
					echo "admin";
				}
			}else if($checkLogin == false){
				echo "failed";
			}else{
				echo "deleted";
			}
		}
		
		public function doLogout(){
			$sess_array = array('id', 'name', 'level');
			$this->session->unset_userdata($sess_array);
			redirect(base_url(), 'refresh');
		}
		
		public function doRegist(){
			$fName = $this->input->post('first_name');
			$lName = $this->input->post('last_name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$telp = $this->input->post('telp');
			$checkData = $this->Construct->checkData($username);
			
			if($checkData == true){
				$this->Construct->insertData($fName, $lName, $username, $password, $telp);
				redirect(base_url('registConfirm'), 'refresh');
			}else{
				redirect(base_url('registFailed'), 'refresh');
			}
		}
		
		public function index(){
			
			$data['brands'] = $this->HomeModel->getDataBrands();
			$data['products'] = $this->HomeModel->getDataProducts();
			$data['typeProducts'] = $this->HomeModel->getDataTypeProducts();
			if(isset($_SESSION['id'])){
				$data['count_transactions'] = $this->HomeModel->countDataTransactions();
			}
			
			$this->load->view('meta');
			$this->load->view('templates/header', $data);
			$this->load->view('modal/kalkulator');
			$this->load->view('modal/hasil');
			$this->load->view('modal/login');
			$this->load->view('home', $data);
			$this->load->view('templates/footer');
			$this->load->view('templates/underBody');
		}
		
		public function regist(){
			$data['users'] = $this->HomeModel->getDataUsers();
			
			$this->load->view('meta');
			$this->load->view('regist', $data);
			$this->load->view('templates/underBody');
		}
		
		public function registConfirm(){
			$this->load->view('registerConfirm');
		}
		
		public function registFailed(){
			$this->load->view('registerFailed');
		}
		
		public function admin($page){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{
				if($_SESSION['level'] != 0){
					show_404();
				}else{
					$data['brands'] = $this->HomeModel->getDataBrands();
					$data['products'] = $this->HomeModel->getDataProducts();
					$data['typeProducts'] = $this->HomeModel->getDataTypeProducts();
					$data['users'] = $this->HomeModel->getDataUsers();
					$data['transactions'] = $this->HomeModel->getDataTransactions();
					$data['productTransactions'] = $this->HomeModel->getDataProductTransactions();
					$data['deliverys'] = $this->HomeModel->getDataDeliverys();
					
					if($page == 'index'){
						$data['title'] = "DASHBOARD";
					}else{
						$data['title'] = strtoupper(urldecode($page));
					}
					
					
					$this->load->view('administrator/header', $data);
					$this->load->view('modal/konfirmasi');
					switch($page){
						case 'index' :
							$this->load->view('administrator/index'); break;
						case 'daftar%20akun' :
							$this->load->view('administrator/lAccount', $data); break;
						case 'daftar%20produk' :
							$this->load->view('administrator/lProduct', $data); break;
						case 'ubah%20product' :
							$this->load->view('administrator/uProduct', $data); break;
						case 'tambah%20produk' :
							$this->load->view('administrator/iProduct', $data); break;
						case 'daftar%20transaksi' :
							$this->load->view('administrator/confirmation', $data); break;
						default :
							show_404();
					}
					$this->load->view('administrator/footer');
				}
			}
		}
		
		public function user(){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{
				$id = $_SESSION['id'];
				$data['user'] = $this->HomeModel->getDataUser($id);
				
				$this->load->view('profile/header');
				$this->load->view('profile/profile', $data);
				$this->load->view('templates/footer');
				$this->load->view('templates/underBody');
			}
		}
		
		public function usera(){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{
				$id = $_SESSION['id'];
				$data['user'] = $this->HomeModel->getDataUser($id);
				$data['citys'] = $this->HomeModel->getDataCitys();
				
				$this->load->view('profile/headerEdit');
				$this->load->view('profile/editprofile', $data);
				$this->load->view('templates/footer');
				$this->load->view('templates/underBody');
			}
		}
		
		public function changeProfile(){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{
				$arr = array(
					'first_name' => $_REQUEST['first_name'],
					'last_name' => $_REQUEST['last_name'],
					'password' => $_REQUEST['password'],
					'address' => $_REQUEST['address'],
					'city' => $_REQUEST['city'],
					'postal_code' => $_REQUEST['postal'],
					'phone' => $_REQUEST['phone']
				);
				
				$this->HomeModel->updateProfile($arr);
				redirect(base_url('profile'));
			}
		}
		
		public function detailHasil(){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{				
				$this->load->view('headerHasil');
				$this->load->view('detailHasil');
				$this->load->view('templates/footer');
				$this->load->view('templates/underBody');
			}
		}
		
		public function cart(){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{
				$data['products'] = $this->HomeModel->getDataProducts();
				$data['transactions'] = $this->HomeModel->getDataTransactions();
				$data['productTransactions'] = $this->HomeModel->getDataProductTransactions();
				$data['citys'] = $this->HomeModel->getDataCitys();
				$data['count_transactions'] = $this->HomeModel->countDataTransactions();
				
				$this->load->view('templates/headerTransaksi', $data);
				if($data['count_transactions'] != 0){
					$this->load->view('keranjang',$data);
				}else{
					$this->load->view('templates/noData');
				}
				$this->load->view('templates/footer');
				$this->load->view('templates/underBody');
			}
		}
		
		public function confirm(){
			if(!isset($_SESSION['id'])){
				show_404();
			}else{
				$data['products'] = $this->HomeModel->getDataProducts();
				$data['transactions'] = $this->HomeModel->getDataTransactions();
				$data['id'] = $_REQUEST['id'];
				$data['randomInt'] = random_string('numeric', 2);
				
				$this->load->view('templates/headerTransaksi', $data);
				$this->load->view('confirmPayment',$data);
				$this->load->view('templates/footer');
				$this->load->view('templates/underBody');
			}
		}
	}