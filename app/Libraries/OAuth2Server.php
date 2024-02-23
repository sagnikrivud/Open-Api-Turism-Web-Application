<?php

namespace App\Libraries;

use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Grant\PasswordGrant;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;

class OAuth2Server extends AuthorizationServer
{
    public function __construct(
        ClientRepositoryInterface $clientRepository,
        UserRepositoryInterface $userRepository
    ) {
        parent::__construct($clientRepository);

        $passwordGrant = new PasswordGrant(
            $userRepository, // instance of UserRepositoryInterface
            $clientRepository, // instance of ClientRepositoryInterface
        );

        $passwordGrant->setRefreshTokenTTL(new \DateInterval('P1M'));

        $this->enableGrantType(
            $passwordGrant,
            new \DateInterval('PT1H')
        );
    }
}
