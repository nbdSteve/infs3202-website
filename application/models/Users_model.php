<?php

class Users_model extends CI_Model
{
	function validate()
	{
		$arr['username'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		return $this->db->get_where('users', $arr)->row();
	}

	function exists($username) {
		return $this->db->get_where('users', array('username' => $username))->row();
	}

	function create() {
		$arr['username'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		if (!$this->exists($arr['username'], $arr['password'])) {
			return $this->db->insert('users', $arr);
		}
	}

	function getUsername($id) {
		$data = $this->db->get_where('users', array('id' => $id))->row();
		return $data->username;
	}
}
