<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Validation;

use app\libraries\Lcobucci\JWT\Token;

interface Constraint
{
    /** @throws ConstraintViolation */
    public function assert(Token $token): void;
}
