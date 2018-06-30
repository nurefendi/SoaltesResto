<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_orders extends CI_Model{

	public function create($data){
		$this->db->insert('soaltes_orders', $data);
		return true;
	}

	public function createDetailOrder($add) {
		$this->db->query("INSERT INTO soaltes_orders_detail (ordersIDDetails, productName, productID, ordersQty, subtotal) VALUES $add ");
		return true;
	}

	public function showActiveOrder($status='0'){
		$this->db->select('*')->where('status', $status);
		$query = $this->db->get('soaltes_orders');
		return json_encode($query->result_array());
	}

	public function sumorder($id){
		$query = $this->db->query("SELECT SUM(od.ordersQty) AS sumqty, SUM(od.subtotal) AS sumtotal FROM soaltes_orders o INNER JOIN soaltes_orders_detail od ON o.ordersIDDetails = od.ordersIDDetails WHERE o.ordersIDDetails = '$id' ");
		return $query->result_array();
	}

	public function countOrder(){
		$query = $this->db->query("SELECT COUNT(*) AS ttorder FROM soaltes_orders WHERE status = '0'");
		return $query->result_array();
	}


}