<?php

class Resources_model extends CI_Model
{
//	function getAll($limit, $offset)
//	{
//		$keyword = $this->input->get('keyword');
//		if ($keyword) {
//			$this->db->like(array('name' => $keyword));
//			$this->db->or_like(array('description' => $keyword));
//			$this->db->or_like(array('author' => $keyword));
//		}
//		$this->db->limit($limit);
//		$this->db->offset($offset);
//		$this->db->order_by('id DESC');
//		return $this->db->get('resources')->result();
//	}

	function getAll()
	{
		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$this->db->like(array('name' => $keyword));
			$this->db->like(array('tag_line' => $keyword));
			$this->db->or_like(array('description' => $keyword));
			$this->db->or_like(array('author' => $keyword));
		}
		$this->db->order_by('id DESC');
		return $this->db->get('resources')->result();
	}

	function getResourcesByAuthor($id)
	{
		$this->db->order_by('id DESC');
		return $this->db->get_where('resources', array('author' => $id))->result();
	}


	function countAll()
	{
		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$this->db->like(array('name' => $keyword));
			$this->db->or_like(array('description' => $keyword));
			$this->db->or_like(array('author' => $keyword));
		}
		return $this->db->get('resources')->num_rows();
	}

	function getById($id)
	{
		return $this->db->get_where('resources', array('id' => $id))->row();
	}

	function save()
	{
		if ($this->input->post('title') == "") {
			$this->session->set_flashdata('error', 'Please enter a title for your resource.');
			redirect('resources/upload');
			return;
		}
		if ($this->input->post('version') == "") {
			$this->session->set_flashdata('error', 'Please enter a version string for your resource.');
			redirect('resources/upload');
			return;
		}
		if ($this->input->post('tag_line') == "") {
			$this->session->set_flashdata('error', 'Please enter a tag line for your resource.');
			redirect('resources/upload');
			return;
		}
		$arr['title'] = $this->input->post('title');
		$arr['version'] = $this->input->post('version');
		$arr['tag_line'] = $this->input->post('tag_line');
		$arr['price'] = $this->input->post('price');
		$arr['description'] = $this->input->post('description');
		$arr['author'] = $_SESSION['id'];
		if (isset($_FILES['resource']['name'])) {
			$config['upload_path'] = APPPATH . '../uploads/';
			$config['allowed_types'] = 'jar|zip|rar';
			$config['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('resource')) {
				$uploaded = $this->upload->data();
				$arr['resource'] = $uploaded['file_name'];
			} else {
				$this->session->set_flashdata('error', 'Please upload a source file for your resource.');
				redirect('resources/upload');
				return;
			}
		}
		if (isset($_FILES['icon']['name'])) {
			$config_2['upload_path'] = APPPATH . '../uploads/';
			$config_2['allowed_types'] = 'gif|jpg|png';
			$config_2['min_width'] = 64;
			$config_2['min_height'] = 64;
			$config_2['max_width'] = 128;
			$config_2['max_height'] = 128;
			$config_2['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->upload->initialize($config_2);
			if ($this->upload->do_upload('icon')) {
				$uploaded = $this->upload->data();
				$arr['icon'] = $uploaded['file_name'];
			} else {
				unlink(APPPATH . '../uploads/' . $arr['resource']);
				$this->session->set_flashdata('error', 'Please upload an icon for your resource.');
				redirect('resources/upload');
				return;
			}
		}
		$this->db->insert('resources', $arr);
	}

	function update($id)
	{
		if ($this->input->post('title') == "") {
			$this->session->set_flashdata('error', 'Please enter a title for your resource.');
			redirect('resources/edit/' . $id);
			return;
		}
		if ($this->input->post('version') == "") {
			$this->session->set_flashdata('error', 'Please enter a version string for your resource.');
			redirect('resources/edit/' . $id);
			return;
		}
		if ($this->input->post('tag_line') == "") {
			$this->session->set_flashdata('error', 'Please enter a tag line for your resource.');
			redirect('resources/edit/' . $id);
			return;
		}
		$arr['title'] = $this->input->post('title');
		$arr['version'] = $this->input->post('version');
		$arr['tag_line'] = $this->input->post('tag_line');
		$arr['price'] = $this->input->post('price');
		$arr['description'] = $this->input->post('description');
		$arr['author'] = $_SESSION['id'];
		if (isset($_FILES['resource']['name'])) {
			$config['upload_path'] = APPPATH . '../uploads/';
			$config['allowed_types'] = 'jar|zip|rar';
			$config['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('resource')) {
				$uploaded = $this->upload->data();
				$arr['resource'] = $uploaded['file_name'];
			}
		}
		if (isset($_FILES['icon']['name'])) {
			$config_2['upload_path'] = APPPATH . '../uploads/';
			$config_2['allowed_types'] = 'gif|jpg|png';
			$config_2['min_width'] = 64;
			$config_2['min_height'] = 64;
			$config_2['max_width'] = 128;
			$config_2['max_height'] = 128;
			$config_2['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->upload->initialize($config_2);
			if ($this->upload->do_upload('icon')) {
				$uploaded = $this->upload->data();
				$arr['icon'] = $uploaded['file_name'];
			}
		}
		$this->db->where(array('id' => $id));
		$this->db->update('resources', $arr);
	}

	function delete($id)
	{
		$data = $this->db->get_where('resources', array('id' => $id))->row();
		unlink(APPPATH . '../uploads/' . $data->resource);
		unlink(APPPATH . '../uploads/' . $data->icon);
		$this->db->where(array('id' => $id));
		$this->db->delete('resources');
	}
}
