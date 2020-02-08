<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_DataBarang extends CI_Controller {

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
		// check status insert update
		if($status) {
			if($status == 'error'){
				$data['status'] = 
				'
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<i class="false fa-times-circle"></i> Terdapat Kesalahan dalam database
				</div>
				';
			} else {
				$data['status'] = 
				'
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<i class="fa fa-check-circle"></i> Data Berhasil di'.$status.'
				</div>
				';	
			}
		} else {
			$data['status'] = '';
		}
		// generate all data jadwal
		$data['barang'] = $this->M_admin->selectBarang();
		$this->load->view("V_Header");
		$this->load->view("Admin/Barang/V_index",$data);
		$this->load->view("V_Footer");
	}


	public function inputBarang(){
		$this->load->view("V_Header");
		$this->load->view("Admin/Barang/V_Input");
		$this->load->view("V_Footer");	
	}

/* ----------------------- VIEW LOAD END ----------------------------*/

/* ----------------------- VIEW LOAD DETAIL -------------------------*/

public function layananDetail($id = false) {
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);
		$data['id_layanan']	= $plaintext_string;
		$data['list'] = $this->M_admin->getLayanan($plaintext_string);
		$data['id'] = $id;
		$this->load->view("V_Header");
		$this->load->view("Admin/Layanan/V_Detail",$data);
		$this->load->view("V_Footer");

}

public function editBarang($id = false) {
		//$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		//$plaintext_string = $this->encrypt->decode($plaintext_string);
		//$data['id_layanan']	= $plaintext_string;
		$data['id_user']	= $id;
		$data['list'] = $this->M_admin->getBarang($id);
		$this->load->view("V_Header");
		$this->load->view("Admin/Barang/V_Edit",$data);
		$this->load->view("V_Footer");
}

/*------------------------ VIEW LOAD DETAIL END ----------------------*/

/* ----------------------- INSERT SECTION ----------------------------*/
	public function insertBarang() {
		$id = $this->input->post('id');
		$nama_barang = $this->input->post('nama_barang');
		$stok = $this->input->post('stok');
		$jenis_barang = $this->input->post('jenis_barang');
		$harga = $this->input->post('harga');
		$data  = array(
				'id' => $id,
				'nama_barang' => $nama_barang, 
				'stok' => $stok,
				'jenis_barang' => $jenis_barang,
				'harga' => $harga
				);
		// echo "<pre>";
		// print_r($data);
		// exit();
		if($this->M_admin->insertBarang($data)) {
			redirect('DataBarang/index/simpan');
		} else {
			redirect('DataBarang/index/error');
		}
	}

/*------------------------------- UPDATE SECTION --------------------------------*/

	public function updateBarang(){
		$nama_barang = $this->input->post('nama_barang');
		$stok = $this->input->post('stok');
		$jenis_barang = $this->input->post('jenis_barang');
		$harga = $this->input->post('harga');
		$data  = array(
				'nama_barang' => $nama_barang, 
				'stok' => $stok,
				'jenis_barang' => $jenis_barang,
				'harga' => $harga
				);
		$id = $this->input->post('id');
		// echo "<pre>";
		// print_r($data);
		// exit();
		if($this->M_admin->updateBarang($id,$data)) {
			redirect('DataBarang/index/update');
		} else {
			redirect('DataBarang/index/error');
		}	
	}

/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- DELETE SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */

public function deleteBarang($id) {
		// $plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		// $plaintext_string = $this->encrypt->decode($plaintext_string);
		// $id_staff	= $plaintext_string;
		if($this->M_admin->deleteBarang($id)) {
			redirect('DataBarang/index/delete');
		} else {
			redirect('DataBarang/index/error');
		}	
	}
}
