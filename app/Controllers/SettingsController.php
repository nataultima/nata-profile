<?php

namespace App\Controllers;

use App\Models\SettingModel;

class SettingsController extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function edit()
    {
        $setting = $this->settingModel->first();
        return view('backend/settings/edit', ['setting' => $setting]);
    }

    public function update()
    {
        $file = $this->request->getFile('site_logo');

        $data = [
            'site_name' => $this->request->getPost('site_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
            'address'   => $this->request->getPost('address'),
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/settings/', $filename);
            $data['site_logo'] = 'uploads/settings/' . $filename;

            // Hapus logo lama (jika ada)
            $existing = $this->settingModel->first();
            if ($existing && !empty($existing['site_logo']) && file_exists($existing['site_logo'])) {
                unlink($existing['site_logo']);
            }
        }

        $setting = $this->settingModel->first();
        if ($setting) {
            $this->settingModel->update($setting['id'], $data);
            session()->setFlashdata('success', 'Setting updated successfully!');
        } else {
            $this->settingModel->insert($data);
            session()->setFlashdata('success', 'Settings saved successfully!');
        }

        return redirect()->to('/settings/edit');
    }
}
