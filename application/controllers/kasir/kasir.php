<?php
class Kasir extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');

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
		$data['loadCotent'] = 'kasir/content_home';

		$this->load->view('kasir/home', $data);
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
	public function profile(){
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		$data['loadCotent'] = 'kasir/content_profil';


		$this->load->view('kasir/home', $data);
	}

	public function productMakanan(){
		$this->load->model('m_product');
		$data['product'] = $this->m_product->readALLFood();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');	
		$data['loadCotent'] = 'kasir/content_makanan';


		$this->load->view('kasir/home', $data);
		
	}

	public function productMinuman(){
		$this->load->model('m_product');
		$data['product'] = $this->m_product->readALLDrink();
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
		$data['loadCotent'] = 'kasir/content_transaksi';
		$this->load->view('kasir/home', $data);
	}

}

?>