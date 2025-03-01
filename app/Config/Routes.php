<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

// Routes services
// Routes services (protected by auth)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('services', 'ServicesController::index');
    $routes->get('services/edit/(:num)', 'ServicesController::edit/$1');
    $routes->post('services/store', 'ServicesController::store');
    $routes->post('services/update/(:num)', 'ServicesController::update/$1');
    $routes->get('services/delete/(:num)', 'ServicesController::delete/$1');
});


// Auth routes
$routes->get('register', 'AuthController::register');
$routes->post('process-register', 'AuthController::processRegister');
$routes->get('login', 'AuthController::login');
$routes->post('process-login', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');

$routes->get('dashboard', 'AdminController::index', ['filter' => 'auth']);
