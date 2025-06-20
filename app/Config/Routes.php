<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginPost');

$routes->get('/logout', 'AuthController::logout');

// Main
$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/cases', 'CaseController::index');
$routes->get('/cases/create', 'CaseController::create');
$routes->post('/cases', 'CaseController::store');
$routes->get('/cases/(:num)', 'CaseController::show/$1');

$routes->get('/manage-cases', 'ManageCaseController::index');
$routes->get('/manage-cases/(:num)', 'ManageCaseController::show/$1');
$routes->post('/manage-cases/update', 'ManageCaseController::update');
$routes->post('/manage-cases/delete', 'ManageCaseController::delete');

$routes->get('/manage-cases/(:num)/data', 'CaseDataController::indexByCase/$1');
$routes->post('/case-data', 'CaseDataController::store');
$routes->post('/case-data/update', 'CaseDataController::update');
$routes->post('/case-data/delete', 'CaseDataController::delete');

$routes->get('/manage-cases/(:num)/parties', 'CasePartyController::indexByCase/$1');
$routes->post('/case-parties', 'CasePartyController::store');
$routes->post('/case-parties/update', 'CasePartyController::update');
$routes->post('/case-parties/delete', 'CasePartyController::delete');

$routes->get('/manage-cases/(:num)/objects', 'CaseObjectController::indexByCase/$1');
$routes->post('/case-objects', 'CaseObjectController::store');
$routes->post('/case-objects/update', 'CaseObjectController::update');
$routes->post('/case-objects/delete', 'CaseObjectController::delete');

$routes->get('/manage-cases/(:num)/agendas', 'CaseAgendaController::indexByCase/$1');
$routes->post('/case-agendas', 'CaseAgendaController::store');
$routes->post('/case-agendas/update', 'CaseAgendaController::update');
$routes->post('/case-agendas/delete', 'CaseAgendaController::delete');

// Account
$routes->get('/operators', 'OperatorController::index');
$routes->get('/operators/create', 'OperatorController::create');
$routes->post('/operators', 'OperatorController::store');
$routes->post('/operators/update', 'OperatorController::update');
$routes->post('/operators/update-status', 'OperatorController::updateStatus');

$routes->get('/manage-operators', 'ManageOperatorController::index');
$routes->get('/manage-operators/(:num)', 'ManageOperatorController::show/$1');

// Report
$routes->get('/reports', 'ReportController::index');
$routes->post('/reports/agenda', 'ReportController::agenda');
