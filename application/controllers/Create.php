<?php
class Create extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user')) {
			redirect('user/dashboard');
		}
	}

	function index()
	{
		$this->load->view('create');
	}

	function create()
	{
		$this->load->model('users_model');
		if ($this->users_model->create()) {
			$this->session->set_flashdata('success', 'Account created, please log in.');
			redirect('login');
		} else {
			$this->session->set_flashdata('error', 'Username already in use, please try another.');
			redirect('create');
		}
	}
}
