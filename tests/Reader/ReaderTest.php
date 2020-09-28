<?php

declare(strict_types=1);

namespace Tests\Reader;

use App\Reader\Reader;
use App\Reader\ReaderInterface;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery;
use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @covers App\Reader\Reader
     */
    public function testCanRunAdapter(): void
    {
        $file = 'test.txt';
        $mockReader = Mockery::mock(ReaderInterface::class);
        $mockReader->shouldReceive('read')
            ->times(1)
            ->andReturn([]);
        $reader = new Reader($mockReader);
        $result = $reader->read($file);
        $this->assertIsArray($result);
    }
}
