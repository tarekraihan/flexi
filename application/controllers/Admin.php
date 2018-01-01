<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('admin_email')) {
            $data['all'] = $this->db->count_all('all_request');
            $pending = $this->db->query("SELECT * FROM `all_request` WHERE `status` = 'Pending'");
            $data['pending'] = $pending->num_rows();
            $success = $this->db->query("SELECT * FROM `all_request` WHERE `status` = 'Send'");
            $data['success'] = $success->num_rows();
            $refund = $this->db->query("SELECT * FROM `all_request` WHERE `status` = 'Refund'");
            $data['refund'] = $refund->num_rows();
            $data['title'] = 'Dashboard';
            $this->load->view('admin/block/header',$data);
            $this->load->view('admin/block/navigation');
            $this->load->view('admin/index');
            $this->load->view('admin/block/footer');
        }else{
            redirect(base_url().'admin_login');
        }

    }
    public function pending()
    {
        if($this->session->userdata('admin_email')){
            $request = $this->db->query("SELECT all_request.*, users.username FROM `all_request` INNER JOIN users ON users.id =  all_request.user_id WHERE status= 'Pending' ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = "Pending Request";
            $this->load->view('admin/block/header',$data);
            $this->load->view('admin/block/navigation');
            $this->load->view('admin/pending_request');
            $this->load->view('admin/block/footer');

        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function all_request()
    {
        if( $this->session->userdata('admin_email')){
            $request = $this->db->query("SELECT all_request.*, users.username,admins.username as admin_name FROM `all_request` INNER JOIN users ON users.id =  all_request.user_id LEFT JOIN admins ON admins.id =  all_request.operator_id  ORDER BY id DESC");
            $data['requests'] = $request->result();
            $data['title'] = "Pending Request";
            $this->load->view('admin/block/header',$data);
            $this->load->view('admin/block/navigation');
            $this->load->view('admin/allhistory');
            $this->load->view('admin/block/footer');
        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function action()
    {
        if( $this->session->userdata('admin_email')){

            $this->form_validation->set_rules('number', 'Number', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|required');

            if ($this->form_validation->run() == FALSE){

                $id = $this->uri->segment(3, 0);
                $request = $this->db->query("SELECT * FROM `all_request` WHERE id = '{$id}'");
                $data['request'] = $request->row();
                $data['title'] = "success action";
                $this->load->view('admin/block/header',$data);
                $this->load->view('admin/block/navigation');
                $this->load->view('admin/action');
                $this->load->view('admin/block/footer');

            }else{
                $request_id =  $this->input->post('request_id');
                $request = $this->db->query("SELECT * FROM `all_request` WHERE id = '{$request_id}'");
                $data= $request->row();
                if($data->status == 'Pending'){
                    $query = $this->db->query("Select current_balance From admins where id= '{$this->session->userdata('admin_user_id')}'");
                    $res = $query->row_array();
                    $current_balance = (float) $res['current_balance'];

                    $amount = (float) $this->input->post('amount');

                    $balance_after_deduct = $current_balance - $amount;


                    $from_no =  $this->input->post('number');
                    $transaction_id =  $this->input->post('transaction_id');
                    $comment =  $this->input->post('comment');


                    $date = date('Y-m-d H:i:s');

                    $update_query = $this->db->query("UPDATE admins SET current_balance = '{$balance_after_deduct}' WHERE id= '{$this->session->userdata('admin_user_id')}'");
                    if($update_query){
                        $update_request=  $this->db->query("UPDATE all_request SET status = 'Send' , from_number = '{$from_no}', transaction_id= '{$transaction_id}', comment = '{$comment}', delivery_date_time = '{$date}',operator_id = '{$this->session->userdata('admin_user_id')}' WHERE id = '{$request_id}'");

                        if($update_request){
                            $this->session->set_flashdata('success_message', 'Completed Successfully');
                            redirect(base_url().'admin/action/'.$request_id);
                        }else{
                            $this->session->set_flashdata('error_message', 'Your transfer info update failed.');
                            redirect(base_url().'admin/action/'.$request_id);
                        }
                    }else{
                        $this->session->set_flashdata('error_message', 'Your transfer info update failed.');
                        redirect(base_url().'admin/action/'.$request_id);
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'The request already completed.');
                    redirect(base_url().'admin/action/'.$request_id);
                }

            }

        }else{
            redirect(base_url().'admin_login');
        }

    }
    public function refund()
    {
        if( $this->session->userdata('admin_email')){

            $this->form_validation->set_rules('comment', 'Comment', 'trim|required');

            if ($this->form_validation->run() == FALSE){

                $id = $this->uri->segment(3, 0);
                $request = $this->db->query("SELECT * FROM `all_request` WHERE id = '{$id}'");
                $data['request'] = $request->row();
                $data['title'] = "Refund";
                $this->load->view('admin/block/header',$data);
                $this->load->view('admin/block/navigation');
                $this->load->view('admin/refund');
                $this->load->view('admin/block/footer');

            }else{
                $request_id =  $this->input->post('request_id');
                $request = $this->db->query("SELECT * FROM `all_request` WHERE id = '{$request_id}'");
                $data= $request->row();
                if($data->status == 'Pending'){
                    $query = $this->db->query("Select current_balance From users where id= '{$data->user_id}'");
                    $res = $query->row_array();
                    $current_balance = (float) $res['current_balance'];

                    $amount = (float) $this->input->post('amount');

                    $balance_after_add = $current_balance + $amount;
                    $comment =  $this->input->post('comment');


                    $date = date('Y-m-d H:i:s');

                    $update_query = $this->db->query("UPDATE users SET current_balance = '{$balance_after_add}' WHERE id= '{$data->user_id}'");
                    if($update_query){
                        $update_request=  $this->db->query("UPDATE all_request SET status = 'Refund' , comment = '{$comment}', delivery_date_time = '{$date}',operator_id = '{$this->session->userdata('admin_user_id')}' WHERE id = '{$request_id}'");

                        if($update_request){
                            $this->session->set_flashdata('success_message', 'Refund Successfully');
                            redirect(base_url().'admin/refund/'.$request_id);
                        }else{
                            $this->session->set_flashdata('error_message', 'Your transfer info update failed.');
                            redirect(base_url().'admin/refund/'.$request_id);
                        }
                    }else{
                        $this->session->set_flashdata('error_message', 'Your transfer info update failed.');
                        redirect(base_url().'admin/refund/'.$request_id);
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'The request already completed.');
                    redirect(base_url().'admin/refund/'.$request_id);
                }

            }
        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function add_user()
    {
        if( $this->session->userdata('admin_email')){
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
            $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone_no', 'Phone no', 'trim|required|min_length[10]|max_length[15]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[15]');

            if ($this->form_validation->run() == FALSE){
                $data['title'] = "Add User";
                $this->load->view('admin/block/header',$data);
                $this->load->view('admin/block/navigation');
                $this->load->view('admin/add_user');
                $this->load->view('admin/block/footer');

            }else {
                $username = $this->input->post('username');
                $email_address = $this->input->post('email_address');
                $phone_no = $this->input->post('phone_no');
                $password = md5($this->input->post('password'));
                $type = $this->input->post('type');
                $ref = $this->session->userdata('admin_user_id');

                $power = 0;
                if ($type == 'Reseller') {
                    $power = 25;
                } else if ($type == 'User') {
                    $power = 0;
                }


                $date = date('Y-m-d H:i:s');

                $insert_query = $this->db->query("INSERT INTO users (`username`, `password`, `email`, `phone`, `power`, `admin_id`,`created`) VALUES ('{$username}', '{$password}','{$email_address}','{$phone_no}','{$power}','{$ref}','{$date}')");

                if ($insert_query) {
                    $this->session->set_flashdata('success_message', 'Add user Successfully');
                    redirect(base_url() . 'admin/add_user/');
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add user');
                    redirect(base_url() . 'admin/add_user/');
                }
            }

        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function add_package()
    {
        if( $this->session->userdata('admin_email')){
            $this->form_validation->set_rules('operator', 'operator', 'trim|required');
            $this->form_validation->set_rules('package', 'package', 'trim|required');
            $this->form_validation->set_rules('amount', 'Price', 'trim|required');

            if ($this->form_validation->run() == FALSE){
                $operators = $this->db->query("SELECT * FROM `operator`");
                $data['operators'] = $operators->result();
                $data['title'] = 'NoorFlexi : add Package';
                $this->load->view('admin/block/header',$data);
                $this->load->view('admin/block/navigation');
                $this->load->view('admin/add_package');
                $this->load->view('admin/block/footer');

            }else {
                $operator = $this->input->post('operator');
                $package = $this->input->post('package');
                $amount = $this->input->post('amount');
                $admin_username = $this->session->userdata('admin_username');


                $date = date('Y-m-d H:i:s');

                $insert_query = $this->db->query("INSERT INTO package (`operator_id`, `package_name`, `price`, `created_by`, `created`) VALUES ('{$operator}', '{$package}','{$amount}','{$admin_username}','{$date}')");

                if ($insert_query) {
                    $this->session->set_flashdata('success_message', 'Add Package Successfully');
                    redirect(base_url() . 'admin/add_package/');
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add package');
                    redirect(base_url() . 'admin/add_package/');
                }
            }

        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function transaction_report()
    {
        if($this->session->userdata('admin_email')){
            $query = $this->db->query( "SELECT add_balance.*, users.username,admins.username as admin_name,u.username as user_name FROM `add_balance` INNER JOIN users ON users.id = add_balance.add_to LEFT JOIN admins ON admins.id = add_balance.add_from_admin LEFT JOIN users AS u ON u.id = add_balance.add_from_user");
            $data['results'] = $query->result();
            $data['title'] = "Transaction Report";
            $this->load->view('admin/block/header',$data);
            $this->load->view('admin/block/navigation');
            $this->load->view('admin/transaction_report');
            $this->load->view('admin/block/footer');
        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function user_list()
    {
        if( $this->session->userdata('admin_email')){
            $query = $this->db->query( "SELECT users.*,admins.username as admin_name, users.username as username, u.username as user_admin FROM users LEFT JOIN admins ON admins.id = users.admin_id LEFT JOIN users as u ON u.id = users.reseller_id");
            $data['results'] = $query->result();
            $data['title'] = "User List";
            $this->load->view('admin/block/header',$data);
            $this->load->view('admin/block/navigation');
            $this->load->view('admin/user_list');
            $this->load->view('admin/block/footer');
        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function package_list()
    {
        if( $this->session->userdata('admin_email')){
            $query = $this->db->query("Select package.*,operator.operator_name  From package INNER JOIN operator ON operator.id= package.operator_id ORDER BY id DESC");
            $data['rows'] = $query->result();
            $data['title'] = "Package List";
            $this->load->view('admin/block/header',$data);
            $this->load->view('admin/block/navigation');
            $this->load->view('admin/package_list');
            $this->load->view('admin/block/footer');
        }else{
            redirect(base_url().'admin_login');
        }
    }
    public function add_balance()
    {
        if( $this->session->userdata('admin_email')){
            $this->form_validation->set_rules('balance', 'balance', 'trim|required');
            if ($this->form_validation->run() == FALSE){
                $data['id'] = $this->uri->segment(3, 0);
                $data['title'] = "add balance";
                $this->load->view('admin/block/header',$data);
                $this->load->view('admin/block/navigation');
                $this->load->view('admin/add_balance');
                $this->load->view('admin/block/footer');

            }else {
                $balance = (float) $this->input->post('balance');
                $user_id = $this->input->post('user_id');
                $admin_id = $this->session->userdata('admin_user_id');

                $query = $this->db->query("SELECT current_balance FROM users WHERE id= '{$user_id}'");
                $res = $query->row_array();
                $user_current_balance = (float) $res['current_balance'];

                $query1 = $this->db->query("SELECT current_balance FROM admins WHERE id= '{$admin_id}'");
                $res1 = $query1->row_array();
                $admin_current_balance = (float) $res1['current_balance'];

                $user_new_balance = $user_current_balance + $balance;
                $admin_new_balance = $admin_current_balance - $balance;

                $date = date('Y-m-d H:i:s');
                $update_user_balance = $this->db->query("UPDATE users SET current_balance = '{$user_new_balance}' WHERE id= '{$user_id}'");
                $update_admin_balance = $this->db->query("UPDATE admins SET current_balance = '{$admin_new_balance}' WHERE id= '{$admin_id}'");
                if ($update_user_balance && $update_admin_balance ) {
                    $insert = $this->db->query("INSERT INTO `add_balance`(`add_to`, `add_from_admin`, `amount`, `created`) VALUES ('{$user_id}','{$admin_id}','{$balance}','{$date}')");
                }

                if ( $insert ) {
                    $this->session->set_flashdata('success_message', 'Add user balance Successfully');
                    redirect(base_url() . 'admin/add_balance/'.$user_id);
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add user balance');
                    redirect(base_url() . 'admin/add_user/'.$user_id);
                }
            }
        }else{
            redirect(base_url().'admin_login');
        }
    }

    public function change_password()
    {
        if( $this->session->userdata('admin_email')){

            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

            if ($this->form_validation->run() == FALSE){

                $data['title'] = "Change Password";
                $this->load->view('admin/block/header',$data);
                $this->load->view('admin/block/navigation');
                $this->load->view('admin/change_password');
                $this->load->view('admin/block/footer');

            }else{
                $current_password =  md5($this->input->post('current_password'));
                $new_password =  md5($this->input->post('new_password'));
                $user_name =  $this->session->userdata('admin_username');
                $admin_id =  $this->input->post('admin_id');
                if($current_password == $new_password){
                    $this->session->set_flashdata('error_message', 'Current Password is same as new password.');
                    redirect(base_url().'admin/change_password/');
                }

                $sql = "Select * From admins where username= '{$user_name}' AND password = '{$current_password}' Limit 1";
                $query = $this->db->query($sql);
                $data = $query->row();

                if(!empty($data)){

                    $sql1 = "UPDATE `admins` SET `password`='{$new_password}' WHERE `id` = '{$admin_id}'";

                    $query = $this->db->query($sql1);

                    if($query){
                        $this->session->set_flashdata('success_message', 'Password change Successfully');
                        redirect(base_url().'admin/change_password/');
                    }else{
                        $this->session->set_flashdata('error_message', 'Password not change. Please try again.');
                        redirect(base_url().'admin/change_password/');
                    }
                }else{
                    $this->session->set_flashdata('error_message', 'Current Password is Wrong.');
                    redirect(base_url().'admin/change_password/');
                }

            }
        }else{
            redirect(base_url().'admin_login');
        }
    }
}
