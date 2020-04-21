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
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|min_length[1]|max_length[16]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[16]|matches[password_conf]');
		$this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[users.email]');
		$data['user'] = $this->users_model->getData($_SESSION['id']);
		if (!$this->form_validation->run()) {
			$this->load->view('user/account', $data);
		} else {
			$this->update($_SESSION['id']);
		}
	}

	function update($id)
	{
		if ($this->users_model->update($id)) {
			$this->session->set_userdata('user', $this->users_model->getUsername($id));
			$this->session->set_flashdata('success', 'Your account details have been successfully updated');
			redirect('user/account');
		} else {
			$this->session->set_flashdata('error', 'You must make a change in order to update it.');
			redirect('user/account');
		}
	}
}
