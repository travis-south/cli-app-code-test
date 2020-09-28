<?php

declare(strict_types=1);

namespace App\Reader;

class CsvReader implements ReaderInterface
{
    public function read(string $path): iterable
    {
        try {
            if (($file = fopen($path, 'r')) === false) {
                throw new \InvalidArgumentException("$path is invalid");
            }
            $finalData = [];
            $row = 0;
            $header = [];
            while (($data = fgetcsv($file)) !== false) {
                $row++;
                if ($row === 1) {
                    $header[$data[0]] = 0;
                    $header[$data[1]] = 1;
                    $header[$data[2]] = 2;
                    $header[$data[3]] = 3;
                    $header[$data[4]] = 4;
                    $header[$data[5]] = 5;
                    $header[$data[6]] = 6;
                    $header[$data[7]] = 7;
                    $header[$data[8]] = 8;
                    $header[$data[9]] = 9;
                    $header[$data[10]] = 10;
                    $header[$data[11]] = 11;
                    $header[$data[12]] = 12;
                    $header[$data[13]] = 13;
                    continue;
                }
                $finalData[] = [
                    'id' => $data[$header['id']],
                    'title' => $data[$header['title']],
                    'firstName' => $data[$header['firstName']],
                    'lastName' => $data[$header['lastName']],
                    'company' => $data[$header['company']],
                    'email' => $data[$header['email']],
                    'phoneNumber' => $data[$header['phoneNumber']],
                    'buildingNumber' => $data[$header['buildingNumber']],
                    'streetName' => $data[$header['streetName']],
                    'city' => $data[$header['city']],
                    'postcode' => $data[$header['postcode']],
                    'county' => $data[$header['county']],
                    'creditCardType' => $data[$header['creditCardType']],
                    'creditCardExpirationDate' => $data[$header['creditCardExpirationDate']],
                ];
            }
            fclose($file);
            return $finalData;
        } catch (\Exception $e) {
            throw new \InvalidArgumentException("$path is invalid");
        }
    }
}
