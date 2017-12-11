<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('admin_email')) {
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/index');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }

    }
    public function flexiload()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/flexiload');
            $this->load->view('front_end/block/footer');

        }else{
            redirect(base_url().'login');
        }
    }
    public function package_recharge()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/package_recharge');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
    public function dbbl()
    {
        if(! $this->session->userdata('admin_email')){

            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/dbbl');
            $this->load->view('front_end/block/footer');

        }else{
            redirect(base_url().'login');
        }

    }
    public function bkash()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/bkash');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
    public function all()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/allhistory');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
    public function bkash_history()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/bkash_history');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
    public function dbbl_history()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/dbbl_history');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
    public function flexi_history()
    {
        if(! $this->session->userdata('admin_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/flexi_history');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
}
