<?php
/**
 * @property Login_model $login_model
 */
class Login extends CI_Controller {
    public function index()
    {
        $this->checkIsLoggedIn();

        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/index');
        } else {
            $this->load->model('login_model');
            if ($this->login_model->checkIfUserExist($this->input->post('email'), $this->input->post('password'))) {
                $users= $this->login_model->getId($this->input->post('email'));
                $this->session->set_userdata(['isLoggedIn' => true]);
                $this->session->set_userdata('id', $users['id']);
                redirect('/home');
            } else {
                $this->load->view('login/index', ['loginError' => true]);
            }
        }

    }

    public function logout()
    {
        $this->session->unset_userdata('isLoggedIn');
        redirect('login');

    }

    protected function checkIsLoggedIn()
    {
        if ($this->session->userdata('isLoggedIn')) {
            redirect('home');
        }
    }

}