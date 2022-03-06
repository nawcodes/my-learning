<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_access_controll();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Adminstrator area';
        $data['titleM'] = ['Dashboard', 'Admin'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Adminstrator area';
        $data['titleM'] = ['Role', 'Admin'];
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->form_validation->set_rules('role', 'Role Name', 'trim|required');
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role',$data);
            $this->load->view('templates/footer');
        }else {
            $this->db->insert('user_role', htmlspecialchars($this->input->post('role',true)));
            redirect('admin/role');
        }
    }

    public function role_access($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Adminstrator area';
        $data['titleM'] = ['Role Access', 'Admin'];
        $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
        $this->db->where('id !=', 1); 
        $data['menu'] = $this->db->get('user_menu')->result_array();   
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access',$data);
        $this->load->view('templates/footer');

    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId'); 
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
             $this->db->insert('user_access_menu', $data);
        }else{
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            <p>Access Changed!</p>
            </div>');
    }

    
}
