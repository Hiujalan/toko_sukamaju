<?php

namespace App\Controllers\Bo;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Product extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Barang',
            'header' => 'Data Barang',
            'active_product' => 'active',
            'dt_product' => $this->boModel->getAllProduct(),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/product/product');
        echo view('bo/pages/footer');
    }

    public function search()
    {
        $query = $this->request->getGet('q');

        $product = $this->db->table('product')
            ->select('product_idx, product_code, product_name, product_variant, product_series, product_price')
            ->groupStart()
            ->like('product_code', $query)
            ->orLike('product_name', $query)
            ->orLike('product_variant', $query)
            ->orLike('product_series', $query)
            ->groupEnd()
            ->get()
            ->getResultArray();

        return $this->response->setJSON($product);
    }

    public function product_image()
    {
        helper("filesystem");
        $idx = $this->request->getGet('idx');
        $row_buyer = $this->model->getSelectedData('product', ['product_idx' => $idx])->getRowArray();
        $fullpath = WRITEPATH . 'files/product_image/' . $row_buyer['product_image'];

        $file = new \CodeIgniter\Files\File($fullpath, true);
        $binary = readfile($fullpath);
        return $this->response
            ->setHeader('Content-Type', $file->getMimeType())
            ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
            ->setStatusCode(200)
            ->setBody($binary);
    }

    public function product_add()
    {
        $data = [
            'title' => 'Barang',
            'header' => 'Tambah Data Barang',
            'active_product' => 'active',
            'dt_type' => $this->model->getAllData('product_type'),
            'dt_suplier' => $this->model->getSelectedData('suplier', ['is_active' => 1])->getResultArray(),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/product/product_add');
        echo view('bo/pages/footer');
    }

    public function product_add_proces()
    {
        $this->db->transBegin();

        try {
            // GET SUPLIER
            $suplier_idx = $this->request->getPost('suplier_idx');
            $row_suplier = $this->model->getSelectedData('suplier', ['suplier_idx' => $suplier_idx])->getRowArray();

            // GET TYPE PRODUCT
            $type_idx = $this->request->getPost('product_type');
            $row_type = $this->model->getSelectedData('product_type', ['product_type_id' => $type_idx])->getRowArray();

            $insertData = [
                'product_idx' => $this->uuid->v4(),
                'product_code' => $row_type['product_code'] . $row_suplier['suplier_code'] . $this->getCodeNumber(6),
                'product_name' => $this->request->getPost('product_name'),
                'product_variant' => $this->request->getPost('product_variant'),
                'product_series' => $this->request->getPost('product_series'),
                'product_price' => str_replace('.', '', $this->request->getPost('product_price')),
                'suplier_idx' => $suplier_idx,
                'product_type' => $row_type['product_type'],
                'product_spec' => base64_encode($this->request->getPost('product_spec')),
                'is_active' => 1,
            ];

            $docupload = ['product_image'];
            foreach ($docupload as $i) {
                $base64Data = $this->request->getPost($i);
                if (!empty($base64Data)) {
                    $fileJson = json_decode($base64Data, true);

                    if (!empty($fileJson['data']) && !empty($fileJson['name'])) {
                        $rawData = base64_decode($fileJson['data']);
                        $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $fileJson['name']);

                        $filePath = WRITEPATH . 'files/product_image/';
                        if (!is_dir($filePath)) {
                            mkdir($filePath, 0777, true);
                        }

                        file_put_contents($filePath . $fileName, $rawData);
                        $insertData['product_image'] = $fileName;
                    }
                }
            }

            $this->model->insertData('product', $insertData);
            $this->db->transCommit();
            return redirect()->to('product')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            $this->db->transRollback();
            if (isset($fileName) && file_exists($filePath . $fileName)) {
                unlink($filePath . $fileName);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function product_edit(String $idx)
    {
        $data = [
            'title' => 'Barang',
            'header' => 'Edit Data Barang',
            'active_product' => 'active',
            'row_product' => $this->boModel->getSelectedProduct($idx),
            'dt_type' => $this->model->getAllData('product_type'),
            'dt_suplier' => $this->model->getSelectedData('suplier', ['is_active' => 1])->getResultArray(),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/product/product_edit');
        echo view('bo/pages/footer');
    }

    public function product_edit_proces()
    {
        $this->db->transBegin();

        try {
            $idx['product_idx'] = $this->request->getPost('product_idx');

            // GET SUPLIER
            $suplier_idx = $this->request->getPost('suplier_idx');

            // GET TYPE PRODUCT
            $type_idx = $this->request->getPost('product_type');
            $row_type = $this->model->getSelectedData('product_type', ['product_type_id' => $type_idx])->getRowArray();

            $updateData = [
                'product_name' => $this->request->getPost('product_name'),
                'product_variant' => $this->request->getPost('product_variant'),
                'product_series' => $this->request->getPost('product_series'),
                'product_price' => str_replace('.', '', $this->request->getPost('product_price')),
                'suplier_idx' => $suplier_idx,
                'product_type' => $row_type['product_type'],
                'product_spec' => base64_encode($this->request->getPost('product_spec')),
                'is_active' => $this->request->getPost('is_active'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $row_product = $this->model->getSelectedData('product', $idx)->getRowArray();

            $docupload = ['product_image'];
            foreach ($docupload as $i) {
                $base64Data = $this->request->getPost($i);
                if (!empty($base64Data)) {
                    $fileJson = json_decode($base64Data, true);

                    if (!empty($fileJson['data']) && !empty($fileJson['name'])) {
                        $rawData = base64_decode($fileJson['data']);
                        $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $fileJson['name']);

                        $filePath = WRITEPATH . 'files/product_image/';
                        if (!is_dir($filePath)) {
                            mkdir($filePath, 0777, true);
                        }

                        if (is_file($filePath . $row_product['product_image'])) {
                            unlink($filePath . $row_product['product_image']);
                        }

                        file_put_contents($filePath . $fileName, $rawData);
                        $updateData['product_image'] = $fileName;
                    }
                }
            }

            $this->model->updateData('product', $updateData, $idx);
            $this->db->transCommit();
            return redirect()->to('product')->with('success', 'Produk berhasil diubah!');
        } catch (\Exception $e) {
            $this->db->transRollback();
            if (isset($fileName) && file_exists($filePath . $fileName)) {
                unlink($filePath . $fileName);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function product_delete(String $idx)
    {
        $row_product = $this->model->getSelectedData('product', ['product_idx' => $idx])->getRowArray();
        $filePath = WRITEPATH . 'files/product_image/' . $row_product['product_image'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $this->model->deleteData('product', ['product_idx' => $idx]);
        return redirect()->to('product')->with('success', 'Produk berhasil dihapus!');
    }
}
