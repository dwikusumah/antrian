<?php
class C_Daftar extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_mainmenu');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {
		$data['jamkes'] = $this->M_mainmenu->selectJamkes();

		$this->load->view("MainMenu/V_Daftar",$data);
	}

	public function generate($id){
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$id = $this->encrypt->decode($plaintext_string);

		$data =  array();
		$data['list'] = $this->M_mainmenu->generate($id);
		$this->load->view("V_Login_c",$data);
	}

	/* ----------------------- INSERT SECTION ----------------------------*/

	public function insertDaftar() {

		$username_c = $this->input->post('username_c');
		$password_c = $this->input->post('password_c');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$alamat = $this->input->post('alamat');
		

		// $antrian = $this->getAntrian();

		$data  = array(
			'username_c' => $username_c,
			'password_c' => $password_c,
			'nik' => $nik, 
			'nama' => $nama, 
			'tempat_lahir' => $tempat_lahir, 
			'jenis_kelamin' => $jenis_kelamin, 	
			'tanggal_lahir' => $tanggal_lahir, 	
			'alamat' => $alamat ,

		);
		/* Encrypt ID */
		// $encrypted_string = $this->encrypt->encode($antrian);
		// $id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);
		$this->M_mainmenu->insertDaftar($data);
		$this->load->view("V_Login_c");
		// if($this->M_mainmenu->insertDaftar($data)) {
		// 	redirect('Daftar/generate/'.$id);
		// } else {
		// 	redirect('Daftar/error');
		// }
	}


	// public function getAntrian(){
	// 	$antrian = '';
		
	// 	if($data = $this->M_mainmenu->countAntrian(true)){

	// 		$no_urut = (int) substr($data[0]['antrian'],1,3);
			
	// 		if(strlen($no_urut) == 1){
	// 			$antrian = "A00".((int) $no_urut + 1);
	// 		}else if(strlen($no_urut) == 2){
	// 			$antrian = "A0".((int) $no_urut + 1);
	// 		}else{
	// 			$antrian = "A".((int) $no_urut + 1);
	// 		}

	// 		$tanggal = date('Y-m-d');

	// 		$data = array(
	// 			'tanggal' => $tanggal,
	// 			'antrian' => $antrian
	// 		);

	// 		// echo "<pre>";
	// 		// print_r($data);
	// 		// exit();
	// 		$antrian = $this->M_mainmenu->insertAntrian($data);

			
	// 	}else{
	// 		$antrian = 'A001';
	// 		$tanggal = date('Y-m-d');

	// 		$data = array(
	// 			'tanggal' => $tanggal,
	// 			'antrian' => $antrian
	// 		);

	// 		$antrian = $this->M_mainmenu->insertAntrian($data);
	// 	}
	// 	return $antrian;
	// }

	public function getStaff(){
		
		$where = array(
			'tbl_layanan.id_layanan' => $this->input->post('id_layanan_medis') 
		);
		


		$data = $this->M_mainmenu->selectJadwalStaff($where);
		$staff = false;

		foreach ($data as $value) {
			$hari = date('N');
			$jam = date('H:i:s');
			if($hari  >= $value['hari_pertama'] && $hari <= $value['hari_terakhir']){
				if($jam > $value['jam_pertama'] && $jam < $value['jam_terakhir']){
					$staff[] = $value;	
				}
			}
		}
		// echo "<pre>";
		// print_r($staff);
		// exit();
		echo json_encode($staff);
			


	}


}
