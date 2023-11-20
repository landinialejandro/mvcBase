<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Signer\Key;

use InvalidArgumentException;
use app\libraries\Lcobucci\JWT\Exception;
use Throwable;

final class FileCouldNotBeRead extends InvalidArgumentException implements Exception
{
    /** @param non-empty-string $path */
    public static function onPath(string $path, ?Throwable $cause = null): self
    {
        return new self(
            message: 'The path "' . $path . '" does not contain a valid key file',
            previous: $cause,
        );
    }
}
