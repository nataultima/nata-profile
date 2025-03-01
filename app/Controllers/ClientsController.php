<?php

namespace App\Controllers;

use App\Models\ClientsModel;
use CodeIgniter\Controller;

class ClientsController extends Controller
{
    public function index()
    {
        $model = new ClientsModel();
        $data['clients'] = $model->findAll();
        return view('backend/clients/index', $data);
    }

    public function create()
    {
        return view('backend/clients/create');
    }

    public function store()
    {
        $model = new ClientsModel();
        $model->save($this->request->getPost());
        return redirect()->to('/clients');
    }

    public function edit($id)
    {
        $model = new ClientsModel();
        $data['client'] = $model->find($id);
        return view('backend/clients/edit', $data);
    }

    public function update($id)
    {
        $model = new ClientsModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/clients');
    }

    public function delete($id)
    {
        $model = new ClientsModel();
        $model->delete($id);
        return redirect()->to('/clients');
    }
}
