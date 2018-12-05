<?php 
class Users extends MY_Controller
{
	public function index()
	{
		// $this->load->helper('url');
		$this->load->view('admin/register');
	}

} ?>