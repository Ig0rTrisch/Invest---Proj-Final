<?php

namespace APP\Model;

class Address
{
    private int $id;
    private string $public_place;
    private string $street_name;
    private string $neighborhood;
    private string $complement;
    private int $number_of_street;
    private int $zip_code;
    private string $city;

    public function __construct(
        string $public_place,
        string $street_name,
        string $neighborhood,
        string $complement,
        int $number_of_street,
        int $zip_code,
        string $city,
        int $id=0
    )   
    {
        $this->id = $id;
        $this->public_place = $public_place;
        $this->street_name = $street_name;
        $this->neighborhood = $neighborhood;
        $this->complement = $complement;
        $this->number_of_street = $number_of_street;
        $this->zip_code = $zip_code;
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
