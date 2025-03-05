<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PortoModel;

class PortoController extends BaseController
{
    protected $portoModel;

    public function __construct()
    {
        $this->portoModel = new PortoModel();
    }

    public function index()
    {
        $data = [
            'portfolios' => $this->portoModel->findAll(),
        ];
        return view('backend/portfolios/index', $data);
    }

    public function store()
    {
        try {
            $file = $this->request->getFile('image');
            $imageName = '';

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move('uploads/portfolios', $imageName);
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'category' => $this->request->getPost('category'),
                'image' => $imageName,
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->portoModel->insert($data);

            return redirect()->to('/porto')->with('success', 'Portfolio added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to add portfolio: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = [
            'portfolio' => $this->portoModel->find($id)
        ];
        return view('backend/portfolios/edit', $data);
    }

    public function update($id)
    {
        try {
            $portfolio = $this->portoModel->find($id);

            $file = $this->request->getFile('image');
            $imageName = $portfolio['image'];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Hapus gambar lama jika ada
                if (!empty($portfolio['image']) && file_exists('uploads/portfolios/' . $portfolio['image'])) {
                    unlink('uploads/portfolios/' . $portfolio['image']);
                }

                $imageName = $file->getRandomName();
                $file->move('uploads/portfolios', $imageName);
            }

            $data = [
                'title' => $this->request->getPost('title'),
                'category' => $this->request->getPost('category'),
                'image' => $imageName,
                'deskripsi' => $this->request->getPost('deskripsi')
            ];

            $this->portoModel->update($id, $data);

            return redirect()->to('/porto')->with('success', 'Portfolio updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update portfolio: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $portfolio = $this->portoModel->find($id);

            if (!empty($portfolio['image']) && file_exists('uploads/portfolios/' . $portfolio['image'])) {
                unlink('uploads/portfolios/' . $portfolio['image']);
            }

            $this->portoModel->delete($id);

            return redirect()->to('/porto')->with('success', 'Portfolio deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->to('/porto')->with('error', 'Failed to delete portfolio: ' . $e->getMessage());
        }
    }
}
