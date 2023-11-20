<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Signer\Rsa;

use app\libraries\Lcobucci\JWT\Signer\Rsa;

use const OPENSSL_ALGO_SHA512;

final class Sha512 extends Rsa
{
    public function algorithmId(): string
    {
        return 'RS512';
    }

    public function algorithm(): int
    {
        return OPENSSL_ALGO_SHA512;
    }
}
