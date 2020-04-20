<?php

class Account extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('login');
		}
		$this->load->model('users_model');
	}

	function index()
	{
		$data['user'] = $this->users_model->getData($_SESSION['id']);
		$this->load->view('user/account', $data);
	}

	function update($id)
	{
		if ($this->users_model->update($id)) {
			$this->session->set_flashdata('success', 'Your account details have been successfully updated');
			redirect('user/account');
		}
	}
}
