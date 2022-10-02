<?php

namespace App\Controllers;

class RoutesCoba extends BaseController
{
  
    // 'Tutorial CodeIgniter 4 untuk PEMULA | 4. Routes & Controller';
    public function index()
    {
        echo 'Coba Controller di Tutorial CodeIgniter 4 untuk PEMULA | 4. Routes & Controller';
    }

    public function about($nama = 'rifal', $umur = '34') {
        echo 'Coba method Routes by ' . $nama . ' umur ' . $umur;
        echo '<br>';
        echo "$this->nama";
    }
    // end 'Tutorial CodeIgniter 4 untuk PEMULA | 4. Routes & Controller';


   
}
