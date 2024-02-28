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


$routes->get('logs', "Log\LogViewerController::index");
$routes->match(['get', 'post'],'admin/login', 'Admin\Controller::adminLogin');
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'admin'], function($routes){
  $routes->get('dashboard', 'AdminController::index');
});
// $routes->get('admin/dashboard', 'Admin\Controller::index');
$routes->post('admin/logout', 'Admin\Controller::adminLogout');
$routes->get('admin/forgot/password', 'Admin\Controller::adminForgotPassword');

if($settings['under_maintenance'] == false) {
  $routes->get('/', 'Home::index');
  $routes->group('api', function ($routes) {
    /**
     * Customer Routes
     */
    $routes->post('register', 'API\AuthController::userRegister');
    $routes->post('login', 'API\AuthController::userLogin');
    $routes->post('otp', 'API\AuthController::sendOtp');
    $routes->post('validate-otp', 'API\AuthController::validateOtp');
    $routes->put('profile', 'API\AuthController::updateCustomerProfile');
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
      $routes->get('(:segment)', 'API\TripController::tripAbout/$1');
      $routes->post('search', 'API\TripController::searchTrip');
      $routes->get('my-trips', 'API\BookingController::myTrips');
      $routes->post('confirm', 'API\BookingController::confirmTrip');
      $routes->delete('cancel', 'API\BookingController::cancelTrip');
      $routes->post('review', 'API\BookingController::reviewTrip');
    });
    $routes->post('make/payment','API\PaymentController::makePayment');
  });
}else{
  $routes->get('/', 'Home::indexNot');
}
