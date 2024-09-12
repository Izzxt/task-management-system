<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile', 'AuthController::profile', ['filter' => 'auth']);
$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::register');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/newtask', 'TaskController::index', ['filter' => 'auth']);
$routes->get('/(:num)/update-task', 'TaskController::update/$1', ['filter' => 'auth']);
$routes->post('/register', 'AuthController::handleRegister');

$routes->group("auth", function ($routes) {
  $routes->post('login', 'AuthController::handleLogin');
  $routes->post('register', 'AuthController::handleRegister');
  $routes->get('logout', 'AuthController::handleLogout');
});

$routes->group("task", function ($routes) {
  $routes->post('add', 'TaskController::handleAdd');
  $routes->post('update/(:num)', 'TaskController::handleUpdate/$1');
  $routes->get('delete/(:num)', 'TaskController::handleDelete/$1');
}, ['filter' => 'auth']);
