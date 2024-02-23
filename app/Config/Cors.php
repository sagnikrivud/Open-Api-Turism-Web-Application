<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Cors extends BaseConfig {
   // List of allowed origins, e.g., ['http://example.com', 'https://example.com']
   public $allowedOrigins = ['*'];

   // List of allowed HTTP methods, e.g., ['GET', 'POST', 'OPTIONS']
   public $allowedMethods = ['*'];

   // List of allowed headers, e.g., ['X-Requested-With', 'Content-Type', 'Origin', 'Authorization']
   public $allowedHeaders = ['*'];

   // Whether the browser should include credentials with requests
   public $allowCredentials = true;

   // Max age of a preflight request in seconds
   public $maxAge = 3600;
}