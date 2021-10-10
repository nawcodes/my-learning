<?php 

// this controller make endpoints

defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model', 'mhs');
		// $this->methods['index_get']['limit'] = 10;
		// $this->methods['index_post']['limit'] = 10;
		// $this->methods['index_get']['limit'] = 10;
		
	}
	


	public function index_get()
	{
		
		$id = $this->get('id');

		if($id === null) {
			$mhs = $this->mhs->getMhs();
		}else{
			$mhs = $this->mhs->getMhs($id);
		}
		
		if($mhs) {
			$this->response([
				'status' => 200,
				'data' => $mhs,
			], 200);
		}else{
			$this->response([
				'status' => 404,
				'data' => 'Data not found',
			], 404);
		}
	}


	public function index_delete() {
		$id = $this->delete('id');

		if($id === null ) {
			$this->response([
				'status' => 200,
				'data' => 'required id',
			], RestController::HTTP_OK);
		} else {
			if($this->mhs->deleteMahasiswa($id) > 0 ) {
				$this->response([
					'status' => 200,
					'data' => $id,
					'message' => 'deleted'
				], RestController::HTTP_OK);
			} else {
				$this->response([
					'status' => 404,
					'data' => 'id not found',
				], 404);
			}
		}

	}

	public function index_post()
	{
		$data = [
			'nrp' => $this->post('nrp'),
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'jurusan' => $this->post('jurusan'),
		];


		if ($this->mhs->createMahasiswa($data) > 0) {
			$this->response([
				'status' => 200,
				'messsage' => 'new mahasiswa has been created',
			], RestController::HTTP_CREATED);
		} else {
			$this->response([
				'status' => 200,
				'message' => 'failed to create new data!'
			], 404);
		}
		
	}


	public function index_put() {
		$id = $this->put('id');
		$data = [
			'nrp' => $this->put('nrp'),
			'nama' => $this->put('nama'),
			'email' => $this->put('email'),
			'jurusan' => $this->put('jurusan'),
		];


		if ($this->mhs->updateMahasiswa($data, $id) > 0) {
			$this->response([
				'status' => 200,
				'messsage' => 'new mahasiswa has been updated',
			], RestController::HTTP_CREATED);
		} else {
			$this->response([
				'status' => 404,
				'message' => 'failed to create updated data'
			], RestController::HTTP_BAD_REQUEST);
		}
	}



}

/* End of file Mahasiswa.php */



?>
