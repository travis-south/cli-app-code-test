<?php

declare(strict_types=1);

namespace App\Validations;

use App\Entities\Customers;
use App\Exceptions\InvalidDataException;

class Validator
{

    private $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }

    public function validate(): bool
    {
        $this->validateProperty($this->customers->getId(), ['required', FILTER_VALIDATE_INT]);
        $this->validateProperty($this->customers->getTitle(), ['required']);
        $this->validateProperty($this->customers->getFirstName(), ['required']);
        $this->validateProperty($this->customers->getLastName(), ['required']);
        $this->validateProperty($this->customers->getCompany(), ['required']);
        $this->validateProperty($this->customers->getEmail(), ['required', FILTER_VALIDATE_EMAIL]);
        $this->validateProperty($this->customers->getPhoneNumber(), ['required', 'valid_phone_number']);
        $this->validateProperty($this->customers->getBuildingNumber(), ['required', FILTER_VALIDATE_INT]);
        $this->validateProperty($this->customers->getStreetName(), ['required']);
        $this->validateProperty($this->customers->getCity(), ['required']);
        $this->validateProperty($this->customers->getPostCode(), ['required']);
        $this->validateProperty($this->customers->getCounty(), ['required']);
        $this->validateProperty($this->customers->getCreditCardType(), ['required']);
        $this->validateProperty($this->customers->getCreditCardExpiration(), ['required', 'valid_date']);
        return true;
    }

    private function validateProperty($value, array $filters, $options = null): void
    {
        foreach ($filters as $filter) {
            if ($filter === 'required') {
                if (empty($value)) {
                    throw new InvalidDataException($value);
                }
                continue;
            }

            if ($filter === 'valid_date') {
                $d = \DateTime::createFromFormat('d-y-M', "01-$value");
                if (!$d || !$d->format('y-M') === $value) {
                    throw new InvalidDataException($value);
                }
                continue;
            }
            
            if ($filter === 'valid_phone_number') {
                $resultPhone = preg_match("/^[\d\(\)\s\+]+$/i", $value);
                if (!$resultPhone) {
                    throw new InvalidDataException($value);
                }
                continue;
            }

            if (!filter_var($value, $filter, $options)) {
                throw new InvalidDataException($value);
            }
        }
    }
}
