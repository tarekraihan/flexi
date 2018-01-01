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
            $this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('amount', 'Amount', 'callback_check_available_balance');
            $this->form_validation->set_rules('package', 'package', 'trim|required');
            $this->form_validation->set_rules('type', 'Type', 'trim|required');

            if ($this->form_validation->run() == FALSE){
                $query = $this->db->query("Select package.*,operator.operator_name  From package INNER JOIN operator ON operator.id= package.operator_id");
                $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='Package Recharge'  AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC LIMIT 0,9");
                $operators = $this->db->query("SELECT * FROM `operator`");
                $data['rows'] = $query->result();
                $data['requests'] = $request->result();
                $data['operators'] = $operators->result();
                $data['title'] = 'NoorFlexi : Package Recharge';
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/package_recharge');
                $this->load->view('front_end/block/footer');

            }else{
                $query = $this->db->query("Select current_balance From users where id= '{$this->session->userdata('user_id')}'");
                $res = $query->row_array();
                $current_balance = (float) $res['current_balance'];

                $amount = (float) $this->input->post('amount');

                $balance_after_deduct = $current_balance - $amount;
                $number = $this->input->post('number');
                $package = $this->input->post('package');
                $operator = $this->input->post('operator');
                $type = $this->input->post('type');
                $date = date('Y-m-d H:i:s');

                $update_query = $this->db->query("UPDATE users SET current_balance = '{$balance_after_deduct}' WHERE id= '{$this->session->userdata('user_id')}'");
                if($update_query){
                    $insert_query =  $this->db->query("INSERT INTO all_request (`request_type`, `to_number`, `amount`, `type`, `user_id`, `request_date_time`, `status`,  `package_id`, `created`, `balance_after_deduct`,`operator_id`) VALUES ('Package Recharge', '{$number}', '{$amount}','{$type}','{$this->session->userdata('user_id')}','{$date}','Pending', '{$package}','{$date}','{$balance_after_deduct}','{$operator}')");

                    if($insert_query){
                        $this->session->set_flashdata('success_message', 'Your package recharge successfully send.');
                        redirect(base_url().'main/package_recharge');
                    }else{
                        $this->session->set_flashdata('error_message', 'Your package recharge is failed.');
                        redirect(base_url().'main/package_recharge');
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'Your package recharge is failed.');
                    redirect(base_url().'main/package_recharge');
                }
            }
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
	public function package_recharge_history()
	{
	    if( $this->session->userdata('user_email')){
	        $request = $this->db->query("SELECT * FROM `all_request` WHERE request_type ='Package Recharge' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = 'NoorFlexi : Package Recharge';
            $this->load->view('front_end/block/header',$data);
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/package_recharge_history');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
	public function pending_request()
	{
	    if( $this->session->userdata('user_email')){
	        $request = $this->db->query("SELECT * FROM `all_request` WHERE status='Pending' AND user_id = '{$this->session->userdata('user_id')}' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = 'NoorFlexi : Pending Request';
            $this->load->view('front_end/block/header',$data);
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/pending_request');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }

    public function add_user()
    {
        if( $this->session->userdata('user_email')){
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone_no', 'Phone no', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');

            if ($this->form_validation->run() == FALSE){
                $data['title'] = "Add User";
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/add_user');
                $this->load->view('front_end/block/footer');

            }else {
                $username = $this->input->post('username');
                $email_address = $this->input->post('email_address');
                $phone_no = $this->input->post('phone_no');
                $password = md5($this->input->post('password'));
                $type = $this->input->post('type');
                $ref = $this->session->userdata('user_id');

                $power = 0;
                if ($type == 'Reseller') {
                    $power = 25;
                } else if ($type == 'User') {
                    $power = 0;
                }


                $date = date('Y-m-d H:i:s');

                $insert_query = $this->db->query("INSERT INTO users (`username`, `password`, `email`, `phone`, `power`, `reseller_id`,`created`) VALUES ('{$username}', '{$password}','{$email_address}','{$phone_no}','{$power}','{$ref}','{$date}')");

                if ($insert_query) {
                    $this->session->set_flashdata('success_message', 'Add user Successfully');
                    redirect(base_url() . 'main/add_user/');
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add user');
                    redirect(base_url() . 'main/add_user/');
                }
            }

        }else{
            redirect(base_url().'login');
        }
    }

    public function user_list()
    {
        if( $this->session->userdata('user_email')){
            $query = $this->db->query( "SELECT users.*,admins.username as admin_name, users.username as username, u.username as user_admin FROM users LEFT JOIN admins ON admins.id = users.admin_id LEFT JOIN users as u ON u.id = users.reseller_id WHERE users.reseller_id = '{$this->session->userdata('user_id')}'");
            $data['results'] = $query->result();
            $data['title'] = "User List";
            $this->load->view('front_end/block/header',$data);
            $this->load->view('front_end/block/navigation');
            $this->load->view('front_end/user_list');
            $this->load->view('front_end/block/footer');
        }else{
            redirect(base_url().'login');
        }
    }
    public function add_balance()
    {
        if( $this->session->userdata('user_email')){
            $this->form_validation->set_rules('balance', 'balance', 'trim|required');
            if ($this->form_validation->run() == FALSE){
                $data['id'] = $this->uri->segment(3, 0);
                $data['title'] = "add balance";
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/add_balance');
                $this->load->view('front_end/block/footer');

            }else {
                $balance = (float) $this->input->post('balance');
                $user_id = $this->input->post('user_id');
                $admin_id = $this->session->userdata('user_id');

                $query = $this->db->query("SELECT current_balance FROM users WHERE id= '{$user_id}'");
                $res = $query->row_array();
                $user_current_balance = (float) $res['current_balance'];

                $query1 = $this->db->query("SELECT current_balance FROM users WHERE id= '{$admin_id}'");
                $res1 = $query1->row_array();
                $admin_current_balance = (float) $res1['current_balance'];

                $user_new_balance = $user_current_balance + $balance;
                $admin_new_balance = $admin_current_balance - $balance;

                $date = date('Y-m-d H:i:s');
                $update_user_balance = $this->db->query("UPDATE users SET current_balance = '{$user_new_balance}' WHERE id= '{$user_id}'");
                $update_admin_balance = $this->db->query("UPDATE users SET current_balance = '{$admin_new_balance}' WHERE id= '{$admin_id}'");
                if ($update_user_balance && $update_admin_balance ) {
                    $insert = $this->db->query("INSERT INTO `add_balance`(`add_to`, `add_from_user`, `amount`, `created`) VALUES ('{$user_id}','{$admin_id}','{$balance}','{$date}')");
                }

                if ( $insert ) {
                    $this->session->set_flashdata('success_message', 'Add user balance Successfully');
                    redirect(base_url() . 'main/add_balance/'.$user_id);
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add user balance');
                    redirect(base_url() . 'main/add_user/'.$user_id);
                }
            }
        }else{
            redirect(base_url().'login');
        }
    }

    public function ajax_get_package(){
	    $operator_id = $this->input->post('operator_id');
        $packages = $this->db->query("SELECT * FROM `package` WHERE operator_id = '{$operator_id}'");
        $data = $packages->result();
        $html = '';
        foreach ($data as $k){
            $html .= '<option value="'.$k->id.'">'.$k->package_name.'</option>';
        }
        echo $html;
    }
    public function ajax_get_package_price(){
	    $package_id = $this->input->post('package_id');
        $packages = $this->db->query("SELECT * FROM `package` WHERE id = '{$package_id}'");
        $data = $packages->row();

        echo $data->price;
    }

    public function change_password()
    {
        if( $this->session->userdata('user_email')){

            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

            if ($this->form_validation->run() == FALSE){

                $data['title'] = "Change Password";
                $this->load->view('front_end/block/header',$data);
                $this->load->view('front_end/block/navigation');
                $this->load->view('front_end/change_password');
                $this->load->view('front_end/block/footer');

            }else{
                $current_password =  md5($this->input->post('current_password'));
                $new_password =  md5($this->input->post('new_password'));
                $user_name =  $this->session->userdata('username');
                $admin_id =  $this->input->post('user_id');
                if($current_password == $new_password){
                    $this->session->set_flashdata('error_message', 'Current Password is same as new password.');
                    redirect(base_url().'main/change_password/');
                }

                $sql = "Select * From users where username= '{$user_name}' AND password = '{$current_password}' Limit 1";
                $query = $this->db->query($sql);
                $data = $query->row();

                if(!empty($data)){

                    $sql1 = "UPDATE `users` SET `password`='{$new_password}' WHERE `id` = '{$admin_id}'";

                    $query = $this->db->query($sql1);

                    if($query){
                        $this->session->set_flashdata('success_message', 'Password change Successfully');
                        redirect(base_url().'main/change_password/');
                    }else{
                        $this->session->set_flashdata('error_message', 'Password not change. Please try again.');
                        redirect(base_url().'main/change_password/');
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'Current Password is Wrong.');
                    redirect(base_url().'main/change_password/');
                }

            }
        }else{
            redirect(base_url().'login');
        }
    }
}
