<?php
declare(strict_types=1);

namespace Domains\Invoice\Validation;

interface InvoiceDetailValidationInterface
{
    public function validate(array $data): array;
}