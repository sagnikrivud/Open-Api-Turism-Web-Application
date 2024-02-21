<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
/**
 * API Base Url
 */
$routes->get('/api/', function(){
  return array('status' => true, 'message'=> 'Welcome to the API!');
});

$routes->get('logs', "LogViewerController::index");
$routes->match(['get', 'post'],'admin/login', 'Admin\Controller::adminLogin');
$routes->get('admin/dashboard', 'Admin\Controller::index');
$routes->post('admin/logout', 'Admin\Controller::adminLogout');
$routes->get('admin/forgot/password', 'Admin\Controller::adminForgotPassword');
