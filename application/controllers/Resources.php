<?php

class Resources extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user')) {
			redirect('login');
		}
		$this->load->model('resources_model');
	}

	function index()
	{
		$data['resources'] = $this->resources_model->getAll();
		$this->load->view('user/feed', $data);
	}

	function upload()
	{
		$this->load->view('resources/upload');
	}

	function personal()
	{
		$data['resources'] = $this->resources_model->getResourcesByAuthor($_SESSION['id']);
		$this->load->view('resources/personal', $data);
	}

	function save()
	{
		$this->resources_model->save();
		$this->session->set_flashdata('success', 'Resource uploaded successfully');
		redirect('user/feed');
	}

	function edit($id)
	{
		$data['resource'] = $this->resources_model->getById($id);
		$this->load->view('resources/edit', $data);
	}

	function update($id)
	{
		$this->resources_model->update($id);
		$this->session->set_flashdata('success', 'Resource updated successfully');
		redirect('user/feed');
	}

	function delete($id)
	{
		$this->resources_model->delete($id);
		$this->session->set_flashdata('success', 'Resource deleted successfully');
		redirect('resources/personal');
	}
}
