<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    public function index()
    {

        $data['title'] = 'Login';
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email not valid!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
        if ($this->session->userdata('email')) 
        {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } else{
                redirect('user');    
            }
            
        }
    }

    
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user != null) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $email,
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('flasher', '<div class="alert alert-danger" role="alert"> <p class="text-danger">Wrong password!</p>
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('flasher', '<div class="alert alert-danger" role="alert"> <p class="text-danger">Your account not been activated, please check your gmail!</p>
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('flasher', '<div class="alert alert-primary" role="alert">
            <p class="text-danger">Your email not registered!</p>
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('flasher', '<div class="alert alert-primary" role="alert">
            You has been logout!
            </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/block');
    }
}
