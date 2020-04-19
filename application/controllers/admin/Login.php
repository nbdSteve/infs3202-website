<?php

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin')) {
			redirect('admin/dashboard');
		}
	}

	function index()
	{
		$this->load->view('admin/login.php');
	}

	function verify()
	{
		//user root, pass password
		$this->load->model('admins_model');
		if ($this->admins_model->validate()) {
			$this->session->set_userdata('admin', '1');
			redirect('admin/dashboard');
		} else {
			redirect('admin');
		}
	}
}
