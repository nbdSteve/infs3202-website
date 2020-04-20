<?php

class Create extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user')) {
			redirect('user/feed');
		}
	}

	function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]|max_length[16]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		if (!$this->form_validation->run()) {
			$this->load->view('create');
		} else {
			$this->create();
		}
	}

	function create()
	{
		$this->load->model('users_model');
		$this->users_model->create();
		$this->session->set_flashdata('success', 'Account created, please log in.');
		redirect('login');
	}
}
