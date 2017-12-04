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
    public function flexiload()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/flexiload');
        $this->load->view('admin/block/footer');
    }
    public function package_recharge()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/package_recharge');
        $this->load->view('admin/block/footer');
    }
    public function dbbl()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/dbbl');
        $this->load->view('admin/block/footer');
    }
    public function bkash()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/bkash');
        $this->load->view('admin/block/footer');
    }
    public function all()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/allhistory');
        $this->load->view('admin/block/footer');
    }
    public function bkash_history()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/bkash_history');
        $this->load->view('admin/block/footer');
    }
    public function dbbl_history()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/dbbl_history');
        $this->load->view('admin/block/footer');
    }
    public function flexi_history()
    {
        $this->load->view('admin/block/header');
        $this->load->view('admin/block/navigation');
        $this->load->view('admin/flexi_history');
        $this->load->view('admin/block/footer');
    }
}
