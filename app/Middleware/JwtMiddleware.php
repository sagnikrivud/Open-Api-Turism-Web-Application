<?php

namespace App\Middleware;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Middleware\Middleware;
use Firebase\JWT\JWT;

class JwtMiddleware extends Middleware
{
    use ResponseTrait;

    public function before(RequestInterface $request, $arguments = null)
    {
        $token = $request->getHeaderLine('Authorization');

        if (empty($token)) {
            return $this->failUnauthorized('Missing JWT token');
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $key = env('JWT_SECRET_KEY');
        $token = $request->getHeaderLine('Authorization');
        if(JWT::decode($token, $key, ['HS256'])){
          return $response;
        } else {
          return $response->setStatusCode(401);
        }
    }
}
