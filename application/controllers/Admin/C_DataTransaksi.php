<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_DataTransaksi extends CI_Controller {

/* ----------------------- VIEW LOAD ----------------------------*/
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index($status=false) {
		// generate all data jadwal
		// if($this->input->post('submit')=="submit"){
		// 	$bulan = $this->input->post('bulan');
		// 	$tahun = $this->input->post('tahun');
		// 	echo $bulan.",".$tahun;
		// 	// $data['transaksi'] = $this->M_admin->selectTransaksi($bulan,$tahun);
		// 	// $this->load->view("V_Header");
		// 	// $this->load->view("Admin/Transaksi/V_Index",$data);
		// 	// $this->load->view("V_Footer");
		// }
		// // $data['transaksi'] = $this->M_admin->selectTransaksi();
		$this->load->view("V_Header");
		$this->load->view("Admin/Transaksi/V_Index");
		// $this->load->view("V_Footer");
	}

	public function cetak() {
		$this->load->view('Admin/Transaksi/V_Cetak');
	}

// 	public function inputJadwal() {
// 		$data['staff'] = $this->M_admin->selectPegawai();
// 		$this->load->view("V_Header");
// 		$this->load->view("Admin/Jadwal/V_Input",$data);
// 		$this->load->view("V_Footer");	
// 	}

// /* ----------------------- VIEW LOAD END ----------------------------*/

// /* ----------------------- VIEW LOAD DETAIL -------------------------*/

// public function jadwalDetail($id = false) {
// 		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
// 		$plaintext_string = $this->encrypt->decode($plaintext_string);
// 		$data['id_jadwal']	= $plaintext_string;
// 		$data['list'] = $this->M_admin->getJadwal($plaintext_string);
// 		$data['id'] = $id;
// 		$this->load->view("V_Header");
// 		$this->load->view("Admin/Jadwal/V_Detail",$data);
// 		$this->load->view("V_Footer");
// }

// public function jadwalEdit($id = false) {
// 		//$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
// 		//$plaintext_string = $this->encrypt->decode($plaintext_string);
		
// 		$data['id_jadwal']	= $id;
// 		$data['list'] = $this->M_admin->getJadwal($id);
// 		$data['staff'] = $this->M_admin->selectPegawai();

// 		// echo "<pre>";
// 		// print_r($data);
// 		// exit();

// 		$this->load->view("V_Header");
// 		$this->load->view("Admin/Jadwal/V_Edit",$data);
// 		$this->load->view("V_Footer");
// }

// /*------------------------ VIEW LOAD DETAIL END ----------------------*/

// /* ----------------------- INSERT SECTION ----------------------------*/

// 	public function insertJadwal() {
// 		$id_staff = $this->input->post('id_staff');
// 		$bagian = $this->input->post('bagian');
// 		$hari = $this->input->post('hari');
// 		$time_awal = $this->input->post('time_awal');
// 		$time_akhir = $this->input->post('time_akhir');
// 		$hari_pertama = $this->input->post('hari_pertama');
// 		$hari_terakhir = $this->input->post('hari_terakhir');
		
// 		// $time = $time_awal." s/d ".$time_akhir;
		
// 		$data  = array(
// 				'id_staff' => $id_staff, 
// 				'bagian' => $bagian,
// 				'hari_pertama' => $hari_pertama,
// 				'hari_terakhir' => $hari_terakhir,
// 				'jam_pertama' => $time_awal,
// 				'jam_terakhir' => $time_akhir
// 				);
		
// 		// echo "<pre>";
// 		// print_r($data);
// 		// exit();

// 		if($this->M_admin->insertJadwal($data)) {
// 			$this->session->set_flashdata('success', 'Jadwal berhasil ditambahkan!');
// 			redirect('Jadwal/index/simpan');
// 		} else {
// 			$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
// 			redirect('Jadwal/index/error');
// 		}
// 	}

// /*------------------------------- UPDATE SECTION --------------------------------*/

// 	public function updateJadwal() {
// 		$id = $this->input->post('id_jadwal');
// 		$id_staff = $this->input->post('id_staff');
// 		$bagian = $this->input->post('bagian');
// 		$hari = $this->input->post('hari');
// 		$time_awal = $this->input->post('time_awal');
// 		$time_akhir = $this->input->post('time_akhir');
// 		$hari_pertama = $this->input->post('hari_pertama');
// 		$hari_terakhir = $this->input->post('hari_terakhir');
		
// 		// $time = $time_awal." s/d ".$time_akhir;
		
// 		$data  = array(
// 				'id_staff' => $id_staff, 
// 				'bagian' => $bagian,
// 				'hari_pertama' => $hari_pertama,
// 				'hari_terakhir' => $hari_terakhir,
// 				'jam_pertama' => $time_awal,
// 				'jam_terakhir' => $time_akhir
// 				);
// 		// echo "<pre>";
// 		// print_r($data);
// 		// exit();
// 		if($this->M_admin->updateJadwal($id,$data)) {
// 			$this->session->set_flashdata('success', 'Jadwal berhasil diupdate!');
// 			redirect('Jadwal/index/update');

// 		} else {
// 			$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
// 			redirect('Jadwal/index/error');
// 		}	
// 	}

/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- DELETE SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */

public function deleteTransaksi($id) {
		// $plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		// $plaintext_string = $this->encrypt->decode($plaintext_string);
		// $id_staff	= $plaintext_string;
		if($this->M_admin->deleteTransaksi($id)) {
			$this->M_admin->deleteTransaksiDetail($id);
			$this->session->set_flashdata('success', 'Jadwal berhasil didelete!');
			redirect('DataTransaksi/index/delete');
		} else {
			$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
			redirect('DataTransaksi/index/error');
		}	
	}


	/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- FUNCTION SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */



}


