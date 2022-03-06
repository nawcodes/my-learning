<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class film extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_access_controll();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] =    'Film Management';
        $data['titleM'] = ['Film', 'Film Management'];   
        $this->load->model('Film_model');
        $data['rating'] = $this->Film_model->get_rating();
        $data['network'] = $this->Film_model->get_network();
        $data['film'] = $this->Film_model->get_film();
        $data['lang'] = $this->Film_model->get_lang();
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('release_year', 'Release Year', 'numeric');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('length', 'Length', 'required|numeric');
         $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('network', 'Network', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('film/index', $data);
            $this->load->view('templates/footer');
        } else {
           
             $this->Film_model->addFilm();
             $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
             <p>Film has been added!</p>
           </div>');
             redirect('film');
        }
    }


    public function update_film($id)
    {       
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Film Management';
            $data['titleM'] = ['Update Film', 'Film Management'];
            $data['type'] = array('series','movies');
            $this->load->model('Film_model');
            $data['rating'] = $this->Film_model->get_rating();
            $data['network'] = $this->Film_model->get_network();
            $data['lang'] = $this->Film_model->get_lang();
            $data['film'] = $this->Film_model->get_filmById($id);
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('release_year', 'Release Year', 'numeric');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('length', 'Length', 'required|numeric');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('network', 'Network', 'required');
            if ( $this->form_validation->run() == false ) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('film/up_film', $data);
                $this->load->view('templates/footer');
            }else{
                $this->Film_model->updateFilm($id);
                $this->session->set_flashdata('message', '<div class="alert alert-primary mt-3" role="alert">
                <p>Film has been Updated!</p>
                </div>');
                redirect('film');
            }
    }
    


}