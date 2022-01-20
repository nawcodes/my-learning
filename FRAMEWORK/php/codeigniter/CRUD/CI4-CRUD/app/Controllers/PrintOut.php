<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class PrintOut extends BaseController
{

    public $model = '';
    public $method = '';
    
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('print/data_find_all');
    }

    public function convertPdf() {
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('print/data_find_all'));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream();
    }
}
