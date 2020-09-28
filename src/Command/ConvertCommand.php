<?php

namespace App\Command;

use GetOpt\Command;
use GetOpt\GetOpt;
use GetOpt\Option;
use GetOpt\Operand;
use App\Reader\CsvReader;
use App\Reader\JsonReader;
use App\Reader\YamlReader;
use App\Reader\Reader;
use App\Validations\Validator;
use App\Entities\Customers;
use App\Writer\CsvWriter;
use App\Writer\JsonWriter;
use App\Writer\YamlWriter;
use App\Writer\Writer;

class ConvertCommand extends Command
{
    public function __construct()
    {
        parent::__construct('convert', [$this, 'handle']);

        $this->addOperands([
            Operand::create('input', Operand::OPTIONAL)
                ->setDescription('Input file'),
            Operand::create('input-file-type', Operand::OPTIONAL)
                ->setDescription('Input file type. Can be json|yml|csv'),
            Operand::create('destination', Operand::OPTIONAL)
                ->setDescription('Destination file.'),
            Operand::create('destination-file-type', Operand::OPTIONAL)
                ->setDescription('Destination file type. Can be json|yml|csv')
        ]);

        $this->setDescription('Convert input files of csv, json, or yml to csv, json and yml.');
    }
    
    public function handle(GetOpt $getOpt)
    {
        $input = $getOpt->getOperand('input');
        $inputFileType = $getOpt->getOperand('input-file-type');
        $output = $getOpt->getOperand('destination');
        $outputFileType = $getOpt->getOperand('destination-file-type');

        switch (strtolower($inputFileType)) {
            case 'csv':
                $readerAdapter = new CsvReader();
                break;
            case 'json':
                $readerAdapter = new JsonReader();
                break;
            case 'yml':
                $readerAdapter = new YamlReader();
                break;
            default:
                throw new \InvalidArgumentException("Invalid input type: $inputFileType");
        }

        $reader = new Reader($readerAdapter);
        $data = $reader->read($input);

        $customers = $this->getCustomerData($data);

        switch (strtolower($outputFileType)) {
            case 'csv':
                $writerAdapter = new CsvWriter();
                break;
            case 'json':
                $writerAdapter = new JsonWriter();
                break;
            case 'yml':
                $writerAdapter = new YamlWriter();
                break;
            default:
                throw new \InvalidArgumentException("Invalid ouput type: $outputFileType");
        }

        $writer = new Writer($writerAdapter);
        $writer->write($data, $output);
    }

    private function getCustomerData(iterable $data): iterable
    {
        $customers = [];
        foreach ($data as $customer) {
            $custObj = new Customers();
            $custObj->setId($customer['id']);
            $custObj->setTitle($customer['title']);
            $custObj->setFirstName($customer['firstName']);
            $custObj->setLastName($customer['lastName']);
            $custObj->setCompany($customer['company']);
            $custObj->setEmail($customer['email']);
            $custObj->setPhoneNumber($customer['phoneNumber']);
            $custObj->setBuildingNumber($customer['buildingNumber']);
            $custObj->setStreetName($customer['streetName']);
            $custObj->setCity($customer['city']);
            $custObj->setPostCode($customer['postcode']);
            $custObj->setCounty($customer['county']);
            $custObj->setCreditCardType($customer['creditCardType']);
            $custObj->setCreditCardExpiration($customer['creditCardExpirationDate']);

            $customers[] = $custObj;
            $validator = new Validator($custObj);
            $validator->validate();
        }
        return $customers;
    }
}
