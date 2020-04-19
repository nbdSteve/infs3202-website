<?php
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('login');
		}
	}

	function index()
	{
		$this->load->view('user/dashboard');
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('user');
	}
}
