<?php

namespace App\Controllers;

use App\Models\PortoModel;
use App\Models\ClientsModel;
use App\Models\CertifiedsModel;
use App\Models\SettingModel;
use App\Models\ArticleModel;

class HomeController extends BaseController
{
    protected $portoModel;
    protected $clientsModel;
    protected $certifiedsModel;
    protected $settingModel;
    protected $articleModel;

    public function __construct()
    {
        $this->portoModel = new PortoModel();
        $this->clientsModel = new ClientsModel();
        $this->certifiedsModel = new CertifiedsModel();
        $this->settingModel = new SettingModel(); // Inisialisasi
        $this->articleModel = new ArticleModel();
    }

    public function index(): string
    {
        $setting = $this->settingModel->first();

        // Ambil filter kategori dari query string
        $category = strtolower($this->request->getGet('category') ?? 'all');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6;

        // Query data portfolio berdasarkan kategori
        if ($category === 'all') {
            $portfolios = $this->portoModel->paginate($perPage, 'default', $page);
            $total = $this->portoModel->countAll();
        } else {
            $portfolios = $this->portoModel
                ->where('LOWER(category)', $category)
                ->paginate($perPage, 'default', $page);
            $total = $this->portoModel
                ->where('LOWER(category)', $category)
                ->countAllResults();
        }

        $data = [
            'portfolios' => $portfolios,
            'pager' => $this->portoModel->pager,
            'category' => $category,
            'perPage' => $perPage,
            'total' => $total,
            'articles' => $this->articleModel->findAll(),
            'clients' => $this->clientsModel->findAll(),
            'certifieds' => $this->certifiedsModel->findAll(),
            'setting' => $setting
        ];

        return view('frontend/home', $data);
    }
}
