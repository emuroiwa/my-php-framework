<?php

declare(strict_types=1);

namespace Domains\Invoice\Validation;

require_once 'Domains/Invoice/Validation/ValidationInterface.php';

use Domains\Invoice\Validation\ValidationInterface;

class InvoiceItemValidation implements ValidationInterface
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
            !isset($data['description'])
            || empty($data['description'])
            || !is_string($data['description'])
            || strlen($data['description']) < 255
        ) {
            $errors['description'] = 'description is required and must be valid';
        }

        if (!isset($data['taxed']) || empty($data['taxed']) || filter_var($data['taxed'], FILTER_VALIDATE_BOOLEAN) === false) {
            $errors['taxed'] = 'taxed is required and must be valid';
        }

        if (!isset($data['amount']) || empty($data['amount']) || filter_var($data['amount'], FILTER_VALIDATE_INT) === false) {
            $errors['amount'] = 'amount is required and must be valid';
        }

        return $errors;
    }
}
