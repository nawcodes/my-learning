<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Dashboard extends BaseController
{

    // SESI 5
    public function __construct()
    {
        $this->users = new UsersModel();
    }
    

    public function index()
    {   
        $data['users'] = $this->users->getUsers();
        $data['title'] = 'Dashboard';
        $data['subtitle'] = "Data's Example";
        echo view('dashboard/index', $data);
    }
    // AKHIR SESI 5


    // SESI 
    public function createForm() {
        $data = [
            'title' => 'Create Data',
            'subtile' => 'Create data',
            'validation' =>  \Config\Services::validation()
        ];
    
        echo view('dashboard/create-form', $data);
    }

    public function save() {
        if (!$this->validate([
            'name' => [
                'label'  => 'Kolom Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} di butuhkan',
                ]
            ],
            'email' => [
                'label'  => 'Rules.email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} di butuhkan',
                    'valid_email' => '{field} tidak valid'
                ]
            ],
            'phone' => [
                'label'  => 'Rules.phone',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} di butuhkan',
                    'integer' => '{field} harus merupakan angka'
                ]
            ],
            'image' => [
                'label' => 'Photo',
                'rules' => 'max_size[image, 2048]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 2mb',
                    'is_image' => '{field} bukan merupakan gambar',
                    'mime_in' => 'extensi {field} tidak diperbolehkan'
                ]
            ],
        ])) {
            return redirect()->to('/data/create')->withInput();
        }
        

        $img = $this->request->getFile('image');

        if($img->getError() == 4 ) {
            $imageName = 'default.png';      
        } else {
            $imageName = $this->request->getVar('name') . '-' . $img->getRandomName();
            $img->move('assets/image', $imageName);
        }

        
        $uuid = date('His') . rand(10, 100);
        $data = [
            'uuid' => $uuid,
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'image' => $imageName,
            'phone' => $this->request->getVar('phone'),
        ];

        
        $this->users->save($data);
        return redirect()->to('/');
    }
}
