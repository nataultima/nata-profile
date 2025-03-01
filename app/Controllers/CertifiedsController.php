<?php

namespace App\Controllers;

use App\Models\CertifiedsModel;
use CodeIgniter\Controller;

class CertifiedsController extends Controller
{
    public function index()
    {
        $model = new CertifiedsModel();
        $data['certifieds'] = $model->findAll();
        return view('backend/certifieds/index', $data);
    }

    public function create()
    {
        return view('backend/certifieds/create');
    }

    public function store()
    {
        $model = new CertifiedsModel();
        $model->save($this->request->getPost());
        return redirect()->to('/certifieds');
    }

    public function edit($id)
    {
        $model = new CertifiedsModel();
        $data['certified'] = $model->find($id);
        return view('backend/certifieds/edit', $data);
    }

    public function update($id)
    {
        $model = new CertifiedsModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/certifieds');
    }

    public function delete($id)
    {
        $model = new CertifiedsModel();
        $model->delete($id);
        return redirect()->to('/certifieds');
    }
}
