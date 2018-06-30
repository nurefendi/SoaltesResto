<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model{

	public function prosesTransaksi()
	{
		# code...
	}

	public function transaksiId()
	{
		# code...
	}

	public function lihatTransaksi($id){
		$this->db->select('*')->where('userID', $id);
		$query = $this->db->get('soaltes_transaction');
		return json_encode($query->result_array());

	}

	public function lihatSemua(){
		$this->db->select('*');
		$query = $this->db->get('soaltes_transaction');
		return json_encode($query->result_array());
	}

}