<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login_c extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login_c');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index() {
		$this->load->view("V_Login_c");
	}

	public function authlogin() {
		$username_c = $this->input->post('username_c');
		$password_c = $this->input->post('password_c');
		//$password = md5(md5(md5(strrev($password))));
		if($hasil = $this->M_login_c->checkUser($username_c)) {
			if($data = $this->M_login_c->checkPassword($username_c,$password_c)) {
				foreach ($data as $d) {
					$this->session->set_userdata('id_daftar',$d['id_daftar']);
					$this->session->set_userdata('username_c',$username_c);
					$this->session->set_userdata('password_c',$password_c);
				}
				redirect('Generate');
			} else {
				$this->session->set_flashdata('error','Maaf, kata sandi anda salah!');
				redirect('Login_c');
			}
		} else {
			$this->session->set_flashdata('error','Maaf, akun ini belum terdaftar!');
			redirect('Login_c');	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login_c');
	}
}