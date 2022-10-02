<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Film_model');
	}

	public function index()
	{
		if ( $this->session->userdata('email')) {
			redirect('user');
		}
		$data['title'] = "ShowTv.com";
		$data['film'] = $this->Film_model->get_film();
		$data['movies'] = $this->Film_model->get_movies();
		$data['series'] = $this->Film_model->get_series();
		$this->load->view('temp/ver_header',$data);
		$this->load->view('temp/ver_sidebar');
		$this->load->view('temp/ver_topbar');
		$this->load->view('temp/index',$data);
		$this->load->view('temp/ver_footer');	
	}
	
}
   