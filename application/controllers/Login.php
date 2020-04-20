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
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[16]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
		if (!$this->form_validation->run()) {
			$this->load->view('login');
		} else {
			$this->verify();
		}
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
