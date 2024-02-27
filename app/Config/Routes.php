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

$routes->get('logs', "Log\LogViewerController::index");
$routes->match(['get', 'post'],'admin/login', 'Admin\Controller::adminLogin');
$routes->get('admin/dashboard', 'Admin\Controller::index');
$routes->post('admin/logout', 'Admin\Controller::adminLogout');
$routes->get('admin/forgot/password', 'Admin\Controller::adminForgotPassword');

$routes->group('api', function ($routes) {
  /**
  * Content Routes
  */
  $routes->group('content',function($routes){
    $routes->get('headers', 'API\ContentController::header');
    $routes->get('get/(:segment)', 'API\ContentController::getContent/$1');
  });
  /**
   * Trip Routes
   */
  $routes->get('trips', 'API\TripController::trips');
  $routes->group('trip', function($routes){
    $routes->get('trip/(:segment)', 'API\TripController::tripAbout/$1');
  });
});
