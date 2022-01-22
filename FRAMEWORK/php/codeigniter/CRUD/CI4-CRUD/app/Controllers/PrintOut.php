<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PrintModel;
use Dompdf\Options;

class PrintOut extends BaseController
{

    public $model = '';
    public $method = '';
    
    public function __construct()
    {
        $this->model = new PrintModel();
    }

    public function index()
    {

        switch ($this->request->getVar('request')) {
            case 'find_all_data':
                $get['data'] = $this->model->requestAllData('data_find_all');
                $this->convertPdf('data_find_all', $get);
                break;
            
            default:
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                break;
        }
        
    }

    public function convertPdf($view, $data) {
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(view('print/' . $view, $data));
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream();
        $output = $dompdf->output();
    }
}
