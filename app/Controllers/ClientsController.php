<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientsModel;

class ClientsController extends BaseController
{
    protected $clientsModel;

    public function __construct()
    {
        $this->clientsModel = new ClientsModel();
    }

    public function index()
    {
        $clients = $this->clientsModel->findAll();
        return view('backend/clients/index', ['clients' => $clients]);
    }

    public function store()
    {
        $id = $this->request->getPost('id');

        // Validasi input
        $rules = [
            'deskripsi' => 'required',
        ];

        if (empty($id)) {
            $rules['image'] = 'uploaded[image]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]';
        } else {
            $rules['image'] = 'if_exist|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please provide valid data and a valid image format.');
        }

        $file = $this->request->getFile('image');

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move('uploads/clients/', $filename);
            $data['image'] = $filename;

            if ($id) {
                $existingClient = $this->clientsModel->find($id);
                if ($existingClient && !empty($existingClient['image'])) {
                    $oldImagePath = 'uploads/clients/' . $existingClient['image'];
                    if (file_exists($oldImagePath) && is_file($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }
        }

        try {
            if ($id) {
                $this->clientsModel->update($id, $data);
                return redirect()->to('/clients')->with('success', 'Client updated successfully');
            } else {
                $this->clientsModel->save($data);
                return redirect()->to('/clients')->with('success', 'Client added successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to save client data: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $client = $this->clientsModel->find($id);

        if ($client && !empty($client['image'])) {
            $imagePath = 'uploads/clients/' . $client['image'];
            if (file_exists($imagePath) && is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        try {
            $this->clientsModel->delete($id);
            return redirect()->to('/clients')->with('success', 'Client deleted successfully');
        } catch (\Exception $e) {
            return redirect()->to('/clients')->with('error', 'Failed to delete client: ' . $e->getMessage());
        }
    }
}
