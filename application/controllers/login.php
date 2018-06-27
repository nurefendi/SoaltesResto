<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
	
		if ($this->session->userdata('userLevel')=='1') {
			redirect('pelayan/pelayan');
		}elseif ($this->session->userdata('userLevel')=='2') {
			redirect('kasir/kasir');
		}
		$this->load->helper('text'); 

	}
	public function index()
	{
		$this->load->view('login_view');
	}

	/*Function untuk eksekusi login*/
	public function doLogin(){
		$email = $this->input->post('email');
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$data = array(
				'userEmail' => $this->input->post('email', TRUE),
				'userPassword' => md5($this->input->post('password', TRUE))
			);

			$this->load->model('m_users'); //load model M_users.php

			$result = $this->m_users->cekUserExist($data); 
			if ($result->num_rows() == 1) {
				foreach ($result->result() as $get) {
					$sess_data['logged_in'] = 'Loggin';
					$sess_data['userID'] = $get->userID;
					$sess_data['userName'] = $get->userName;
					$sess_data['userEmail'] = $get->userEmail;
					$sess_data['userLevel'] = $get->userLevel;
					$sess_data['lastActivity'] = $get->lastActivity;
					
					$this->session->set_userdata($sess_data); //set session user level
				}
				if ($this->session->userdata('userLevel')=='1') {
					redirect('pelayan/pelayan');
				//echo "<script>alert('Kasir');history.go(-1);</script>";
				}
				elseif ($this->session->userdata('userLevel')=='2') {
				//echo "<script>alert('pelayan');history.go(-1);</script>";
					redirect('kasir/kasir');
				}		
			}else {
				echo "<script>alert('User ID/Password Tidak Dikenali !');history.go(-1);</script>";
			}

		}
	}
}
