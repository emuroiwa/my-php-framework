<?php

declare(strict_types=1);

namespace Domains\Invoice\Validation;

require_once 'Domains/Invoice/Validation/ValidationInterface.php';

use Domains\Invoice\Validation\ValidationInterface;
use Ramsey\Uuid\Uuid;

class InvoiceDetailValidation implements ValidationInterface
{    
    /**
     * validate
     *
     * @param  array $data
     * @return array
     */
    public function validate(array $data): array
    {
        $errors = [];

        // Check if required fields are present
        if (
            !isset($data['customer_id'])
            || empty($data['customer_id'])
            || !Uuid::isValid($data['customer_id'])
        ) {
            $errors['customer_id'] = 'Customer ID is required and must be valid';
        }

        if (!isset($data['due_date']) || empty($data['due_date'])) {
            $errors['due_date'] = 'due_date is required and must be valid';
        }

        return $errors;
    }
}
