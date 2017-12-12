<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
        if ($this->session->userdata('user_email')) {
            $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
            $data['row'] = $query->row_array();
            $data['title'] = 'NoorFlexi : Dashboard';
            $this->load->view('front_end/block/header',$data);
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/index');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }

	}

    public function check_available_balance($amount)
    {
        $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
        $res = $query->row_array();
        $current_balance = (float) $res['current_balance'];
        if($current_balance < (float) $amount){
            return true;
        }else{
            return false;
        }
    }

	public function flexiload()
	{
        if( $this->session->userdata('user_email')){

            $this->form_validation->set_rules('number', 'number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('amount', 'amount', 'trim|required|min_length[2]|max_length[5]|callback_check_available_balance');

            if ($this->form_validation->run() == FALSE){
                $query = $this->db->query("Select package.*,operator.operator_name  From package INNER JOIN operator ON operator.id= package.operator_id");
                $data['rows'] = $query->result();
                $data['title'] = 'NoorFlexi : Flexiload';
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/flexiload');
                $this->load->view('front_end/block/footer');

            }else{
                $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
                $res = $query->row_array();
                $current_balance = (float) $res['current_balance'];

                $amount = (float) $this->input->post('amount');

                $balance_after_deduct = $current_balance - $amount;
                $number = $this->input->post('number');
                $type = $this->input->post('type');
            }

        }else{
            redirect(base_url().'login');
        }
	}
	public function package_recharge()
	{
        if( $this->session->userdata('user_email')){
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
	    if( $this->session->userdata('user_email')){

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
        if( $this->session->userdata('user_email')){
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
        if( $this->session->userdata('user_email')){
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
	    if( $this->session->userdata('user_email')){
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
	    if( $this->session->userdata('user_email')){
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
	    if( $this->session->userdata('user_email')){
            $this->load->view('front_end/block/header');
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/flexi_history');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
}
