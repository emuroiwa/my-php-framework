<?php
declare(strict_types=1);

namespace Domains\Invoice\Validation;

interface CustomerValidationInterface
{
    public function validate(array $data): array;
}