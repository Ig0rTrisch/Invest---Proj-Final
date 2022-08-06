<?php

namespace APP\Model;

class Address
{
    private string $publicPlace;
    private string $streetName;
    private string $neighborhood;
    private string $complement;
    private int $numberOfStreet;
    private int $zipCode;
    private string $city;

    public function __construct(
        string $publicPlace,
        string $streetName,
        string $neighborhood,
        string $complement,
        int $numberOfStreet,
        int $zipCode,
        string $city
    )   
    {
        $this->publicPlace = $publicPlace;
        $this->streetName = $streetName;
        $this->neighborhood = $neighborhood;
        $this->complement = $complement;
        $this->numberOfAddress = $numberOfAddress;
        $this->zipCode = $zipCode;
        $this->city = $city;
    }
}