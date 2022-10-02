<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

     public function __construct()
    {
        parent::__construct();
        is_access_controll();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User area';
        $data['titleM'] = ['My profile', 'User'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function update_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User area';
        $data['titleM'] = ['Update profile', 'Profile'];
        $this->form_validation->set_rules('name' , 'Full Name', 'trim|required');
        if ( $this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/up_profile', $data);
            $this->load->view('templates/footer');
        }else{
            $this->load->model('User_model');
            $this->User_model->update_user();
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            <p>Your profile has been updated!</p>
            </div>');
            redirect('user');
            
        }
    }
}
