<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\Files\File;

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
            'subtile' => 'Create data'
        ];

        echo view('dashboard/create-form', $data);
    }

    public function save() {

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
