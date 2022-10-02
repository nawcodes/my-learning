<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_access_controll();
    }
    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] =    'Menu Management';
        $data['titleM'] = ['Create menu', 'Menu Management'];
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['icons'] = $this->db->get('icons')->result_array();
        $this->load->model('Menu_model');
        $this->form_validation->set_rules('name', 'Menu name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>Menu has been created!</p>
          </div>');
            redirect('menu');
        }
    }
    // * submenu 
    public function submenu()
    {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['titleM'] = ['Create submenu', 'Menu Management'];
        $this->load->model('Menu_model');
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu'] = $this->Menu_model->getSubmenu();
        $this->form_validation->set_rules('name', 'Submenu name', 'required');
        $this->form_validation->set_rules('menu', 'menu options', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenus', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addSubmenu();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>Submenu has been added!</p>
          </div>');
            redirect('menu/submenu');
        }  
    }

    public function up_sm($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['titleM'] = ['Update submenu', 'Menu Management'];
        $this->load->model('Menu_model');
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu'] = $this->db->get_where('user_submenu', ['id' => $id])->row_array();
        $this->form_validation->set_rules('name', 'Submenu name', 'required');
        $this->form_validation->set_rules('menu', 'menu options', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/up_submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->up_Submenu();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>Submenu has been updated!</p>
          </div>');
            redirect('menu/submenu');
        }
    }

    public function del_sm($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->delete_sm($id);
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>Submenu has been deleted</p>
          </div>');
            redirect('menu/submenu');

    }

    
    // */ end submenu 
 
    public function update($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['titleM'] = ['Update menu', 'Menu Management'];
        $data['menu'] = $this->db->get_where('user_menu', ['id' => $id])->row_array();
        $data['icons'] = $this->db->get('icons')->result_array();
        $this->load->model('Menu_model');
        $this->form_validation->set_rules('name', 'Menu name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/updateMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->updateMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>Menu has been updated</p>
          </div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
        <p>Menu has been deleted</p>
      </div>');
        redirect('menu');
    }
    // end menu

    // icons 
    public function icons()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['titleM'] = ['Update menu', 'Menu Management'];
        $this->load->model('Menu_model');
        $this->form_validation->set_rules('name', 'Menu name', 'required');
        $this->form_validation->set_rules('i_name', 'Icons name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/updateMenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->Add_icons();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>icons has been added!</p>
          </div>');
            redirect('menu/seeIcons');
        }
    }

    public function seeIcons()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['titleM'] = ['All icons', 'Menu Management'];
        $this->load->model('Menu_model');
        $data['icons'] = $this->db->get('icons')->result_array();
        $this->form_validation->set_rules('name', 'Menu name', 'required');
        $this->form_validation->set_rules('i_name', 'Icons name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/icons', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->Add_icons();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>icons has been added!</p>
          </div>');
            redirect('menu');
        }
    }

    public function up_icons($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['titleM'] = ['Update icons', 'Menu Management'];
        $data['icons'] = $this->db->get_where('icons', ['id' => $id])->row_array();
        $this->load->model('Menu_model');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('i_name', 'Icons name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/up_icons', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->update_Ic();
            $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
            <p>Icons has been updated</p>
          </div>');
            redirect('menu/seeIcons');
        }
    }

    public function del_icons($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->delete_Ic($id);
        $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
        <p>Icons has been deleted</p>
      </div>');
        redirect('menu/seeIcons');
    }
    // end icons

}