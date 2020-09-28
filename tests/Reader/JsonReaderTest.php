<?php

declare(strict_types=1);

namespace Tests\Reader;

use App\Reader\JsonReader;
use PHPUnit\Framework\TestCase;

class JsonReaderTest extends TestCase
{
    /**
     * @covers App\Reader\JsonReader
     */
    public function testCanCheckValidJson(): void
    {
        $file = './tests/Reader/test.json';
        $JsonReader = new JsonReader();
        $result = $JsonReader->read($file);
        $this->assertIsArray($result);
    }
    
    /**
     * @covers App\Reader\JsonReader
     */
    public function testInvalidJson(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $file = './tests/Reader/test2.json';
        $JsonReader = new JsonReader();
        $JsonReader->read($file);
    }
}
