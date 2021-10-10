<?php

namespace App\Controllers;
use \App\Models\ComicsModel;

class Comics extends BaseController
{

    protected $comicsModel;
    
    public function __construct()
    {
        // konnek dengann model
        // $comicsModel = new \App\Models\ComicsModel();
        $this->comicsModel = new comicsModel(); // must use namespace
    }
    

    public function index()
    {


        // $comics =  $this->comicsModel->asObject()->findAll();

        
        $data = [   
            'title' => 'daftar komik', 
            'comics' => $this->comicsModel->getComics()
        ];
        // cara konek db tanpa model
        // $db =\Config\Database::connect();
        // $comics = $db->query('SELECT * FROM comics');

        // foreach($comics->getResultArray() as $row) {
        //     dd($row);
        // }

        // result on model

    
        return view('comics/index', $data);
    }

    public function detail($slug) {
        $comics = $this->comicsModel->getComics($slug);

        $data = [
            'title' => 'Comics Detail',
            'comics' => $comics
        ];

        if(empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Comics ' . $slug . ' Not Found');
        }

        return view('comics/detail', $data);
    }


    public function create() {

        $data = [
            'title' => 'Create Comics Form',
            'validation' => \Config\Services::validation()
        ];

        return view('comics/create', $data);
    }
    

    public function save() {


        if(!$this->validate([
            'title' => 
            [
                'rules' => 'required|is_unique[comics.title]',
                'errors' => [
                    'required' => '{field} di butuhkan',
                    'is_unique' => '{field} sudah ada',
                ]
            ],
            'cover' =>
            [
                'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} ukuran terlalu besar',
                    'is_image' => '{field} harus merupakan gambar',
                    'mime_in' => '{field} harus merupakan gambar',  
                ]
            ],
            
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/comics/create')->withInput();
        }

        $cover = $this->request->getFile('cover');

        // when users not uploaded set default image

        if($cover->getError() == 4) {
            $coverName = 'default.jpg';
        }else{
            $coverName = $cover->getRandomName();
            $cover->move('img', $coverName);
        }
        
        // movee file


        $slug = url_title($this->request->getVar('title'), '-' , true);

        $this->comicsModel->save([
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $coverName
        ]);

        session()->setFlashdata('success', 'Success To add data');
        return redirect()->to('/comics');

    }
    

    public function delete($id) {

        $comics = $this->comicsModel->find($id);

        if($comics['cover'] != 'default.jpg') {
            unlink('img/' . $comics['cover']);
        }

        $this->comicsModel->delete($id);


        session()->setFlashdata('success', 'Success To Delete data');
        return redirect()->to('/comics');
    }

    public function edit($slug) {
        $data = [
            'title' => 'Update Comics Form',
            'validation' => \Config\Services::validation(),
            'comics' => $this->comicsModel->getComics($slug)
        ];

        return view('comics/edit', $data);
    } 


    public function update($id) {

        $comicsOld = $this->comicsModel->getComics($this->request->getVar('slug'));

        if($comicsOld['title'] == $this->request->getVar('title')) {
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[comics.title]';
        }

        if (!$this->validate([
            'title' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} di butuhkan',
                    'is_unique' => '{field} sudah ada',
                ]
                ],
            'cover' =>
            [
                'rules' => 'max_size[cover,2048]|is_image[cover]|mime_in[cover,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} ukuran terlalu besar',
                    'is_image' => '{field} harus merupakan gambar',
                    'mime_in' => '{field} harus merupakan gambar',
                ]
            ],
        ])) {
            return redirect()->to('/comics/edit/' . $this->request->getVar('slug') )->withInput();
        }


        $cover = $this->request->getFile('cover');

        // check cover uploaded
        
        if($cover->getError() == 4) {
            $coverName = $this->request->getVar('old-cover');
        }else{
            $coverName = $cover->getRandomName();
            $cover->move('img', $coverName);
            unlink('img/' . $this->request->getVar('old-cover'));
        } 



        $slug = url_title($this->request->getVar('title'), '-', true);

        $this->comicsModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'writer' => $this->request->getVar('writer'),
            'publisher' => $this->request->getVar('publisher'),
            'cover' => $coverName
        ]);

        session()->setFlashdata('success', 'Success To Update data');

        return redirect()->to('/comics');
    }
}
