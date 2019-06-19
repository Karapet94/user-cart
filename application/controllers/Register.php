<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Register_model $register_model
 */

class Register extends CI_Controller {

    public function index()
    {
        $this->checkIsLoggedIn();

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[0]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
        $this->form_validation->set_rules('repeat_password', 'Repeat_Password', 'required|matches[password]|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('register/index');
            echo validation_errors();
        } else {
            $this->load->model('register_model');
            if($this->register_model->ifUserExist($this->input->post('email'))){
                $this->load->view('register/index', ['loginError' => true]);
            }
            elseif ($this->register_model->insertUser($this->input->post('username'),$this->input->post('email'), $this->input->post('password'))) {
                redirect('/login');
            } else {
                $this->load->view('register/index', ['loginError' => true]);
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('isLoggedIn');
        redirect("register");

    }

    protected function checkIsLoggedIn()
    {
        if ($this->session->userdata('isLoggedIn')) {
            redirect('home');
        }
    }

}

