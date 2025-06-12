<?php

namespace App\Controllers\Bo;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Transaction extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'header' => 'Data Transaksi',
            'active_menu_transaction' => 'active',
            'show_transaction' => 'show',
            'active_transaction' => 'active',
            'boModel' => $this->boModel,
            'dt_transaction' => $this->boModel->getAllTransaction(),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/transaction/transaction');
        echo view('bo/pages/footer');
    }

    public function transaction_create()
    {
        return redirect()->to('transaction/transaction_add/' . $this->uuid->v4());
    }

    public function transaction_add(String $idx)
    {
        $data = [
            'title' => 'Transaksi',
            'header' => 'Tambah Data Transaksi',
            'active_menu_transaction' => 'active',
            'show_transaction' => 'show',
            'active_add_transaction' => 'active',
            'transaction_idx' => $idx,
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/transaction/transaction_add');
        echo view('bo/pages/footer');
    }

    public function transaction_add_process()
    {
        $product_idx = $this->request->getPost('product_idx');
        $product_price = $this->request->getPost('product_price');
        $transaction_qty = $this->request->getPost('transaction_qty');

        $transaction_idx = $this->uuid->v4();

        $product_count_price = $transaction_count_qty = 0;
        for ($i = 0; $i < count($product_idx); $i++) {
            $price = str_replace('.', '', $product_price[$i]);
            $qty = $transaction_qty[$i];
            $product_count_price += (int)$price * (int)$qty;
            $transaction_count_qty += (int)$qty;
            $insertDetailData = [
                'transaction_idx' => $transaction_idx,
                'product_idx' => $product_idx[$i],
            ];
            $this->model->insertData('transaction_product', $insertDetailData);
        }

        $insertTransaction = [
            'transaction_idx' => $transaction_idx,
            'transaction_date' => date('Y-m-d H:i:s'),
            'transaction_price' => $product_count_price,
            'transaction_qty' => $transaction_count_qty,
            'transaction_employees' => session()->get('auth_idx'),
            'is_active' => 1,
        ];

        $this->model->insertData('transaction', $insertTransaction);

        return redirect()->to('transaction/transaction_add/' . $this->uuid->v4())->with('success', 'Transaksi berhasil di tambahkan, lihat menu transaksi untuk melihat detail transaksi');
    }

    public function transaction_delete(String $idx)
    {
        $this->model->deleteData('transaction_product', ['transaction_idx' => $idx]);
        $this->model->deleteData('transaction', ['transaction_idx' => $idx]);
        return redirect()->to('transaction')->with('success', 'Transaksi berhasil di hapus');
    }
}
