<?php

namespace APP\Model;



class Employee 
{
    private int $id;
    private string $name;
    private string $cpf;
    private string $birthDate;
    private string $email;
    private int $registration_employee;
    private string $password;
    private Address $address;

    public function __construct(
        string $name,
        string $cpf,
        string $birthDate,
        string $email,
        int $registration_employee,
        string $password,
        int $id=0,
        Address $address=null
    )
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->registration_employee = $registration_employee;
        $this->password = $password;
        $this->id=$id;
        $this->address = $address;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

}

