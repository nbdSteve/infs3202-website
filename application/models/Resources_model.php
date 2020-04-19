<?php

class Resources_model extends CI_Model
{
	function getAll()
	{
		$this->db->order_by('id DESC');
		return $this->db->get('resources')->result();
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
		$this->db->insert('resources', $arr);
	}

	function update($id)
	{
		$arr['name'] = $this->input->post('name');
		$arr['description'] = $this->input->post('description');
		$arr['author'] = $this->input->post('author');
		$this->db->where(array('id' => $id));
		$this->db->update('resources', $arr);
	}

	function delete($id) {
		$this->db->where(array('id' => $id));
		$this->db->delete('resources');
	}
}
