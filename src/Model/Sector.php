<?php

namespace APP\Model;

class Sector
{
    private int $id_sector;
    private string $function;
    private float $salary;

    public function __construct(
        int $id_sector,
        string $function,
        float $salary
    )
    {
        $this->id_sector = $id_sector;
        $this->function = $function;
        $this->salary = $salary;
    }
}