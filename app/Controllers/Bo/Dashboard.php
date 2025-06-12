<?php

namespace App\Controllers\Bo;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'active_dashboard' => 'active',
            'getIncome' => $this->boModel->getNetIncome()['transaction_price'],
            'model' => $this->model,
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/pages/dashboard');
        echo view('bo/pages/footer');
    }
}
