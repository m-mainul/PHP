<?php 
class Post Extends CI_Model {

	function getposts() {
		$this->db->select()->from('posts')->order_by('date_added','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
}