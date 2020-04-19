<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user')) {
			redirect('user/dashboard');
		}
	}

	function index() {
		$this->load->view('login');
	}

	function verify()
	{
		$this->load->model('users_model');
		if ($this->users_model->validate()) {
			$this->session->set_userdata('user', $this->users_model->getUserId());
			redirect('user/dashboard');
		} else {
			$this->session->set_flashdata('error', 'The username or password was incorrect!');
			redirect('login');
		}
	}
}
