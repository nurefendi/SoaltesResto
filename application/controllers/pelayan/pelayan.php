<?php
class Pelayan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');
		$this->load->model('m_product');
		$this->load->model('m_orders');
		

		# session untuk validasi user
		if ($this->session->userdata('userLevel')=="") {
			redirect('login');
		}elseif ($this->session->userdata('userLevel')=='2') {
			redirect('kasir/kasir');
		}
		$this->load->helper('text'); 

	}

	public function index() {
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['lastActivity'] = $this->session->userdata('lastActivity');
		$data['activeorder'] = $this->m_orders->showActiveOrder();
		$data['sumdata'] = $this->m_orders;
		$data['countorder'] = $this->m_orders->countOrder();
		$data['loadCotent'] = 'pelayan/content_home';

		$this->load->view('pelayan/home', $data);

	}

	public function logOut() {
		$this->session->unset_userdata('userID');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userEmail');
		$this->session->unset_userdata('userLevel');
		$this->session->unset_userdata('lastActivity');
		session_destroy();
		redirect('login');
	}


	public function productMakanan(){		
		$data['product'] = $this->m_product->readALLFood();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['countorder'] = $this->m_orders->countOrder();

		
		
		$data['loadCotent'] = 'pelayan/content_makanan';
		$data['keranjang'] = $this->cart->contents();


		$this->load->view('pelayan/home', $data);
		
	}

	public function productMinuman(){
		$data['product'] = $this->m_product->readALLDrink();
		$data['countorder'] = $this->m_orders->countOrder();
		

		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		
		$data['loadCotent'] = 'pelayan/content_minuman';
		

		$this->load->view('pelayan/home', $data);
		
	}

	public function transaction(){
		$data['countorder'] = $this->m_orders->countOrder();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['loadCotent'] = 'pelayan/content_transaksi';
		$this->load->view('pelayan/home', $data);
	}

	public function profile(){
		$data['countorder'] = $this->m_orders->countOrder();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['loadCotent'] = 'pelayan/content_profil';


		$this->load->view('pelayan/home', $data);
	}



}
?>