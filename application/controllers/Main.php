<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/index');
		$this->load->view('front_end/block/footer');
	}
	public function flexiload()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/flexiload');
		$this->load->view('front_end/block/footer');
	}
}
