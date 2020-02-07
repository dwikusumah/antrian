<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login_Staff extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index() {
		if ($this->session->userdata('akses')=='masuk') {
			redirect('Kasir/kasir');
		}
		$this->load->view("V_Login_Staff");
	}

	public function authlogin() {
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		//$password = md5(md5(md5(strrev($password))));
		if($hasil = $this->M_login->checkUser($username)) {
			if($data = $this->M_login->checkPassword($username,$password)) {
				$akses = $this->M_login->checkAccountType($username,$password);
				if ($akses == "Kasir") {
					$this->session->set_userdata('id',$data[0]);
					$this->session->set_userdata('akses','masuk');
					$this->session->set_userdata('username',$username);
					redirect('Kasir/kasir');
				} else {
					$this->session->set_flashdata('error','Akun ini tidak memiliki izin akses.');
					redirect('Login_Staff');
				}
			} else {
				$this->session->set_flashdata('error','Maaf, kata sandi anda salah!');
				redirect('Login_Staff');
			}
		} else {
			$this->session->set_flashdata('error','Maaf, akun ini belum terdaftar!');
			redirect('Login_Staff');	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login_Staff');
	}
}