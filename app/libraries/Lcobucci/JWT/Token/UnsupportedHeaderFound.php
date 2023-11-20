<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Token;

use InvalidArgumentException;
use app\libraries\Lcobucci\JWT\Exception;

final class UnsupportedHeaderFound extends InvalidArgumentException implements Exception
{
    public static function encryption(): self
    {
        return new self('Encryption is not supported yet');
    }
}
