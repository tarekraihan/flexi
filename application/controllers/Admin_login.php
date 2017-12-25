<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function notice()
	{
		$this->load->view('notice');
	}

    public function index(){
	    if(! $this->session->userdata('admin_email')){
            $this->form_validation->set_rules('txtUsername', 'Username', 'trim|required');
            $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE){
                $data['title'] = "Noor Flexi biling :: Noor Flexi Ultimate recharge solution";
                $this->load->view('admin/login',$data);
            }else{

                $user_name  = $this->input->post('txtUsername');
                $password = md5($this->input->post('txtPassword'));

                $sql = "Select * From admins where username= '{$user_name}' AND password = '{$password}' Limit 1";
                //echo $sql;
                $query = $this->db->query($sql);

                $row = $query->row();
                if (isset($row)){
                    $user_data = array(
                        'admin_username' => $row->username,
                        'admin_password' => $row->password,
                        'admin_email' => $row->email,
                        'admin_user_phone_no' => $row->phone,
                        'admin_user_id' => $row->id,
                        'admin_fullname' => $row->fullname,
                        'admin_power' => $row->power
                    );
                    $this->session->set_userdata($user_data);

                    redirect(base_url().'admin');
                }else{
                    $this->session->set_flashdata('error_message', 'Username or Password not match.');
                    redirect(base_url().'admin_login/index');
                }
            }
        }else{
            redirect(base_url().'admin');
        }

    }

    public function checkpoint(){
        $this->load->view('admin/block/header');
        $this->load->view('checkpoint');
        $this->load->view('admin/block/footer');

    }

    public function logout() {
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_password');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_user_phone_no');
        $this->session->unset_userdata('admin_user_id');
        $this->session->unset_userdata('admin_fullname');
        $this->session->unset_userdata('admin_power');

        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        if(!$this->session->userdata('admin_email')){
            redirect(base_url().'admin_login', 'refresh');
        }else{
            redirect(base_url().'admin');
        }

    }
}
