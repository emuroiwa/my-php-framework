<?php

declare(strict_types=1);

namespace Domains\Invoice\Validation;

require 'Domains/Invoice/Validation/CustomerValidationInterface.php';

use Domains\Invoice\Validation\CustomerValidationInterface;

class CustomerValidation implements CustomerValidationInterface
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
            !isset($data['name'])
            || empty($data['name'])
            || !is_string($data['name']) === false
            || strlen($data['name']) < 255
        ) {
            $errors['name'] = 'name is required and must be valid';
        }

        if (
            !isset($data['surname'])
            || empty($data['surname'])
            || !is_string($data['surname']) === false
            || strlen($data['surname']) < 255
        ) {
            $errors['surname'] = 'surname is required and must be valid';
        }

        if (
            !isset($data['company'])
            || empty($data['company'])
            || !is_string($data['company']) === false
            || strlen($data['company']) < 255
        ) {
            $errors['company'] = 'company is required and must be valid';
        }

        if (!isset($data['street_address']) || empty($data['street_address'])) {
            $errors['street_address'] = 'street_address is required';
        }

        if (
            !isset($data['city'])
            || empty($data['city'])
            || !is_string($data['city']) === false
            || strlen($data['city']) < 255
        ) {
            $errors['city'] = 'city is required and must be valid';
        }

        if (
            !isset($data['state'])
            || empty($data['state'])
            || !is_string($data['state']) === false
            || strlen($data['state']) < 255
        ) {
            $errors['state'] = 'state is required and must be valid';
        }


        if (!isset($data['phone']) || empty($data['phone']) || filter_var($data['phone'], FILTER_VALIDATE_INT) === false) {
            $errors['phone'] = 'phone is required and must be valid';
        }

        return $errors;
    }
}
