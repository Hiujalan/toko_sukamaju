<?php

namespace App\Controllers\Bo;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Master extends BaseController
{
    public function suplier()
    {
        $data = [
            'title' => 'Master Suplier',
            'header' => 'Data Suplier',
            'active_master' => 'active',
            'show_master' => 'show',
            'active_suplier' => 'active',
            'dt_suplier' => $this->model->getAllDataDesc('suplier', 'created_at'),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/master/suplier');
        echo view('bo/pages/footer');
    }

    public function suplier_add()
    {
        $insertData = [
            'suplier_idx' => $this->uuid->v4(),
            'suplier_code' => $this->request->getPost('suplier_code'),
            'suplier_name' => $this->request->getPost('suplier_name'),
            'suplier_telp' => $this->request->getPost('suplier_telp'),
            'suplier_email' => $this->request->getPost('suplier_email'),
            'suplier_brand' => $this->request->getPost('suplier_brand'),
            'is_active' => 1,
        ];

        $this->model->insertData('suplier', $insertData);

        return redirect()->to('master/suplier')->with('success', 'Data suplier berhasil ditambahkan');
    }

    public function suplier_edit()
    {
        $idx['suplier_idx'] = $this->request->getPost('suplier_idx');
        $updateData = [
            'suplier_code' => $this->request->getPost('suplier_code'),
            'suplier_name' => $this->request->getPost('suplier_name'),
            'suplier_telp' => $this->request->getPost('suplier_telp'),
            'suplier_email' => $this->request->getPost('suplier_email'),
            'suplier_brand' => $this->request->getPost('suplier_brand'),
            'is_active' => $this->request->getPost('is_active'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->model->updateData('suplier', $updateData, $idx);
        return redirect()->to('master/suplier')->with('success', 'Data suplier berhasil diubah');
    }

    public function suplier_delete(String $idx)
    {
        $this->model->deleteData('suplier', ['suplier_idx' => $idx]);
        return redirect()->to('master/suplier')->with('success', 'Data suplier berhasil dihapus');
    }

    public function type()
    {
        $data = [
            'title' => 'Master Tipe Produk',
            'header' => 'Data Tipe Produk',
            'active_master' => 'active',
            'show_master' => 'show',
            'active_type' => 'active',
            'dt_type' => $this->model->getAllDataDesc('product_type', 'created_at'),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/master/type');
        echo view('bo/pages/footer');
    }
    public function type_add()
    {
        $insertData = [
            'product_type' => $this->request->getPost('product_type'),
            'product_code' => $this->request->getPost('product_code'),
        ];
        $this->model->insertData('product_type', $insertData);
        return redirect()->to('master/type')->with('success', 'Data tipe produk berhasil di tambahkan');
    }
    public function type_edit()
    {
        $idx['product_type_id'] = $this->request->getPost('product_type_id');
        $updateData = [
            'product_type' => $this->request->getPost('product_type'),
            'product_code' => $this->request->getPost('product_code'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->model->updateData('product_type', $updateData, $idx);
        return redirect()->to('master/type')->with('success', 'Data tipe produk berhasil di ubah');
    }
    public function type_delete(int $idx)
    {
        $this->model->deleteData('product_type', ['product_type_id' => $idx]);
        return redirect()->to('master/type')->with('success', 'Data tipe produk berhasil di hapus');
    }
}
