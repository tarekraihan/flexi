<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function notice()
	{
		$this->load->view('notice');
	}

    public function index(){
	    if(! $this->session->userdata('user_email')){
            $this->form_validation->set_rules('txtUsername', 'Username', 'trim|required');
            $this->form_validation->set_rules('txtPassword', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE){
                $data['title'] = "Noor Flexi biling :: Noor Flexi Ultimate recharge solution";
                $this->load->view('login',$data);
            }else{

                $user_name  = $this->input->post('txtUsername');
                $password = md5($this->input->post('txtPassword'));

                $sql = "Select * From users where username= '{$user_name}' AND password = '{$password}' Limit 1";
                echo $sql;
                $query = $this->db->query($sql);

                $row = $query->row();
                if (isset($row)){
                    $user_data = array(
                        'username' => $row->username,
                        'password' => $row->password,
                        'user_email' => $row->email,
                        'user_phone_no' => $row->phone,
                        'user_id' => $row->id,
                        'fullname' => $row->fullname,
                        'power' => $row->power
                    );
                    $this->session->set_userdata($user_data);

                    redirect(base_url().'main');
                }else{
                    $this->session->set_flashdata('error_message', 'Username or Password not match.');
                    redirect(base_url().'login/index');
                }
            }
        }else{
            redirect(base_url().'main');
        }

    }

    public function checkpoint(){
        $this->load->view('front_end/block/header');
        $this->load->view('checkpoint');
        $this->load->view('front_end/block/footer');

    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_phone_no');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('power');

        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        if(!$this->session->userdata('user_email')){
            redirect(base_url().'login', 'refresh');
        }else{
            redirect(base_url().'main');
        }

    }
}
