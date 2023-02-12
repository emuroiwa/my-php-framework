<?php

declare(strict_types=1);

namespace Domains\Invoice\Validation;

require_once 'Domains/Invoice/Validation/ValidationInterface.php';

use Domains\Invoice\Validation\ValidationInterface;

class CustomerValidation implements ValidationInterface
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
            || !is_string($data['name'])
            || strlen($data['name']) > 255
        ) {
            var_dump($data['name']);
            $errors['name'] = 'name is required and must be valid';
        }

        if (
            !isset($data['surname'])
            || empty($data['surname'])
            || !is_string($data['surname'])
            || strlen($data['surname']) > 255
        ) {
            $errors['surname'] = 'surname is required and must be valid';
        }

        if (
            !isset($data['company'])
            || empty($data['company'])
            || !is_string($data['company'])
            || strlen($data['company']) > 255
        ) {
            $errors['company'] = 'company is required and must be valid';
        }

        if (!isset($data['street_address']) || empty($data['street_address'])) {
            $errors['street_address'] = 'street_address is required';
        }

        if (
            !isset($data['city'])
            || empty($data['city'])
            || !is_string($data['city'])
            || strlen($data['city']) > 255
        ) {
            $errors['city'] = 'city is required and must be valid';
        }

        if (
            !isset($data['state'])
            || empty($data['state'])
            || !is_string($data['state'])
            || strlen($data['state']) > 255
        ) {
            $errors['state'] = 'state is required and must be valid';
        }


        if (!isset($data['phone']) || empty($data['phone']) || filter_var($data['phone'], FILTER_VALIDATE_INT) === false) {
            $errors['phone'] = 'phone is required and must be valid';
        }

        return $errors;
    }
}
