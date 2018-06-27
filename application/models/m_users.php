<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_users extends CI_Model{

	/*mode*/
	public function cekUserExist($data) {
		$query = $this->db->get_where('soaltes_user', $data);
		return $query;
	}

}