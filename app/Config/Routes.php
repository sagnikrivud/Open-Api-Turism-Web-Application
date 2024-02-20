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
