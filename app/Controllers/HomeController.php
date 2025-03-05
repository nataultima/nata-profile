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
        // Mengambil data setting pertama
        $setting = $this->settingModel->first();

        $data = [
            'portfolios' => $this->portoModel->findAll(),
            'articles' => $this->articleModel->findAll(),
            'clients'    => $this->clientsModel->findAll(),
            'certifieds' => $this->certifiedsModel->findAll(),
            'setting'    => $setting // Kirim ke view
        ];

        // Mengirim data ke view 'frontend/home'
        return view('frontend/home', $data);
    }
}
