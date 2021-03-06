<?php
class M_admin extends CI_Model {



	public function __construct() {
		$this->load->database();
	}

	

	/* -=-=-=-=-=-=-=-=-=-=- INSERT SECTION -=-=-=-=-=-=-=-=-=-=-=- */
	public function insertPegawai($data){
		return $this->db->insert('tbl_staff',$data);
	}

	public function insertLayanan($data){
		return $this->db->insert('tbl_layanan',$data);
	}

	public function insertUser($data){
		return $this->db->insert('tbl_user',$data);
	}

	public function insertJadwal($data){
		return $this->db->insert('tbl_jadwal',$data);
	}

	public function insertJamkes($data){
		return $this->db->insert('tbl_jamkes',$data);
	}

	public function insertHubungi($data){
		return $this->db->insert('tbl_jamkes',$data);
	}

	public function insertBarang($data){
		return $this->db->insert('tbl_barang',$data);
	}

	/*-=--=-=-=-=-=-=--=-=-= SELECT MAIN SECTION -=-=-=-=-=-=-=-=-=-=-=-= */

	public function getCountAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->group_by('antrian');

		$data = $this->db->get();

		return $data->num_rows();
	}

	public function getCountSisaAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status','0');
		$this->db->group_by('antrian');

		$data = $this->db->get();

		return $data->num_rows();
	}

	public function getCurrentAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status','0');
		$this->db->order_by('antrian','asc');
		
		
		$data = $this->db->get();

		return $data->result_array();
	}



	/*-=--=-=-=-=-=-=--=-=-= SELECT SECTION -=-=-=-=-=-=-=-=-=-=-=-= */

	public function selectBarang(){
		$this->db->order_by('jenis_barang');
		return $this->db->get('tbl_barang')->result();
	}

	public function getBarang($id){
		$this->db->where('id',$id);
		$data = $this->db->get('tbl_barang');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}


	public function selectPegawai(){
		$this->db->select('tbl_staff.*,tbl_layanan.*');;
		$this->db->from('tbl_staff');
		$this->db->join('tbl_layanan','tbl_staff.id_layanan = tbl_layanan.id_layanan', 'left');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getPegawai($id){
		$this->db->where('id_staff',$id);
		$data = $this->db->get('tbl_staff');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectLayanan(){
		$data = $this->db->get('tbl_layanan');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getLayanan($id){
		$this->db->where('id_layanan',$id);
		$data = $this->db->get('tbl_layanan');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectUser(){
		$data = $this->db->get('tbl_user');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getUser($id){
		$this->db->where('id_user',$id);
		$data = $this->db->get('tbl_user');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectTransaksi($bulan,$tahun){
		// $this->db->select('tbl_jadwal.*,tbl_staff.*');;
		// $this->db->from('tbl_jadwal');
		// $this->db->join('tbl_staff','tbl_staff.id_staff = tbl_jadwal.id_staff', 'inner');
		$data = $this->db->query("SELECT * FROM tbl_transaksi WHERE year(tanggal)='$tahun' AND month(tanggal)='$bulan'");
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	public function getJadwal($id){
		$this->db->where('id_jadwal',$id);
		$data = $this->db->get('tbl_jadwal');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectJamkes(){
		$this->db->select('*');
		$this->db->from('tbl_jamkes');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getJamkes($id){
		$this->db->where('id_jamkes',$id);
		$data = $this->db->get('tbl_staff');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectHubungi(){
		$this->db->select('*');
		$this->db->from('tbl_hubungi');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getHubungi($id){
		$this->db->where('id_hubungi',$id);
		$data = $this->db->get('tbl_hubungi');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectAntrian(){
		$data = $this->db->get('tbl_antrian');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}

	}

	public function getAntrian(){		
		// $this->db->select('*');
		// $this->db->from('tbl_antrian');
		// $this->db->join('tbl_pendaftaran','tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian', 'outter');
		// $this->db->where('tbl_antrian.id_antrian',$id);
		$data = $this->db->query('SELECT * FROM tbl_antrian ASC ');
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	public function getAntrianDaftar(){
		$tanggal = date('Y-m-d');
		// $this->db->select('*');
		// $this->db->from('tbl_antrian');
		// $this->db->join('tbl_pendaftaran','tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian', 'outter');
		// $this->db->where('tbl_antrian.id_antrian',$id);
		$data = $this->db->query("SELECT * FROM tbl_antrian WHERE tanggal='$tanggal' ORDER BY antrian DESC LIMIT 1 ");
		if($data->num_rows() > 0){
			return $data->result();
		}else{
			return false;
		}
	}

	/* -=-=-=-=-=-=-=-=-=-=- UPDATE SECTION -=-=-=-=-=-=-=-=-=-=- */
	public function updatePegawai($id,$data){
		$this->db->where('id_staff',$id);
		return $this->db->update('tbl_staff',$data);
	}

	public function updateLayanan($id,$data){
		$this->db->where('id_layanan',$id);
		return $this->db->update('tbl_layanan',$data);
	}

	public function updateBarang($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('tbl_barang',$data);
	}

	public function updateUser($id,$data){
		$this->db->where('id_user',$id);
		return $this->db->update('tbl_user',$data);
	}


	public function updateJadwal($id,$data){
		$this->db->where('id_jadwal',$id);
		return $this->db->update('tbl_jadwal',$data);
	}

	public function updateHubungi($id,$data){
		$this->db->where('id_hubungi',$id);
		return $this->db->update('tbl_hubungi',$data);
	}

	public function skipAntrian($id){
		$this->db->set('status','1');
		$this->db->where('id_antrian',$id);
		return $this->db->update('tbl_antrian');
	}

	/* -=-=-=-=-=-=-=-=-=-=- DELETE SECTION -=-=-=-=-=-=-=-=-=-=- */
	public function deletePegawai($id){
		$this->db->where('id_staff',$id);
		return $this->db->delete('tbl_staff');
	}

	public function deleteLayanan($id){
		$this->db->where('id_layanan',$id);
		return $this->db->delete('tbl_layanan');
	}

	public function deleteUser($id){
		$this->db->where('id_user',$id);
		return $this->db->delete('tbl_user');
	}

	public function deleteJadwal($id){
		$this->db->where('id_jadwal',$id);
		return $this->db->delete('tbl_jadwal');
	}

	public function deleteJamkes($id){
		$this->db->where('id_jamkes',$id);
		return $this->db->delete('tbl_jamkes');
	}

	public function deleteHubungi($id){
		$this->db->where('id_hubungi',$id);
		return $this->db->delete('tbl_hubungi');
	}
	public function deleteAntrian($id){
		$this->db->where('id_antrian',$id);
		return $this->db->delete('tbl_antrian');
	}

	public function deleteBarang($id){
		$this->db->where('id',$id);
		return $this->db->delete('tbl_barang');
	}

	public function deleteTransaksi($id){
		$this->db->where('id_transaksi',$id);
		return $this->db->delete('tbl_transaksi');
	}

	public function deleteTransaksiDetail($id){
		$this->db->where('id_transaksi',$id);
		$this->db->delete('tbl_transaksi_detail');
	}


	public function getAllBarang(){
		return $this->db->get('tbl_barang')->result();
	}

}

?>