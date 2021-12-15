<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        echo view('dashboard/index', $data);
    }
}
