<?php

class Likes_model extends CI_Model
{
	function getLikes($resource_id) {
		$this->db->get_where('likes', array('resource_id' => $resource_id));
		return $this->db->get('likes')->num_rows();
	}

	function addLike($resource_id, $user_id) {
		$arr['resource_id'] = $resource_id;
		$arr['user_id'] = $user_id;
		$this->db->insert('likes', $arr);
	}

	function removeLike($resource_id, $user_id) {
		$arr['resource_id'] = $resource_id;
		$arr['user_id'] = $user_id;
		$this->db->get_where('likes', $arr);
		$this->db->delete('likes', $arr);
	}

	function hasLiked($resource_id, $user_id) {
		return $this->db->get_where('likes', array('resource_id' => $resource_id, 'user_id' => $user_id))->row() == true;
	}
}
