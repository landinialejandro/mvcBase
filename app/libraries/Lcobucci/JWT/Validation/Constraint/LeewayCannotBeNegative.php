<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Validation\Constraint;

use InvalidArgumentException;
use app\libraries\Lcobucci\JWT\Exception;

final class LeewayCannotBeNegative extends InvalidArgumentException implements Exception
{
    public static function create(): self
    {
        return new self('Leeway cannot be negative');
    }
}
