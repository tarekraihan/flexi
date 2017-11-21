<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('admin/block/header');
		$this->load->view('admin/block/navigation');
		$this->load->view('admin/index');
		$this->load->view('admin/block/footer');
	}
}
