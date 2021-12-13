<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
		// echo "Hello Word";
	}
	// 'Tutorial CodeIgniter 4 untuk PEMULA | 4. Routes & Controller';
	public function RoutesCoba() {
		echo 'Tutorial CodeIgniter 4 untuk PEMULA | 4. Routes & Controller';
	}
	// end 'Tutorial CodeIgniter 4 untuk PEMULA | 4. Routes & Controller';
}
