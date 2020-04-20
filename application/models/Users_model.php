<?php

class Users_model extends CI_Model
{
	function validate()
	{
		$arr['username'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		if ($this->db->get_where('users', $arr)->row() == false) {
			$arr2['email'] = $this->input->post('username');
			$arr2['password'] = md5($this->input->post('password'));
			return $this->db->get_where('users', $arr2)->row();
		} else {
			return $this->db->get_where('users', $arr)->row();
		}
	}

	function exists($username) {
		return $this->db->get_where('users', array('username' => $username))->row();
	}

	function create() {
		$arr['email'] = $this->input->post('email');
		$arr['username'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		if (!$this->exists($arr['username'])) {
			return $this->db->insert('users', $arr);
		}
		return false;
	}

	function update($id) {
		$data = $this->db->get_where('users', array('id' => $id))->row();
		if ($this->input->post('email') != "") {
			$arr['email'] = $this->input->post('email');
		} else {
			$arr['email'] = $data->email;
		}
		if ($this->input->post('username') != "") {
			$arr['username'] = $this->input->post('username');
		} else {
			$arr['username'] = $data->username;
		}
		if ($this->input->post('password') != "") {
			$arr['password'] = md5($this->input->post('password'));
		} else {
			$arr['password'] = $data->password;
		}
		$this->db->where(array('id' => $id));
		return $this->db->update('users', $arr);
	}

	function getUsername($id) {
		return $this->getData($id)->username;
	}

	function getData($id) {
		return $this->db->get_where('users', array('id' => $id))->row();
	}
}
