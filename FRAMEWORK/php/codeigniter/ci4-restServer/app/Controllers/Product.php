<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;
 

class Product extends BaseController
{
    use ResponseTrait;
    protected $model;
    public function __construct()
    {
        $this->model = new ProductModel();
    }
    

    public function index()
    {
        $result = $this->model->findAll();
        return $this->respond($result, 200);
    }

    public function show($id = null) {
        $resultId = $this->model->getWhere(['id' => $id])->getResult();
        if($resultId) {
            return $this->respond($resultId,200);
        }else{
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }


    public function create() {
        $data = [
            'name' => $this->request->getPost('name'),
            'descryption' => $this->request->getPost('descryption'),
            'id_category' => $this->request->getPost('id_category'),
            'id_material_type' => $this->request->getPost('id_material_type'),
            'id_block_type' => $this->request->getPost('id_block_type'),
            'price_of_metter' => $this->request->getPost('price_of_metter'),
            'length_m' => $this->request->getPost('length_m'),
            'width_m' => $this->request->getPost('width_m'),
            'heigh_m' => $this->request->getPost('heigh_m'),
            'slug' => $this->request->getPost('slug'),
            'image' => $this->request->getPost('image'),
            'estimation_time' => $this->request->getPost('estimation_time'),
            'date_created' => $this->request->getPost('date_created'),
        ];

        $last_id = $this->model->save($data);
        $id = db_connect('default')->insertID();
        $response = [
            'status'    => 201,
            'id' =>  $id,
            'data' => $data,
            'error'     => null,
            'messages'  => [
                'success' => 'Data saved.'
            ]
        ];

        return $this->respondCreated($response);
    }

    public function update($id = null) {
        $json = $this->request->getJson();
        if($json) {
            $data = [
                'name' => $json->name,
                'descryption' => $json->descryption,
                'id_category' => $json->id_category,
                'id_material_type' => $json->id_material_type,
                'id_block_type' => $json->id_block_type,
                'price_of_metter' => $json->price_of_metter,
                'length_m' => $json->length_m,
                'width_m' => $json->width_m,
                'heigh_m' => $json->heigh_m,
                'slug' => $json->slug,
                'image' => $json->image,
                'estimation_time' => $json->estimation_time,
                'date_created' => $json->date_created,
            ];
            
        }else{

            $input = (object) $this->request->getRawInput();
            $data = [
                'id' => $id,
                'name' => $input->name,
                'descryption' => $input->descryption,
                'id_category' => $input->id_category,
                'id_material_type' => $input->id_material_type,
                'id_block_type' => $input->id_block_type,
                'price_of_metter' => $input->price_of_metter,
                'length_m' => $input->length_m,
                'width_m' => $input->width_m,
                'heigh_m' => $input->heigh_m,
                'slug' => $input->slug,
                'image' => $input->image,
                'estimation_time' => $input->estimation_time,
                'date_created' => $input->date_created,
            ];

            $this->model->save($data);

            $response = [
                'status'    => 201,
                'error'     => null,
                'messages'  => [
                    'success' => 'Data updates.'
                ]
            ];
            return $this->respond($response);
        }
        
    } 

    public function delete($id = null) {
        $data = $this->model->find($id);
        if($data) {
            $this->model->delete($id);
            $response = [
                'status'    => 201,
                'error'     => null,
                'messages'  => [
                    'success' => 'Data Deleted.'
                ]
            ];

            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('NO Data Found With ID' . $id);
        }
    }

    
}
