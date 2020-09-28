<?php

declare(strict_types=1);

namespace App\Entities;

class Customers
{

    private $id;

    private $title;

    private $firstName;

    private $lastName;

    private $company;

    private $email;

    private $phoneNumber;

    private $buildingNumber;

    private $streetName;

    private $city;

    private $postCode;

    private $county;

    private $creditCardType;

    private $creditCardExpiration;


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getTitle(): string
    {
        return $this->title;
    }
    
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function getCompany(): string
    {
        return $this->company;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }


    public function getBuildingNumber(): int
    {
        return $this->buildingNumber;
    }


    public function getStreetName(): string
    {
        return $this->streetName;
    }


    public function getCity(): string
    {
        return $this->city;
    }


    public function getPostCode(): string
    {
        return $this->postCode;
    }


    public function getCounty(): string
    {
        return $this->county;
    }


    public function getCreditCardType(): string
    {
        return $this->creditCardType;
    }


    public function getCreditCardExpiration(): string
    {
        return $this->creditCardExpiration;
    }


    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }


    public function setCompany(string $company): void
    {
        $this->company = $company;
    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }


    public function setBuildingNumber(int $buildingNumber): void
    {
        $this->buildingNumber = $buildingNumber;
    }


    public function setStreetName(string $streetName): void
    {
        $this->streetName = $streetName;
    }


    public function setCity(string $city): void
    {
        $this->city = $city;
    }


    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }


    public function setCounty(string $county): void
    {
        $this->county = $county;
    }


    public function setCreditCardType(string $creditCardType): void
    {
        $this->creditCardType = $creditCardType;
    }


    public function setCreditCardExpiration(string $creditCardExpiration): void
    {
        $this->creditCardExpiration = $creditCardExpiration;
    }
}
