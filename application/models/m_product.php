<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_product extends CI_Model{

	public function readALL(){
		$this->db->select('*');
		$query = $this->db->get('soaltes_product');
		return json_encode($query->result_array());
	}

	public function update($data, $id){
		$this->db->where('productID', $id);
		$this->db->update('soaltes_product', $data);
		return true;
	}

	public function delete($id){
		$query = $this->db->query("");
		return $query;
	}

	public function create($data){
		$this->db->insert('soaltes_product', $data);
		return true;
	}

	public function readALLDrink($category='Minuman'){
		$this->db->select('*')->where('productCategory', $category);
		$query = $this->db->get('soaltes_product');
		return json_encode($query->result_array());
	}

	public function readALLFood($category='Makanan'){
		$this->db->select('*')->where('productCategory', $category);
		$query = $this->db->get('soaltes_product');
		return json_encode($query->result_array());
	}

}