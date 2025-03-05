<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CertifiedsModel;

class CertifiedsController extends BaseController
{
    protected $certifiedsModel;

    public function __construct()
    {
        $this->certifiedsModel = new CertifiedsModel();
    }

    public function index()
    {
        $certifieds = $this->certifiedsModel->findAll();
        return view('backend/certifieds/index', ['certifieds' => $certifieds]);
    }

    public function store()
    {
        $id = $this->request->getPost('id');

        // Validasi file
        $validationRules = [
            'deskripsi' => 'required',
        ];

        if (empty($id)) {
            $validationRules['image'] = 'uploaded[image]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]';
        } else {
            $validationRules['image'] = 'if_exist|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]';
        }

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', 'Please provide valid data.');
        }

        $file = $this->request->getFile('image');

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/certifieds/', $filename);
            $data['image'] = $filename;

            if ($id) {
                $existingCertified = $this->certifiedsModel->find($id);
                if ($existingCertified && !empty($existingCertified['image'])) {
                    $oldImagePath = 'uploads/certifieds/' . $existingCertified['image'];
                    if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        try {
            if ($id) {
                $this->certifiedsModel->update($id, $data);
                return redirect()->to('/certifieds')->with('success', 'Certified updated successfully');
            } else {
                $this->certifiedsModel->save($data);
                return redirect()->to('/certifieds')->with('success', 'Certified added successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $certified = $this->certifiedsModel->find($id);

            if ($certified && !empty($certified['image'])) {
                $imagePath = 'uploads/certifieds/' . $certified['image'];
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }

            $this->certifiedsModel->delete($id);

            return redirect()->to('/certifieds')->with('success', 'Certified deleted successfully');
        } catch (\Exception $e) {
            return redirect()->to('/certifieds')->with('error', 'Failed to delete data: ' . $e->getMessage());
        }
    }
}
