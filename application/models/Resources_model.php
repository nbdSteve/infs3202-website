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
		} else {
			$this->session->set_flashdata('error', 'Please upload a source file for your resource.');
			redirect('resources/upload');
			return;
		}
		if (isset($_FILES['icon']['name'])) {
			$config_2['upload_path'] = APPPATH . '../uploads/';
			$config_2['allowed_types'] = 'gif|jpg|png';
			$config_2['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->upload->initialize($config_2);
			if ($this->upload->do_upload('icon')) {
				$uploaded = $this->upload->data();
				$arr['icon'] = $uploaded['file_name'];
			}
		} else {
			unlink(APPPATH . '../uploads/' . $arr['resource']);
			$this->session->set_flashdata('error', 'Please upload an icon for your resource.');
			redirect('resources/upload');
			return;
		}
		$this->db->insert('resources', $arr);
	}

	function update($id)
	{
		$data = $this->db->get_where('resources', array('id' => $id))->row();
		$i = 0;
		if ($this->input->post('title') != "") {
			$arr['title'] = $this->input->post('title');
		} else {
			$arr['title'] = $data->title;
			$i++;
		}
		if ($this->input->post('version') != "") {
			$arr['version'] = $this->input->post('version');
		} else {
			$arr['version'] = $data->version;
			$i++;
		}
		if ($this->input->post('tag_line') != "") {
			$arr['tag_line'] = $this->input->post('tag_line');
		} else {
			$arr['tag_line'] = $data->tag_line;
			$i++;
		}
		if ($this->input->post('price') != "") {
			$arr['price'] = $this->input->post('price');
		} else {
			$arr['price'] = $data->price;
			$i++;
		}
		if ($this->input->post('description') != "") {
			$arr['description'] = $this->input->post('description');
		} else {
			$arr['description'] = $data->description;
		}
		$arr['author'] = $_SESSION['id'];
		if (isset($_FILES['resource']['name'])) {
			$config['upload_path'] = APPPATH . '../uploads/';
			$config['allowed_types'] = 'jar|zip|rar';
			$config['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('resource')) {
				unlink(APPPATH . '../uploads/' . $data->resource);
				$uploaded = $this->upload->data();
				$arr['resource'] = $uploaded['file_name'];
			} else {
				$i++;
			}
		}
		if (isset($_FILES['icon']['name'])) {
			$config_2['upload_path'] = APPPATH . '../uploads/';
			$config_2['allowed_types'] = 'gif|jpg|png';
			$config_2['file_name'] = date('YmdHms') . '_' . rand(1, 999999);
			$this->upload->initialize($config_2);
			if ($this->upload->do_upload('icon')) {
				unlink(APPPATH . '../uploads/' . $data->icon);
				$uploaded = $this->upload->data();
				$arr['icon'] = $uploaded['file_name'];
			} else {
				$i++;
			}
		}
		if ($i == 6 && $arr['description'] == $data->description) {
			return false;
		}
		$this->db->where(array('id' => $id));
		return $this->db->update('resources', $arr);
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
