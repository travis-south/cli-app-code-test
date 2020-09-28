<?php

declare(strict_types=1);

namespace Tests\Exceptions;

use App\Exceptions\InvalidDataException;
use PHPUnit\Framework\TestCase;

class InvalidDataExceptionTest extends TestCase
{
    /**
     * @covers App\Exceptions\InvalidDataException
     */
    public function testCanCreateException(): void
    {
        $exception = new InvalidDataException('foo');
        $this->assertSame($exception->getMessage(), 'Invalid data foo');
    }
}
