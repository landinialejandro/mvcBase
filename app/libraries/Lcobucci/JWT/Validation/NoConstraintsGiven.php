<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Validation;

use app\libraries\Lcobucci\JWT\Exception;
use RuntimeException;

final class NoConstraintsGiven extends RuntimeException implements Exception
{
}
