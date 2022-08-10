<?php

namespace APP\Model;

class Address
{
    private int $id;
    private string $public_place;
    private string $streetName;
    private string $neighborhood;
    private string $complement;
    private int $numberOfStreet;
    private int $zipCode;
    private string $city;

    public function __construct(
        string $public_place,
        string $streetName,
        string $neighborhood,
        string $complement,
        int $numberOfStreet,
        int $zipCode,
        string $city,
        int $id=0
    )   
    {
        $this->id = $id;
        $this->public_place = $public_place;
        $this->streetName = $streetName;
        $this->neighborhood = $neighborhood;
        $this->complement = $complement;
        $this->numberOfStreet = $numberOfStreet;
        $this->zipCode = $zipCode;
        $this->city = $city;
    }


    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }
}
