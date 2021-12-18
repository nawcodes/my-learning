<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Dashboard extends BaseController
{

    
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
}
