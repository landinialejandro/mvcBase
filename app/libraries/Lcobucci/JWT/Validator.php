<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT;

use app\libraries\Lcobucci\JWT\Validation\Constraint;
use app\libraries\Lcobucci\JWT\Validation\NoConstraintsGiven;
use app\libraries\Lcobucci\JWT\Validation\RequiredConstraintsViolated;

interface Validator
{
    /**
     * @throws RequiredConstraintsViolated
     * @throws NoConstraintsGiven
     */
    public function assert(Token $token, Constraint ...$constraints): void;

    /** @throws NoConstraintsGiven */
    public function validate(Token $token, Constraint ...$constraints): bool;
}
