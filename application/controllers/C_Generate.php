<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Generate extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login_c');
		$this->load->model('M_mainmenu');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index() {
		//$data['total_antrian'] = $this->M_admin->getCountAntrian();
		//$data['sisa_antrian'] = $this->M_admin->getCountSisaAntrian();
		//$data['current_antrian'] = $this->M_admin->getCurrentAntrian();
		// $data = $this->getAntrian();
		// echo $data;
		$antrian = '';
		
		if($data = $this->M_mainmenu->countAntrian(true)){
			$query  = $this->db->order_by('antrian','desc')->limit(1)->get('tbl_antrian');
			if ($query->num_rows()>0) {
				$result = $query->result();
				foreach ($result as $r) {
					$kodeawal = $r->antrian;
				}
			}

			$kodeawal = substr($kodeawal,1,3);
			$kodeawal = (int)$kodeawal + 1;
			if($kodeawal<10){
				$antrian='A00'.$kodeawal;
			}else if($kodeawal > 9 && $kodeawal <=99){
				$antrian='A0'.$kodeawal;
			}else{
				$antrian='A0'.$kodeawal;
			}

			// $no_urut = (int) substr($data[0]['antrian'],1,3);
			// if ($no_urut==9) {
			// 	# code...
			// }
			// echo "<script>alert(".strlen($no_urut).");</script>";
			// echo "<script>alert(".$no_urut.");</script>";
			// if(strlen($no_urut) == 1){
			// 	$antrian = "A00".((int) $no_urut + 1);
			// }else if(strlen($no_urut) == 2){
			// 	$antrian = "A0".((int) $no_urut + 1);
			// }else{
			// 	$antrian = "A".((int) $no_urut + 1);
			// }

			// $char = "A";
			// $antrian = $char.sprintf("%03s", $no_urut);


			$data = array(
				'antrian' => $antrian
			);

			// echo "<pre>";
			// print_r($data);
			// exit();
			$this->M_mainmenu->insertAntrian($data);
			$data['list'] = $this->M_admin->getAntrianDaftar();
			//$this->load->view("V_Header");
			$this->load->view("MainMenu/V_Generate",$data);
			//$this->load->view("V_Footer");
			
		}else{
			$antrian = 'A001';

			$data = array(
				'antrian' => $antrian
			);

			$antrian = $this->M_mainmenu->insertAntrian($data);
			$data['list'] = $this->M_admin->getAntrianDaftar();
			//$this->load->view("V_Header");
			$this->load->view("MainMenu/V_Generate",$data);
			//$this->load->view("V_Footer");
		}
		// $data_antrian = $antrian;
		// $this->M_mainmenu->update_antrian($data_antrian);
		// $data_n = $this->M_login_c->checkPassword($this->session->userdata('username_c'),$this->session->userdata('password_c'));
		// foreach ($data_n as $dn) {
		// 	$id = $dn['id_antrian'];
		// }
		// $data['list'] = $this->M_admin->getAntrian($id);
		//$this->checkSession();
		//$this->load->view("V_Header");
		// $this->load->view("MainMenu/V_Generate",$data);
		//$this->load->view("V_Footer");
	}

	public function checkSession(){
		if (!$this->session->id_user){
			redirect('Login');
		}
	}	

	public function skipAntrian($id) {
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);
		
		$id_antrian	= $plaintext_string;
		
		if($this->M_admin->skipAntrian($id_antrian)) {
			redirect('Dashboard/index');
		} else {
			$this->session->set_flashdata('error', 'Jadwal berhasil didelete!');
			redirect('Dashboard/index/error');
		}	
	}

	public function getAntrian(){
		$antrian = '';
		
		if($data = $this->M_mainmenu->countAntrian(true)){

			$no_urut = (int) substr($data[0]['antrian'],1,3);
			
			if(strlen($no_urut) == 1){
				$antrian = "A00".((int) $no_urut + 1);
			}else if(strlen($no_urut) == 2){
				$antrian = "A0".((int) $no_urut + 1);
			}else{
				$antrian = "A".((int) $no_urut + 1);
			}

			$tanggal = date('Y-m-d');

			$data = array(
				'tanggal' => $tanggal,
				'antrian' => $antrian
			);

			// echo "<pre>";
			// print_r($data);
			// exit();
			$antrian = $this->M_mainmenu->insertAntrian($data);

			
		}else{
			$antrian = 'A001';
			$tanggal = date('Y-m-d');

			$data = array(
				'tanggal' => $tanggal,
				'antrian' => $antrian
			);

			$antrian = $this->M_mainmenu->insertAntrian($data);
		}
		return $antrian;
	}

}
