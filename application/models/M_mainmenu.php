<?php
class M_mainmenu extends CI_Model {

	public function __construct() {
		$this->load->database();
	}


/* ---------------------- DAFTAR PAGE ---------------------- */	
	public function generate($id){
		$this->db->select('*,tbl_pendaftaran.nama nama_user');
		$this->db->from('tbl_antrian');
		$this->db->join('tbl_pendaftaran','tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian', 'outter');
		
		$this->db->where('tbl_antrian.id_antrian',$id);

		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function selectLayanan(){
		$this->db->select('*');
		$this->db->from('tbl_layanan');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function selectJadwalDokter($data){
		$this->db->select('*');
		$this->db->from('tbl_staff');
		$this->db->join('tbl_layanan','tbl_staff.id_layanan = tbl_layanan.id_layanan', 'inner');
		$this->db->join('tbl_jadwal','tbl_jadwal.id_staff = tbl_staff.id_staff','inner');
		$this->db->where($data);

		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function selectJamkes(){
		$this->db->select('*');;
		$this->db->from('tbl_jamkes');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function countAntrianS($daftar = false){

		// $date = date('Y-m-d');

		$this->db->select('antrian,tanggal');
		$this->db->from('tbl_antrian');
		// $this->db->where('tanggal');
		$this->db->where('status != 1');
		if($daftar){
			$this->db->order_by('antrian','desc');	
		}else{
			$this->db->order_by('antrian','asc');
		}
		
		
		$this->db->order_by('tanggal','desc');
		
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;	
		}
	}

	public function countAntrian($daftar = false){

		$tanggal = date('Y-m-d');

		// $this->db->select('antrian,tanggal');
		// $this->db->from('tbl_antrian');
		// $this->db->where('tanggal',$date);
		// $this->db->where('status != 1');
		// if($daftar){
		// 	$this->db->order_by('antrian','desc');	
		// }else{
		// 	$this->db->order_by('antrian','asc');
		// }
		
		$this->db->select('*');
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$tanggal);
		$this->db->order_by('antrian','asc');
		
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;	
		}
	}
	// public function countAntrianA($daftar = false){

	// 	// $date = date('Y-m-d');

	// 	// $this->db->select('antrian,tanggal');
	// 	// $this->db->from('tbl_antrian');
	// 	// $this->db->where('tanggal',$date);
	// 	// $this->db->where('status != 1');
	// 	// if($daftar){
	// 	// 	$this->db->order_by('antrian','desc');	
	// 	// }else{
	// 	// 	$this->db->order_by('antrian','asc');
	// 	// }
		
	// 	$data = $this->db->query("SELECT max(antrian) as maxKode FROM tbl_antrian");
	// 	if($data->num_rows() > 0){
	// 		return $data->result_array();
	// 	}else{
	// 		return false;	
	// 	}
	// }

	public function insertDaftar($data){
		return $this->db->insert('tbl_pendaftaran',$data);
	}

	public function update_antrian($data){
		$where = $this->session->userdata('id_daftar');
		$this->db->query("UPDATE tbl_pendaftaran SET id_antrian ='$data' WHERE id_daftar = '$where' ");
	}

	public function insertAntrian($data){
		$this->db->insert('tbl_antrian',$data);
	}

	public function insertHubungi($data){
		return $this->db->insert('tbl_hubungi',$data);
	}
}
?>