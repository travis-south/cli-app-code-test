<?php

declare(strict_types=1);

namespace Tests\Reader;

use App\Reader\CsvReader;
use PHPUnit\Framework\TestCase;

class CsvReaderTest extends TestCase
{
    /**
     * @covers App\Reader\CsvReader
     */
    public function testCanCheckValidCsv(): void
    {
        $file = './tests/Reader/test.csv';
        $csvReader = new CsvReader();
        $result = $csvReader->read($file);
        $this->assertIsArray($result);
    }
    
    /**
     * @covers App\Reader\CsvReader
     */
    public function testInvalidFilePath(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $file = './tests/Reader/test2.csv';
        $csvReader = new CsvReader();
        $csvReader->read($file);
    }
}
