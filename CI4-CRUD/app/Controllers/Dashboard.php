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
        $defaultValue = (object) [
            'name' => '',
            'email' => '',
            'phone' => '',  
        ];

        $data = [
            'title' => 'Create Data',
            'subtile' => 'Create data',
            'validation' =>  \Config\Services::validation(),
            'value' => $defaultValue,
            'action' => '/data/save', 
        ];
    
        echo view('dashboard/create-form', $data);
    }

    public function editForm($uuid) {
        $find = $this->users->find($uuid);
        if($find == null) {
            session()->setFlashdata('notfound','Cannot found the data');
            return redirect()->to('/');
        }
        $defaultValue = (object) $find;
        $data = [
            'title' => 'Edit Data',
            'subtitle' => 'Edit data',
            'validation' =>  \Config\Services::validation(),
            'value' => $defaultValue,
            'action' => '/data/update/' . $defaultValue->uuid,
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
        session()->setFlashdata('success', 'Data has been saved');
        return redirect()->to('/');
    }

    public function update($uuid) {
        $find = (object) $this->users->find($uuid);

        if ($find == null) {
            session()->setFlashdata('error', 'The data cannot been founded because you are was changing the specific data, Try again!');
            return redirect()->to('/');
        }

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
            return redirect()->to('/data/update/' . $uuid)->withInput();
        }

                
        
        $img = $this->request->getFile('image');

        if($img == null || $img->getError() == 4) {
            $imageName = $find->image;
        }else{
            $imageName = $this->request->getVar('name') . '-' . $img->getRandomName();
            $img->move('assets/image', $imageName);
            if(file_exists('assets/image/' . $find->image)) {
                unlink('assets/image/' . $find->image);
            }
        }

        $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'phone' => $this->request->getVar('phone'),
                'image' => $imageName,
        ]; 

        $this->users->update($uuid, $data);
        session()->setFlashdata('success', 'The data has been updated');
        return redirect()->to('/');

        
    }


    public function delete($uuid) {
        if($_POST['_method'] != 'DELETE') {
            session()->setFlashdata('error', 'The data cannot been founded because you are was changing the specific data, Try again!');
            return redirect()->to('/');
        } 
        $find = (object) $this->users->find($uuid);
        if(!$find) {
            session()->setFlashdata('notfound', 'Cannot found the data');
            return redirect()->to('/');
        }else{
            if(file_exists('assets/image/' . $find->image)) {
                unlink('assets/image/' . $find->image);
            }
            $this->users->delete(['uuid' => $uuid]);
            session()->setFlashdata('success', 'The data has been deleted');
            return redirect()->to('/');
        }
    }
}
