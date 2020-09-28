<?php

declare(strict_types=1);

namespace Tests\Validations;

use App\Entities\Customers;
use App\Exceptions\InvalidDataException;
use App\Validations\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    /**
     * @covers App\Validations\Validator
     * @covers App\Entities\Customers
     */
    public function testCanValidateRequired(): void
    {
        $this->expectException(\TypeError::class);
        $customer = new Customers();
        $customer->setId(1);
        $validator = new Validator($customer);
        $validator->validate();
    }
    
    /**
     * @covers App\Validations\Validator
     * @covers App\Entities\Customers
     * @covers App\Exceptions\InvalidDataException
     */
    public function testCanValidateWrongEmail(): void
    {
        $this->expectException(InvalidDataException::class);
        $customer = new Customers();
        $customer->setId(1);
        $customer->setTitle('foo title');
        $customer->setFirstName('john');
        $customer->setLastName('doe');
        $customer->setCompany('bar company');
        $customer->setEmail('wrong@email');
        $validator = new Validator($customer);
        $validator->validate();
    }
    
    /**
     * @covers App\Validations\Validator
     * @covers App\Entities\Customers
     * @covers App\Exceptions\InvalidDataException
     */
    public function testCanValidateInvalideDate(): void
    {
        $this->expectException(InvalidDataException::class);
        $customer = new Customers();
        $customer->setId(1);
        $customer->setTitle('foo title');
        $customer->setFirstName('john');
        $customer->setLastName('doe');
        $customer->setCompany('bar company');
        $customer->setEmail('correct@email.com');
        $customer->setPhoneNumber('123412345');
        $customer->setBuildingNumber(4);
        $customer->setStreetName('foo street');
        $customer->setCity('New York');
        $customer->setPostCode('123A');
        $customer->setCounty('OH');
        $customer->setCreditCardType('VISA');
        $customer->setCreditCardExpiration('13/13/2020');
        $validator = new Validator($customer);
        $validator->validate();
    }
    
    /**
     * @covers App\Validations\Validator
     * @covers App\Entities\Customers
     * @covers App\Exceptions\InvalidDataException
     */
    public function testCanValidateInvalidPhoneNumber(): void
    {
        $this->expectException(InvalidDataException::class);
        $customer = new Customers();
        $customer->setId(1);
        $customer->setTitle('foo title');
        $customer->setFirstName('john');
        $customer->setLastName('doe');
        $customer->setCompany('bar company');
        $customer->setEmail('correct@email.com');
        $customer->setPhoneNumber('123412a345');
        $customer->setBuildingNumber(4);
        $customer->setStreetName('foo street');
        $customer->setCity('New York');
        $customer->setPostCode('123A');
        $customer->setCounty('OH');
        $customer->setCreditCardType('VISA');
        $customer->setCreditCardExpiration('20-Oct');
        $validator = new Validator($customer);
        $validator->validate();
    }
    
    /**
     * @covers App\Validations\Validator
     * @covers App\Entities\Customers
     * @covers App\Exceptions\InvalidDataException
     */
    public function testCanValidateValidData(): void
    {
        $customer = new Customers();
        $customer->setId(1);
        $customer->setTitle('foo title');
        $customer->setFirstName('john');
        $customer->setLastName('doe');
        $customer->setCompany('bar company');
        $customer->setEmail('correct@email.com');
        $customer->setPhoneNumber('+44(0)2914 119623');
        $customer->setBuildingNumber(4);
        $customer->setStreetName('foo street');
        $customer->setCity('New York');
        $customer->setPostCode('123A');
        $customer->setCounty('OH');
        $customer->setCreditCardType('VISA');
        $customer->setCreditCardExpiration('18-Oct');
        $validator = new Validator($customer);
        $this->assertSame($validator->validate(), true);
    }
}
