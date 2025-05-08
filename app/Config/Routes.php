<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginPost');
$routes->get('/logout', 'Auth::logout');

// Main
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/legal-cases', 'LegalCase::index');
$routes->get('/legal-cases/create', 'LegalCase::create');
$routes->post('/legal-cases/store', 'LegalCase::store');
$routes->get('/legal-cases/(:num)', 'LegalCase::show');