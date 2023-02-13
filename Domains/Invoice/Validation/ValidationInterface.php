<?php
declare(strict_types=1);

namespace Domains\Invoice\Validation;

interface ValidationInterface
{
    public function validate(array $data): array;
}