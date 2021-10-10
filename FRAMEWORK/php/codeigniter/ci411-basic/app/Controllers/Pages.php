<?php

namespace App\Controllers;


class Pages extends BaseController
{
    public function index()
    {   
        $data = [
            'title' => 'Home | --NawCi4',
            'data' => [
                'nama' => 'rifal',
                'umur' => '19'
            ]
        ];
        // simple layouting 
        // echo view('layouts/header', $data);
        // echo view('pages/home', $data['data']);
        // echo view('layouts/footer');

        // recomended layouting
        // use renderSection('optional name ') on template layouts && give a section this->section('name render') on every pages
        // dont forget this->extend('name layouts')
        return view('pages/home', $data);


    }

    public function about() {
        $data = [
            'title' => 'About | --NawCi4'
        ];
        // echo view('layouts/header', $data);
        // echo view('layouts/footer');

        return view('pages/about', $data);
    }

    public function contact() {
        $data = [
            'title' => 'contact us',
        ];

        return view('pages/contact', $data);
    }
}


?>