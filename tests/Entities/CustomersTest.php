<?php

declare(strict_types=1);

namespace Tests\Entities;

use App\Entities\Customers;
use PHPUnit\Framework\TestCase;

class CustomersTest extends TestCase
{
    /**
     * @covers App\Entities\Customers::setId
     * @covers App\Entities\Customers::getId
     */
    public function testCanSetId(): void
    {
        $id = 44;
        $customer = new Customers();
        $customer->setId($id);
        $this->assertSame($id, $customer->getId());
    }
    
    /**
     * @covers App\Entities\Customers::setTitle
     * @covers App\Entities\Customers::getTitle
     */
    public function testCanSetTitle(): void
    {
        $title = 'My Title';
        $customer = new Customers();
        $customer->setTitle($title);
        $this->assertSame($title, $customer->getTitle());
    }
    
    /**
     * @covers App\Entities\Customers::setFirstName
     * @covers App\Entities\Customers::getFirstName
     */
    public function testCanSetFirstName(): void
    {
        $firstName = 'John';
        $customer = new Customers();
        $customer->setFirstName($firstName);
        $this->assertSame($firstName, $customer->getFirstName());
    }
    
    /**
     * @covers App\Entities\Customers::setLastName
     * @covers App\Entities\Customers::getLastName
     */
    public function testCanSetLastName(): void
    {
        $lastName = 'John';
        $customer = new Customers();
        $customer->setLastName($lastName);
        $this->assertSame($lastName, $customer->getLastName());
    }
    
    /**
     * @covers App\Entities\Customers::setCompany
     * @covers App\Entities\Customers::getCompany
     */
    public function testCanSetCompany(): void
    {
        $company = 'The Company';
        $customer = new Customers();
        $customer->setCompany($company);
        $this->assertSame($company, $customer->getCompany());
    }
    
    /**
     * @covers App\Entities\Customers::setEmail
     * @covers App\Entities\Customers::getEmail
     */
    public function testCanSetEmail(): void
    {
        $email = 'The Company';
        $customer = new Customers();
        $customer->setEmail($email);
        $this->assertSame($email, $customer->getEmail());
    }
    
    /**
     * @covers App\Entities\Customers::setPhoneNumber
     * @covers App\Entities\Customers::getPhoneNumber
     */
    public function testCanSetgetPhoneNumber(): void
    {
        $getPhoneNumber = '123123123123';
        $customer = new Customers();
        $customer->setPhoneNumber($getPhoneNumber);
        $this->assertSame($getPhoneNumber, $customer->getPhoneNumber());
    }
    
    /**
     * @covers App\Entities\Customers::setBuildingNumber
     * @covers App\Entities\Customers::getBuildingNumber
     */
    public function testCanSetgetBuildingNumber(): void
    {
        $getBuildingNumber = 444;
        $customer = new Customers();
        $customer->setBuildingNumber($getBuildingNumber);
        $this->assertSame($getBuildingNumber, $customer->getBuildingNumber());
    }
    
    /**
     * @covers App\Entities\Customers::setStreetName
     * @covers App\Entities\Customers::getStreetName
     */
    public function testCanSetgetStreetName(): void
    {
        $getStreetName = 'ayala';
        $customer = new Customers();
        $customer->setStreetName($getStreetName);
        $this->assertSame($getStreetName, $customer->getStreetName());
    }
    
    /**
     * @covers App\Entities\Customers::setCity
     * @covers App\Entities\Customers::getCity
     */
    public function testCanSetgetCity(): void
    {
        $getCity = 'ayala';
        $customer = new Customers();
        $customer->setCity($getCity);
        $this->assertSame($getCity, $customer->getCity());
    }
    
    /**
     * @covers App\Entities\Customers::setPostCode
     * @covers App\Entities\Customers::getPostCode
     */
    public function testCanSetgetPostCode(): void
    {
        $getPostCode = '1231';
        $customer = new Customers();
        $customer->setPostCode($getPostCode);
        $this->assertSame($getPostCode, $customer->getPostCode());
    }
    
    /**
     * @covers App\Entities\Customers::setCounty
     * @covers App\Entities\Customers::getCounty
     */
    public function testCanSetgetCounty(): void
    {
        $getCounty = 'alabama';
        $customer = new Customers();
        $customer->setCounty($getCounty);
        $this->assertSame($getCounty, $customer->getCounty());
    }
    
    /**
     * @covers App\Entities\Customers::setCreditCardType
     * @covers App\Entities\Customers::getCreditCardType
     */
    public function testCanSetgetCreditCardType(): void
    {
        $getCreditCardType = 'visa';
        $customer = new Customers();
        $customer->setCreditCardType($getCreditCardType);
        $this->assertSame($getCreditCardType, $customer->getCreditCardType());
    }
    
    /**
     * @covers App\Entities\Customers::setCreditCardExpiration
     * @covers App\Entities\Customers::getCreditCardExpiration
     */
    public function testCanSetgetCreditCardExpiration(): void
    {
        $getCreditCardExpiration = 'visa';
        $customer = new Customers();
        $customer->setCreditCardExpiration($getCreditCardExpiration);
        $this->assertSame($getCreditCardExpiration, $customer->getCreditCardExpiration());
    }
}
