<?php

namespace App\Controllers\Bo;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];

        echo view('bo/auth/header', $data);
        echo view('bo/auth/login');
        echo view('bo/auth/footer');
    }

    public function login()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('auth/login')->withInput()->with('errors', $this->validator->getErrors());
        }

        $hasil = $this->cek_akun();

        switch ($hasil) {
            case 'success_login':
                session()->setFlashdata('success', 'Login Berhasil');
                return redirect()->to('dashboard');
                break;

            case 'incorrect_password':
                return redirect()->to('auth/login')->withInput()->with('error', 'Login gagal, pastikan password yang anda masukan benar');
                break;

            case 'account_not_found':
                return redirect()->to('auth/login')->withInput()->with('error', 'Login gagal, akun tidak ditemukan. pastikan username dan password yang anda masukan benar');
                break;
        }
    }

    private function cek_akun()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $result = $this->db->table('auth a')
            ->select('a.auth_idx, a.auth_username, a.auth_access, a.auth_secret, a.auth_name, b.auth_access_name, a.auth_image')
            ->join('auth_access b', 'a.auth_access=b.auth_access_id', 'INNER JOIN')
            ->where('a.auth_username', $username)
            ->where('is_active', 1)
            ->get();
        $row = $result->getRow();

        if ($result->getNumRows() === 1) {
            if (password_verify($password, $row->auth_secret)) {
                $session_data = [
                    'auth_idx' => $row->auth_idx,
                    'auth_username' => $row->auth_username,
                    'auth_access' => $row->auth_access,
                    'auth_name' => $row->auth_name,
                    'auth_access_name' => $row->auth_access_name,
                    'auth_image' => $row->auth_image,
                ];
                $this->set_session($session_data);

                return 'success_login';
            } else {
                return 'incorrect_password';
            }
        } else {
            return 'account_not_found';
        }
    }

    private function set_session($session_data)
    {
        $sess_data = [
            'auth_idx' => $session_data['auth_idx'],
            'auth_username' => $session_data['auth_username'],
            'auth_access' => $session_data['auth_access'],
            'auth_name' => $session_data['auth_name'],
            'auth_access_name' => $session_data['auth_access_name'],
            'auth_image' => $session_data['auth_image'],
            'isLoggedIn' => TRUE,
        ];
        session()->set($sess_data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login')->with('success', 'Berhasil keluar sistem');
    }
}
