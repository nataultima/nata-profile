<?php

namespace App\Controllers;

use App\Models\ServicesModel;
use CodeIgniter\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $model = new ServicesModel();
        $data['services'] = $model->findAll();
        return view('backend/services/index', $data);
    }

    public function create()
    {
        return view('backend/services/create');
    }

    public function store()
    {
        $model = new ServicesModel();
        $model->save($this->request->getPost());
        return redirect()->to('/services');
    }

    public function edit($id)
    {
        $model = new ServicesModel();
        $service = $model->find($id);
        return $this->response->setJSON($service);
    }

    public function update($id)
    {
        $model = new ServicesModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/services');
    }

    public function delete($id)
    {
        $model = new ServicesModel();
        $model->delete($id);
        return redirect()->to('/services');
    }
}
