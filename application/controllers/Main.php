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
        if((float) $amount < 10){
            $this->form_validation->set_message('check_available_balance', '{field} can not be less than BDT 10.');
            return false;
        }else if((float) $amount > 2000){
            $this->form_validation->set_message('check_available_balance', '{field} can not be more than BDT 2000.');
            return false;
        }else if($current_balance < (float) $amount){
            $this->form_validation->set_message('check_available_balance', '{field} can not be more than your balance.');
            return false;
        }else{
            return true;
        }
    }

    public function check_available_balance_bkash($amount)
    {
        $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
        $res = $query->row_array();
        $current_balance = (float) $res['current_balance'];
        if((float) $amount < 10){
            $this->form_validation->set_message('check_available_balance_bkash', '{field} can not be less than BDT 10.');
            return false;
        }else if((float) $amount > 10000){
            $this->form_validation->set_message('check_available_balance_bkash', '{field} can not be more than BDT 10,000.');
            return false;
        }else if($current_balance < (float) $amount){
            $this->form_validation->set_message('check_available_balance_bkash', '{field} can not be more than your balance.');
            return false;
        }else{
            return true;
        }
    }

	public function flexiload()
	{
        if( $this->session->userdata('user_email')){

            $this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('amount', 'Amount', 'callback_check_available_balance');

            if ($this->form_validation->run() == FALSE){
                $query = $this->db->query("Select package.*,operator.operator_name  From package INNER JOIN operator ON operator.id= package.operator_id");
                $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='Mobile Recharge'  AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC LIMIT 0,9");
                $data['rows'] = $query->result();
                $data['requests'] = $request->result();
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
                $date = date('Y-m-d H:i:s');

                $update_query = $this->db->query("UPDATE users SET current_balance = '{$balance_after_deduct}' WHERE id= '{$this->session->userdata('user_id')}'");
                if($update_query){
                    $insert_query =  $this->db->query("INSERT INTO all_request (`request_type`, `to_number`, `amount`, `type`, `user_id`, `request_date_time`, `status`,  `package_id`, `created`, `balance_after_deduct`) VALUES ('Mobile Recharge', '{$number}', '{$amount}','{$type}','{$this->session->userdata('user_id')}','{$date}','Pending', '','{$date}','{$balance_after_deduct}')");

                    if($insert_query){
                        $this->session->set_flashdata('success_message', 'Your mobile recharge request successfully send.');
                        redirect(base_url().'main/flexiload');
                    }else{
                        $this->session->set_flashdata('error_message', 'Your mobile recharge request is failed.');
                        redirect(base_url().'main/flexiload');
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'Your mobile recharge request is failed.');
                    redirect(base_url().'main/flexiload');
                }


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
            $this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('amount', 'Amount', 'callback_check_available_balance_bkash');

            if ($this->form_validation->run() == FALSE){

                $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='dbbl' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC LIMIT 0,9");
                $data['requests'] = $request->result();
                $data['title'] = 'NoorFlexi : DBBL';
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/dbbl');
                $this->load->view('front_end/block/footer');

            }else{
                $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
                $res = $query->row_array();
                $current_balance = (float) $res['current_balance'];

                $amount = (float) $this->input->post('amount');

                $balance_after_deduct = $current_balance - $amount;
                $number = $this->input->post('number');
                $type = $this->input->post('type');
                $date = date('Y-m-d H:i:s');

                $update_query = $this->db->query("UPDATE users SET current_balance = '{$balance_after_deduct}' WHERE id= '{$this->session->userdata('user_id')}'");
                if($update_query){
                    $insert_query =  $this->db->query("INSERT INTO all_request (`request_type`, `to_number`, `amount`, `type`, `user_id`, `request_date_time`, `status`,  `package_id`, `created`, `balance_after_deduct`) VALUES ('dbbl', '{$number}', '{$amount}','{$type}','{$this->session->userdata('user_id')}','{$date}','Pending', '','{$date}','{$balance_after_deduct}')");

                    if($insert_query){
                        $this->session->set_flashdata('success_message', 'Your DBBL request successfully send.');
                        redirect(base_url().'main/dbbl');
                    }else{
                        $this->session->set_flashdata('error_message', 'Your DBBL request is failed.');
                        redirect(base_url().'main/dbbl');
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'Your DBBL request is failed.');
                    redirect(base_url().'main/dbbl');
                }
            }

        }else{
            redirect(base_url().'login');
        }

	}
	public function bkash()
	{
        if( $this->session->userdata('user_email')){
            $this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('amount', 'Amount', 'callback_check_available_balance_bkash');

            if ($this->form_validation->run() == FALSE){

                $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='bkash' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESc LIMIT 0,9");
                $data['requests'] = $request->result();
                $data['title'] = 'NoorFlexi : BKash';
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/bkash');
                $this->load->view('front_end/block/footer');

            }else{
                $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
                $res = $query->row_array();
                $current_balance = (float) $res['current_balance'];

                $amount = (float) $this->input->post('amount');

                $balance_after_deduct = $current_balance - $amount;
                $number = $this->input->post('number');
                $type = $this->input->post('type');
                $date = date('Y-m-d H:i:s');

                $update_query = $this->db->query("UPDATE users SET current_balance = '{$balance_after_deduct}' WHERE id= '{$this->session->userdata('user_id')}'");
                if($update_query){
                    $insert_query =  $this->db->query("INSERT INTO all_request (`request_type`, `to_number`, `amount`, `type`, `user_id`, `request_date_time`, `status`,  `package_id`, `created`, `balance_after_deduct`) VALUES ('bkash', '{$number}', '{$amount}','{$type}','{$this->session->userdata('user_id')}','{$date}','Pending', '','{$date}','{$balance_after_deduct}')");

                    if($insert_query){
                        $this->session->set_flashdata('success_message', 'Your bkash request successfully send.');
                        redirect(base_url().'main/bkash');
                    }else{
                        $this->session->set_flashdata('error_message', 'Your bkash request is failed.');
                        redirect(base_url().'main/bkash');
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'Your bkash request is failed.');
                    redirect(base_url().'main/bkash');
                }


            }
        }else{
            redirect(base_url().'login');
        }
	}
	public function all()
	{
        if( $this->session->userdata('user_email')){
            $request = $this->db->query("SELECT * FROM `all_request` WHERE user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = 'NoorFlexi : All';
            $this->load->view('front_end/block/header',$data);
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
            $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='bkash' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = 'NoorFlexi : Bkash';
            $this->load->view('front_end/block/header',$data);
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
            $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='dbbl' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = 'NoorFlexi : DBBL';
            $this->load->view('front_end/block/header',$data);
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
	        $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='Mobile Recharge' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = 'NoorFlexi : DBBL';
            $this->load->view('front_end/block/header',$data);
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/flexi_history');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
}
