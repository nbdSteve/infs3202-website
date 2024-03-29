<?php

class Resources extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
//		if (!$this->session->userdata('user')) {
//			redirect('login');
//		}
		$this->load->model('resources_model');
		$this->load->model('users_model');
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

	function latest()
	{
		$data['resources'] = $this->resources_model->getAll();
		$this->load->view('resources/latest', $data);
	}

	function personal()
	{
		$data['resources'] = $this->resources_model->getResourcesByAuthor($_SESSION['id']);
		$this->load->view('resources/personal', $data);
	}

	function save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[16]|is_unique[resources.title]');
		$this->form_validation->set_rules('version', 'Version', 'trim|required|min_length[1]|max_length[8]');
		$this->form_validation->set_rules('tag_line', 'Tag Line', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[1]');
		if (!$this->form_validation->run()) {
			$this->load->view('resources/upload');
		} else {
			$this->resources_model->save();
			$this->session->set_flashdata('success', 'Resource uploaded successfully');
			redirect('resources/personal');
		}
	}

	function edit($id)
	{
		$data['resource'] = $this->resources_model->getById($id);
		$this->load->view('resources/edit', $data);
	}

	function update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|min_length[3]|max_length[16]|is_unique[resources.title]');
		$this->form_validation->set_rules('version', 'Version', 'trim|min_length[1]|max_length[8]');
		$this->form_validation->set_rules('tag_line', 'Tag Line', 'trim|min_length[1]');
		$this->form_validation->set_rules('description', 'Description', 'trim|min_length[1]');
		if (!$this->form_validation->run()) {
			$this->edit($id);
		} else {
			if (!$this->resources_model->update($id)) {
				$this->session->set_flashdata('error', 'You must make a change in order to update it.');
				$this->edit($id);
			} else {
				$this->session->set_flashdata('success', 'Resource updated successfully');
				redirect('resources/personal');
			}
		}
	}

	function delete($id)
	{
		$this->resources_model->delete($id);
		$this->session->set_flashdata('success', 'Resource deleted successfully');
		redirect('resources/personal');
	}

	function page($id)
	{
		$this->load->model('likes_model');
		$this->load->model('reviews_model');
		$data['resource'] = $this->resources_model->getById($id);
		$data['reviews'] = $this->reviews_model->getReviews($id);
		$this->load->view('resources/page', $data);
	}

	function like($resource_id, $user_id)
	{
		$this->load->model('likes_model');
		$this->likes_model->addLike($resource_id, $user_id);
		redirect('resources/page/' . $resource_id);
	}

	function unlike($resource_id, $user_id)
	{
		$this->load->model('likes_model');
		$this->likes_model->removeLike($resource_id, $user_id);
		redirect('resources/page/' . $resource_id);
	}

	function removeReview($resource_id, $user_id) {
		$this->load->model('reviews_model');
		$this->reviews_model->removeReview($resource_id, $user_id);
		redirect('resources/page/' . $resource_id);
	}

	function review($resource_id, $user_id) {
		$this->load->model('reviews_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('review', 'Review', 'trim|required|min_length[10]|max_length[500]');
		$this->form_validation->set_rules('score', 'Score', 'trim|required|decimal|greater_than[0]|less_than_equal_to[5]');
		if (!$this->form_validation->run()) {
			$this->page($resource_id);
		} else {
			$this->reviews_model->review($resource_id, $user_id);
			redirect('resources/page/' . $resource_id);
		}
	}
}
