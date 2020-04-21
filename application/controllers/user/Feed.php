<?php
class Feed extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('resources/latest');
		}
		$this->load->model('resources_model');
	}

	function index()
	{
		$data['resources'] = $this->resources_model->getAll();
		$this->load->model('users_model');
		$this->load->view('user/feed', $data);
	}

	function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}
