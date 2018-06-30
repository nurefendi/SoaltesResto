<?php
class Kasir extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');
		$this->load->model('m_product');
		$this->load->model('m_orders');
		$this->load->model('m_transaksi');

		if ($this->session->userdata('userLevel')=="") {
			redirect('login');
		}elseif ($this->session->userdata('userLevel')=='1') {
			redirect('kasir/pelayan');
		}
		$this->load->helper('text'); 

	}

	public function index(){
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['lastActivity'] = $this->session->userdata('lastActivity');
		$data['activeorder'] = $this->m_orders->showActiveOrder();
		$data['sumdata'] = $this->m_orders;
		$data['countorder'] = $this->m_orders->countOrder();
		$data['loadCotent'] = 'kasir/content_home';

		$this->load->view('kasir/home', $data);
	}

	public function logOut() {
		helper_log("logout", "Melakukan Log Out");
		$this->session->unset_userdata('userID');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userEmail');
		$this->session->unset_userdata('userLevel');
		$this->session->unset_userdata('lastActivity');
		session_destroy();
		redirect('login');
	}
	public function profile(){
		$data['countorder'] = $this->m_orders->countOrder();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['loadCotent'] = 'kasir/content_profil';


		$this->load->view('kasir/home', $data);
	}

	public function productMakanan(){
		$data['product'] = $this->m_product->readALLFood();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');	
		$data['countorder'] = $this->m_orders->countOrder();
		$data['loadCotent'] = 'kasir/content_makanan';
		$data['keranjang'] = $this->cart->contents();


		$this->load->view('kasir/home', $data);
		
	}

	public function productMinuman(){
		$data['product'] = $this->m_product->readALLDrink();
		$data['countorder'] = $this->m_orders->countOrder();

		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');		
		$data['loadCotent'] = 'kasir/content_minuman';

		$this->load->view('kasir/home', $data);
	}

	public function transaction(){
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['countorder'] = $this->m_orders->countOrder();
		$data['report'] = $this->m_transaksi->lihatSemua();
		$data['loadCotent'] = 'kasir/content_transaksi';
		$this->load->view('kasir/home', $data);
	}


}

?>