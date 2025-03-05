<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('message', 'Akun berhasil dibuat!');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();
        $user = $userModel->where('username', $this->request->getPost('username'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set('logged_in', true);
            session()->set('username', $user['username']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function edit()
    {
        // Ambil data pengguna yang sedang login
        $userModel = new UserModel();
        $user = $userModel->where('username', session()->get('username'))->first();

        return view('auth/edit', ['user' => $user]);
    }


    public function processEdit()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|is_unique[users.username,username,{id}]',
            'password' => 'permit_empty|min_length[6]',
            'confirm_password' => 'permit_empty|matches[password]',
        ], [
            'username.is_unique' => 'Username sudah digunakan.',
            'confirm_password.matches' => 'Password tidak cocok.'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil user berdasarkan session
        $userModel = new UserModel();
        $user = $userModel->where('username', session()->get('username'))->first();

        $data = [
            'username' => $this->request->getPost('username'),
        ];

        // Jika password diisi, update password
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Update data
        $userModel->update($user['id'], $data);

        // Update session jika username diubah
        session()->set('username', $this->request->getPost('username'));

        // Menambahkan pesan sukses ke flashdata
        return redirect()->to('/auth/edit')->with('message', 'Profile berhasil diperbarui!');
    }
}
