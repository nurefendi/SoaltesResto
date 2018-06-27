<?php
class Pelayan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');

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
		$this->load->model('m_product');
		$data['product'] = $this->m_product->readALLFood();
		$data['userID'] = $this->session->userdata('userID');
		$data['userName'] = $this->session->userdata('userName');
		$data['userEmail'] = $this->session->userdata('userEmail');
		$data['userLevel'] = $this->session->userdata('userLevel');
		
		$data['loadCotent'] = 'pelayan/content_makanan';


		$this->load->view('pelayan/home', $data);
		
	}



}
?>