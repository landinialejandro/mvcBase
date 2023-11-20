<?php

use app\libraries\Controller;
use app\libraries\Lcobucci\JWT\Encoding\ChainedFormatter;
use app\libraries\Lcobucci\JWT\Encoding\JoseEncoder;
use app\libraries\Lcobucci\JWT\Signer\Key\InMemory;
use app\libraries\Lcobucci\JWT\Signer\Hmac\Sha256;
use app\libraries\Lcobucci\JWT\Token\Builder;

// /home/alejandro/htdocs/clientes/mios/mvcModelo/Lcobucci/JWT/Token/Builder.php
// /home/alejandro/htdocs/clientes/mios/mvcModelo/app/libraries/Lcobucci/JWT/Token/Builder.php
// /home/alejandro/htdocs/clientes/mios/mvcModelo/app/libraries/Lcobucci/JWT/Token/Builder.php"



class Auth extends Controller {

    public function __construct() {
    }

    public function index() {
        $tokenBuilder = (new Builder(new JoseEncoder(), ChainedFormatter::default()));
        $algorithm    = new Sha256();
        $signingKey   = InMemory::plainText(random_bytes(32));

        $now   = new DateTimeImmutable();
        $token = $tokenBuilder
            // Configures the issuer (iss claim)
            ->issuedBy('http://example.com')
            // Configures the audience (aud claim)
            ->permittedFor('http://example.org')
            // Configures the id (jti claim)
            ->identifiedBy('4f1g23a12aa')
            // Configures the time that the token was issue (iat claim)
            ->issuedAt($now)
            // Configures the time that the token can be used (nbf claim)
            ->canOnlyBeUsedAfter($now->modify('+1 minute'))
            // Configures the expiration time of the token (exp claim)
            ->expiresAt($now->modify('+1 hour'))
            // Configures a new claim, called "uid"
            ->withClaim('uid', 1)
            // Configures a new header, called "foo"
            ->withHeader('foo', 'bar')
            // Builds a new token
            ->getToken($algorithm, $signingKey);

        echo $token->toString();

        $data = [
            'title' => 'MVC Auth page',
        ];
        $this->view('auth/auth', $data);
    }
}
