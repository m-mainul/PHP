<?php 

class Posts Extends CI_Controller{
	function index() {
		$this->load->model('post');
		$data['results'] = $this->post->getposts();
		$this->load->view('home',$data);
	}
}