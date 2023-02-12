<?php
declare(strict_types=1);

namespace Domains\Invoice\Validation;

interface InvoiceItemValidationInterface
{
    public function validate(array $data): array;
}