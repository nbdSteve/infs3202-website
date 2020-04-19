<?php

class Resources_model extends CI_Model
{
	function getAll($limit, $offset)
	{
		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$this->db->like(array('name' => $keyword));
			$this->db->or_like(array('description' => $keyword));
			$this->db->or_like(array('author' => $keyword));
		}
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by('id DESC');
		return $this->db->get('resources')->result();
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
		$arr['name'] = $this->input->post('name');
		$arr['description'] = $this->input->post('description');
		$arr['author'] = $this->input->post('author');
		if (isset($_FILES['image']['name'])) {
			$config['upload_path'] = APPPATH . '../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$uploaded = $this->upload->data();
				$arr['image'] = $uploaded['file_name'];
			}
		}
		$this->db->insert('resources', $arr);
	}

	function update($id)
	{
		$arr['name'] = $this->input->post('name');
		$arr['description'] = $this->input->post('description');
		$arr['author'] = $this->input->post('author');
		if (isset($_FILES['image']['name'])) {
			$config['upload_path'] = APPPATH . '../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$uploaded = $this->upload->data();
				$arr['image'] = $uploaded['file_name'];
			}
		}
		$this->db->where(array('id' => $id));
		$this->db->update('resources', $arr);
	}

	function delete($id)
	{
		$this->db->where(array('id' => $id));
		$this->db->delete('resources');
	}
}
