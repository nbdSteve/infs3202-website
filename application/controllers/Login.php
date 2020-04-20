<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user')) {
			redirect('user/feed');
		}
	}

	function index() {
		$this->load->view('login');
	}

	function verify()
	{
		$this->load->model('users_model');
		$data = $this->users_model->validate();
		if ($data) {
			$this->session->set_userdata('user', $data->username);
			$this->session->set_userdata('id', $data->id);
			redirect('user/feed');
		} else {
			$this->session->set_flashdata('error', 'The username or password was incorrect!');
			redirect('login');
		}
	}
}
