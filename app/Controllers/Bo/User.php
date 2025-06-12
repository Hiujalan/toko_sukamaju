<?php

namespace App\Controllers\Bo;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpParser\Node\Stmt\Break_;

class User extends BaseController
{
    public function admin()
    {
        $data = [
            'title' => 'User',
            'header' => 'Data Admin',
            'active_user' => 'active',
            'show_user' => 'show',
            'active_admin' => 'active',
            'dt_admin' => $this->boModel->getAllUser(1),
            'dt_access' => $this->model->getAllData('auth_access'),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/user/user');
        echo view('bo/pages/footer');
    }
    public function employees()
    {
        $data = [
            'title' => 'User',
            'header' => 'Data Karyawan',
            'active_user' => 'active',
            'show_user' => 'show',
            'active_employees' => 'active',
            'dt_admin' => $this->boModel->getAllUser(2),
            'dt_access' => $this->model->getAllData('auth_access'),
        ];

        echo view('bo/pages/header', $data);
        echo view('bo/user/user');
        echo view('bo/pages/footer');
    }

    public function user_image()
    {
        helper("filesystem");
        $idx = $this->request->getGet('idx');
        $row_user = $this->model->getSelectedData('auth', ['auth_idx' => $idx])->getRowArray();
        $fullpath = WRITEPATH . 'files/profile/' . $row_user['auth_image'];

        $file = new \CodeIgniter\Files\File($fullpath, true);
        $binary = readfile($fullpath);
        return $this->response
            ->setHeader('Content-Type', $file->getMimeType())
            ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
            ->setStatusCode(200)
            ->setBody($binary);
    }

    public function user_add()
    {
        $this->db->transBegin();

        try {

            $insertData = [
                'auth_idx' => $this->uuid->v4(),
                'auth_name' => $this->request->getPost('auth_name'),
                'auth_email' => $this->request->getPost('auth_email'),
                'auth_telp' => $this->request->getPost('auth_telp'),
                'auth_username' => $this->request->getPost('auth_username'),
                'auth_secret' => password_hash($this->request->getPost('auth_password'), PASSWORD_BCRYPT),
                'auth_access' => $this->request->getPost('auth_access'),
                'is_active' => 1,
            ];

            $docupload = ['auth_image'];
            foreach ($docupload as $i) {
                $base64Data = $this->request->getPost($i);
                if (!empty($base64Data)) {
                    $fileJson = json_decode($base64Data, true);

                    if (!empty($fileJson['data']) && !empty($fileJson['name'])) {
                        $rawData = base64_decode($fileJson['data']);
                        $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $fileJson['name']);

                        $filePath = WRITEPATH . 'files/profile/';
                        if (!is_dir($filePath)) {
                            mkdir($filePath, 0777, true);
                        }

                        file_put_contents($filePath . $fileName, $rawData);
                        $insertData['auth_image'] = $fileName;
                    }
                }
            }

            $this->model->insertData('auth', $insertData);
            $this->db->transCommit();
            switch ($this->request->getPost('auth_access')) {
                case '1':
                    return redirect()->to('user/admin')->with('success', 'Data admin berhasil di tambah');
                    break;
                case '2':
                    return redirect()->to('user/employees')->with('success', 'Data karyawan berhasil di tambah');
                    break;
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            if (isset($fileName) && file_exists($filePath . $fileName)) {
                unlink($filePath . $fileName);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function user_edit()
    {
        $this->db->transBegin();

        try {
            $idx['auth_idx'] = $this->request->getPost('auth_idx');

            $password = $this->request->getPost('auth_password');

            $updateData = [
                'auth_name' => $this->request->getPost('auth_name'),
                'auth_email' => $this->request->getPost('auth_email'),
                'auth_telp' => $this->request->getPost('auth_telp'),
                'auth_username' => $this->request->getPost('auth_username'),
                'auth_access' => $this->request->getPost('auth_access'),
                'is_active' => $this->request->getPost('is_active'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($password != '') {
                $updateData['auth_secret'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $row_user = $this->model->getSelectedData('auth', $idx)->getRowArray();

            $docupload = ['auth_image'];
            foreach ($docupload as $i) {
                $base64Data = $this->request->getPost($i);
                if (!empty($base64Data)) {
                    $fileJson = json_decode($base64Data, true);

                    if (!empty($fileJson['data']) && !empty($fileJson['name'])) {
                        $rawData = base64_decode($fileJson['data']);
                        $fileName = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9\._-]/', '', $fileJson['name']);

                        $filePath = WRITEPATH . 'files/profile/';
                        if (!is_dir($filePath)) {
                            mkdir($filePath, 0777, true);
                        }

                        $oldPath = WRITEPATH . 'files/profile/' .  $row_user['auth_image'];
                        if (is_file($oldPath)) {
                            unlink($oldPath);
                        }

                        file_put_contents($filePath . $fileName, $rawData);
                        $updateData['auth_image'] = $fileName;
                    }
                }

                $this->model->updateData('auth', $updateData, $idx);
                $this->db->transCommit();
                switch ($this->request->getPost('auth_access')) {
                    case '1':
                        return redirect()->to('user/admin')->with('success', 'Data admin berhasil di ubah');
                        break;
                    case '2':
                        return redirect()->to('user/employees')->with('success', 'Data karyawan berhasil di ubah');
                        break;
                }
            }
        } catch (\Exception $e) {
            $this->db->transRollback();
            if (isset($fileName) && file_exists($filePath . $fileName)) {
                unlink($filePath . $fileName);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function user_delete(String $idx)
    {
        $row_user = $this->model->getSelectedData('auth', ['auth_idx' => $idx])->getRowArray();
        if (is_file(WRITEPATH . 'files/profile/' .  $row_user['auth_image'])) {
            unlink(WRITEPATH . 'files/profile/' .  $row_user['auth_image']);
        }
        $this->model->deleteData('auth', ['auth_idx' => $idx]);
        switch ($row_user['auth_access']) {
            case 1:
                return redirect()->to('user/admin')->with('success', 'Data admin berhasil di hapus');
                break;
            case 2:
                return redirect()->to('user/employees')->with('success', 'Data karyawan berhasil di hapus');
                break;
        }
    }
}
