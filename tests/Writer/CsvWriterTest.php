<?php

declare(strict_types=1);

namespace Tests\Writer;

use App\Writer\CsvWriter;
use PHPUnit\Framework\TestCase;

class CsvWriterTest extends TestCase
{

    protected $list;
    protected $fileCorrect = './tests/test-write.csv';
    protected $fileWrong = './tests/nothing/test-write.csv';

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
     * @covers App\Writer\CsvWriter
     */
    public function testCanCheckValidCsv(): void
    {
        
        $csvWriter = new CsvWriter();
        $result = $csvWriter->write($this->list, $this->fileCorrect);
        $this->assertTrue(is_file($this->fileCorrect));
    }
    
    /**
     * @covers App\Writer\CsvWriter
     */
    public function testInvalidFilePath(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $csvWriter = new CsvWriter();
        $csvWriter->write($this->list, $this->fileWrong);
    }
}
