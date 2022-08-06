<?php

namespace APP\Model;



class Client
{
    private int $id;
    private string $login;
    private string $password;
    private string $name;
    private string $cpf;
    private string $birthDate;
    private string $email;
    private Address $address;
    
    public function __construct(
        string $login,
        string $password,
        string $name,
        string $cpf,
        string $birthDate,
        string $email,
        Address $address=null,
        int $id=0
    )
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->login = $login;
        $this->passoword = $password;
        $this->address = $address;
    }
}