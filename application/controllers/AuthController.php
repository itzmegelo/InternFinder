<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    // LOGIN PROCESS
    public function login() {
        $user = $this->Auth_model->login();

        if ($user) {
            $this->session->set_userdata(array(
                'user_id'   => $user->user_id,
                'username'  => $user->email,
                'logged_in' => TRUE
            ));
            redirect("HomeController");
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password!');
            redirect('AuthController/gotoLogIn');
        }
    }

    // REGISTER PROCESS
    public function register() {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[3]');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[tbl_users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('AuthController/gotoReg');
        } else {
            if ($this->Auth_model->register()) {
                $this->session->set_flashdata('success', 'Registration successful! Please login.');
                redirect('AuthController/gotoLogIn');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, try again.');
                redirect('AuthController/gotoReg');
            }
        }
    }

    // SHOW REGISTER PAGE
    public function gotoReg() {
        $this->load->view('register');
    }

    // SHOW LOGIN PAGE
    public function gotoLogIn() {
        $this->load->view('login');
    }

    // LOGOUT
    public function logout() {
        $this->session->sess_destroy();
        redirect('AuthController/gotoLogIn');
    }
}