<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class InvalidDataException extends Exception
{

    public function __construct(string $property)
    {
        parent::__construct("Invalid data $property");
    }
}
