<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductsModel;

use App\Controllers\BaseController;

class Product extends BaseController
{
    use ResponseTrait;
    public $model;
    public function __construct()
    {
        $this->model = new ProductsModel;        
    }


    public function index()
    {
        $data = $this->model->findAll();
        if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
        return $this->respond($data);
    }


    public function show($id = null)
    {
        $data = $this->model->find(['id' => $id]);
        if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
        return $this->respond($data[0]);
    }


    public function create()
    {
        $json = $this->request->getJSON();
        $data = [
            'title' => $json->title,
            'price' => $json->price,
            'last_app' => 'CI4-VUE',
        ];
        $product = $this->model->insert($data);
        if (!$product) return $this->fail('Gagal tersimpan', 400);
        return $this->respondCreated($product);
    }


    public function update($id = null)
    {
        $json = $this->request->getJSON();
        $data = [
            'title' => $json->title,
            'price' => $json->price
        ];
        $cekId = $this->model->find(['id' => $id]);
        if (!$cekId) return $this->fail('Data Tidak ditemukan', 404);
        $product = $this->model->update($id, $data);
        if (!$product) return $this->fail('Gagal terupdate', 400);
        return $this->respond($product);
    }

    public function delete($id = null)
    {
        $cekId = $this->model->find(['id' => $id]);
        if (!$cekId) return $this->fail('Data Tidak ditemukan', 404);
        $product = $this->model->delete($id);
        if (!$product) return $this->fail('Gagal terhapus', 400);
        return $this->respondDeleted('Data Berhasil Terhapus');
    }
}
