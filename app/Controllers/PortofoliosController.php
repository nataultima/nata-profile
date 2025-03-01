<?php

namespace App\Controllers;

use App\Models\PortfoliosModel;
use CodeIgniter\Controller;

class PortfoliosController extends Controller
{
    public function index()
    {
        $model = new PortfoliosModel();
        $data['portfolios'] = $model->findAll();
        return view('backend/portfolios/index', $data);
    }

    public function create()
    {
        return view('backend/portfolios/create');
    }

    public function store()
    {
        $model = new PortfoliosModel();
        $model->save($this->request->getPost());
        return redirect()->to('/portfolios');
    }

    public function edit($id)
    {
        $model = new PortfoliosModel();
        $data['portfolio'] = $model->find($id);
        return view('backend/portfolios/edit', $data);
    }

    public function update($id)
    {
        $model = new PortfoliosModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/portfolios');
    }

    public function delete($id)
    {
        $model = new PortfoliosModel();
        $model->delete($id);
        return redirect()->to('/portfolios');
    }
}
