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
	public function package_recharge()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/package_recharge');
		$this->load->view('front_end/block/footer');
	}
	public function dbbl()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/dbbl');
		$this->load->view('front_end/block/footer');
	}
	public function bkash()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/bkash');
		$this->load->view('front_end/block/footer');
	}
	public function all()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/allhistory');
		$this->load->view('front_end/block/footer');
	}
	public function bkash_history()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/bkash_history');
		$this->load->view('front_end/block/footer');
	}
	public function dbbl_history()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/dbbl_history');
		$this->load->view('front_end/block/footer');
	}
	public function flexi_history()
	{
		$this->load->view('front_end/block/header');
		$this->load->view('front_end/block/navigation');
		$this->load->view('front_end/flexi_history');
		$this->load->view('front_end/block/footer');
	}
}
