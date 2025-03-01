<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function index()
    {
        return view('backend/index', [
            'title' => 'Dashboard - Admin Panel',
            'page_title' => 'Dashboard',
            'breadcrumb' => 'Dashboard Overview'
        ]);
    }
}
