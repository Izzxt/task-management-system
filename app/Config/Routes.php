<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/profile', 'AuthController::profile');
$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::register');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/newtask', 'TaskController::index');
