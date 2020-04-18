<?php

/**
 *    Quiz 01, INFS3202/7202, semester 1, 2020
 *    Student ID: 44852593
 *    Prac Session: Prac9
 */
class Quiz1 extends CI_Controller
{
	public function index()
	{
		$this->load->view('style_sheet');
		$this->load->view('start_quiz');
	}

	/**
	 * Load a basic static webpage, including header.php, body.php, and footer.php.
	 */
	public function task_a()
	{
		$this->load->view('style_sheet');

		// START WRITING YOUR CODE HERE
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('footer');
		// END
	}

	/**
	 * Load the required page content.
	 *
	 * Subtask 1. When a user visits http://localhost/infs3202_quiz1/quiz1/task_b, appends a
	 * page number (e.g., 1) to the URL, the content of the required page
	 * (e.g., /views/task_b_pages/1.php) should be loaded. The layout of the page shouyeahld
	 * be the same as Figure 3.
	 *
	 **/
	public function task_b($page_num = NULL)
	{
		$this->load->view('style_sheet');
		$this->load->view('b_input');

		//START WRITING YOUR CODE HERE
		if (!file_exists(APPPATH . 'views/task_b_pages/' . $page_num . '.php')) show_404();
		$data['page_num'] = $page_num;
		$this->load->view('task_b_pages/' . $page_num, $data);
		//END
	}

	/**
	 * Subtask 2. Create a new function. When a user clicks the button 'Details',
	 * a specification page corresponding to that number of page should be loaded.
	 *
	 * Remember to add the code: $this->load->view('style_sheet');
	 * at the beginning of your function.
	 *
	 */
	//START WRITING YOUR CODE HERE
	public function details($page_num = NULL)
	{
		$this->load->view('style_sheet');
		if (!file_exists(APPPATH . 'views/task_b_pages_details/' . $page_num . '.php')) show_404();
		$data['page_num'] = $page_num;
		$this->load->view('task_b_pages_details/' . $page_num, $data);
	}
	//END
}

?>
