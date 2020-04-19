<?php
class Home extends CI_Controller {
	function index() {
		$this->load->view('header.php');
		$this->load->view('home.php');
		$this->load->view('footer.php');
	}
}
