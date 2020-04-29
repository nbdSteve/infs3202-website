<?php

class Reviews_model extends CI_Model
{
	function getReviews($resource_id)
	{
		$this->db->get_where('reviews', array('resource_id' => $resource_id));
		$this->db->order_by('id DESC');
		return $this->db->get('reviews')->result();
	}

	function getAverageScore($resource_id)
	{
		$number = 0;
		$score = 0.0;
		foreach ($this->getReviews($resource_id) as $r) {
			$number++;
			$score += $r->score;
		}
		if ($score == 0) return 0;
		return $score / $number;
	}

	function review($resource_id, $user_id)
	{
		if ($this->getReview($resource_id, $user_id) != "") {
			$this->removeReview($resource_id, $user_id);
		}
		$arr['resource_id'] = $resource_id;
		$arr['user_id'] = $user_id;
		$arr['review'] = $this->input->post('review');
		$arr['score'] = $this->input->post('score');
		$this->db->insert('reviews', $arr);
	}

	function removeReview($resource_id, $user_id)
	{
		$arr['resource_id'] = $resource_id;
		$arr['user_id'] = $user_id;
		$this->db->get_where('reviews', $arr);
		$this->db->delete('reviews', $arr);
	}

	function hasReviewed($resource_id, $user_id) {
		return $this->db->get_where('reviews', array('resource_id' => $resource_id, 'user_id' => $user_id))->row() == true;
	}

	function getReview($resource_id, $user_id) {
		$data = $this->db->get_where('reviews', array('resource_id' => $resource_id, 'user_id' => $user_id))->row();
		return $data->review;
	}

	function getReviewScore($resource_id, $user_id) {
		$data = $this->db->get_where('reviews', array('resource_id' => $resource_id, 'user_id' => $user_id))->row();
		return $data->score;
	}
}
