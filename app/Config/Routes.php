<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$settingsModel = new \App\Models\Settings();
$settings = $settingsModel->getSettingsById(1);
/**
 * API Base Url
 */
$routes->get('/api/', function(){
  return array('status' => true, 'message'=> 'Welcome to the API!');
});

if($settings['under_maintenance'] == false) {
  $routes->get('/', 'Home::index');
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
    $routes->get('logo', 'API\ContentController::applicationLogo');
    $routes->get('get/(:segment)', 'API\ContentController::getContent/$1');
  });
  /**
   * Trip Routes
   */
  $routes->get('trips', 'API\TripController::trips');
  $routes->group('trip', function($routes){
    $routes->get('trip/(:segment)', 'API\TripController::tripAbout/$1');
    $routes->post('search', 'API\TripController::searchTrip');
    $routes->get('my-trips', 'API\BookingController::myTrips');
  });
});
}else{
  $routes->get('/', 'Home::indexNot');
}
