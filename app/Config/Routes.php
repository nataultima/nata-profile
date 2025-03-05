<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Home (Bebas akses, tidak perlu login)
$routes->get('/', 'HomeController::index');

// Group semua route yang harus login (protected by auth)
$routes->group('', ['filter' => 'auth'], function ($routes) {

    // Dashboard (butuh login)
    $routes->get('dashboard', 'AdminController::index');

    // Services (butuh login)
    $routes->group('services', function ($routes) {
        $routes->get('/', 'ServicesController::index');
        $routes->get('edit/(:num)', 'ServicesController::edit/$1');
        $routes->post('store', 'ServicesController::store');
        $routes->post('update/(:num)', 'ServicesController::update/$1');
        $routes->get('delete/(:num)', 'ServicesController::delete/$1');
    });

    // Portfolio (butuh login)
    $routes->get('porto', 'PortoController::index');
    $routes->get('porto/create', 'PortoController::create');
    $routes->post('porto/store', 'PortoController::store');
    $routes->get('porto/edit/(:segment)', 'PortoController::edit/$1');
    $routes->post('porto/update/(:segment)', 'PortoController::update/$1');
    $routes->get('porto/delete/(:segment)', 'PortoController::delete/$1');

    // Clients (butuh login)
    $routes->get('clients', 'ClientsController::index');
    $routes->post('clients/store', 'ClientsController::store');
    $routes->get('clients/delete/(:num)', 'ClientsController::delete/$1');

    // Certifieds (butuh login)
    $routes->group('certifieds', function ($routes) {
        $routes->get('/', 'CertifiedsController::index');
        $routes->post('store', 'CertifiedsController::store');
        $routes->get('delete/(:num)', 'CertifiedsController::delete/$1');
    });

    // Settings (butuh login)
    $routes->group('settings', function ($routes) {
        $routes->get('edit', 'SettingsController::edit');
        $routes->post('update', 'SettingsController::update');
    });

    $routes->get('/auth/edit', 'AuthController::edit');
    $routes->post('/auth/processEdit', 'AuthController::processEdit');

    $routes->group('/articles', function ($routes) {
        $routes->get('/', 'ArticleController::index');
        $routes->get('get/(:num)', 'ArticleController::get/$1');
        $routes->post('store', 'ArticleController::store');
        $routes->post('update/(:num)', 'ArticleController::update/$1');
        $routes->post('delete/(:num)', 'ArticleController::delete/$1');
        $routes->get('article/(:segment)', 'ArticleController::detail/$1');
    });
});

// Auth routes (bebas akses, ga perlu login)
$routes->get('register', 'AuthController::register');
$routes->post('process-register', 'AuthController::processRegister');
$routes->get('login', 'AuthController::login');
$routes->post('process-login', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');
