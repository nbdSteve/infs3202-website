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

	function exists($username)
	{
		return $this->db->get_where('users', array('username' => $username))->row();
	}

	function create()
	{
		$arr['email'] = $this->input->post('email');
		$arr['username'] = $this->input->post('username');
		$arr['password'] = md5($this->input->post('password'));
		if (!$this->exists($arr['username'])) {
			return $this->db->insert('users', $arr);
		}
		return false;
	}

	function update($id)
	{
		$data = $this->db->get_where('users', array('id' => $id))->row();
		$i = 0;
		if ($this->input->post('email') != "") {
			$arr['email'] = $this->input->post('email');
		} else {
			$arr['email'] = $data->email;
			$i++;
		}
		if ($this->input->post('username') != "") {
			$arr['username'] = $this->input->post('username');
		} else {
			$arr['username'] = $data->username;
			$i++;
		}
		if ($this->input->post('password') != "") {
			$arr['password'] = md5($this->input->post('password'));
		} else {
			$arr['password'] = $data->password;
			$i++;
		}
//		if ($this->input->post('profile_picture') != "") {
		if (isset($_FILES['profile_picture']['name'])) {
			$config['upload_path'] = APPPATH . '../uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('profile_picture')) {
				unlink(APPPATH . '../uploads/' . $data->profile_picture);
				$uploaded = $this->upload->data();
				$arr['profile_picture'] = $uploaded['file_name'];
			}
//		}
		} else {
			$arr['profile_picture'] = $data->profile_picture;
			$i++;
		}
		if ($i == 4) {
			return false;
		}
		$this->db->where(array('id' => $id));
		return $this->db->update('users', $arr);
	}

	function getUsername($id)
	{
		return $this->getData($id)->username;
	}

	function getData($id)
	{
		return $this->db->get_where('users', array('id' => $id))->row();
	}
}
