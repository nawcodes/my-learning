<?php

namespace App\Controllers;
use \App\Models\PeopleModel;


class People extends BaseController
{

    protected $peopleModel;
    
    public function __construct()
    {
        $this->peopleModel = new PeopleModel(); // must use namespace
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_people') ? $this->request->getVar('page_people') : 1; 
    
        d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');

        if($keyword) {
            $people = $this->peopleModel->search($keyword);
        }else{
            $people = $this->peopleModel;
        }

        $data = [   
            'title' => 'daftar orang', 
            // 'people' => $this->peopleModel->findAll()
            'people' => $people->paginate(5, 'people'),
            'pager' => $this->peopleModel->pager,
            'currentPage' => $currentPage,
        ];

    
        return view('people/index', $data);
    }
}
