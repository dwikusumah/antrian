<?php
class M_login_c extends CI_Model {

	public function __construct() {
		$this->load->database();
		$this->load->library('encrypt');
	}

	public function checkUser($data) {
		 $this->db->where('username_c',$data);
		 $data = $this->db->get('tbl_pendaftaran');
		 if ($data->num_rows() > 0) {
		 	return $data->result_array();
		 } else {
		 	return false;
		 }
	}
	
	public function checkPassword($username_c,$password_c) {
		$this->db->where('username_c',$username_c);
		$this->db->where('password_c',$password_c);
		$data = $this->db->get('tbl_pendaftaran');
		if ($data->num_rows() > 0) {
		 	return $data->result_array();
		} else {
			return false;
		}
	}

	public function checkAccountType($username_c,$password_c) {
		$this->db->where('username_c',$username_c);
		$this->db->where('password_c',$password_c);
		$query = $this->db->get('tbl_pendaftaran');
		if ($query->num_rows() > 0) {
		    $row = $query->row(); 
		    return $row->akses;
		}
		return null;
	}
}
?>