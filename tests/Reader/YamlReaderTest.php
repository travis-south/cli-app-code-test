<?php

declare(strict_types=1);

namespace Tests\Reader;

use App\Reader\YamlReader;
use PHPUnit\Framework\TestCase;

class YamlReaderTest extends TestCase
{
    /**
     * @covers App\Reader\YamlReader
     */
    public function testCanCheckValidYaml(): void
    {
        $file = './tests/Reader/test.yml';
        $YamlReader = new YamlReader();
        $result = $YamlReader->read($file);
        $this->assertIsArray($result);
    }
    
    /**
     * @covers App\Reader\YamlReader
     */
    public function testInvalidYaml(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $file = './tests/Reader/test2.yml';
        $YamlReader = new YamlReader();
        $YamlReader->read($file);
    }
}
