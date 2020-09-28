<?php

declare(strict_types=1);

namespace Tests\Writer;

use App\Writer\Writer;
use App\Writer\WriterInterface;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery;
use PHPUnit\Framework\TestCase;

class WriterTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    protected $list;
    protected $fileCorrect = './tests/test-write.json';
    protected $fileWrong = './tests/nothing/test-write.json';

    protected function setUp(): void
    {
        $this->list = [
            [
                'id' => 53421926,
                'title' => 'Dr.',
                'firstName' => 'Donna',
                'lastName' => 'Johnson',
                'company' => 'Martin Ltd',
                'email' => 'donna.johnson@robinson.org',
                'phoneNumber' => '(0043) 645 2768',
                'buildingNumber' => 168,
                'streetName' => 'Tom Locks',
                'city' => 'Ellieburgh',
                'postcode' => 'FK8 1LD',
                'county' => 'West Yorkshire',
                'creditCardType' => 'MasterCard',
                'creditCardExpirationDate' => '20-Oct',
            ],
            [
                'id' => 11840806,
                'title' => 'Dr.',
                'firstName' => 'Ben',
                'lastName' => 'Graham',
                'company' => 'Reid Inc',
                'email' => 'ben.graham@palmer.info',
                'phoneNumber' => '(08851) 360123',
                'buildingNumber' => 98,
                'streetName' => 'Patrick Branch',
                'city' => 'Ianchester',
                'postcode' => 'WA7 1EN',
                'county' => 'North Yorkshire',
                'creditCardType' => 'Visa',
                'creditCardExpirationDate' => '18-Oct',
            ]
        ];
    }

    /**
     * @covers App\Writer\Writer
     */
    public function testCanRunAdapter(): void
    {
        $mockWriter = Mockery::mock(WriterInterface::class);
        $mockWriter->shouldReceive('write')
            ->times(1);
        $writer = new Writer($mockWriter);
        $writer->write($this->list, $this->fileWrong);
    }
}
