<?php
declare(strict_types=1);

namespace app\libraries\Lcobucci\JWT\Validation;

use app\libraries\Lcobucci\JWT\Exception;
use RuntimeException;

use function array_map;
use function implode;

final class RequiredConstraintsViolated extends RuntimeException implements Exception
{
    /** @param ConstraintViolation[] $violations */
    public function __construct(
        string $message = '',
        public readonly array $violations = [],
    ) {
        parent::__construct($message);
    }

    public static function fromViolations(ConstraintViolation ...$violations): self
    {
        return new self(message: self::buildMessage($violations), violations: $violations);
    }

    /** @param ConstraintViolation[] $violations */
    private static function buildMessage(array $violations): string
    {
        $violations = array_map(
            static function (ConstraintViolation $violation): string {
                return '- ' . $violation->getMessage();
            },
            $violations,
        );

        $message  = "The token violates some mandatory constraints, details:\n";
        $message .= implode("\n", $violations);

        return $message;
    }

    /** @return ConstraintViolation[] */
    public function violations(): array
    {
        return $this->violations;
    }
}
